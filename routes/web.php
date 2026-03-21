<?php

use App\Models\User;
use App\Models\School;
use App\Models\Resource;
use App\Models\Subscriber;
use App\Models\UserSession;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ForumPostController;
use App\Http\Controllers\OperationsController;
use App\Http\Controllers\ForumThreadController;
use App\Http\Controllers\ReadingHistoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    $textBooks = Resource::where('resource_type', 'Textbook')
        ->where('status', 'approved')
        ->take(10)
        ->get();
    $pastpapers         = Resource::where('resource_type', 'PastPaper')
        ->where('status', 'approved')
        ->take(10)
        ->get();
    $mostReadResources = Resource::selectRaw('resources.id, resources.title, resources.description, resources.author, image_path , subject_id, resources.grade_level, COUNT(resource_interactions.id) as views')
        ->join('resource_interactions', 'resources.id', '=', 'resource_interactions.resource_id')
        ->where('resource_interactions.interaction_type', 'view')
        ->where('resources.status', 'approved')
        ->groupBy('resources.id', 'resources.title', 'resources.description', 'resources.image_path', 'resources.subject_id', 'resources.author', 'resources.grade_level')
        ->orderByDesc('views')
        ->take(10)
        ->get();

    $newArrivalResources = Resource::where('status', 'approved')
        ->orderBy('created_at', 'desc')
        ->take(10)
        ->get();
    $recentResources = Resource::where('status', 'approved')
        ->orderBy('created_at', 'desc')
        ->take(10)
        ->get();

    $referenceResources = Resource::where('resource_type', 'ReferenceBook')
    ->where('status', 'approved')
    ->take(10)
    ->get();

    $referenceBooks = Resource::where('resource_type', 'ReferenceBook')
    ->where('status', 'approved')
    ->take(10)
    ->get();

    $counts = DB::table('resources')
        ->join('subjects', 'resources.subject_id', '=', 'subjects.id')
        ->select('subjects.name', DB::raw('COUNT(*) as total'))
        ->whereIn('subjects.name', ['Mathematics', 'Science', 'History', 'Geography', 'Computer Studies'])
        ->where('resources.status', 'approved')
        ->groupBy('subjects.name')
        ->pluck('total', 'subjects.name');

    return view('welcome', compact('textBooks', 'counts', 'pastpapers', 'mostReadResources', 'newArrivalResources', 'recentResources', 'referenceBooks', 'referenceResources'));
})->name('home');

Route::get('most-read-resources', '\App\Http\Controllers\ResourceController@mostReadResources')->name('resources.most_read');

Route::get('/test', function () {
    $postMaxSize = ini_get('post_max_size');

    return view('/test', compact('postMaxSize'));
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::post('/submit-contact', [OperationsController::class, 'submitContact'])->name('contact.submit');

Route::get('/support-offers', [SupportController::class, 'index'])->name('support.index');
Route::post('/support/submit', [SupportController::class, 'store'])->name('support.submit');

// Support Offers (Admin)
Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/support-offers/{id}', [SupportController::class, 'show'])->name('support.show');
    Route::delete('/support-offers/{id}', [SupportController::class, 'destroy'])->name('support.delete');
});

Route::prefix('admin/reports')->middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/online-users', [ReportController::class, 'onlineUsers'])->name('reports.onlineUsers');
    Route::get('/active-users', [ReportController::class, 'activeUsers'])->name('reports.activeUsers');
    Route::get('/time-spent', [ReportController::class, 'totalTimeSpent'])->name('reports.timeSpent');
    Route::get('/usage-stats', [ReportController::class, 'usageStats'])->name('reports.usageStats');
});


Route::get('/404', function () {
    return view('404');
})->name('404');

// Route::get('/dashboard', function () {
// return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::post('profile', [ProfileController::class, 'store'])->name('profile.store');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//     // Dynamic dependent route for districts by region
// });
// Route::get('/regions/{region}/districts', [ProfileController::class, 'getDistricts'])->name('region.districts');
// Route::get('/api/districts/{region}', [ProfileController::class, 'getDistricts']);

Route::middleware(['auth'])->group(function () {
    Route::resource('schools', SchoolController::class);
});

