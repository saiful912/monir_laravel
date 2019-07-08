<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
       @yield('title',' Laravel Ecommerce Project')
    </title>
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
{{--navbar--}}
@include('frontend.partials.nav')
@yield('main')

<footer class="footer-bottom">
    <p class="text-center">&copy; 2019 All rights reserved | Ecommerce site</p>
</footer>



<script src="{{mix('js/app.js')}}"></script>

</body>
</html>