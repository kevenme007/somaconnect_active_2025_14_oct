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
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if ($errors->has('file_path'))
                            <div class="alert alert-danger">
                                {{ $errors->first('file_path') }}
                            </div>
                        @endif


                        <h2>Create Resource</h2>
                        <form action="{{ route('resources.store') }}" method="POST" enctype="multipart/form-data" class="row">
                            @csrf
                            <div class="form-floating mb-3 col-md-6">
                                <input type="text" class="form-control" name="title" id="floatingTitle" required>
                                <label for="floatingName">Title</label>
                            </div>

                            <div class="form-floating mb-3 col-md-6">
                                <input type="text" class="form-control" name="author" id="floatingAuthor">
                                <label for="floatingAuthor" class="form-label">Author (optional)</label>
                            </div>

                            <div class="form-floating mb-3 col-md-6">
                                <input type="file" class="form-control" name="file_path" id="file_path" required>
                                <label for="image">Resource File</label>
                            </div>

                            <div class="form-floating mb-3 col-md-6">
                                <input type="file" class="form-control" name="image_path" id="image"
                                    accept="image/*">
                                <label for="image">Resource Image (optional)</label>
                            </div>


                            <div class="mb-3 col-md-6">
                                <label for="subject_id" class="form-label">Subject</label>
                                <select class="form-select" name="subject_id" id="subject_id" required>
                                    <option value="">Select Subject</option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}">
                                            {{ $subject->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="resource_type" class="form-label">Resource Type</label>
                                <select class="form-select" name="resource_type" id="resource_type" required>
                                    <option value="">Select Type</option>
                                    @foreach (['Textbook', 'Article', 'Notes', 'ReferenceBook', 'PastPaper', 'VideoTutorial', 'AudioTutorial', 'FashionStyle'] as $type)
                                        <option value="{{ $type }}">
                                            {{ $type }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="grade_level" class="form-label">Grade Level</label>
                                <select class="form-select" name="grade_level" id="grade_level">
                                    <option value="">Select Class Level </option>
                                    @for ($i = 1; $i <= 6; $i++)
                                        <option value="{{ $i }}">
                                            Form {{ $i }}
                                        </option>
                                    @endfor
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description (optional)</label>
                                <textarea class="form-control" name="description" id="description" rows="3">{{ old('description', $resource->description ?? '') }}</textarea>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-success"> Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
