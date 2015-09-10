<!DOCTYPE html>
<html class="no-js">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Heavy Art</title>

	<!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

	<link href="{{ asset('/css/style.css') }}" media="all" rel="stylesheet">

	<meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- Adding "maximum-scale=1" fixes the Mobile Safari auto-zoom bug: http://filamentgroup.com/examples/iosScaleBug/ -->

    <!-- JS -->
    <script src="{{ asset('/js/jquery-1.11.3.min.js') }}"></script>

    <!-- jquery validate -->
    <script src="{{ asset('/js/jquery.validate.min.js') }}"></script>

    <script src="{{ asset('/js/css3-mediaqueries.js') }}"></script>
    <script src="{{ asset('/js/custom.js') }}"></script>
    <script src="{{ asset('/js/tabs.js') }}"></script>

    <!-- superfish -->
    <link rel="stylesheet" media="screen" href="{{ asset('/css/superfish.css') }}" />
    <script  src="{{ asset('/js/superfish-1.4.8/js/hoverIntent.js') }}"></script>
    <script  src="{{ asset('/js/superfish-1.4.8/js/superfish.js') }}"></script>
    <script  src="{{ asset('/js/superfish-1.4.8/js/supersubs.js') }}"></script>
    <!-- ENDS superfish -->

    <!-- prettyPhoto -->
    <script  src="{{ asset('/js/prettyPhoto/js/jquery.prettyPhoto.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/js/prettyPhoto/css/prettyPhoto.css') }}"  media="screen" />
    <!-- ENDS prettyPhoto -->

    <!-- poshytip -->
    <link rel="stylesheet" href="{{ asset('/js/poshytip-1.2/src/tip-twitter/tip-twitter.css') }}"  />
    <link rel="stylesheet" href="{{ asset('/js/poshytip-1.2/src/tip-yellowsimple/tip-yellowsimple.css') }}"  />
    <script  src="{{ asset('/js/poshytip-1.2/src/jquery.poshytip.min.js') }}"></script>
    <!-- ENDS poshytip -->

    <!-- GOOGLE FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,300' rel='stylesheet' type='text/css'>

    <!-- Flex Slider -->
    <link rel="stylesheet" href="{{ asset('/css/flexslider.css') }}" >
    <script src="{{ asset('/js/jquery.flexslider-min.js') }}"></script>
    <!-- ENDS Flex Slider -->

    <!-- Less framework -->
    <link rel="stylesheet" media="all" href="{{ asset('/css/lessframework.css') }}"/>

    <!-- modernizr -->
    <script src="{{ asset('/js/modernizr.js') }}"></script>

    <!-- SKIN -->
    <link rel="stylesheet" media="all" href="{{ asset('/css/skin.css') }}"/>
    <link rel="stylesheet" media="all" href="{{ asset('/css/comments.css') }}"/>

</head>

<body>

    @include('sections.header')

    <!-- MAIN -->
    <div id="main">
	    @yield('content')
	</div>
	<!-- ENDS MAIN -->

	@include('sections.footer')
</body>
</html>
