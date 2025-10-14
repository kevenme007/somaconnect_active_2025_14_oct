@extends('layouts.root')
@section('title')
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
        </div><!-- End Page Title -->

        <section class="section students-nav">
            <div class="row">
                <div class="row mb-3">
                    <div class="col-sm-10">
                        <h2>Edit Resource</h2>
                        <form action="{{ route('resources.update', $resource->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Title -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="title" id="floatingTitle" required
                                    value="{{ old('title', $resource->title) }}">
                                <label for="floatingTitle">Title</label>
                            </div>

                            <!-- Author -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="author" id="floatingAuthor"
                                    value="{{ old('author', $resource->author) }}">
                                <label for="floatingAuthor" class="form-label">Author (optional)</label>
                            </div>

                            <!-- Replace File -->
                            <div class="form-floating mb-3">
                                <input type="file" class="form-control" name="file_path" id="file_path">
                                <label for="file_path">Replace File (optional)</label>
                                @if ($resource->file_path)
                                    <p class="mt-2 text-success">Current Uploaded File:
                                        <a href="{{ asset('/storage/' . $resource->file_path) }}" target="_blank">View</a>
                                    </p>
                                    @else
                                    <p class="text-danger">No File uploaded</p>
                                @endif
                            </div>

                            <!-- Replace Image -->
                            <div class="form-floating mb-3">
                                <input type="file" class="form-control" name="image_path" id="image_path">
                                <label for="image_path">Replace Image (optional)</label>
                                @if ($resource->image_path)
                                    <p>Current Image:</p>
                                    <img src="{{ $resource->image_path ?  asset('storage/' . $resource->image_path) : asset('assets3/images/product/noimage.jpeg') }}" alt="Resource Image"
                                        width="100" height="100">
                                        @else
                                        <p class="text-danger">No Image uploaded</p>
                                @endif
                            </div>

                            <!-- Subject -->
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Subject</label>
                                <select class="form-select" name="subject_id" id="subject_id">
                                    <option value="">Select Subject</option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}"
                                            {{ old('subject_id', $resource->subject_id) == $subject->id ? 'selected' : '' }}>
                                            {{ $subject->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Resource Type -->
                            <div class="mb-3">
                                <label for="resource_type" class="form-label">Resource Type</label>
                                <select class="form-select" name="resource_type" id="resource_type" required>
                                    <option value="">Select Type</option>
                                    @foreach (['Textbook', 'Article', 'Notes', 'ReferenceBook', 'PastPaper', 'VideoTutorial', 'AudioTutorial', 'FashionStyle'] as $type)
                                        <option value="{{ $type }}"
                                            {{ old('resource_type', $resource->resource_type) == $type ? 'selected' : '' }}>
                                            {{ $type }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Grade Level -->
                            <div class="mb-3">
                                <label for="grade_level" class="form-label">Grade Level</label>
                                <select class="form-select" name="grade_level" id="grade_level">
                                    <option value="">Select Class Level</option>
                                    @for ($i = 1; $i <= 6; $i++)
                                        <option value="{{ $i }}"
                                            {{ old('grade_level', $resource->grade_level) == $i ? 'selected' : '' }}>
                                            Form {{ $i }}
                                        </option>
                                    @endfor
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" name="status" id="status" required>
                                    <option value="pending" {{ old('status', $resource->status) == 'pending' ? 'selected' : '' }}>Pending </option>
                                    <option value="approved"{{ old('status', $resource->status) == 'approved' ? 'selected' : '' }}>Approved</option>
                                    <option value="disapproved"{{ old('status', $resource->status) == 'disapproved' ? 'selected' : '' }}>Disapproved</option>
                                </select>
                            </div>


                            <!-- Description -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Description (optional)</label>
                                <textarea class="form-control" name="description" id="description" rows="3">{{ old('description', $resource->description) }}</textarea>
                            </div>

                            <!-- Submit -->
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection


