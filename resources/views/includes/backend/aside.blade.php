<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        {{-- Dashboard Link per Role --}}
        <li class="nav-item">
            @if(auth()->user()->role === 'admin')
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            @elseif(auth()->user()->role === 'teacher')
                <a class="nav-link" href="{{ route('dashboard.teacher') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            @elseif(auth()->user()->role === 'student')
                <a class="nav-link" href="{{ route('dashboard.student') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            @endif
        </li>
        <!-- End Dashboard -->


        @if(auth()->user()->role === 'admin')
            {{-- Admin Only Links --}}
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#schools-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-book"></i><span>Schools Management</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="schools-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/add-school"><i class="bi bi-circle"></i><span>Add</span></a>
                    </li>
                    <li>
                        <a href="/list-schools"><i class="bi bi-circle"></i><span>List</span></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#category-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Subject Management</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="category-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/create-subject"><i class="bi bi-circle"></i><span>Create subject</span></a>
                    </li>
                    <li>
                        <a href="/list-subjects"><i class="bi bi-circle"></i><span>List subject</span></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#notes-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Notes Management</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="notes-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    @foreach ($subjects as $subject)
                        <li>
                            <a href="{{ route('subjects.topics.create', $subject->id) }}">
                                <i class="bi bi-circle"></i>
                                <span>{{ $subject->name }}</span>
                            </a>
                        </li>
                    @endforeach
                    <li>
                        <a href="{{ route('subjects.topics.create', $subject) }}"><i class="bi bi-circle"></i><span>Create
                                topic</span></a>
                    </li>
                    <li>
                        <a href="{{ route('subjects.topics.index', $subject) }}"><i class="bi bi-circle"></i><span>List
                                topic</span></a>
                    </li>
                    @if (isset($subject) && isset($topic))
                        <li>
                            <a href="{{ route('subjects.topics.contents.create', [$subject->id, $topic->id]) }}"><i
                                    class="bi bi-circle"></i><span>Create topic
                                    content</span></a>
                        </li>
                    @endif
                    @if(isset($subject) && isset($topic))

                        <li>
                            <a
                                href="{{ route('subjects.topics.contents.index', ['subject' => $subject->id, 'topic' => $topic->id]) }}"><i
                                    class="bi bi-circle"></i><span>List topic
                                    content</span></a>
                        </li>
                    @endif
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Users Management</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="users-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/list-users"><i class="bi bi-circle"></i><span>List</span></a>
                    </li>
                    <li>
                        <a href="/subscribers"><i class="bi bi-circle"></i><span>Subscribers</span></a>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#reports-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-bar-chart-line"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="reports-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li><a href="{{ route('reports.active-users') }}"><i class="bi bi-circle"></i><span>Active
                                Users</span></a></li>
                    <li><a href="{{ route('reports.daily-users') }}"><i class="bi bi-circle"></i><span>Daily
                                Users</span></a></li>
                    <li><a href="{{ route('reports.weekly-users') }}"><i class="bi bi-circle"></i><span>Weekly
                                Users</span></a></li>
                    <li><a href="{{ route('reports.monthly-users') }}"><i class="bi bi-circle"></i><span>Monthly
                                Users</span></a></li>
                    <li><a href="{{ route('reports.most-read-resources') }}"><i class="bi bi-circle"></i><span>Most Read
                                Resources</span></a></li>
                    <li><a href="{{ route('reports.most-active-users') }}"><i class="bi bi-circle"></i><span>Most Active
                                Users</span></a></li>
                    <li><a href="{{ route('reports.time-spent') }}"><i class="bi bi-circle"></i><span>Time Spent</span></a>
                    </li>
                    <li><a href="{{ route('reports.device-stats') }}"><i class="bi bi-circle"></i><span>Device
                                Stats</span></a></li>
                </ul>
            </li>


        @endif

        @if(auth()->user()->role === 'teacher' || auth()->user()->role === 'admin')
            {{-- Shared with Admin & Teacher --}}
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#uploads-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Manage Resources</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="uploads-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/upload-resources"><i class="bi bi-circle"></i><span>Create Resource</span></a>
                    </li>
                    <li>
                        <a href="/list-resources"><i class="bi bi-circle"></i><span>List Resources</span></a>
                    </li>
                </ul>
            </li>
        @endif

        @if(auth()->user()->role === 'student')
            {{-- Student Specific --}}
            <li class="nav-item">
                <a class="nav-link collapsed" href="/profile">
                    <i class="bi bi-person"></i><span>My Profile</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/interacted-resources">
                    <i class="bi bi-clock-history"></i><span>Interacted Resources</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/most-interacted">
                    <i class="bi bi-star"></i><span>Most Interacted</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/favorite-materials">
                    <i class="bi bi-heart"></i><span>Favorite Materials</span>
                </a>
            </li>
        @endif

        {{-- Logout for everyone --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="/chat">
                <i class="bi bi-chat-dots"></i>
                <span>Chat</span>
            </a>
        </li><!-- End Logout -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="/logout">
                <i class="bi bi-box-arrow-in-left"></i>
                <span>Logout</span>
            </a>
        </li><!-- End Logout -->

    </ul>
</aside>