//################### MANAGE SCHOOL ####################

// Route::get('/schools/create', [SchoolController::class, 'create'])->name('school.create');
Route::get('/districts/{region}', [ProfileController::class, 'getDistricts'])->name('districts.get');
Route::post('/schools', [SchoolController::class, 'store'])->name('school.save');

Route::get('/add-school', '\App\Http\Controllers\SchoolController@create')->middleware(['auth', 'verified'])->name('school.add');
Route::post('/save-school', '\App\Http\Controllers\SchoolController@store')->middleware(['auth', 'verified'])->name('school.save');
Route::get('/list-schools', '\App\Http\Controllers\SchoolController@index')->middleware(['auth', 'verified'])->name('schools.list');
Route::get('/edit-school/{school}', '\App\Http\Controllers\SchoolController@edit')->middleware(['auth', 'verified'])->name('school.edit');
Route::get('/view-school/{school}', '\App\Http\Controllers\SchoolController@show')->middleware(['auth', 'verified'])->name('school.view');
Route::put('/update-school/{school}', '\App\Http\Controllers\SchoolController@update')->middleware(['auth', 'verified'])->name('school.update');
Route::delete('/delete-school/{school}', '\App\Http\Controllers\SchoolController@destroy')->middleware(['auth', 'verified'])->name('school.delete');

Route::get('/support', [OperationsController::class, 'support'])->name('support');

Route::get('/singlebook', function () {
    return view('materials/view_book');
});

Route::get('/dashboard', function () {
    $schools = School::all();

    $textBooks   = Resource::where('resource_type', 'Textbook')->get();
    $resources   = Resource::all();
    $notes       = Resource::where('resource_type', 'Notes')->get();
    $pastPapers  = Resource::all();
    $students    = Resource::all();
    $schools     = School::all();
    $subscribers = Subscriber::all();

    $users = User::all();

    // Get online users (using cache)
    $onlineUsers = User::all()->filter(function ($user) {
        return Cache::has('user-is-online-' . $user->id);
    });

    // $onlineUsers = User::whereNotNull('last_seen_at')
    // ->where('last_seen_at', '>=', now()->subMinutes(2))
    // ->get();


    // Active users counts for charts
    $dailyActiveUsers = UserSession::whereDate('login_time', today())
        ->distinct('user_id')->count('user_id');
    $weeklyActiveUsers = UserSession::whereBetween('login_time', [
        now()->startOfWeek(),
        now()->endOfWeek()
    ])->distinct('user_id')->count('user_id');
    $monthlyActiveUsers = UserSession::whereMonth('login_time', now()->month)
        ->distinct('user_id')->count('user_id');



    return view('dashboard', compact(
        'schools',
        'notes',
        'pastPapers',
        'students',
        'schools',
        'users',
        'textBooks',
        'resources',
        'subscribers',
        'onlineUsers',
        'dailyActiveUsers',
        'weeklyActiveUsers',
        'monthlyActiveUsers'
    ));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/teacher-dashboard', function () {

    $resources = Resource::where('user_id', auth()->id())->get();
    $notes     = Resource::where('user_id', auth()->id())->get();

    $users = User::all();

    return view('teacher_dashboard', compact('notes', 'users', 'resources'));
})->middleware(['auth', 'verified'])->name('dashboard.teacher');

Route::get('/student-dashboard', function () {
    $schools = School::all();

    $textBooks   = Resource::all();
    $resources   = Resource::all();
    $notes       = Resource::all();
    $pastPapers  = Resource::all();
    $students    = Resource::all();
    $schools     = School::all();
    $subscribers = Subscriber::all();

    $users = User::all();

    return view('student_dashboard', compact('schools', 'notes', 'pastPapers', 'students', 'schools', 'users', 'textBooks', 'resources', 'subscribers'));
})->middleware(['auth', 'verified'])->name('dashboard.student');

// Resource Library
Route::resource('resources', ResourceController::class);

