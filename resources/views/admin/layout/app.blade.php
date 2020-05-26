<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/main.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('backend/css/font-awesome/4.7.0/css/font-awesome.min.css') }}"/>
    @yield('styles')
</head>
<body class="app sidebar-mini rtl">
@include('admin.include.header')
@include('admin.include.sidebar')

<main class="app-content">
    @yield('content')
</main>

<script src="{{ asset('backend/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('backend/js/popper.min.js') }}"></script>
<script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/js/main.js') }}"></script>
<script src="{{ asset('backend/js/plugins/pace.min.js') }}"></script>
@yield('scripts')
</body>
</html>
