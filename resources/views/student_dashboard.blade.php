@extends('layouts.root')
@section('title')
@endsection
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                    <!-- Books Card -->
                    {{-- <div class="col-xxl-3 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                            @if(count($resources) <= 1)
                                <h5 class="card-title">Resource</h5>

                            @else
                                <h5 class="card-title">Resources</h5>

                            @endif

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-book"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ count($resources) }}</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div> --}}
                    <!-- End Books Card -->

                    <!-- Past Papers Card -->
                    {{-- <div class="col-xxl-3 col-md-6">
                        <div class="card info-card revenue-card">

                            <div class="card-body">
                            @if(count($notes) <= 1)
                                <h5 class="card-title">Note</h5>

                            @else
                                <h5 class="card-title">Notes</h5>

                            @endif

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-files"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ count($notes) }}</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div> --}}
                    <!-- End Past Papers Card -->

                    <!-- Tutorials Card -->
                    {{-- <div class="col-xxl-3 col-md-6">

                        <div class="card info-card customers-card">

                            <div class="card-body">
                            @if(count($users) <= 1)
                                <h5 class="card-title">User</h5>

                            @else
                                <h5 class="card-title">Users</h5>

                            @endif

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ count($users) }}</h6>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div> --}}
                    <!-- End Customers Card -->

                                        <!-- Tutorials Card -->
                    {{-- <div class="col-xxl-3 col-md-6">

                        <div class="card info-card customers-card">

                            <div class="card-body">
                            @if(count($subscribers) <= 1)
                                <h5 class="card-title">Subscriber</h5>

                            @else
                                <h5 class="card-title">Subscribers</h5>

                            @endif

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ count($subscribers) }}</h6>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div> --}}
                    <!-- End Customers Card -->

                    <!-- Recent Sales -->
                    {{-- <div class="col-12">
                        <div class="card recent-sales overflow-auto">

                            <div class="card-body">
                                <h5 class="card-title">Recent Added Schools ({{count($schools)}})</h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                        @php
                                        $id = 1;
                                        @endphp
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Head Teacher</th>
                                            <th scope="col">Region</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($schools as $school )
                                        <tr>
                                            <th scope="row"><a href="#">{{ $id++ }}</a></th>
                                            <td>{{ $school->name }}</td>
                                            <td>{{ $school->headteacher_name }}</td>
                                            <td>{{ $school->region->name }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div> --}}
                    <!-- End Recent Sales -->

                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">

                <!-- Materials Statics -->
                <div class="card">
                    <div class="card-body pb-0">
                        {{-- <h5 class="card-title">Materials Statics</span></h5> --}}

                        {{-- <div id="trafficChart" style="min-height: 400px;" class="echart"></div> --}}

                        <script>
                        var resources = {!! $resources !!}
                        var notes = {!! $notes !!}
                        var users = {!! $users !!}
                        var subscribers = {!! $subscribers !!}


                        var totalResources = resources.length
                        var totalNotes = notes.length
                        var totalUsers = users.length
                        var totalSubscribers = subscribers.length


                            document.addEventListener("DOMContentLoaded", () => {
                                echarts.init(document.querySelector("#trafficChart")).setOption({
                                    tooltip: {
                                        trigger: 'item'
                                    }
                                    , legend: {
                                        top: '5%'
                                        , left: 'center'
                                    }
                                    , series: [{
                                        name: 'Number of'
                                        , type: 'pie'
                                        , radius: ['40%', '70%']
                                        , avoidLabelOverlap: false
                                        , label: {
                                            show: false
                                            , position: 'center'
                                        }
                                        , emphasis: {
                                            label: {
                                                show: true
                                                , fontSize: '18'
                                                , fontWeight: 'bold'
                                            }
                                        }
                                        , labelLine: {
                                            show: false
                                        }
                                        , data: [{
                                                value: totalResources
                                                , name: 'Resources'
                                            }
                                            , {
                                                value: totalNotes
                                                , name: 'Notes'
                                            }
                                            , {
                                                value: totalUsers
                                                , name: 'Users'
                                            }
                                            , {
                                                value: totalSubscribers
                                                , name: 'Subscribers'
                                            }
                                            ,
                                        ]
                                    }]
                                });
                            });

                        </script>

                    </div>
                </div><!-- End Materials Statics -->

            </div><!-- End Right side columns -->

        </div>
    </section>

</main>
@endsection
