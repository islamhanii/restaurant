<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Restaurant Dashboard |@yield('page-title')</title>
    
    <link rel="stylesheet" href="{{asset("vendors/feather/feather.css")}}">
    <link rel="stylesheet" href="{{asset("vendors/mdi/css/materialdesignicons.min.css")}}">
    <link rel="stylesheet" href="{{asset("vendors/ti-icons/css/themify-icons.css")}}">
    <link rel="stylesheet" href="{{asset("vendors/typicons/typicons.css")}}">
    <link rel="stylesheet" href="{{asset("vendors/simple-line-icons/css/simple-line-icons.css")}}">
    <link rel="stylesheet" href="{{asset("vendors/css/vendor.bundle.base.css")}}">
    <link rel="stylesheet" href="{{asset("js/select.dataTables.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/style.css")}}">

    <link rel="shortcut icon" href="{{asset("images/favicon.png")}}"/>
  </head>
  <body>
    @yield('page-body')

    <script src="{{asset("js/jquery-3.5.1.min.js")}}"></script>
    <script src="{{asset("js/popper.min.js")}}"></script>
    <script src="{{asset("js/bootstrap.min.js")}}"></script>
    <script src="{{asset("vendors/js/vendor.bundle.base.js")}}"></script>
    <script src="{{asset("vendors/chart.js/Chart.min.js")}}"></script>
    <script src="{{asset("vendors/bootstrap-datepicker/bootstrap-datepicker.min.js")}}"></script>
    <script src="{{asset("vendors/progressbar.js/progressbar.min.js")}}"></script>
    <script src="{{asset("js/off-canvas.js")}}"></script>
    <script src="{{asset("js/hoverable-collapse.js")}}"></script>
    <script src="{{asset("js/template.js")}}"></script>
    <script src="{{asset("js/settings.js")}}"></script>
    <script src="{{asset("js/todolist.js")}}"></script>
    <script src="{{asset("js/jquery.cookie.js")}}" type="text/javascript"></script>
    <script src="{{asset("js/dashboard.js")}}"></script>
    <script src="{{asset("js/Chart.roundedBarCharts.js")}}"></script>
  </body>
</html>

