@section('sidebar')
    
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item @yield('dashboard-link-active')">
      <a class="nav-link" href="{{route("overview")}}">
        <i class="mdi mdi-grid-large menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route("restaurant.home")}}">
        <i class="mdi mdi-shape-plus menu-icon"></i>
        <span class="menu-title">Our website</span>
      </a>
    </li>
    <li class="nav-item nav-category">GENERAL</li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#admins" aria-expanded="false" aria-controls="admins">
        <i class="menu-icon mdi mdi-account-multiple"></i>
        <span class="menu-title">Admins</span>
        <i class="menu-arrow"></i> 
      </a>
      <div class="collapse" id="admins">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#about-us" aria-expanded="false" aria-controls="about-us">
        <i class="menu-icon mdi mdi-floor-plan"></i>
        <span class="menu-title">About US</span>
        <i class="menu-arrow"></i> 
      </a>
      <div class="collapse" id="about-us">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item @yield('contacts-link-active')">
      <a class="nav-link" data-bs-toggle="collapse" href="#contacts" aria-expanded="false" aria-controls="contacts">
        <i class="menu-icon mdi mdi-mail-ru"></i>
        <span class="menu-title">Contacts</span>
        <i class="menu-arrow"></i> 
      </a>
      <div class="collapse" id="contacts">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link @yield('all-contacts-link-active')" href="{{route("contacts")}}">All</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item @yield('informations-link-active')">
      <a class="nav-link" data-bs-toggle="collapse" href="#information" aria-expanded="false" aria-controls="information">
        <i class="menu-icon mdi mdi-information-variant"></i>
        <span class="menu-title">Informations</span>
        <i class="menu-arrow"></i> 
      </a>
      <div class="collapse" id="information">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link @yield('all-informations-link-active')" href="{{route("informations")}}">All</a></li>
          <li class="nav-item"> <a class="nav-link @yield('create-information-link-active')" href="{{route("information.create")}}">Create</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item @yield('chefs-link-active')">
      <a class="nav-link" data-bs-toggle="collapse" href="#chefs" aria-expanded="false" aria-controls="chefs">
        <i class="menu-icon mdi mdi-pot-mix"></i>
        <span class="menu-title">Chefs</span>
        <i class="menu-arrow"></i> 
      </a>
      <div class="collapse" id="chefs">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link @yield('all-chefs-link-active')" href="{{route("chefs")}}">All</a></li>
          <li class="nav-item"> <a class="nav-link @yield('create-chef-link-active')" href="{{route("chef.create")}}">Create</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item @yield('cats-link-active')">
      <a class="nav-link" data-bs-toggle="collapse" href="#categories" aria-expanded="false" aria-controls="categories">
        <i class="menu-icon mdi mdi-sitemap"></i>
        <span class="menu-title">Categories</span>
        <i class="menu-arrow"></i> 
      </a>
      <div class="collapse" id="categories">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link @yield('all-cats-link-active')" href="{{route("categories")}}">All</a></li>
          <li class="nav-item"> <a class="nav-link @yield('create-cat-link-active')" href="{{route("category.create")}}">Create</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item @yield('dishes-link-active')">
      <a class="nav-link" data-bs-toggle="collapse" href="#dishes" aria-expanded="false" aria-controls="dishes">
        <i class="menu-icon mdi mdi-google-circles-extended"></i>
        <span class="menu-title">Dishes</span>
        <i class="menu-arrow"></i> 
      </a>
      <div class="collapse" id="dishes">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link @yield('all-dishes-link-active')" href="{{route("dishes")}}">All</a></li>
          <li class="nav-item"> <a class="nav-link @yield('create-dish-link-active')" href="{{route("dish.create")}}">Create</a></li>
        </ul>
      </div>
    </li>
  </ul>
</nav>

@endsection