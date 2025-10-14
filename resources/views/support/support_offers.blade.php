@extends('layouts.root')

@section('title')
Support Offers
@endsection

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>List of Support Offers</h1>
    </div><!-- End Page Title -->

    <section class="section users-nav">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">All submitted support offers</h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fullname</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Support Type</th>
                                    <th data-type="date" data-format="YYYY/DD/MM">Submitted On</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $id = 1; @endphp
                                @foreach ($supportOffers as $offer)
                                    <tr>
                                        <td>{{ $id++ }}</td>
                                        <td>{{ $offer->first_name }} {{ $offer->last_name }}</td>
                                        <td>{{ $offer->email }}</td>
                                        <td>{{ $offer->phone ?? 'N/A' }}</td>
                                        <td>{{ ucfirst($offer->support_type) }}</td>
                                        <td>{{ $offer->created_at->format('Y-m-d H:i') }}</td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <a href="{{ route('support.show', $offer->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <form action="{{ route('support.delete', $offer->id) }}" method="POST">
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
