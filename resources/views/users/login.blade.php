@extends('master')
@section('content')

    <div class="jumbotron col-sm-6 col-sm-push-3" style="margin-top: 5em">
        <h1>Login</h1>

        <form action="{{ url('user/do-login') }}" method="post">
            <div class="form-group">
                <input type="text" name="email" id="email" placeholder="Enter your email adress" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" name="password" id="password" placeholder="Enter password" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" name="login" id="login-btn" value="Login" class="btn btn-raised btn-secondary">
            </div>

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>

    </div>

@endsection