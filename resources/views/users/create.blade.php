@extends('layouts.root')
@section('title')
@endsection
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Add new user</h1>
    </div><!-- End Page Title -->

    <section class="section users-nav">
        <div class="row">
            <form id="Form" action={{ route('user.store') }} method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-sm-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="fullname" id="floatingName" placeholder="Fullname" autocomplete=on>
                            <label for="floatingName">Fullname</label>
                        </div>
                        @if($errors->has('fullname'))
                        <div class="error" style="color: red">{{ $errors->first('fullname') }}</div>
                        @endif
                    </div>

                    <div class="col-sm-12">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" id="floatingEmail" placeholder="Email" autocomplete=on>
                            <label for="floatingEmail">Email</label>
                        </div>
                        @if($errors->has('email'))
                        <div class="error" style="color: red">{{ $errors->first('email') }}</div>
                        @endif
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingGender" name="gender" aria-label="Select user gender">
                            <option selected>Choose from here</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <label for="floatingGender">What's the user gender?</label>
                        @if($errors->has('gender'))
                        <div class="error">{{ $errors->first('gender') }}</div>
                        @endif
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingRole" name="role" aria-label="Select user role">
                            <option selected>Choose from here</option>
                            @foreach ($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        <label for="floatingRole">What role is the user?</label>
                        @if($errors->has('role'))
                        <div class="error">{{ $errors->first('role') }}</div>
                        @endif
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="password" id="floatingPassword" value="1234567890" hidden />
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="status" id="floatingStatus" value="Pending" hidden />
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
        </div>
        </form>
        </div>
    </section>

</main>
@endsection
