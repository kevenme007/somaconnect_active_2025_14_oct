@extends('layouts.root')

@section('title')
Support Offer Detail
@endsection

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Support Offer Details</h1>
    </div><!-- End Page Title -->

    <section class="section support-offer-detail">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Submitted by: {{ $offer->first_name }} {{ $offer->last_name }}</h5>
                        <p><strong>Email:</strong> {{ $offer->email }}</p>
                        <p><strong>Phone:</strong> {{ $offer->phone ?? 'N/A' }}</p>
                        <p><strong>Support Type:</strong> {{ ucfirst($offer->support_type) }}</p>
                        <p><strong>Details:</strong></p>
                        <p>{{ $offer->details }}</p>
                        <p><strong>Submitted On:</strong> {{ $offer->created_at->format('Y-m-d H:i') }}</p>
                        <a href="{{ route('support.index') }}" class="btn btn-secondary mt-3">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection
