@extends('layouts.root')
@section('title')
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Create Subject</h1>
        </div><!-- End Page Title -->

        <section class="section students-nav">
            <div class="row">
                <div class="row mb-3">
                    <div class="col-sm-10">
                        <form action={{ route('subjects.save') }} method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" id="floatingName"
                                    placeholder="Subject Name">
                                <label for="floatingName">Name</label>
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
