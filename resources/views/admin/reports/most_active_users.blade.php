@extends('layouts.root')
@section('title', 'Most Active Users')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Most Active Users</h1>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Top 10 Most Active Users</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Sessions</th>
                            <th>Total Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mostActiveUsers as $index => $user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->sessions_count }}</td>
                                <td>{{ gmdate('H:i:s', $user->total_duration) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>
@endsection
