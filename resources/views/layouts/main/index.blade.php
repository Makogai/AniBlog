<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AniBlog</title>
    <link rel="stylesheet" href="{{asset("font/custom.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("front/styles/bootstrap4/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("adminlte/plugins/fontawesome-free/css/all.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("front/plugins/OwlCarousel2-2.2.1/owl.carousel.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("front/plugins/OwlCarousel2-2.2.1/owl.theme.default.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("front/plugins/OwlCarousel2-2.2.1/animate.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("front/plugins/jquery.mb.YTPlayer-3.1.12/jquery.mb.YTPlayer.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("front/styles/main_styles.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("front/styles/responsive.css")}}">
@yield('css')

</head>
<body>
<div class="super_container">


    @include('layouts.main.navbar')

    @yield('content')

    @include('layouts.main.footer')


</div>

<script src="{{asset("front/js/jquery-3.2.1.min.js")}}"></script>
<script src="{{asset("front/styles/bootstrap4/popper.js")}}"></script>
<script src="{{asset("front/styles/bootstrap4/bootstrap.min.js")}}"></script>
<script src="{{asset("front/plugins/OwlCarousel2-2.2.1/owl.carousel.js")}}"></script>
<script src="{{asset("front/plugins/jquery.mb.YTPlayer-3.1.12/jquery.mb.YTPlayer.js")}}"></script>
<script src="{{asset("front/plugins/easing/easing.js")}}"></script>
<script src="{{asset("front/plugins/masonry/masonry.js")}}"></script>
<script src="{{asset("front/plugins/masonry/images_loaded.js")}}"></script>
<script src="{{asset("front/js/custom.js")}}"></script>
@yield("js")
</body>
</html>
