@extends('layouts.root')
@section('title')
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Add new school</h1>
        </div><!-- End Page Title -->

        <section class="section students-nav">
            <div class="row">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="mb-3">
                    <form action={{ route('school.save') }} method="POST" class="row">
                        @csrf
                        <div class="form-floating mb-3 col-md-6">
                            <input type="text" class="form-control" name="name" id="floatingName" placeholder="school name">
                            <label for="floatingName">School name</label>
                        </div>

                        <div class="form-floating mb-3 col-md-6">
                            <input type="text" name="headteacher_name" class="form-control" id="floatingAuthor"
                                placeholder="Head Teacher's Name" required>
                            <label for="author">Head Teacher's Name</label>
                        </div>

                        <div class="form-floating mb-3 col-md-6">
                            <input type="text" name="registration_number" class="form-control" id="floatingRegNo"
                                placeholder="Registration Number" required>
                            <label for="floatingRegNo">Registration Number</label>
                        </div>

                        <div class="form-floating mb-3 col-md-6">
                            <select class="form-select" id="regionSelect" name="region_id" required>
                                <option selected disabled>Choose Region</option>
                                @foreach($regions as $region)
                                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                                @endforeach
                            </select>
                            <label for="regionSelect">What region?</label>
                        </div>

                        <div class="form-floating mb-3 col-md-6">
                            <select class="form-select" id="districtSelect" name="district_id" required>
                                <option selected disabled>Choose District</option>
                            </select>
                            <label for="districtSelect">What district?</label>
                        </div>

                        <div class="form-floating mb-3 col-md-6">
                            <input type="text" name="street" class="form-control" id="floatingAuthor"
                                placeholder="Street Name" required>
                            <label for="author">Street Name</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" name="type"
                                aria-label="Select your school type">
                                <option selected>Choose from here</option>
                                <option value="Primary">Primary</option>
                                <option value="Secondary">Secondary</option>
                                <option value="Both">Both</option>
                            </select>
                            <label for="floatingSelect">What school type ?</label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Leave description here" name="description"
                                id="floatingTextarea" style="height: 150px;"></textarea>
                            <label for="floatingTextarea">Description</label>
                        </div>


                        <div class="row mb-3">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
        $(document).ready(function () {
            $('#regionSelect').on('change', function () {
                var regionID = $(this).val();
                if (regionID) {
                    $.ajax({
                        url: '/districts/' + regionID,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            $('#districtSelect').empty();
                            $('#districtSelect').append('<option selected disabled>Choose District</option>');
                            $.each(data, function (key, value) {
                                $('#districtSelect').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#districtSelect').empty();
                    $('#districtSelect').append('<option selected disabled>Choose District</option>');
                }
            });
        });
    </script>
@endpush
