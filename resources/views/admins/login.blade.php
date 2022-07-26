@extends('admins.layout')

@section('page-title') SIGN IN @endsection

@section('page-body')
    
<div class="container-scroller">
  <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth px-0">
      <div class="row w-100 mx-0">
        <div class="col-lg-4 mx-auto">
          <div class="auth-form-light text-left py-5 px-4 px-sm-5">
            <div class="brand-logo">
              <img src="../../images/logo.svg" alt="logo">
            </div>
            <h4>Hello! let's get started</h4>
            <h6 class="fw-light">Sign in to continue.</h6>
            
            @if(Session::has('error'))
                <div class="col-12 mb-2 alert-danger rounded-3 p-2">
                    <p class="mb-0 lh-base">{{Session::get('error')}}</p>
                </div>
            @endif
            <form class="pt-3" method="POST" action="{{route("login.store")}}">
              @csrf
              <div class="form-group">
                <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" name="email">
              </div>
              <div class="form-group">
                <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password">
              </div>
              <div class="mt-3">
                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
              </div>
              <div class="my-2 d-flex justify-content-between align-items-center">
                <a href="#" class="auth-link text-black">Forgot password?</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>

@endsection
