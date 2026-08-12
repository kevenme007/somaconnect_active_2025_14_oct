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
                    <div class="tab-pane fade show active" id="today" role="tabpanel">
                        @include('admin.reports._user_table', ['users' => $loggedToday])
                    </div>
                    <div class="tab-pane fade" id="month" role="tabpanel">
                        @include('admin.reports._user_table', ['users' => $loggedThisMonth])
                    </div>
                    <div class="tab-pane fade" id="three-month" role="tabpanel">
                        @include('admin.reports._user_table', ['users' => $notLoggedThreeMonths])
                    </div>
                    <div class="tab-pane fade" id="never-login" role="tabpanel">
                        @include('admin.reports._user_table', ['users' => $neverLoggedIn])
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
