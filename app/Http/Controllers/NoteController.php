<?php
namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Resource;
use Illuminate\Http\Request;
use App\Models\ResourceInteraction;
use Illuminate\Contracts\Encryption\DecryptException;

class NoteController extends Controller
{
    public function index()
    {
        // $notes = auth()->user()->notes()->with('resource')->paginate(20);
        $notes = Note::all();
        return view('notes.index', compact('notes'));
    }

    public function showNotes($id)
    {

        try {
            // Decrypt the ID
            $decryptedId = decrypt($id);
        } catch (DecryptException $e) {
            // If decryption fails (tampered URL), show 404
            abort(404);
        }
        $resource  = Resource::findOrFail($decryptedId);
        $subjectId = $resource->subject_id;

        // Get all resources in this category
        $categoryResources = Resource::where('subject_id', $subjectId)->orderBy('id')->get();

        // Find current index
        $currentIndex = $categoryResources->search(function ($res) use ($resource) {
            return $res->id === $resource->id;
        });

        // Find previous and next
        $prevResource = $currentIndex > 0 ? $categoryResources[$currentIndex - 1] : null;
        $nextResource = $currentIndex < $categoryResources->count() - 1 ? $categoryResources[$currentIndex + 1] : null;

        $relatedResources = Resource::all();
        if (auth()->check()) {
            $data = ResourceInteraction::create([
                'user_id'          => auth()->id(),
                'resource_id'      => $resource->id,
                'interaction_type' => 'view',
            ]);
        }
        return view('notes.show', compact('resource', 'relatedResources', 'prevResource', 'nextResource'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'resource_id' => 'required|exists:resources,id',
            'contents'    => 'required|string',
            'page_number' => 'nullable|integer|min:1',
        ]);

        Note::create([
            'user_id'     => auth()->id(),
            'resource_id' => $request->resource_id,
            'content'     => $request->content,
            'page_number' => $request->page_number,
        ]);

        return redirect()->back()->with('success', 'Note added.');
    }

    public function update(Request $request, Note $note)
    {
        $this->authorize('update', $note);

        $request->validate([
            'content'     => 'required|string',
            'page_number' => 'nullable|integer|min:1',
        ]);

        $note->update($request->only('content', 'page_number'));

        return redirect()->back()->with('success', 'Note updated.');
    }

    public function destroy(Note $note)
    {
        $this->authorize('delete', $note);

        $note->delete();

        return redirect()->back()->with('success', 'Note deleted.');
    }
}
