<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if lt IE 7 ]> <html lang="en" class="ie6">    <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7">    <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8">    <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9">    <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $data->title  }}</title>
    <meta name="description" content="{{ $data->description }}" />
    <meta name="keywords" content="{{ $data->keywords }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('layouts.styles')

</head>
<body>
<div id="app">
@include('layouts.header')

    @yield('content')

@include('layouts.footer')

@include('layouts.scripts')
</div>
</body>
</html>
