<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('judul')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{url('home/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('home/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('home/css/global-style.css')}}">
    <link rel="stylesheet" href="{{url('home/css/assets/navbar.css')}}">
    <link rel="icon" type="images/ico" href="https://ejournal.undip.ac.id/plugins/themes/mpgUndip/templates/images/favicon.ico" />
    @yield('css')
</head>
<body>
    <header class="bg_f8f fire_header1 header_common">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="{{url('/')}}"><img src="{{url('img/undip.png')}}" style="width:50%" alt="logo"></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbar1" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                        <div class="collapse navbar-collapse" id="navbar1">
                            <ul class="navbar-nav ml-auto">
                                <li class="active"><a href="{{url('/')}}">Beranda</a></li>
                                <li><a href="{{url('/login')}}">Login</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
        @yield('konten')
    <footer class="fixed-bottom">
        <div class="container">
            <p align="center">&nbsp; Departemen Teknik Komputer {{date('Y')}}</p>
        </div>
    </footer>
</body>
    <script type="text/javascript" src="{{url('home/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{url('home/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{url('home/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{url('home/js/main.js')}}"></script>
</html>
