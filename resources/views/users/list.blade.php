@extends('layouts.root')
@section('title')
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>List of Users</h1>
        </div><!-- End Page Title -->

        <section class="section users-nav">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Currently active users</h5>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Fullname</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Role</th>
                                        <th data-type="date" data-format="YYYY/DD/MM">Joined Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $id = 1;
                                    @endphp

                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $id++ }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->is_active ? 'Active' : 'Not Active' }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td>{{ $user->created_at }}</td>
                                            <td>
                                                <div class="d-flex gap-1">
                                                    <a href="{{ url('edit-user', $user->id) }}"
                                                        class="btn btn-sm btn-secondary">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                    <form action="{{ url('delete-user', $user->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
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
