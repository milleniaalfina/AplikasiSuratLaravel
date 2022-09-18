@extends('layouts.auth')
@section('title','register')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="content-wrapper full-page-wrapper d-flex align-items-center auth-pages">
      <div class="card col-lg-4 mx-auto">
        <div class="card-body px-5 py-5">
          <h3 class="card-title text-left mb-3">Register</h3>
          <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div class="form-group">
                <label for="name">Name</label>
                  <input type="text" class="form-control p_input" name="name" placeholder="name">
                  @if ($errors->has('name'))
                     <span class="help-block">
                     <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
                </div>
                <div class="form-group">
                <label for="username">Username</label>
                  <input type="text" class="form-control p_input" name="username" placeholder="Username">
                  @if ($errors->has('username'))
                     <span class="help-block">
                     <strong>{{ $errors->first('username') }}</strong>
                </span>
                @endif
                </div>
                <div class="form-group">
                <label for="password">Password</label>
                  <input type="password" class="form-control p_input" name="password" placeholder="password">
                  @if ($errors->has('password'))
                     <span class="help-block">
                     <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
                </div>
                <div class="form-group">
                <label for="password-confirm">Confirm Password</label>
                  <input type="password" class="form-control p_input" name="password_confirmation" placeholder="confirmation_password" required>
                  @if ($errors->has('password'))
                     <span class="help-block">
                     <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
                </div>

      <div class="form-group">
          <div class="text-center">
          <button type="submit" class="btn btn-primary btn-block enter-btn">Register</button>
        </div>
      </div>
            <p class="existing-user text-center pt-4 mb-0">Already have an acount?&nbsp;<a href="{{ url('login') }}">Sign up</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection