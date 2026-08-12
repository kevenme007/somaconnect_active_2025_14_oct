<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        {{-- Dashboard --}}
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

        {{-- Admin Only --}}
        @if(auth()->user()->role === 'admin')

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#schools-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-book"></i><span>Schools Management</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="schools-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li><a href="/add-school"><i class="bi bi-circle"></i><span>Add School</span></a></li>
                    <li><a href="/list-schools"><i class="bi bi-circle"></i><span>List Schools</span></a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#category-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Subject Management</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="category-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li><a href="/create-subject"><i class="bi bi-circle"></i><span>Create Subject</span></a></li>
                    <li><a href="/list-subjects"><i class="bi bi-circle"></i><span>List Subjects</span></a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#notes-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Notes Management</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="notes-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    @php
                        // Fetch subjects if not already passed (fallback)
                        $subjects = $subjects ?? App\Models\Subject::all();
                    @endphp
                    @foreach ($subjects as $subject)
                        <li>
                            <a href="{{ route('subjects.topics.create', $subject->id) }}">
                                <i class="bi bi-circle"></i>
                                <span>{{ $subject->name }}</span>
                            </a>
                        </li>
                    @endforeach
                    {{-- The following lines may cause errors if $subject not defined – better to use dedicated routes --}}
                    {{--
                    <li><a href="{{ route('subjects.topics.create', $subject) }}"><i class="bi bi-circle"></i><span>Create topic</span></a></li>
                    <li><a href="{{ route('subjects.topics.index', $subject) }}"><i class="bi bi-circle"></i><span>List topic</span></a></li>
                    @if (isset($subject) && isset($topic))
                        <li><a href="{{ route('subjects.topics.contents.create', [$subject->id, $topic->id]) }}"><i class="bi bi-circle"></i><span>Create topic content</span></a></li>
                        <li><a href="{{ route('subjects.topics.contents.index', ['subject' => $subject->id, 'topic' => $topic->id]) }}"><i class="bi bi-circle"></i><span>List topic content</span></a></li>
                    @endif
                    --}}
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Users Management</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="users-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li><a href="/list-users"><i class="bi bi-circle"></i><span>List Users</span></a></li>
                    <li><a href="/subscribers"><i class="bi bi-circle"></i><span>Subscribers</span></a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#reports-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-bar-chart-line"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="reports-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li><a href="{{ route('reports.most-read-resources') }}"><i class="bi bi-circle"></i><span>Most Read Resources</span></a></li>
                    <li><a href="{{ route('reports.most-active-users') }}"><i class="bi bi-circle"></i><span>Most Active Users</span></a></li>
                    <li><a href="{{ route('reports.time-spent') }}"><i class="bi bi-circle"></i><span>Time Spent</span></a></li>
                    <li><a href="{{ route('reports.device-stats') }}"><i class="bi bi-circle"></i><span>Device Stats</span></a></li>
                    <li><a href="{{ route('reports.user-system') }}"><i class="bi bi-people"></i><span>User System Report</span></a></li>
                </ul>
            </li>

        @endif

        {{-- Manage Resources (Admin & Teacher) --}}
        @if(in_array(auth()->user()->role, ['admin', 'teacher']))
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#uploads-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Manage Resources</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="uploads-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li><a href="/upload-resources"><i class="bi bi-circle"></i><span>Create Resource</span></a></li>
                    <li><a href="/list-resources"><i class="bi bi-circle"></i><span>List Resources</span></a></li>
                </ul>
            </li>
        @endif

        {{-- Forum (All authenticated users) --}}
        @auth
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forum-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-chat-square-text"></i><span>Forum</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forum-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li><a href="{{ route('forum.threads.index') }}"><i class="bi bi-circle"></i><span>All Topics</span></a></li>
                    @if(in_array(auth()->user()->role, ['admin', 'teacher']))
                        <li><a href="{{ route('forum.threads.create') }}"><i class="bi bi-circle"></i><span>New Topic</span></a></li>
                    @endif
                </ul>
            </li>
        @endauth

        {{-- Chat (All authenticated users) --}}
        @auth
            <li class="nav-item">
                <a class="nav-link collapsed" href="/chat">
                    <i class="bi bi-chat-dots"></i>
                    <span>Chat</span>
                </a>
            </li>
        @endauth

        {{-- Student Profile --}}
        @if(auth()->user()->role === 'student')
            <li class="nav-item">
                <a class="nav-link collapsed" href="/profile">
                    <i class="bi bi-person"></i><span>My Profile</span>
                </a>
            </li>
        @endif

        {{-- Logout --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="/logout">
                <i class="bi bi-box-arrow-in-left"></i>
                <span>Logout</span>
            </a>
        </li>

    </ul>
</aside>
