@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8 col-lg-6 mx-auto my-5">
            <div class="card p-4">
                <div class="card-header">
                    <h3>Log in</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="email">Email address</label>
                          <input type="email" class="form-control" id="email"
                          name="email" required>
                        </div>
                        <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" class="form-control" id="password"
                          name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
                <div class="card-footer">
                    <p>
                        Don't have an account?
                        <a href="{{ route('register') }}">
                            Register here
                        </a>
                    </p>
                    {{-- prikaz greski --}}
                    @if (count($errors) > 0)
                        <div class="col-lg-12 no-pdd">
                            <div class="sn-field alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection