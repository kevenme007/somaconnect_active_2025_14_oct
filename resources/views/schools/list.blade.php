@extends('layouts.root')
@section('title')
@endsection
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>List of schools</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/add-school">New school</a></li>
                <li class="breadcrumb-item active">List schools</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Currently managed schools <span
                                class="font-extrabold"></span></h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Head Teacher</th>
                                    <th>Type</th>
                                    <th>Region</th>
                                    <th>District</th>
                                    <th>Street</th>
                                    <th data-type="date" data-format="YYYY/DD/MM">Date Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $id = 1;
                                @endphp
                                @foreach ($schools as $school)
                                <tr>
                                    <td>{{ $id++ }}</td>
                                    <td>{{ $school->name }}</td>
                                    <td>{{ $school->headteacher_name }}</td>
                                    <td>{{ $school->type }}</td>
                                    <td>{{ $school->region->name ?? 'N/A' }}</td>
                                    <td>{{ $school->district->name ?? 'N/A' }}</td>
                                    <td>{{ $school->street }}</td>
                                    <td>{{ $school->created_at }}</td>
                                    <td>
                                        <div class="d-flex mr-2">
                                            <a href="{{ url('edit-school', $school->id) }}"
                                                class="btn btn-sm btn-warning"><i class="bi bi-pen"></i></a>
                                            <form action="{{ url('delete-school', $school->id) }}"
                                                method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button
                                                    class="btn btn-sm btn-danger whitespace-nowrap inline-block"><i
                                                        class="bi bi-trash"></i></button>
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