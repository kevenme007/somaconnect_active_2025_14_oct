@extends('layouts.root')

@section('title')
    Update User
@endsection

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Update User</h1>
        </div><!-- End Page Title -->

        <section class="section users-nav">
            <div class="row">
                <form id="Form" action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" id="floatingName"
                                    placeholder="Fullname" autocomplete="on" value="{{ old('name', $user->name) }}">
                                <label for="floatingName">Fullname</label>
                            </div>
                            @error('name')
                                <div class="error" style="color: red">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-12">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="email" id="floatingEmail"
                                    placeholder="Email" autocomplete="on" value="{{ old('email', $user->email) }}">
                                <label for="floatingEmail">Email</label>
                            </div>
                            @error('email')
                                <div class="error" style="color: red">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Uncomment and update if you want to include gender --}}
                        {{--
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingGender" name="gender" aria-label="Select user gender">
                            <option value="" disabled>Select gender</option>
                            <option value="Male" {{ old('gender', $user->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('gender', $user->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                        <label for="floatingGender">What's the user gender?</label>
                        @error('gender')
                            <div class="error" style="color:red">{{ $message }}</div>
                        @enderror
                    </div>
                    --}}

                        {{-- Password hidden input can be removed for update or replaced with password update logic --}}
                        {{-- If you want to allow password update, add a visible password field here --}}

                        {{-- <div class="form-floating mb-3" style="display:none;">
                            <input type="password" class="form-control" name="password" id="floatingPassword"
                                value="1234567890" />
                        </div> --}}

                        {{-- <div class="form-floating mb-3" style="display:none;">
                            <input type="text" class="form-control" name="is_active" id="floatingStatus"
                                value="{{ old('status', $user->status ?? 'Not Active') }}" />
                        </div> --}}

                        <div class="col-sm-12">
                            <div class="form-floating mb-3">
                                <select class="form-select" name="role" id="floatingRole">
                                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin
                                    </option>
                                    <option value="teacher" {{ old('role', $user->role) == 'teacher' ? 'selected' : '' }}>
                                        Teacher</option>
                                    <option value="student" {{ old('role', $user->role) == 'student' ? 'selected' : '' }}>
                                        Student</option>
                                </select>
                                <label for="floatingRole">Role</label>
                            </div>
                            @error('role')
                                <div class="error" style="color: red">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-12">
                            <div class="form-floating mb-3">
                                <select class="form-select" name="is_active" id="floatingIsActive">
                                    <option value="1" {{ old('is_active', $user->is_active) == 1 ? 'selected' : '' }}>
                                        Active</option>
                                    <option value="0" {{ old('is_active', $user->is_active) == 0 ? 'selected' : '' }}>
                                        Not Active</option>
                                </select>
                                <label for="floatingIsActive">Status</label>
                            </div>
                            @error('is_active')
                                <div class="error" style="color: red">{{ $message }}</div>
                            @enderror
                        </div>



                        <div class="row mb-3">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update User</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </section>

    </main>
@endsection
