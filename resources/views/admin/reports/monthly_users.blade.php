@extends('layouts.root')
@section('title', 'Monthly Active Users')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Monthly Active Users</h1>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Users Active This Month ({{ count($monthlyUsers) }})</h5>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Sessions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($monthlyUsers as $index => $user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->sessions_count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>
@endsection
