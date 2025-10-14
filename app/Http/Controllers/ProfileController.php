<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Region;
use App\Models\School;
use App\Models\Profile;
use App\Models\Subject;
use App\Models\District;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{

    public function show(User $user)
    {
        $profile = $user->profile;
        dd($profile);
        return view('profiles.show', compact('profile', 'user'));
    }

    public function edit()
    {
        $user = auth()->user();

        // Ensure profile exists
        if (!$user->profile) {
            $user->profile()->create();
            $user->refresh();
        }

        $profile = $user->profile;

        $regions = Region::all();

        // Default region ID fallback

        $defaultRegionId = $profile->region_id ?? ($regions->first()?->id ?? null);
        $districts = $defaultRegionId ? District::where('region_id', $defaultRegionId)->get() : collect();

        $schools = School::all();

        $subjects = Subject::all();
        $roles = [
            'student' => 'Student',
            'teacher' => 'Teacher',
            'admin'   => 'Admin'
        ];

        $grades = ['Grade 1', 'Grade 2', 'Grade 3', 'Grade 4', 'Grade 5', 'Grade 6', 'Grade 7'];
        $genders = [
            'male' => 'Male',
            'female' => 'Female'
        ];

        return view('profiles.edit', compact(
            'user',
            'profile',
            'regions',
            'districts',
            'schools',
            'subjects',
            'roles',
            'grades',
            'genders'
        ));
    }


    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'role' => 'required|string|in:student,teacher,admin',
            'avatar' => 'nullable|image',
            'bio' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'region_id' => 'nullable|exists:regions,id',
            'district_id' => 'nullable|exists:districts,id',
            'school_id' => 'nullable|exists:schools,id',
            'guardian_name' => 'nullable|string|max:255',
            'birthdate' => 'nullable|date',
            'gender' => 'nullable|in:male,female',
            'classroom' => 'nullable|string|max:50',
            'subjects' => 'nullable|array',
            'subjects.*' => 'exists:subjects,id',
        ]);

        $profile = $user->profile ?? new Profile(['user_id' => $user->id]);

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            if ($profile->avatar) {
                Storage::delete($profile->avatar);
            }
            $profile->avatar = $request->file('avatar')->store('avatars', 'public');
        }

        // Fill profile data
        $profile->fill($request->only([
            'bio',
            'phone',
            'gender',
            'birthdate',
            'classroom',
            'region_id',
            'district_id',
            'school_id',
            'guardian_name'
        ]));
        $profile->save();

        // Update user role
        $user->username = $request->username;
        $user->role = strtolower($request->role);
        $user->profile_completed = true; // mark as completed
        $user->save();

        // Sync subjects if role is teacher
        // if ($user->role === 'teacher') {
        //     $profile->subjects()->sync($request->input('subjects', []));
        // }


        return redirect()->route('home')->with('success', 'Profile updated successfully!');
    }




    // AJAX: Get districts for a region
    public function getDistricts($regionId)
    {
        $districts = District::where('region_id', $regionId)->get(['id', 'name']);
        return response()->json($districts);
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