// User Profiles
Route::middleware(['auth'])->group(function () {
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('profile/create', [ProfileController::class, 'create'])->name('profile.create');
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    // Bookmarks
    Route::post('bookmarks', [BookmarkController::class, 'store'])->name('bookmarks.store');
    Route::delete('bookmarks/{bookmark}', [BookmarkController::class, 'destroy'])->name('bookmarks.destroy');

    // Reading History
    Route::post('reading-history', [ReadingHistoryController::class, 'store'])->name('reading.store');
    Route::get('reading-history', [ReadingHistoryController::class, 'index'])->name('reading.index');
});

// Forum Threads and Posts
Route::prefix('forum')->name('forum.')->group(function () {
    Route::get('threads', [ForumThreadController::class, 'index'])->name('threads.index');
    Route::get('threads/create', [ForumThreadController::class, 'create'])->name('threads.create');
    Route::post('threads', [ForumThreadController::class, 'store'])->name('threads.store');
    Route::get('threads/{thread}', [ForumThreadController::class, 'show'])->name('threads.show');

    Route::post('threads/{thread}/posts', [ForumPostController::class, 'store'])->name('posts.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/maktaba-connect', [TutorController::class, 'index'])->name('tutor.index');
    Route::post('/maktaba-connect-modal', [TutorController::class, 'askModal'])->name('tutor.modal');
    Route::post('/tutor/ask', [TutorController::class, 'ask'])->name('tutor.ask');
    Route::get('/check-models', [TutorController::class, 'checkAvailableModels'])->name('check.models');

    Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
    Route::get('/chat/{userId}', [ChatController::class, 'show'])->name('chat.show');
    Route::post('/chat/{conversationId}', [ChatController::class, 'send'])->name('chat.send');
    Route::post('/chat/{conversation}/typing', [ChatController::class, 'typing'])->name('chat.typing');
});

// Route::prefix('reports')->middleware(['auth', 'can:admin'])->group(function () {
Route::prefix('reports')->middleware(['auth'])->group(function () {
    Route::get('/active-users', [ReportController::class, 'activeUsersPage'])->name('reports.active-users');
    Route::get('/daily-users', [ReportController::class, 'dailyUsersPage'])->name('reports.daily-users');
    Route::get('/weekly-users', [ReportController::class, 'weeklyUsersPage'])->name('reports.weekly-users');
    Route::get('/monthly-users', [ReportController::class, 'monthlyUsersPage'])->name('reports.monthly-users');
    Route::get('/most-read-resources', [ReportController::class, 'mostReadResources'])->name('reports.most-read-resources');
    Route::get('/most-active-users', [ReportController::class, 'mostActiveUsers'])->name('reports.most-active-users');
    Route::get('/time-spent', [ReportController::class, 'timeSpentReport'])->name('reports.time-spent');
    Route::get('/device-stats', [ReportController::class, 'deviceStats'])->name('reports.device-stats');

    Route::get('/admin/device-stats', [ReportController::class, 'deviceStats'])
        ->name('device.stats');
});


// Route::middleware('auth')->group(function () {
//     Route::resource('topics', TopicController::class);
//     Route::resource('contents', ContentController::class);
// });

Route::prefix('subjects/{subject}')->middleware(['auth'])->group(function () {
    Route::get('/topics', [TopicController::class, 'index'])->name('subjects.topics.index');
    Route::get('/topics/create', [TopicController::class, 'create'])->name('subjects.topics.create');
    Route::post('/topics', [TopicController::class, 'store'])->name('subjects.topics.store');
    Route::get('/topics/{topic}/edit', [TopicController::class, 'edit'])->name('subjects.topics.edit');
    Route::put('/topics/{topic}', [TopicController::class, 'update'])->name('subjects.topics.update');
    Route::delete('/topics/{topic}', [TopicController::class, 'destroy'])->name('subjects.topics.destroy');
});

Route::prefix('subjects/{subject}/topics/{topic}')->middleware(['auth'])->group(function () {
    Route::get('/contents', [ContentController::class, 'index'])->name('subjects.topics.contents.index');
    Route::get('/contents/create', [ContentController::class, 'create'])->name('subjects.topics.contents.create');
    Route::post('/contents', [ContentController::class, 'store'])->name('subjects.topics.contents.store');
    Route::get('/contents/{content}/edit', [ContentController::class, 'edit'])->name('subjects.topics.contents.edit');
    Route::put('/contents/{content}', [ContentController::class, 'update'])->name('subjects.topics.contents.update');
    Route::delete('/contents/{content}', [ContentController::class, 'destroy'])->name('subjects.topics.contents.destroy');
});





