<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
       @yield('title',' Laravel Ecommerce Project')
    </title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}?var=1.1">
</head>
<body>
{{--navbar--}}
@include('frontend.partials.nav')
@include('backend.partials.message')
@yield('main')

<footer class="footer-bottom">
    <p class="text-center">&copy; 2019 All rights reserved | Ecommerce site</p>
</footer>



<script src="{{mix('js/app.js')}}"></script>
@yield('scripts')

</body>
</html>