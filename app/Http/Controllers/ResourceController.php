<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Subject;
use App\Models\Resource;
use Illuminate\Http\Request;
use App\Models\ResourceInteraction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Encryption\DecryptException;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function index()
    {

        $resources = Resource::all();
        if (auth()->user()->role === 'teacher') {
            $resources = Resource::where('user_id', auth()->id())->get();
        } elseif (auth()->user()->role === 'student') {
            $resources = Resource::where('grade_level', auth()->user()->profile->classroom)->get();
        } else {
            $resources = Resource::all();
        }

        return view('resources.back.list', compact('resources'));
    }

    public function materials()
    {
        $textBooks = Resource::all();
        return view('materials.materials', compact('textBooks'));
    }

    public function materials1()
    {
        $f1TextBooks = Resource::where('grade_level', '1')->get();
        $formNumber = $f1TextBooks->pluck('grade_level')->first();
        return view('materials.materials1', compact('f1TextBooks', 'formNumber'));
    }

    public function materials2()
    {
        $f2TextBooks = Resource::where('grade_level', '2')->get();
        $formNumber = $f2TextBooks->pluck('grade_level')->first();
        return view('materials.materials2', compact('f2TextBooks', 'formNumber'));
    }

    public function materials3()
    {
        $f3TextBooks = Resource::where('grade_level', '3')->get();
        $formNumber = $f3TextBooks->pluck('grade_level')->first();

        return view('materials.materials3', compact('f3TextBooks', 'formNumber'));
    }

    public function materials4()
    {
        $f4TextBooks = Resource::where('grade_level', '4')->get();
        $formNumber = $f4TextBooks->pluck('grade_level')->first();

        return view('materials.materials4', compact('f4TextBooks', 'formNumber'));
    }

    public function materials5()
    {
        $f5TextBooks = Resource::where('grade_level', '5')->get();
        $formNumber = $f5TextBooks->pluck('grade_level')->first();
        return view('materials.materials5', compact('f5TextBooks', 'formNumber'));
    }

    public function materials6()
    {
        $f6TextBooks = Resource::where('grade_level', '6')->get();
        $formNumber = $f6TextBooks->pluck('grade_level')->first();

        return view('materials.materials6', compact('f6TextBooks', 'formNumber'));
    }

    public function pastpapers()
    {
        $pastpapers = Resource::where('resource_type', 'PastPaper')->get();
        return view('materials.pastpapers', compact('pastpapers'));
    }

    public function referencebooks()
    {
        $referenceBooks = Resource::where('resource_type', 'ReferenceBook')->get();
        return view('materials.reference-books', compact('referenceBooks'));
    }

    public function create()
    {
        $subjects = Subject::all();
        return view('resources.back.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'              => 'required|string|max:255',
            'author'             => 'nullable|string|max:255',
            'file_path'          => 'required|file|mimes:pdf,epub,mp4|max:102400',
            'subject_id'         => 'required|exists:subjects,id',
            'resource_type'      => 'required|string',
            'grade_level'        => 'nullable|integer',
            'description'        => 'nullable|string',
            'resource_extension' => 'nullable|string|in:pdf,epub,doc,docx,mp4,jpg,png',
            'image_path'         => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
        ]);

        $imagePath = null;
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('resource_images', 'public');
        }

        $filePath = null;
        $extension = null;

        if ($request->hasFile('file_path')) {
            $filePath  = $request->file('file_path')->store('resources', 'public');
            $extension = $request->file('file_path')->getClientOriginalExtension();
        }

        Resource::create([
            'title'              => $request->title,
            'author'             => $request->author,
            'file_path'          => $filePath,
            'image_path'         => $imagePath,
            'resource_extension' => $extension,
            'subject_id'         => $request->subject_id,
            'resource_type'      => $request->resource_type,
            'grade_level'        => $request->grade_level,
            'description'        => $request->description,
            'user_id'            => auth()->id(),
        ]);

        return redirect()->route('resources.list')->with('success', 'Resource uploaded successfully.');
    }

    // public function update(Request $request, Resource $resource)
    // {
    //     $request->validate([
    //         'title'              => 'required|string|max:255',
    //         'author'             => 'nullable|string|max:255',
    //         'file_path'          => 'nullable|file|mimes:pdf,epub,mp4|max:102400',
    //         'image_path'         => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
    //         'subject_id'         => 'required|exists:subjects,id',
    //         'resource_type'      => 'required|string|max:255',
    //         'grade_level'        => 'nullable|integer|min:1|max:6',
    //         'description'        => 'nullable|string',
    //         'status'             => 'required|string|in:pending,approved,disapproved',
    //     ]);

    //     try {
    //         $oldStatus = $resource->status;


    //         $resource->fill($request->only([
    //             'title',
    //             'author',
    //             'subject_id',
    //             'resource_type',
    //             'grade_level',
    //             'description',
    //             'resource_extension',
    //             'status'
    //         ]));

    //         if ($request->hasFile('file_path')) {
    //             if ($resource->file_path && Storage::disk('public')->exists($resource->file_path)) {
    //                 Storage::disk('public')->delete($resource->file_path);
    //             }
    //             $file = $request->file('file_path');
    //             $resource->file_path = $file->store('resources/files', 'public');
    //             $resource->resource_extension = strtolower($file->getClientOriginalExtension());
    //         }

    //         if ($request->hasFile('image_path')) {
    //             if ($resource->image_path && Storage::disk('public')->exists($resource->image_path)) {
    //                 Storage::disk('public')->delete($resource->image_path);
    //             }
    //             $image = $request->file('image_path');
    //             $resource->image_path = $image->store('resources/images', 'public');
    //             if (!$resource->resource_extension) {
    //                 $resource->resource_extension = strtolower($image->getClientOriginalExtension());
    //             }
    //         }

    //         if (
    //             $oldStatus !== 'approved' &&
    //             strtolower($request->status) === 'approved'
    //         ) {
    //             $resource->approved_by = Auth::id();
    //             $resource->approved_at = Carbon::now();
    //         }

    //         if (
    //             $oldStatus === 'approved' &&
    //             strtolower($request->status) !== 'approved'
    //         ) {
    //             $resource->approved_by = null;
    //             $resource->approved_at = null;
    //         }


    //         $resource->save();

    //         return redirect()->route('resources.list')
    //             ->with('success', 'Resource updated successfully!');
    //     } catch (QueryException $e) {
    //         return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
    //     } catch (\Exception $e) {
    //         return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
    //     }
    // }


    public function update(Request $request, Resource $resource)
    {

        $request->validate([
            'title'       => 'required|string|max:255',
            'author'      => 'nullable|string|max:255',
            'file_path'   => 'nullable|file|mimes:pdf,epub,mp4,doc,docx|max:102400',
            'image_path'  => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
            'subject_id'  => 'nullable|exists:subjects,id',
            'resource_type' => 'nullable|string|max:255',
            'grade_level' => 'nullable|integer|min:1|max:6',
            'description' => 'nullable|string',
            'status'      => 'nullable|string|in:pending,approved,disapproved',
        ]);

        try {

            $oldStatus = Resource::where('id', $resource->id)->value('status');

            $resource->fill($request->only([
                'title',
                'author',
                'subject_id',
                'resource_type',
                'grade_level',
                'description',
                'status'
            ]));

            if ($request->hasFile('file_path')) {
                if ($resource->file_path && Storage::disk('public')->exists($resource->file_path)) {
                    Storage::disk('public')->delete($resource->file_path);
                }
                $file = $request->file('file_path');
                $resource->file_path = $file->store('resources', 'public'); // <-- match create
                $resource->resource_extension = strtolower($file->getClientOriginalExtension());
            }

            // Image upload (matches create method)
            if ($request->hasFile('image_path')) {
                if ($resource->image_path && Storage::disk('public')->exists($resource->image_path)) {
                    Storage::disk('public')->delete($resource->image_path);
                }
                $image = $request->file('image_path');
                $resource->image_path = $image->store('resource_images', 'public'); // <-- match create

                // Fallback extension if no file uploaded
                if (!$resource->resource_extension) {
                    $resource->resource_extension = strtolower($image->getClientOriginalExtension());
                }
            }



            if ($oldStatus !== 'approved' && strtolower($request->status) === 'approved') {
                // The resource is being approved now
                $resource->approved_by = Auth::id();
                $resource->approved_at = Carbon::now();
            } elseif ($oldStatus === 'approved' && strtolower($request->status) !== 'approved') {
                // The resource was approved but is now being unapproved
                $resource->approved_by = null;
                $resource->approved_at = null;
            }

            $resource->save();

            return redirect()->route('resources.list')
                ->with('success', 'Resource updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Update failed: ' . $e->getMessage());
        }
    }
    public function show(Resource $resource)
    {
        if (auth()->check()) {
            $data = ResourceInteraction::create([
                'user_id'          => auth()->id(),
                'resource_id'      => $resource->id,
                'interaction_type' => 'view',
            ]);
        }
        return view('resources.front.show', compact('resource'));
    }


    public function edit($encryptedId)
    {
        try {
            $id = decrypt($encryptedId);
        } catch (DecryptException $e) {
            abort(404);
        }

        $resource = Resource::findOrFail($id);
        $subjects = Subject::all();

        return view('resources.back.edit', compact('resource', 'subjects'));
    }

    public function download($id)
    {
        $resource = Resource::findOrFail($id);

        $filePath = storage_path('app/public/' . $resource->file_path);

        if (! file_exists($filePath)) {
            abort(404, 'File not found.');
        }

        // Increment downloads
        $resource->increment('downloads');

        // Return the file as a download
        if (auth()->check()) {
            $data = ResourceInteraction::create([
                'user_id'          => auth()->id(),
                'resource_id'      => $resource->id,
                'interaction_type' => 'download',
            ]);
        }
        return response()->download($filePath, basename($filePath));
    }

    public function mostReadResources()
    {
        $mostReadResources = Resource::selectRaw('
                resources.id,
                MAX(resources.title) as title,
                MAX(resources.description) as description,
                MAX(resources.author) as author,
                MAX(resources.image_path) as image_path,
                MAX(resources.subject_id) as subject_id,
                MAX(resources.grade_level) as grade_level,
                COUNT(resource_interactions.id) as views
')
            ->join('resource_interactions', 'resources.id', '=', 'resource_interactions.resource_id')
            ->where('resource_interactions.interaction_type', 'view')
            ->groupBy('resources.id')
            ->orderByDesc('views')
            ->take(10)
            ->get();

        return view('materials.most_read_materials', compact('mostReadResources'));
    }

    public function search(Request $request)
    {
        $query    = $request->input('query');
        $isSearch = false;
        $results  = collect(); // default empty collection

        if (! empty($query)) {
            $isSearch = true;
            $results  = Resource::where('title', 'like', '%' . $query . '%')
                ->orWhere('author', 'like', '%' . $query . '%')
                ->orWhereHas('subject', function ($q) use ($query) {
                    $q->where('name', 'like', '%' . $query . '%');
                })
                ->get();
        }

        return view('materials.search-results', compact('results', 'query', 'isSearch'));
    }

    public function destroy(Resource $resource)
    {
        Storage::delete($resource->file_path);
        $resource->delete();
        return redirect()->route('resources.list')->with('success', 'Resource deleted successfully.');
    }
}