//################### MANAGE USER ####################

Route::get('/add-user', '\App\Http\Controllers\UsersController@create')
    ->middleware(['auth', 'verified'])->name('user.add');

Route::post('/save-user', '\App\Http\Controllers\UsersController@store')
    ->middleware(['auth', 'verified'])->name('user.store');

Route::get('/list-users', '\App\Http\Controllers\UsersController@index')
    ->middleware(['auth', 'verified'])->name('users.list');

Route::get('/edit-user/{user}', '\App\Http\Controllers\UsersController@edit')
    ->middleware(['auth', 'verified'])->name('users.edit');

Route::put('/update-user/{user}', '\App\Http\Controllers\UsersController@update')
    ->middleware(['auth', 'verified'])->name('users.update');

Route::delete('/delete-user/{user}', '\App\Http\Controllers\UsersController@destroy')
    ->middleware(['auth', 'verified'])->name('users.delete');

Route::get('/materials', '\App\Http\Controllers\ResourceController@materials')
    ->name('materials');
Route::get('/search', '\App\Http\Controllers\ResourceController@search')->name('materials.search');

Route::get('/form-one-resources', '\App\Http\Controllers\ResourceController@materials1')
    ->name('materials1');

Route::get('/form-two-resources', '\App\Http\Controllers\ResourceController@materials2')
    ->name('materials2');

Route::get('/form-three-resources', '\App\Http\Controllers\ResourceController@materials3')
    ->name('materials3');

Route::get('/form-four-resources', '\App\Http\Controllers\ResourceController@materials4')
    ->name('materials4');

Route::get('/form-five-resources', '\App\Http\Controllers\ResourceController@materials5')
    ->name('materials5');

Route::get('/form-six-resources', '\App\Http\Controllers\ResourceController@materials6')
    ->name('materials6');


Route::get('reference-books', '\App\Http\Controllers\ResourceController@referencebooks')
    ->name('referencebooks');

Route::get('/past-papers', '\App\Http\Controllers\ResourceController@pastpapers')
    ->name('pastpapers');

Route::get('/notes/by-topic', '\App\Http\Controllers\NoteController@notes')->name('notes.byTopic');
Route::get('/resources/{resource}/notes/create', 'App\Http\Controllers\NoteController@create')->name('notes.create');
Route::post('/resources/{resource}/notes', 'App\Http\Controllers\NoteController@store')->name('notes.store');
Route::get('/notes/show/{id}', 'App\Http\Controllers\NoteController@showNotes')->name('notes.show');

Route::post('/subscribe', 'App\Http\Controllers\NewsletterController@subscribe')->name('newsletter.subscribe');
Route::get('/subscribers', '\App\Http\Controllers\UsersController@subscribers')
    ->middleware(['auth', 'verified'])->name('subscribers');
Route::delete('/delete-subscriber/{id}', '\App\Http\Controllers\UsersController@deleteSubscriber')
    ->middleware(['auth', 'verified'])->name('subscriber.delete');

//################### MANAGE UPLOAD MATERIALS ####################
Route::get('/upload-resources', '\App\Http\Controllers\ResourceController@create')->middleware(['auth', 'verified'])->name('resource.create');
Route::get('/list-resources', '\App\Http\Controllers\ResourceController@index')->middleware(['auth', 'verified'])->name('resources.list');
Route::post('/save-resource', '\App\Http\Controllers\ResourceController@store')->middleware(['auth', 'verified'])->name('resources.store');
Route::get('/edit-resource/{encrypted}', '\App\Http\Controllers\ResourceController@edit')->middleware(['auth', 'verified'])->name('resource.edit');
Route::put('/update-resource/{resource}', '\App\Http\Controllers\ResourceController@update')->middleware(['auth', 'verified'])->name('resources.update');
Route::delete('/delete-resource/{resource}', '\App\Http\Controllers\ResourceController@destroy')->middleware(['auth', 'verified'])->name('resources.delete');
Route::get('/resources/download/{id}', '\App\Http\Controllers\ResourceController@download')->name('resources.download');

