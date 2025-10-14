<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\School;
use App\Models\District;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::with('region', 'district')->latest()->paginate(10);
        return view('schools.list', compact('schools'));
    }

    public function create()
    {
        $regions = Region::all();
        return view('schools.create', compact('regions'));
    }

    public function getDistricts($region_id)
    {
        $districts = District::where('region_id', $region_id)->get();
        return response()->json($districts);
    }

    public function store(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'headteacher_name' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'registration_number' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'region_id' => 'required|exists:regions,id',
            'district_id' => 'required|exists:districts,id',
        ]);

        // Store to DB
        School::create([
            'name' => $validated['name'],
            'headteacher_name' => $validated['headteacher_name'],
            'street' => $validated['street'],
            'registration_number' => $validated['registration_number'] ?? 'N/A',
            'type' => $validated['type'] ?? null,
            'description' => $validated['description'] ?? null,
            'region_id' => $validated['region_id'],
            'district_id' => $validated['district_id'],
        ]);

        return redirect()->back()->with('success', 'School added successfully!');
    }

    public function show(School $school)
    {
        return view('schools.show', compact('school'));
    }

    public function edit(School $school)
    {
        $regions = Region::all();
        $districts = District::where('region_id', $school->region_id)->get();
        return view('schools.edit', compact('school', 'regions', 'districts'));
    }

    public function update(Request $request, School $school)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'headteacher_name' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'registration_number' => 'nullable|string|max:255|unique:schools,registration_number,' . $school->id,
            'type' => 'nullable|string|max:100|in:primary,secondary,both',
            'description' => 'nullable|string|max:500',
            'region_id' => 'required|exists:regions,id',
            'district_id' => 'required|exists:districts,id',
        ]);


        $school->update($request->all());

        return redirect()->route('schools.list')->with('success', 'School updated successfully.');
    }

    public function destroy(School $school)
    {
        $school->delete();

        return redirect()->route('schools.list')->with('success', 'School deleted successfully.');
    }
}
