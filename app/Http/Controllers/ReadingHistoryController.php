<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReadingHistory;

class ReadingHistoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'resource_id' => 'required|exists:resources,id',
            'progress' => 'required|integer|min:0|max:100',
        ]);

        $history = ReadingHistory::updateOrCreate(
            ['user_id' => auth()->id(), 'resource_id' => $request->resource_id],
            ['progress' => $request->progress]
        );

        return response()->json(['message' => 'Progress updated', 'data' => $history]);
    }

    public function show($resource_id)
    {
        $history = ReadingHistory::where('user_id', auth()->id())
            ->where('resource_id', $resource_id)
            ->first();

        return response()->json($history);
    }
}