//################### MANAGE SUBJECTS  ####################

Route::get('/list-subjects', '\App\Http\Controllers\SubjectController@index')->middleware(['auth', 'verified'])->name('subjects.list');
Route::get('/create-subject', '\App\Http\Controllers\SubjectController@create')->middleware(['auth', 'verified'])->name('subjects.create');
Route::post('/save-subject', '\App\Http\Controllers\SubjectController@store')->middleware(['auth', 'verified'])->name('subjects.save');

// ✅ Edit Subject
Route::get('/edit-subject/{subject}', '\App\Http\Controllers\SubjectController@edit')->middleware(['auth', 'verified'])->name('subjects.edit');
Route::put('/edit-subject/{subject}', '\App\Http\Controllers\SubjectController@update')->middleware(['auth', 'verified'])->name('subjects.update');

// ✅ Delete Subject
Route::delete('/delete-subject/{subject}', '\App\Http\Controllers\SubjectController@destroy')->middleware(['auth', 'verified'])->name('subjects.delete');

Route::get('/faq', '\App\Http\Controllers\OperationsController@faq')->name('faq');

//################### MANAGE LOGOUT ####################
Route::get('logout', '\App\Http\Controllers\UsersController@logout');

require __DIR__ . '/auth.php';

######################################################### ACTIVE ROUTES ############################################################

###################################################### NON ACTIVE ROUTES ############################################################

//################### MANAGE DISCUSSION ####################
// Route::get('/discussions', function () {
//     return view('/discussion/index');
// })->middleware(['auth', 'verified'])->name('discussions');

//################### MANAGE SUBJECTS ####################
// Route::get('/subjects', function () {
//     return view('/subjects/index');
// })->name('subjects');

// Route::get('/upload-note', '\App\Http\Controllers\NotesController@create')->middleware(['auth', 'verified'])->name('note.upload');
// Route::post('/save-note', '\App\Http\Controllers\NotesController@store')->middleware(['auth', 'verified'])->name('note.save');

// Route::get('/upload-past-paper', '\App\Http\Controllers\PastPapersController@create')->middleware(['auth', 'verified'])->name('pastPaper.upload');
// Route::post('/save-past-paper', '\App\Http\Controllers\PastPapersController@store')->middleware(['auth', 'verified'])->name('pastPaper.save');

// Route::get('/upload-tutorial', '\App\Http\Controllers\TutorialsController@create')->middleware(['auth', 'verified'])->name('tutorial.upload');
// Route::post('/save-tutorial',   '\App\Http\Controllers\TutorialsController@store')->middleware(['auth', 'verified'])->name('tutorial.save');

//################### MANAGE VIEW MATERIALS ####################

// Route::get('/view-books', '\App\Http\Controllers\BooksController@index')->middleware(['auth', 'verified'])->name('books.view');
// Route::get('/view-book/{id}', '\App\Http\Controllers\BooksController@show')->middleware(['auth', 'verified'])->name('book.view');

// Route::get('/view-notes', '\App\Http\Controllers\NotesController@index')->middleware(['auth', 'verified'])->name('notes.view');
// Route::get('/view-note/{id}', '\App\Http\Controllers\NotesController@show')->middleware(['auth', 'verified'])->name('note.view');

// Route::get('/view-past-papers', '\App\Http\Controllers\PastPapersController@index')->middleware(['auth', 'verified'])->name('pastPapers.view');
// Route::get('/view-past-paper/{id}', '\App\Http\Controllers\PastPapersController@show')->middleware(['auth', 'verified'])->name('pastPaper.view');

// Route::get('/view-tutorials', '\App\Http\Controllers\TutorialsController@index')->middleware(['auth', 'verified'])->name('tutorials.view');
// Route::get('/view-tutorial/{id}', '\App\Http\Controllers\TutorialsController@show')->middleware(['auth', 'verified'])->name('tutorial.view');

//################### MANAGE TEACHERS ####################
// Route::get('/add-teacher', '\App\Http\Controllers\TeachersController@create')
//     ->middleware(['auth', 'verified'])->name('teacher.add');

