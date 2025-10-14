@extends('layouts.root')
@section('title', 'Edit School')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit School</h1>
    </div><!-- End Page Title -->

    <section class="section students-nav">
        <div class="row">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="row mb-3">
                    <form action="{{ route('school.update', $school->id) }}" method="POST" class="row">
                        @csrf
                        @method('PUT')

                        <div class="form-floating mb-3 col-md-6">
                            <input type="text" class="form-control" name="name" id="floatingName"
                                placeholder="School Name" value="{{ old('name', $school->name) }}" required>
                            <label for="floatingName">School name</label>
                        </div>

                        <div class="form-floating mb-3 col-md-6">
                            <input type="text" name="headteacher_name" class="form-control" id="floatingHeadTeacher"
                                placeholder="Head Teacher's Name" value="{{ old('headteacher_name', $school->headteacher_name) }}" required>
                            <label for="floatingHeadTeacher">Head Teacher's Name</label>
                        </div>

                        <div class="form-floating mb-3 col-md-6">
                            <input type="text" name="registration_number" class="form-control" id="floatingRegNo"
                                placeholder="Registration Number" value="{{ old('registration_number', $school->registration_number) }}" required>
                            <label for="floatingRegNo">Registration Number</label>
                        </div>

                        <div class="form-floating mb-3 col-md-6">
                            <select class="form-select" id="regionSelect" name="region_id" required>
                                <option disabled>Choose Region</option>
                                @foreach($regions as $region)
                                <option value="{{ $region->id }}" {{ $school->region_id == $region->id ? 'selected' : '' }}>
                                    {{ $region->name }}
                                </option>
                                @endforeach
                            </select>
                            <label for="regionSelect">What region?</label>
                        </div>

                                                <div class="form-floating mb-3 col-md-6">
                            <input type="text" name="street" class="form-control" id="floatingStreet"
                                placeholder="Street Name" value="{{ old('street', $school->street) }}" required>
                            <label for="floatingStreet">Street Name</label>
                        </div>

                        <div class="form-floating mb-3 col-md-6">
                            <select class="form-select" id="districtSelect" name="district_id" required>
                                <option disabled>Choose District</option>
                                @foreach($districts as $district)
                                <option value="{{ $district->id }}" {{ $school->district_id == $district->id ? 'selected' : '' }}>
                                    {{ $district->name }}
                                </option>
                                @endforeach
                            </select>
                            <label for="districtSelect">What district?</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" id="schoolType" name="type" required>
                                <option disabled>Choose School Type</option>
                                <option value="primary" {{ $school->type == 'primary' ? 'selected' : '' }}>Primary</option>
                                <option value="secondary" {{ $school->type == 'secondary' ? 'selected' : '' }}>Secondary</option>
                                <option value="both" {{ $school->type == 'both' ? 'selected' : '' }}>Both</option>
                            </select>
                            <label for="schoolType">What school type?</label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Leave description here" name="description" id="floatingTextarea"
                                style="height: 150px;">{{ old('description', $school->description) }}</textarea>
                            <label for="floatingTextarea">Description</label>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update School</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </section>

</main>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#regionSelect').on('change', function() {
            var regionID = $(this).val();
            if (regionID) {
                $.ajax({
                    url: '/districts/' + regionID,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#districtSelect').empty();
                        $('#districtSelect').append('<option disabled selected>Choose District</option>');
                        $.each(data, function(key, value) {
                            $('#districtSelect').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('#districtSelect').empty();
                $('#districtSelect').append('<option disabled selected>Choose District</option>');
            }
        });
    });
</script>
@endpush
