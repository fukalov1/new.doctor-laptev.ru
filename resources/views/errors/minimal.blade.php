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
    <title>@yield('title')</title>
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
            <ul>
                @guest
                    <li>
                        <a  href="{{ route('login') }}">вход</a> <span>|</span>
                    </li>
                    @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}">регистрация</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                выход
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
        <nav class="wthree-w3ls navbar-nav navbar-expand-lg navbar-light navbar-custom bg-transparent">
            <a class="navbar-brand brand-custom" href="/">Доктор Лаптев<sup>&reg;</sup></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
{{--                <ul class="navbar-nav">--}}
{{--                    @foreach($pages as $page)--}}
{{--                        @if($page->relation)--}}
{{--                            <li class="dropdown">--}}
{{--                                @if($page->redirect=='')--}}
{{--                                    @if($page->relation)--}}
{{--                                        <a href="#" class="nav-link dropdown-toggle"--}}
{{--                                           data-toggle="dropdown"--}}
{{--                                           role="button" aria-haspopup="true"--}}
{{--                                           aria-expanded="false">--}}
{{--                                            {!! $page->name  !!}--}}

{{--                                        </a>--}}
{{--                                    @else--}}
{{--                                        <a  class="nav-link" href='/{{ $page->url }}'>{!! $page->name  !!} </a>--}}
{{--                                    @endif--}}
{{--                                @else--}}
{{--                                    <a  class="nav-link" href='/{{ $page->redirect }}'>{!! $page->name  !!} </a>--}}
{{--                                @endif--}}
{{--                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">--}}
{{--                                    @foreach($page->sub_pages as $sub_page)--}}
{{--                                        @if($sub_page->redirect=='')--}}
{{--                                            <a class="dropdown-item"  href='/{{ $sub_page->url }}'>{!! $sub_page->name  !!} </a>--}}
{{--                                        @else--}}
{{--                                            <a class="dropdown-item" href='/{{ $sub_page->redirect }}'>{!! $sub_page->name  !!} </a>--}}
{{--                                        @endif--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        @else--}}
{{--                            <li class="nav-item">--}}
{{--                                @if($page->redirect=='')--}}
{{--                                    <a class="nav-link" href='/{{ $page->url }}'>{!! $page->name  !!} </a>--}}
{{--                                @else--}}
{{--                                    <a class="nav-link" href='{{ $page->redirect }}'>{!! $page->name  !!} </a>--}}
{{--                                @endif--}}
{{--                            </li>--}}
{{--                        @endif--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Главная </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/ob-avtore">Об авторе </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cities">Расписание </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            онлайн-сервис

                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/onlayn-servis/anketirovanie">Анкетирование </a>
                            <a class="dropdown-item" href="/pay-services">Сервисы </a>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Посмотреть еще

                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/articles">Статьи </a>
                            <a class="dropdown-item" href="/photo-reviews">Фото-отзывы </a>
                            <a class="dropdown-item" href="/reviews">Отзывы </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contacts">Контакты </a>
                    </li>
                </ul>
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
            <div class="error-w3pvt px-md-5 text-center">
                <h3>@yield('code')</h3>
                <h4>Страница</h4>
                <h5>@yield('message')</h5>
                <a href="/" class="btn more black error mt-4">Вернуться на главную</a>
            </div>

        </div>
    </div>
</section>
<!--//error-->

<div class="flex-center position-ref full-height">
    <div class="code">

    </div>

    <div class="message" style="padding: 10px;">

    </div>
</div>

{{--@include('layouts.footer')--}}

@include('layouts.scripts')

</body>
</html>
