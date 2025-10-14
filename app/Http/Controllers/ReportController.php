<?php

namespace App\Http\Controllers;

use App\Models\DocumentRead;
use App\Models\Note;
use App\Models\PageVisit;
use App\Models\Report;
use App\Models\Resource;
use App\Models\Subscriber;
use App\Models\User;
use App\Models\UserSession;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $this->authorize('admin');

        $reports = Report::paginate(20);

        return view('reports.index', compact('reports'));
    }

    public function create()
    {
        $this->authorize('admin');

        return view('reports.create');
    }

    public function store(Request $request)
    {
        $this->authorize('admin');

        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Report::create([
            'title'    => $request->title,
            'content'  => $request->content,
            'admin_id' => auth()->id(),
        ]);

        return redirect()->route('reports.index')->with('success', 'Report created.');
    }

    /**
     * Get real-time online users (cache based).
     */
    public function onlineUsers()
    {
        $users = User::all()->filter(function ($user) {
            return Cache::has('user-is-online-' . $user->id);
        });

        return response()->json([
            'count' => $users->count(),
            'users' => $users,
        ]);
    }

    /**
     * Get unique active users by day/week/month.
     */

    /**
     * Get total time spent in system.
     */
    public function totalTimeSpent()
    {
        $totalSeconds = UserSession::sum('duration');
        return response()->json([
            'total_time'    => gmdate('H:i:s', $totalSeconds),
            'total_seconds' => $totalSeconds,
        ]);
    }

    /**
     * Get pages visited and documents read stats.
     */
    public function platformStats()
    {
        return response()->json([
            'resources'   => Resource::count(),
            'notes'       => Note::count(),
            'users'       => User::count(),
            'subscribers' => Subscriber::count(),
        ]);
    }

    public function contentUsageStats()
    {
        return response()->json([
            'pages_visited'  => PageVisit::count(),
            'documents_read' => DocumentRead::count(),
        ]);
    }

    public function activeUsers()
    {
        $daily = UserSession::whereDate('login_time', today())
            ->distinct('user_id')->count('user_id');

        $weekly = UserSession::whereBetween('login_time', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->distinct('user_id')->count('user_id');

        $monthly = UserSession::whereMonth('login_time', now()->month)
            ->distinct('user_id')->count('user_id');

        return response()->json([
            'daily'   => $daily,
            'weekly'  => $weekly,
            'monthly' => $monthly,
        ]);
    }

    public function userReports()
    {
        $today = PageVisit::whereDate('visited_at', today())
            ->distinct('user_id')->count('user_id');

        $weekly = PageVisit::whereBetween('visited_at', [
            now()->startOfWeek(),
            now()->endOfWeek(),
        ])->distinct('user_id')->count('user_id');

        $monthly = PageVisit::whereMonth('visited_at', now()->month)
            ->distinct('user_id')->count('user_id');

        return response()->json([
            'daily'   => $today,
            'weekly'  => $weekly,
            'monthly' => $monthly,
        ]);
    }

    public function activeUsersPage()
    {
        // $users = User::whereNotNull('last_seen_at')
        //     ->where('last_seen_at', '>=', now()->subMinutes(2))
        //     ->get();

        $users = User::all()->filter(function ($user) {
            return Cache::has('user-is-online-' . $user->id);
        });

        return view('admin.reports.active_users', compact('users'));
    }

    public function dailyUsersPage()
    {
        // $users = UserSession::whereDate('login_time', today())
        //     ->distinct('user_id')->get(['user_id', 'login_time']);

        $users = UserSession::whereDate('login_time', today())
            ->select('user_id', DB::raw('MIN(login_time) as first_login'))
            ->groupBy('user_id')
            ->with('user')
            ->get();

        return view('admin.reports.daily_users', compact('users'));
    }

    public function mostReadResources()
    {
        $resources = Resource::withCount('documentReads')
            ->orderByDesc('document_reads_count')
            ->take(10) // Top 10
            ->get();

        return view('admin.reports.most_read_resources', compact('resources'));
    }

    public function timeSpentReport()
    {
        $users = User::withSum('sessions as total_duration', 'duration')
            ->orderByDesc('total_duration')
            ->get();

        return view('admin.reports.time_spent', compact('users'));
    }

    public function weeklyUsersPage()
    {
        // $weeklyUsers = UserSession::whereBetween('login_time', [
        //     now()->startOfWeek(),
        //     now()->endOfWeek(),
        // ])->orderBy('login_time', 'desc')->get();

        $weeklyUsers = UserSession::whereBetween('login_time', [
            now()->startOfWeek(),
            now()->endOfWeek(),
        ])
            ->select('user_id', DB::raw('MAX(login_time) as last_login'))
            ->groupBy('user_id')
            ->with('user')
            ->orderBy('last_login', 'desc')
            ->get();

        return view('admin.reports.weekly_users', compact('weeklyUsers'));
    }

    public function monthlyUsersPage()
    {

        $monthlyUsers = User::withCount(['sessions as sessions_count' => function ($query) {
            $query->whereMonth('login_time', now()->month);
        }])
            ->whereHas('sessions', function ($query) {
                $query->whereMonth('login_time', now()->month);
            })
            ->orderByDesc('sessions_count')
            ->get();

        return view('admin.reports.monthly_users', compact('monthlyUsers'));
    }

    public function mostActiveUsers()
    {
        // Get users with the most sessions (or total time spent)
        $mostActiveUsers = User::withCount('sessions')
            ->withSum('sessions as total_time', 'duration') // Sum durations (if tracked in seconds)
            ->orderByDesc('total_time')                     // Most time spent
            ->take(10)                                      // Top 10
            ->get();

        return view('admin.reports.most_active_users', compact('mostActiveUsers'));
    }

    public function deviceStats(Request $request)
    {
        // -------------------------------
        // 1️⃣ Grouped device stats (for charts)
        // -------------------------------
        $devices = UserSession::select(DB::raw("
        CASE
            WHEN LOWER(device) LIKE '%windows%' THEN 'Desktop | Windows Machine'
            WHEN LOWER(device) LIKE '%mac%' AND LOWER(device) NOT LIKE '%ipad%' THEN 'Desktop | Macbook Machine'
            WHEN LOWER(device) LIKE '%linux%' THEN 'Desktop | Linux Machine'
            WHEN LOWER(device) LIKE '%android%' THEN 'Mobile | Android Device'
            WHEN LOWER(device) LIKE '%iphone%' THEN 'Mobile | iOS Device'
            WHEN LOWER(device) LIKE '%ipad%' THEN 'Tablet | iPad Device'
            WHEN LOWER(device) LIKE '%tablet%' THEN 'Tablet | Other Tablet'
            ELSE 'Unknown Device'
        END as device_group
    "), DB::raw('count(*) as user_count'))
            ->groupBy('device_group')
            ->orderByDesc('user_count')
            ->get();

        // Labels and data for charts
        $labels = $devices->pluck('device_group');
        $data   = $devices->pluck('user_count');

        // -------------------------------
        // 2️⃣ Detailed device list (with optional search)
        // -------------------------------
        $deviceQuery = UserSession::query();

        // Apply filters if provided
        if ($request->filled('user_id')) {
            $deviceQuery->where('user_id', $request->user_id);
        }

        if ($request->filled('device')) {
            $deviceQuery->where('device', 'like', '%' . $request->device . '%');
        }

        $deviceList = $deviceQuery->orderByDesc('created_at')->get();

        // -------------------------------
        // 3️⃣ Return view with all data
        // -------------------------------
        return view('admin.reports.device_stats', compact(
            'devices',
            'labels',
            'data',
            'deviceList'
        ));
    }
}
