<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>@yield('title')</title>

	<!-- Site favicon -->
	<!-- <link rel="shortcut icon" href="images/favicon.ico"> -->
    <link rel="icon" type="images/ico" href="https://ejournal.undip.ac.id/plugins/themes/mpgUndip/templates/images/favicon.ico" />

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" href="{{url('dashboard/vendors/styles/style.css')}}">
    @yield('css')
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-119386393-1');
	</script>
</head>
<body>
@yield('header')
@yield('sidebar')
<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
                    @yield('konten')
                </div>
            </div>
        @yield('footer')
        </div>
    </div>
</body>
	<script src="{{url('dashboard/vendors/scripts/script.js')}}"></script>
@yield('script')
</html>


