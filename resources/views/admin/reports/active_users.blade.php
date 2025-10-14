@extends('layouts.root')
@section('title', 'Active Users')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Active Users</h1>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Currently Online ({{ count($users) }})</h5>
                    @if (count($users) > 0)
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Last Seen</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $index => $user)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if ($user->is_online)
                                                <span class="badge bg-success">Online</span>
                                            @else
                                                <span class="badge bg-secondary">Offline</span>
                                            @endif
                                        </td>
                                        <td>{{ $user->last_seen_at->diffForHumans() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-muted">No users are online right now.</p>
                    @endif
                </div>
            </div>
        </section>
    </main>
@endsection
