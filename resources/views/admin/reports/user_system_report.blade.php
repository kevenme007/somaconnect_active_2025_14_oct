@extends('layouts.root')

@section('title', 'User System Report')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>User System Report</h1>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header border-top border-3 border-primary border-0 d-flex justify-content-between align-items-center">
                <h6 class="mb-0">User Activity Overview</h6>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="loginTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#today">
                            Logged Today <span class="badge bg-primary">{{ $countToday }}</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#month">
                            Logged This Month <span class="badge bg-primary">{{ $countMonth }}</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#three-month">
                            Not Logged 3 Months <span class="badge bg-primary">{{ $countThreeMonths }}</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#never-login">
                            Never Logged In <span class="badge bg-primary">{{ $countNever }}</span>
                        </button>
                    </li>
                </ul>

                <div class="tab-content mt-3" id="loginTabsContent">
                    <!-- Logged Today -->
                    <div class="tab-pane fade show active" id="today" role="tabpanel">
                        <div class="table-responsive">
                            @if($loggedToday->count() > 0)
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Last Login</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($loggedToday as $index => $user)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ ucfirst($user->role) }}</td>
                                            <td>
                                                @php
                                                    $lastLogin = $user->sessions()->latest('login_time')->first();
                                                @endphp
                                                @if($lastLogin)
                                                    {{ $lastLogin->login_time->format('d M Y, h:i A') }}
                                                @else
                                                    Never
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p class="text-muted text-center">No users found.</p>
                            @endif
                        </div>
                    </div>

                    <!-- Logged This Month -->
                    <div class="tab-pane fade" id="month" role="tabpanel">
                        <div class="table-responsive">
                            @if($loggedThisMonth->count() > 0)
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Last Login</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($loggedThisMonth as $index => $user)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ ucfirst($user->role) }}</td>
                                            <td>
                                                @php
                                                    $lastLogin = $user->sessions()->latest('login_time')->first();
                                                @endphp
                                                @if($lastLogin)
                                                    {{ $lastLogin->login_time->format('d M Y, h:i A') }}
                                                @else
                                                    Never
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p class="text-muted text-center">No users found.</p>
                            @endif
                        </div>
                    </div>

                    <!-- Not Logged 3 Months -->
                    <div class="tab-pane fade" id="three-month" role="tabpanel">
                        <div class="table-responsive">
                            @if($notLoggedThreeMonths->count() > 0)
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Last Login</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($notLoggedThreeMonths as $index => $user)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ ucfirst($user->role) }}</td>
                                            <td>
                                                @php
                                                    $lastLogin = $user->sessions()->latest('login_time')->first();
                                                @endphp
                                                @if($lastLogin)
                                                    {{ $lastLogin->login_time->format('d M Y, h:i A') }}
                                                @else
                                                    Never
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p class="text-muted text-center">No users found.</p>
                            @endif
                        </div>
                    </div>

                    <!-- Never Logged In -->
                    <div class="tab-pane fade" id="never-login" role="tabpanel">
                        <div class="table-responsive">
                            @if($neverLoggedIn->count() > 0)
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Last Login</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($neverLoggedIn as $index => $user)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ ucfirst($user->role) }}</td>
                                            <td>Never</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p class="text-muted text-center">No users found.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
