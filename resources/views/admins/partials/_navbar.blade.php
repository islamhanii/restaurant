@section('navbar')
    
<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
    <div class="me-3">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
        <span class="icon-menu"></span>
      </button>
    </div>
    <div>
      <a class="navbar-brand brand-logo" href="{{route("overview")}}">
        <img src="{{asset("images/logo.svg")}}" alt="logo" />
      </a>
      <a class="navbar-brand brand-logo-mini" href="{{route("overview")}}">
        <img src="{{asset("images/logo-mini.svg")}}" alt="logo" />
      </a>
    </div>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-top"> 
    @yield('welcome-message')
    <ul class="navbar-nav ms-auto">
      <li class="nav-item">
        <form class="search-form" action="#">
          <i class="icon-search"></i>
          <input type="search" class="form-control" placeholder="Search Here" title="Search here">
        </form>
      </li>
      <li class="nav-item dropdown d-none d-lg-block user-dropdown">
        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
          <img class="img-xs rounded-circle" src="{{asset("images/faces/face8.jpg")}}" alt="Profile image"> </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
          <div class="dropdown-header text-center">
            <img class="img-md rounded-circle" src="{{asset("images/faces/face8.jpg")}}" alt="Profile image">
            <p class="mb-1 mt-3 font-weight-semibold text-capitalize">{{auth()->user()->name}}</p>
            <p class="fw-light text-muted mb-0">{{auth()->user()->email}}</p>
          </div>
          <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
          <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i> Messages</a>
          <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary me-2"></i> Activity</a>
          <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i> FAQ</a>
          <form method="POST" action="{{route("logout")}}">
            @csrf
            <button class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</button>
          </form>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>

@endsection