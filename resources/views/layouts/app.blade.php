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
    <title>{{ config('app.name', 'Laravel') }}</title>
{{--    <meta name="description" content="{{ $data->description }}" />--}}
{{--    <meta name="keywords" content="{{ $data->keywords }}"/>--}}
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('layouts.styles')

</head>
<body>


    <div id="app">
        @include('layouts.header')

        <div class="fill-top">

        </div>

        <section class="about pt-5">
            <div class="container p-md-3">
            </div>
            <div class="container p-md-5">
            @yield('content')
            </div>
        </section>
    </div>



    @include('layouts.footer')
    @include('layouts.scripts')

</body>
</html>
