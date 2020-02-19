<!--/top-nav -->
<div class="top_w3pvt_main container">
    <!--/header -->
    <header class="nav_w3pvt text-center ">

        <nav class="wthree-w3ls navbar-nav navbar-expand-lg navbar-light navbar-custom bg-transparent">
            <a class="navbar-brand" href="#">ДОКТОР ЛАПТЕВ</a>
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
                        <li class="social-icons ml-lg-3"><a href="#" class="p-0 social-icon"><span class="fa fa-facebook-official" aria-hidden="true"></span>
                                <div class="tooltip">Facebook</div>
                            </a> </li>
                        <li class="social-icons"><a href="#" class="p-0 social-icon"><span class="fa fa-twitter" aria-hidden="true"></span>
                                <div class="tooltip">Twitter</div>
                            </a> </li>
                        <li class="social-icons"><a href="#" class="p-0 social-icon"><span class="fa fa-instagram" aria-hidden="true"></span>
                                <div class="tooltip">Instagram</div>
                            </a> </li>

                </ul>
            </div>
        </nav>


        <!-- nav -->
{{--        <nav class="wthree-w3ls">--}}
{{--            <div id="logo">--}}
{{--                <h1>--}}
{{--                    <a class="navbar-brand px-0 mx-0" href="index.html">--}}
{{--                        ДОКТОР ЛАПТЕВ--}}
{{--                    </a>--}}
{{--                </h1>--}}
{{--            </div>--}}

{{--            <label for="drop" class="toggle">Menu</label>--}}
{{--            <input type="checkbox" id="drop" />--}}
{{--            <ul class="menu mr-auto">--}}
{{--                @foreach($pages as $page)--}}
{{--                    @if($page->relation)--}}
{{--                        <li>--}}
{{--                            @if($page->redirect=='')--}}
{{--                                @if($page->relation)--}}
{{--                                    <label for="drop-{{ $page->id }}" class="toggle toggle-{{ $page->id }}">{!! $page->name  !!}--}}
{{--                                        <span class="fa fa-angle-down" aria-hidden="true"></span>--}}
{{--                                    </label>--}}
{{--                                    <a href="#">{!! $page->name  !!}--}}
{{--                                        <span class="fa fa-angle-down" aria-hidden="true"></span></a>--}}
{{--                                        <input type="checkbox" id="drop-{{ $page->id }}" />--}}
{{--                                @else--}}
{{--                                    <a href='/{{ $page->url }}'>{!! $page->name  !!} </a>--}}
{{--                                @endif--}}
{{--                            @else--}}
{{--                                <a href='/{{ $page->redirect }}'>{!! $page->name  !!} </a>--}}
{{--                            @endif--}}
{{--                            <ul>--}}
{{--                                @foreach($page->sub_pages as $sub_page)--}}
{{--                                    @if($sub_page->redirect=='')--}}
{{--                                        <li><a href='/{{ $sub_page->url }}'>{!! $sub_page->name  !!} </a></li>--}}
{{--                                    @else--}}
{{--                                        <li><a href='/{{ $sub_page->redirect }}'>{!! $sub_page->name  !!} </a></li>--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                    @else--}}
{{--                        <li>--}}
{{--                            @if($page->redirect=='')--}}
{{--                                <a href='/{{ $page->url }}'>{!! $page->name  !!} </a>--}}
{{--                            @else--}}
{{--                                <a href='{{ $page->redirect }}'>{!! $page->name  !!} </a>--}}
{{--                            @endif--}}
{{--                        </li>--}}
{{--                    @endif--}}
{{--                @endforeach--}}
{{--                <li class="active"><a href="index.html">Home</a></li>--}}
{{--                <li><a href="about.html">About</a></li>--}}
{{--                <li>--}}
{{--                    <!-- First Tier Drop Down -->--}}
{{--                    <label for="drop-2" class="toggle toggle-2">Pages <span class="fa fa-angle-down" aria-hidden="true"></span> </label>--}}
{{--                    <a href="#">Pages  <span class="fa fa-angle-down" aria-hidden="true"></span></a>--}}
{{--                    <input type="checkbox" id="drop-2" />--}}
{{--                    <ul>--}}

{{--                        <li><a href="services.html" class="drop-text">Services</a></li>--}}
{{--                        <li><a href="timeline.html" class="drop-text">Timeline</a></li>--}}
{{--                        <li><a href="team.html" class="drop-text">Team</a></li>--}}
{{--                        <li><a href="typo.html" class="drop-text">Typography</a></li>--}}
{{--                        <li><a href="error.html" class="drop-text">404</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li><a href="#gallery">Projects</a></li>--}}
{{--                <li><a href="contact.html">Contact</a></li>--}}

{{--            </ul>--}}
{{--        </nav>--}}
        <!-- //nav -->
    </header>
    <!--//header -->
</div>
<!-- //top-nav -->

