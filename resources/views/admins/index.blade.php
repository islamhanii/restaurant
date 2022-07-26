@extends('admins.layout')
@extends('admins.partials._body')
@extends('admins.partials._navbar')
@extends('admins.partials._settings-panel')
@extends('admins.partials._sidebar')
@extends('admins.partials._footer')

@section('dashboard-link-active') active @endsection

@section('page-title') Overview @endsection

@section('welcome-message')
<ul class="navbar-nav">
  <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
    <h1 class="welcome-text">Good Morning, <span class="text-black fw-bold text-capitalize">{{auth()->user()->name}}</span></h1>
    <h3 class="welcome-sub-text">Your performance summary this week </h3>
  </li>
</ul>
@endsection

@section('main')
<div class="col-sm-12">
    <div class="home-tab">
      <div class="d-sm-flex align-items-center justify-content-between border-bottom">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active ps-0 border-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
          </li>
        </ul>
      </div>
      <div class="tab-content tab-content-basic">
        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
          <div class="row">
            <div class="col-sm-12">
              <div class="statistics-details d-flex align-items-center justify-content-between">
                <div>
                  <p class="statistics-title">Bounce Rate</p>
                  <h3 class="rate-percentage">32.53%</h3>
                  <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>-0.5%</span></p>
                </div>
                <div>
                  <p class="statistics-title">Page Views</p>
                  <h3 class="rate-percentage">7,682</h3>
                  <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>+0.1%</span></p>
                </div>
                <div>
                  <p class="statistics-title">New Sessions</p>
                  <h3 class="rate-percentage">68.8</h3>
                  <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p>
                </div>
                <div class="d-none d-md-block">
                  <p class="statistics-title">Avg. Time on Site</p>
                  <h3 class="rate-percentage">2m:35s</h3>
                  <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p>
                </div>
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div>
</div>
@endsection