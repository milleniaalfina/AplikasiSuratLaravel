@extends('layouts.auth')
@section('title','login')

@section('content')
<div class="container-fluid">
      <div class="row">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth-pages">
          <div class="card col-lg-4 mx-auto">
            <div class="card-body px-5 py-5">
              <h3 class="card-title text-left mb-3">Login</h3>
              <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="form-group">
                  <input type="text" class="form-control p_input" name="username" placeholder="Username">
                  @if ($errors->has('username'))
                     <span class="help-block">
                     <strong>{{ $errors->first('username') }}</strong>
                </span>
                @endif
                </div>
                <div class="form-group">
                  <input type="password" class="form-control p_input" name="password" placeholder="Password">
                  @if ($errors->has('password'))
                  <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
               </span>
                @endif
                </div>
                <div class="form-group d-flex align-items-center justify-content-between">
                  <div class="form-check"><label><input type="checkbox" class="form-check-input">Remember me</label></div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary btn-block enter-btn">LOG IN</button>
                </div>
                <a href="{{ url('register') }}" class="google-login btn btn-create-account btn-block">Create An Account</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
