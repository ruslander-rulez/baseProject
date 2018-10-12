<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield("meta-section")
    <!-- Css -->
    <link rel="stylesheet" href="{{ url("web/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ url("web/css/bootstrap-responsive.min.css") }}">
    <link rel="stylesheet" href="{{ url("web/css/owl.carousel.css") }}">
    <link rel="stylesheet" href="{{ url("web/css/style.css") }}">
    <link rel="stylesheet" href="{{ url("web/css/responsive.css") }}" media="screen and (max-width: 1190px)">
    @yield("setyle-section")

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <script src="{{ url("web/js/bootstrap.min.js") }}"></script>
    <script src="{{ url("web/js/owl.carousel.min.js") }}"></script>
    <script src="{{ url("web/js/script.js") }}"></script>

    @yield("metrics")
</head>
<body>
@include("web.layout.header")

@yield("pageContent")

@include("web.layout.footer")

@yield("script-section")
</body>
</html>