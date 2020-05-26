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
                        <a class="dropdown-item" href="{{ route('user-profile') }}">
                            профиль
                        </a>
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
            <a class="navbar-brand brand-custom" id="home" href="/">Доктор Лаптев<sup>&reg;</sup></a>
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
                </ul>
            </div>
        </nav>
    </header>
    <!--//header -->
</div>
<!-- //top-nav -->

