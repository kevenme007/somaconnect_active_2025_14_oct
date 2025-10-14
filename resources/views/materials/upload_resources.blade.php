@extends('layouts.root')
@section('title')
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Upload a resource</h1>
        </div><!-- End Page Title -->

        <section class="section students-nav">
            <div class="row">
                <div class="row mb-3">
                    <div class="col-sm-10">
                        <form action={{ route('book.save') }} method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" id="floatingName"
                                    placeholder="book title">
                                <label for="floatingName">Title</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" name="author" class="form-control" id="floatingAuthor" placeholder="Book Author">
                                <label for="author">Author (optional)</label>
                            </div>

                            <div class="form-floating mb-3">
                                <div class="col-sm-12">
                                    <input class="form-control" type="file" name="file" id="formFile"
                                        style="height: 55px">
                                </div>
                            </div>

                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" name="class_level"
                                    aria-label="Select your class level">
                                    <option selected>Choose from here</option>
                                    <option value="1">Form 1</option>
                                    <option value="2">Form 2</option>
                                    <option value="3">Form 3</option>
                                    <option value="4">Form 4</option>
                                    <option value="5">Form 5</option>
                                    <option value="6">Form 6</option>
                                </select>
                                <label for="floatingSelect">What class level ?</label>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Leave description here" name="description" id="floatingTextarea"
                                    style="height: 100px;"></textarea>
                                <label for="floatingTextarea">Description</label>
                            </div>

                            <div class="mb-3">
                                <label for="format">Format (e.g., pdf, video, mp4)</label>
                                <input type="text" name="format" class="form-control" required>
                            </div>

                            <div class="form-floating mb-3">
                                <label for="category_ids">Subjects</label>
                                <select class="form-select" name="category_ids[]" multiple>
                                    @foreach (App\Models\Subject::all() as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
