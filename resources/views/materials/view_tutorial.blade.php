@extends('layouts.root')
@section('title')
@endsection
@section('content')
<main id="main" class="main">

        <div class="pagetitle">
        <h1>Show single tutorial</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/view-tutorials">All Tutorials</a></li>
                <li class="breadcrumb-item active">{{ $tutorial->name }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section students-nav">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <object data="/storage/videos/{{ $tutorial->file }}" width="100%" height="950px">
                    </object>

                </div>
            </div>
        </div>
    </section>

</main>
@endsection
