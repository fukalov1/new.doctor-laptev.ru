<!--/top-nav -->
<div class="top_w3pvt_main container">
    <!--/header -->
    <header class="nav_w3pvt text-center ">

        <nav class="wthree-w3ls navbar-nav navbar-expand-lg navbar-light navbar-custom bg-transparent">
            <a class="navbar-brand brand-custom" href="/">Доктор Лаптев<sup>&reg;</sup></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    @foreach($pages as $page)
                        @if($page->relation)
                            <li class="dropdown">
                                @if($page->redirect=='')
                                    @if($page->relation)
                                        <a href="#" class="nav-link dropdown-toggle"
                                           data-toggle="dropdown"
                                           role="button" aria-haspopup="true"
                                           aria-expanded="false">
                                            {!! $page->name  !!}

                                        </a>
                                    @else
                                        <a  class="nav-link" href='/{{ $page->url }}'>{!! $page->name  !!} </a>
                                    @endif
                                @else
                                    <a  class="nav-link" href='/{{ $page->redirect }}'>{!! $page->name  !!} </a>
                                @endif
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    @foreach($page->sub_pages as $sub_page)
                                        @if($sub_page->redirect=='')
                                            <a class="dropdown-item"  href='/{{ $sub_page->url }}'>{!! $sub_page->name  !!} </a>
                                        @else
                                            <a class="dropdown-item" href='/{{ $sub_page->redirect }}'>{!! $sub_page->name  !!} </a>
                                        @endif
                                    @endforeach
                                </div>
                            </li>
                        @else
                            <li class="nav-item">
                                @if($page->redirect=='')
                                    <a class="nav-link" href='/{{ $page->url }}'>{!! $page->name  !!} </a>
                                @else
                                    <a class="nav-link" href='{{ $page->redirect }}'>{!! $page->name  !!} </a>
                                @endif
                            </li>
                        @endif
                    @endforeach
{{--                        <li class="social-icons ml-lg-3"><a href="#" class="p-0 social-icon"><span class="fa fa-facebook-official" aria-hidden="true"></span>--}}
{{--                                <div class="tooltip">Facebook</div>--}}
{{--                            </a> </li>--}}
{{--                        <li class="social-icons"><a href="#" class="p-0 social-icon"><span class="fa fa-twitter" aria-hidden="true"></span>--}}
{{--                                <div class="tooltip">Twitter</div>--}}
{{--                            </a> </li>--}}
{{--                        <li>--}}
{{--                            @if(Auth::check())--}}
{{--                                <a class="nav-link" href='/logout'> выход </a>--}}
{{--                            @else--}}
{{--                                <a class="nav-link" href="{{ route('register') }}">вход</a>--}}
{{--                            @endif--}}
{{--                        </li>--}}
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">вход</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">регистрация</a>
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
        </nav>
    </header>
    <!--//header -->
</div>
<!-- //top-nav -->

