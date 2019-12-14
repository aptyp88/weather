<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @if(request()->path() == '/')
        <script src="{{asset('js/libs/jquery-birthday-picker.js')}}" defer></script>
    @endif

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css">

    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

    {{--favicon--}}
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
</head>
<body>


@include('layouts.header')

<div class="wrap-content">
    @yield('content')
</div>

{{--@include('layouts.footer')--}}


</body>
</html>