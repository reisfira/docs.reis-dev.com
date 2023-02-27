@extends('layouts.landing')
@section('title', 'Login')

@section('content')
<div class="d-flex justify-content-center pt-5">
    <div class="login-box pt-5">
        <div class="card card-outline card-primary mt-5">
            <div class="card-header text-center">
                <a href="{{ route('welcome') }}" class="h1">{{ config('app.name', 'Laravel') }}</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="{{ url('login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8"></div>

                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>

                    </div>
                </form>
            </div>
            <div class="card-footer bg-white text-center">
                <p class="mb-0">
                    <a href="{{ route('register') }}">Register a new membership</a>
                </p>
            </div>

        </div>
    </div>
</div>
@endsection
