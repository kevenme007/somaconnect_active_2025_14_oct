@extends('layouts.root')
@section('title')
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>List resources</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/upload-resources">New resource</a></li>
                    <li class="breadcrumb-item active">List resources</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Currently available resources <span
                                    class="font-extrabold">{{ count($resources) }}</span></h5>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Form</th>
                                        <th>Status</th>
                                        <th>Type</th>
                                        <th>Thumbnail</th>
                                        <th>Approver</th>
                                        <th>Approved On</th>
                                        <th data-type="date" data-format="YYYY/DD/MM">Date Created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $id = 1;
                                    @endphp
                                    @foreach ($resources as $resource)
                                        <tr>
                                            <td>{{ $id++ }}</td>
                                            <td>{{ $resource->title }}</td>
                                            <td>{{ $resource->author ?? 'N/A' }}</td>
                                            <td>{{ $resource->grade_level }}</td>
                                            <td>
                                                @if ($resource->status === 'approved')
                                                    <span class="badge bg-success">Approved</span>
                                                @elseif($resource->status === 'pending')
                                                    <span class="badge bg-warning text-dark">Pending</span>
                                                @elseif($resource->status === 'disapproved')
                                                    <span class="badge bg-danger">Rejected</span>
                                                @else
                                                    <span class="badge bg-secondary">{{ ucfirst($resource->status) }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $resource->resource_type ?? '-' }}</td>
                                            <td><img class="img-fluid" height="100" width="100"
                                                    src="{{ $resource->image_path ? asset('storage/' . $resource->image_path) : asset('assets3/images/product/noimage.jpeg') }}"
                                                    alt="{{ $resource->title }}"></td>
                                            <td>{{ $resource->approver ? $resource->approver->name : '-' }}</td>
                                            <td>{{ $resource->approved_at ?? '-' }}</td>
                                            <td>{{ $resource->created_at }}</td>
                                            <td>
                                                <div class="d-flex mr-2">
                                                    <a href="{{ url('edit-resource', encrypt($resource->id)) }}"
                                                        class="btn btn-sm btn-warning"><i
                                                            class="bi bi-pen"></i></a>&nbsp;&nbsp;
                                                    <form action="{{ url('delete-resource', encrypt($resource->id)) }}"
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
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });

            // Success flash message
            @if (session('success'))
                Toast.fire({
                    icon: 'success',
                    title: '{{ session('success') }}'
                });
            @endif

            // Error flash message
            @if (session('error'))
                Toast.fire({
                    icon: 'error',
                    title: '{{ session('error') }}'
                });
            @endif

            // Validation errors
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    Toast.fire({
                        icon: 'error',
                        title: '{{ $error }}'
                    });
                @endforeach
            @endif
        });
    </script>
@endsection
