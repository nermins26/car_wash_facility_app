@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8 col-lg-6 mx-auto my-5">
            <div class="card p-4">
                <div class="card-header">
                    <h3>Register</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username"
                            name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email"
                            name="email"
                            required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password"
                            name="password"
                            required>
                        </div>
                        <div class="form-group">
                            <label for="passwordConfirmation">Password</label>
                            <input type="password" class="form-control" id="passwordConfirmation" name="password_confirmation"
                            required>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
                <div class="card-footer">
                    <p>
                        Already have an account?
                        <a href="{{ route('login') }}">
                            Log in here
                        </a>
                    </p>
                    {{-- prikaz greski --}}
                    @include('layouts.partials.errors')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection