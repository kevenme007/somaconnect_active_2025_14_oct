@extends('layouts.root')
@section('title', 'Daily Users')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Daily Users</h1>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Users Active Today ({{ count($users) }})</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Login Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $user)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $user->user->name }}</td>
                                    <td>{{ $user->user->email }}</td>
                                    <td>{{ \Carbon\Carbon::parse($user->login_time)->format('H:i:s') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
@endsection