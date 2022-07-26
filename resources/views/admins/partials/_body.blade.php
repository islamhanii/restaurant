@section('page-body')
<div class="container-scroller">
    @yield('navbar')
    
    <div class="container-fluid page-body-wrapper">
      @yield('settings')
      @yield('sidebar')

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row flex-grow">
            @yield('main')
          </div>
        </div>
        @yield('footer')
      </div>
    </div>
</div>
@endsection