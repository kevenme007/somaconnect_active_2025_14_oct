@extends('layouts.root')
@section('title', 'Weekly Active Users')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Weekly Active Users</h1>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Users Active This Week ({{ count($weeklyUsers) }})</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Last Login</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($weeklyUsers as $index => $user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $user->user->name }}</td>
                                <td>{{ $user->user->email }}</td>
                                <td>{{ \Carbon\Carbon::parse($user->login_time)->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>
@endsection
