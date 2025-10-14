@extends('layouts.main2_frontend')

@section('title', 'Update Profile')

@section('content')
<section class="faq-section fix">
    <div class="container">
        <div class="faq-wrapper">
            <div class="row">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <section>
                    <div class="container">
                        <div class="row g-5">

                            {{-- Profile Form --}}
                            <div class="col-lg-8">
                                <div class="card shadow-sm p-4">
                                    <h4 class="mb-4">Update Profile Details</h4>
                                    <form action="{{ route('profile.update') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="row g-4">

                                            {{-- Full Name --}}
                                            <div class="col-md-4">
                                                <label for="name" class="form-label">Full Name</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    value="{{ old('name', $user->name) }}" required>
                                            </div>

                                            {{-- Username --}}
                                            <div class="col-md-3">
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text" class="form-control" id="username"
                                                    name="username" value="{{ old('username', $user->username) }}"
                                                    required>
                                            </div>

                                            {{-- Email --}}
                                            <div class="col-md-5">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    value="{{ old('email', $user->email) }}" required>
                                            </div>

                                            {{-- Role --}}
                                            <div class="col-md-4">
                                                <label for="role" class="form-label">Role</label>
                                                <select class="form-select" name="role" id="role" required>
                                                    <option disabled value="">Select Role</option>
                                                    @foreach ($roles as $key => $value)
                                                    <option value="{{ $key }}"
                                                        @selected(old('role', strtolower($user->role)) == $key)>
                                                        {{ $value }}
                                                    </option>

                                                    @endforeach
                                                </select>
                                            </div>


                                            {{-- Region --}}
                                            <!-- <div class="col-md-4">
                                                <label for="regionSelect" class="form-label">Region</label>
                                                <select class="form-select" id="regionSelect" name="region_id" required>
                                                    <option value="" selected hidden>Choose Region</option>
                                                    @foreach($regions as $region)
                                                    <option value="{{ $region->id }}" {{ (old('region_id', $profile->region_id ?? '') == $region->id) ? 'selected' : '' }}>
                                                        {{ $region->name }}
                                                    </option> @endforeach
                                                </select>
                                            </div> -->



                                            {{-- District --}}
                                            <!-- <div class="col-md-4">
                                                <label for="districtSelect" class="form-label">District</label>
                                                <select class="form-select" id="districtSelect" name="district_id" required style="display: block !important;">
                                                    <option selected>Choose District</option>
                                                </select>
                                            </div> -->



                                            @if (old('role', $user->role ?? $profile->role) === 'student')
                                            {{-- Grade --}}
                                            <div class="col-md-4">
                                                <label for="grade" class="form-label">Grade</label>
                                                <select class="form-select" name="classroom" required>
                                                    <option selected disabled value="">Select Grade</option>
                                                    @foreach ($grades as $grade)
                                                    <option value="{{ $grade }}"
                                                        {{ (old('classroom') ?? $profile->classroom) === $grade ? 'selected' : '' }}>
                                                        {{ $grade }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @endif


                                            {{-- Gender --}}
                                            <!-- <div class="col-md-4">
                                                <label for="gender" class="form-label">Gender</label>
                                                <select class="form-select" name="gender" id="gender" required>
                                                    <option selected disabled value="">Select Gender</option>
                                                    @foreach ($genders as $gender)
                                                    <option value="{{ $gender }}"
                                                        @selected(strtolower(old('gender', $profile->gender)) == strtolower($gender))>
                                                        {{ $gender }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div> -->

                                            <div class="col-md-4">
                                                <label for="gender" class="form-label">Gender</label>
                                                <select class="form-select" name="gender" required>
                                                    <option value="" disabled {{ old('gender', $profile->gender) == '' ? 'selected' : '' }}>
                                                        Select Gender
                                                    </option>
                                                    @foreach ($genders as $key => $value)
                                                    <option value="{{ $key }}"
                                                        @selected(strtolower(old('gender', $profile->gender)) == $key)>
                                                        {{ $value }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            {{-- Phone --}}
                                            <div class="col-md-4">
                                                <label for="phone" class="form-label">Phone</label>
                                                <input type="text" class="form-control" id="phone" name="phone"
                                                    value="{{ old('phone', $profile->phone) }}">
                                            </div>

                                            {{-- Avatar --}}
                                            <div class="col-md-4">
                                                <label for="avatar" class="form-label">Avatar</label>

                                                @if ($profile->avatar)
                                                <p class="text-muted small">
                                                    Current Avatar:
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#avatarModal">View Avatar</a>
                                                </p>

                                                <!-- Modal -->
                                                <div class="modal fade" id="avatarModal" tabindex="-1" aria-labelledby="avatarModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="avatarModalLabel">Current Avatar</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <img src="{{ Storage::url($profile->avatar) }}"
                                                                    alt="User Avatar"
                                                                    class="img-fluid"
                                                                    style="max-width: 650px;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @else
                                                <p class="text-muted small">No avatar uploaded yet.</p>
                                                @endif

                                                <input type="file" class="form-control mt-2" id="avatar" name="avatar">
                                            </div>





                                            {{-- Birthday --}}
                                            <div class="col-md-4">
                                                <label for="birthday" class="form-label">Birthday</label>
                                                <input type="date" class="form-control" id="birthday"
                                                    name="birthdate" value="{{ old('birthdate', $profile->birthdate) }}" required>
                                            </div>

                                            {{-- School --}}
                                            <div class="col-md-4">
                                                <label for="school" class="form-label">School</label>
                                                <select class="form-select" name="school_id" id="school" required>
                                                    <option selected disabled value="">Choose School</option>
                                                    @foreach ($schools as $school)
                                                    <option value="{{ $school->id }}"
                                                        @selected(old('school_id', $profile->school_id) == $school->id)>
                                                        {{ $school->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>



                                            {{-- Guardian Name --}}
                                            @if (old('role', $user->role) === 'student')
                                            <div class="col-md-4">
                                                <label for="guardian_name" class="form-label">Guardian Name</label>
                                                <input type="text" class="form-control" id="guardian_name"
                                                    name="guardian_name"
                                                    value="{{ old('guardian_name', $profile->guardian_name) }}"
                                                    required>
                                            </div>
                                            @endif


                                            {{-- Subjects --}}
                                            <!-- <div class="col-md-4">
                                                <label for="subjects" class="form-label">Teacher Subjects</label>
                                                <select name="subjects[]" id="subjects" class="form-select" multiple required>
                                                    @foreach ($subjects as $subject)
                                                    <option value="{{ $subject->id }}"
                                                        {{ in_array($subject->id, old('subjects', $profile->subjects?->pluck('id')->toArray() ?? [])) ? 'selected' : '' }}>
                                                        {{ $subject->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div> -->


                                            {{-- Bio --}}
                                            <div class="col-12">
                                                <label for="bio" class="form-label">Bio (optional)</label>
                                                <textarea class="form-control" name="bio" id="bio" rows="3">{{ old('bio', $profile->bio) }}</textarea>
                                            </div>

                                            <div class="col-12">
                                                <button class="btn btn-primary mt-3 px-4">Save Changes</button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>

                            {{-- Profile Display --}}
                            <div class="col-lg-4">
                                <div class="card shadow-sm p-4 mt-0">
                                    @if ($profile->avatar)
                                    <img src="{{ Storage::url($profile->avatar) }}"
                                        alt="User Avatar"
                                        class="rounded-circle mb-3"
                                        style="width:120px; height:120px; object-fit:cover;">
                                    @else
                                    <img src="{{ asset('assets/img/avatar.jpg') }}"
                                        alt="Default Avatar"
                                        class="rounded-circle mb-3"
                                        style="width:120px; height:120px; object-fit:cover;">
                                    @endif
                                    <h5 class="mb-3">User Information</h5>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><strong>Full Name:</strong> {{ $user->name }}
                                        </li>
                                        <li class="list-group-item"><strong>Username:</strong> {{ $user->username }}
                                        </li>
                                        <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
                                        <li class="list-group-item"><strong>Role:</strong> {{ ucfirst($user->role) }}
                                        </li>
                                        <!-- <li class="list-group-item"><strong>Region:</strong>
                                            {{ $profile->region->name ?? '' }}
                                        </li>
                                        <li class="list-group-item"><strong>District:</strong>
                                            {{ $profile->district->name ?? '' }}
                                        </li> -->
                                        <li class="list-group-item"><strong>School:</strong>
                                            {{ $profile->school->name ?? '' }}
                                        </li>
                                        @if (old('role', $user->role) === 'student')
                                        <li class="list-group-item"><strong>Grade:</strong> {{ $profile->classroom }}</li>
                                        @endif
                                        <li class="list-group-item"><strong>Gender:</strong> {{ ucfirst($profile->gender) }}
                                        </li>
                                        <li class="list-group-item"><strong>Birthday:</strong>
                                            {{ $profile->birthdate }}
                                        </li>
                                        <li class="list-group-item"><strong>Phone:</strong> {{ $profile->phone }}</li>
                                        @if (old('role', $user->role) === 'student')
                                        <li class="list-group-item"><strong>Guardian Name:</strong>
                                            {{ $profile->guardian_name }}
                                        </li>
                                        @endif
                                        <!-- <li class="list-group-item"><strong>Subjects:</strong>
                                            {{ $profile->subjects ? $profile->subjects->pluck('name')->implode(', ') : 'None' }}
                                        </li> -->
                                        <li class="list-group-item"><strong>Bio:</strong> {{ $profile->bio ?? 'None' }}</li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
@endsection


@push('scripts')
<script>
    $(document).ready(function() {
        const savedRegionId = {
            {
                $profile - > region_id ?? 'null'
            }
        };
        const savedDistrictId = {
            {
                $profile - > district_id ?? 'null'
            }
        };

        console.log('Saved Region ID:', savedRegionId);
        console.log('Saved District ID:', savedDistrictId);

        function loadDistricts(regionID, preselectDistrict = null) {
            console.log('Fetching districts for Region ID:', regionID);

            $.ajax({
                url: '/districts/' + regionID,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log('Loaded districts:', data);

                    // Check if #districtSelect exists
                    if (!$('#districtSelect').length) {
                        console.error('#districtSelect NOT found in DOM!');
                        return;
                    }

                    const $districtSelect = $('#districtSelect');
                    $districtSelect.empty();
                    $districtSelect.append('<option selected disabled>Choose District</option>');

                    $.each(data, function(key, value) {
                        console.log('Appending district:', value.id, value.name);
                        $districtSelect.append(
                            $('<option>', {
                                value: value.id,
                                text: value.name
                            })
                        );
                    });

                    // Force redraw (some CSS/JS frameworks require this)
                    $districtSelect.hide().show(0);


                    if (preselectDistrict) {
                        $('#districtSelect').val(String(preselectDistrict)).trigger('change');
                        console.log('Pre-selected District:', $('#districtSelect').val());
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error loading districts:', error);
                }
            });
        }

        // On region change
        $('#regionSelect').on('change', function() {
            var regionID = $(this).val();
            console.log('Region changed:', regionID);

            if (regionID) {
                loadDistricts(regionID);
            } else {
                $('#districtSelect').empty();
                $('#districtSelect').append('<option selected disabled>Choose District</option>');
            }
        });

        // Load districts on page load if Region is saved
        if (savedRegionId) {
            $('#regionSelect').val(savedRegionId).trigger('change');
            loadDistricts(savedRegionId, savedDistrictId);
        }
    });
</script>

@endpush