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
    <title>Доктор лаптев</title>
    {{--    <meta name="description" content="{{ $data->description }}" />--}}
    {{--    <meta name="keywords" content="{{ $data->keywords }}"/>--}}
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('layouts.styles')

</head>
<body>

<!--/top-nav -->
<div class="top_w3pvt_main container">
    <!--/header -->
    <header class="nav_w3pvt text-center ">

        <div class="col-md-12 nav-auth text-right">

        </div>
        <nav class="wthree-w3ls navbar-nav navbar-expand-lg navbar-light navbar-custom bg-transparent">
            <a class="navbar-brand brand-custom" href="/">Доктор Лаптев<sup>&reg;</sup></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
            </div>
        </nav>
    </header>
    <!--//header -->
</div>
<!-- //top-nav -->

<div class="fill-top">

</div>
<div class="container p-md-3">
</div>


<!--/error -->
<section class="about py-5">
    <div class="container p-md-5">
        <div class="about-hny-info text-left px-md-5">
            <div class="px-md-5 text-center">
                <h3></h3>
                <h4>Доктор Лаптев</h4>

                    <div class="container py-md-5">
                        <h3>
                            {{ $text  }}
                            <br/> Через 10 секунд Вы будете перенаправлены на главную страницу
                            <meta http-equiv="refresh" content="10;URL=/">
                        </h3>
                    </div>
            </div>

        </div>
    </div>
</section>
<!--//error-->



</body>
</html>
