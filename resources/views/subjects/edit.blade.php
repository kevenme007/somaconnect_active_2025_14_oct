@extends('layouts.root')
@section('title')
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Update Category</h1>
             <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/create-category">New category</a></li>
                    <li class="breadcrumb-item active">List categories</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section students-nav">
            <div class="row">
                <div class="row mb-3">
                    <div class="col-sm-10">
                        <form action={{ route('categories.update', $category->id) }} method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" id="floatingName"
                                    placeholder="Category Name" value="{{ old('name', $category->name) }}">
                                <label for="floatingName">Title</label>
                            </div>

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
