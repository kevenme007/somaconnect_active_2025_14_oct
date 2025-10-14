@extends('layouts.root')
@section('title')
@endsection
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Add new role</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="row mb-3">
                <form action={{ 'save-role' }} method="POST">
                    @csrf
                    <div class="col-sm-10">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" id="floatingName" placeholder="name" required>
                            <label for="floatingName">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Leave description here" name="description" id="floatingTextarea" style="height: 100px;"></textarea>
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
        </div>

        {{-- LIST ROLES --}}
        <div class="row">
            <div class="col-sm-10">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Available roles</h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $id = 1;
                                @endphp
                                @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $id ++}}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->description }}</td>
                                    <td>Active</td>
                                    <td>
                                        <button class="btn btn-sm btn-secondary">edit</button>
                                        <button class="btn btn-sm btn-danger">delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main>
@endsection
