<div class="tab-pane fade" id="three-month" role="tabpanel">
    <div class="table-responsive">
        <table class="table table-bordered table-striped" id="tableList-2">
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
    </div>
</div>
