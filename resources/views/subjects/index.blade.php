@extends('layouts.root')
@section('title')
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>List Subjects</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/create-subject">New subject</a></li>
                    <li class="breadcrumb-item active">List </li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Available subjects <span
                                    class="font-extrabold">{{ count($subjects) }}</span></h5>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>subject name</th>
                                        <th data-type="date" data-format="YYYY/DD/MM">Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $id = 1;
                                    @endphp
                                    @foreach ($subjects as $subject)
                                        <tr>
                                            <td>{{ $id++ }}</td>
                                            <td>{{ $subject->name }}</td>
                                            <td>{{ $subject->created_at }}</td>
                                            <td>
                                                <div class="d-flex mr-2">
                                                    <a href="{{ url('edit-subject', $subject->id) }}"
                                                        class="btn btn-sm btn-warning"><i class="bi bi-pen"></i></a>
                                                     <form id="delete-form-{{ $subject->id }}" action="{{ url('delete-subject', $subject->id) }}" style="display: inline;" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button
                                                            class="btn btn-sm btn-danger whitespace-nowrap inline-block"><i
                                                                class="bi bi-trash" onclick="confirmDelete({{ $subject->id }})"></i></button>
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
        <script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'This will permanently delete the item.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>
@endsection
