<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> @yield('title') </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('public/css/bootstrap.min.css')}}">
    </head>
    <body class="p-5">
    @include('common.navbar') <br><br>
    <div class="container-fluid">
        @yield('data');
    </div>
    @include('common.footer')