// Route::get('/add-teacher', function () {
//     return view('/teacher/add');
// })->middleware(['auth', 'verified'])->name('teacher.add');

// Route::get('/list-teachers', function () {
//     return view('/teacher/list');
// })->middleware(['auth', 'verified'])->name('teachers.list');

// Route::get('/edit-teacher', function () {
//     return view('/user/edit');
// })->middleware(['auth', 'verified'])->name('teacher.edit');

// Route::get('/show-teacher', function () {
//     return view('/user/show');
// })->middleware(['auth', 'verified'])->name('teacher.show');

//################### MANAGE STUDENTS ####################
// Route::get('/add-student', function () {
//     return view('/student/add');
// })->middleware(['auth', 'verified'])->name('student.add');

// Route::get('/list-students', function () {
//     return view('/student/list');
// })->middleware(['auth', 'verified'])->name('students.list');

// Route::get('/edit-student', function () {
//     return view('/student/edit');
// })->middleware(['auth', 'verified'])->name('student.edit');

// Route::get('/show-student', function () {
//     return view('/student/show');
// })->middleware(['auth', 'verified'])->name('student.show');

// //################### FRONT RESOURCES ####################
// Route::get('/books', function () {
//     $book1 = Material::where('class_level', '=', '1')->get();
//     $book2 = Material::where('class_level', '=', '2')->get();
//     $book3 = Material::where('class_level', '=', '3')->get();
//     $book4 = Material::where('class_level', '=', '4')->get();
//     $book5 = Material::where('class_level', '=', '5')->get();
//     $book6 = Material::where('class_level', '=', '6')->get();
//     return view('/books', compact('book1', 'book2', 'book3', 'book4', 'book5', 'book6'));
// });
// Route::get('/show-book/{id}', '\App\Http\Controllers\BooksController@single_book')->name('book.show');

// Route::get('/past-papers', function () {
//     $pastpaper1 = Material::where('class_level', '=', '1')->get();
//     $pastpaper2 = Material::where('class_level', '=', '2')->get();
//     $pastpaper3 = Material::where('class_level', '=', '3')->get();
//     $pastpaper4 = Material::where('class_level', '=', '4')->get();
//     $pastpaper5 = Material::where('class_level', '=', '5')->get();
//     $pastpaper6 = Material::where('class_level', '=', '6')->get();
//     return view('/past_papers', compact('pastpaper1', 'pastpaper2', 'pastpaper3', 'pastpaper4', 'pastpaper5', 'pastpaper6'));
// });
// Route::get('/show-past-paper/{id}', '\App\Http\Controllers\PastPapersController@single_past_paper')->name('pastpaper.show');

// Route::get('/notes', function () {
//     $notes1 = Material::where('class_level', '=', '1')->get();
//     $notes2 = Material::where('class_level', '=', '2')->get();
//     $notes3 = Material::where('class_level', '=', '3')->get();
//     $notes4 = Material::where('class_level', '=', '4')->get();
//     $notes5 = Material::where('class_level', '=', '5')->get();
//     $notes6 = Material::where('class_level', '=', '6')->get();
//     return view('/notes', compact('notes1', 'notes2', 'notes3', 'notes4', 'notes5', 'notes6'));
// });
// Route::get('/show-note/{id}', '\App\Http\Controllers\NotesController@single_note')->name('note.show');

// Route::get('/tutorials', function () {
//     $tutorial1 = Material::where('class_level', '=', '1')->get();
//     $tutorial2 = Material::where('class_level', '=', '2')->get();
//     $tutorial3 = Material::where('class_level', '=', '3')->get();
//     $tutorial4 = Material::where('class_level', '=', '4')->get();
//     $tutorial5 = Material::where('class_level', '=', '5')->get();
//     $tutorial6 = Material::where('class_level', '=', '6')->get();
//     return view('/tutorials', compact('tutorial1', 'tutorial2', 'tutorial3', 'tutorial4', 'tutorial5', 'tutorial6'));
// });
// Route::get('/show-tutorial/{id}', '\App\Http\Controllers\TutorialsController@single_tutorial')->name('tutorial.show');
