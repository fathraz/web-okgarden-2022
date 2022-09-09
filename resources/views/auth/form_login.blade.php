@extends('layouts.main_auth')

@section('title', 'Login')

@section('content')
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="/" class="h1"><b>Admin</b>LTE</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="{{ route('login_action') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Username" name="email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user-alt"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row align-center">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          <!-- /.col -->
          </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
@endsection