<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Touché</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="{{asset("restaurant/images/favicon.ico")}}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{asset("restaurant/images/apple-touch-icon.png")}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset("restaurant/images/apple-touch-icon-72x72.png")}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset("restaurant/images/apple-touch-icon-114x114.png")}}">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{asset("restaurant/css/bootstrap.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("restaurant/fonts/font-awesome/css/font-awesome.css")}}">

    <!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css" href="{{asset("restaurant/css/style.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("restaurant/css/nivo-lightbox/nivo-lightbox.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("restaurant/css/nivo-lightbox/default.css")}}">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <!-- Navigation
    ==========================================-->
    <nav id="menu" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a class="navbar-brand page-scroll" href="{{route("restaurant.home")}}">Touché</a> </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{route("restaurant.home")}}" class="page-scroll">Home</a></li>
                    <li><a href="{{route("restaurant.menu")}}" class="page-scroll">Menu</a></li>
                    <li><a href="{{route("restaurant.gallery")}}" class="page-scroll">Gallery</a></li>
                    <li><a href="{{route("restaurant.chefs")}}" class="page-scroll">Chefs</a></li>
                    <li><a href="{{route("restaurant.contact")}}" class="page-scroll">Contact</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
    </nav>

    @yield('page-body')

    <!-- Contact Section -->
    <div id="contact" class="text-center">
        <div class="container">
            <div class="section-title text-center">
                <h2>Contact Form</h2>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit duis sed.</p>
            </div>
            <div class="col-md-10 col-md-offset-1">
                <form method="POST" action="{{route("contact.store")}}">
                    @if(Session::has('success'))
                        <div class="col-12 mb-2 alert-success rounded-3 p-2">
                            <p class="mb-0 lh-base">{{Session::get('success')}}</p>
                        </div>
                    @endif

                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Name" name="name" value="{{old('name')?old('name'):''}}">
                                @error('name')
                                <p class="help-block text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email" name="email" value="{{old('email')?old('email'):''}}">
                                @error('email')
                                <p class="help-block text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="message" class="form-control" rows="4" placeholder="Message">{{old('message')?old('message'):''}}</textarea>
                        @error('message')
                        <p class="help-block text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div id="success"></div>
                    <button type="submit" class="btn btn-custom btn-lg">Send Message</button>
                </form>
            </div>
        </div>
    </div>


    <div id="footer">
        <div class="container text-center">
            <div class="col-md-4">
                <h3>Address</h3>
                <div class="contact-item">
                    <p>4321 California St,</p>
                    <p>San Francisco, CA 12345</p>
                </div>
            </div>
            <div class="col-md-4">
                <h3>Opening Hours</h3>
                <div class="contact-item">
                    <p>Mon-Thurs: 10:00 AM - 11:00 PM</p>
                    <p>Fri-Sun: 11:00 AM - 02:00 AM</p>
                </div>
            </div>
            <div class="col-md-4">
                <h3>Contact Info</h3>
                <div class="contact-item">
                    <p>Phone: +1 123 456 1234</p>
                    <p>Email: info@company.com</p>
                </div>
            </div>
        </div>
        <div class="container-fluid text-center copyrights">
            <div class="col-md-8 col-md-offset-2">
                <div class="social">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
                <p>&copy; 2016 Touché. All rights reserved. Designed by <a href="http://www.templatewire.com" rel="nofollow">TemplateWire</a></p>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{asset("restaurant/js/jquery.1.11.1.js")}}"></script>
    <script type="text/javascript" src="{{asset("restaurant/js/bootstrap.js")}}"></script>
    <script type="text/javascript" src="{{asset("restaurant/js/SmoothScroll.js")}}"></script>
    <script type="text/javascript" src="{{asset("restaurant/js/nivo-lightbox.js")}}"></script>
    <script type="text/javascript" src="{{asset("restaurant/js/jquery.isotope.js")}}"></script>
    <script type="text/javascript" src="{{asset("restaurant/js/jqBootstrapValidation.js")}}"></script>
    <script type="text/javascript" src="{{asset("restaurant/js/main.js")}}"></script>
</body>

</html>