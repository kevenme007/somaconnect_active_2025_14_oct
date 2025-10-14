<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function index()
    {
        $bookmarks = auth()->user()->bookmarks()->with('resource')->paginate(20);
        return view('bookmarks.index', compact('bookmarks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'resource_id' => 'required|exists:resources,id',
            'page_number' => 'nullable|integer|min:1',
            'note' => 'nullable|string',
        ]);

        $bookmark = Bookmark::create([
            'user_id' => auth()->id(),
            'resource_id' => $request->resource_id,
            'page_number' => $request->page_number,
            'note' => $request->note,
        ]);

        return redirect()->back()->with('success', 'Bookmark added.');
    }

    public function destroy(Bookmark $bookmark)
    {
        $this->authorize('delete', $bookmark);

        $bookmark->delete();

        return redirect()->back()->with('success', 'Bookmark removed.');
    }
}
