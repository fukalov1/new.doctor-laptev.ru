<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!--Start nav  area -->
<div class="nav_area" id="sticker">
    <div class="container">
        <div class="row">
            <!--logo area-->
            <div class="col-md-3 col-sm-3 col-xs-4">
                <div class="logo"><a href="/"><img src="/img/logo.png" alt="" /></a></div>
            </div>
            <!--end logo area-->
            <!--nav area-->
            <div class="col-md-7 col-sm-7 col-xs-6">
                <!--  nav menu-->
                <nav class="menu">
                    <ul class="navid">
                        @foreach($pages as $page)
                            @if($page->relation)
                                <li class="menu-item-has-children">
                                    @if($page->redirect=='')
                                        @if($page->relation)
                                            <span>
                                        {!! $page->name  !!}
                                    </span>
                                        @else
                                            <a href='/{{ $page->url }}'>{!! $page->name  !!} </a>
                                        @endif
                                    @else
                                        <a href='/{{ $page->redirect }}'>{!! $page->name  !!} </a>
                                    @endif
                                    <ul class="sub-menu">
                                        @foreach($page->sub_pages as $sub_page)
                                            @if($sub_page->redirect=='')
                                                <li><a href='/{{ $sub_page->url }}'>{!! $sub_page->name  !!} </a></li>
                                            @else
                                                <li><a href='/{{ $sub_page->redirect }}'>{!! $sub_page->name  !!} </a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li>
                                    @if($page->redirect=='')
                                        <a href='/{{ $page->url }}'>{!! $page->name  !!} </a>
                                    @else
                                        <a href='{{ $page->redirect }}'>{!! $page->name  !!} </a>
                                    @endif
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </nav>
                <!--end  nav menu-->
                <!--moblie menu area-->
                <div class="dropdown mabile_menu">
                    <a data-toggle="dropdown" class="mobile-menu" href="#"><span>  </span><i class="fa fa-bars"></i></a>
                    <ul class="dropdown-menu mobile_menus drop_mobile navid">
                        @foreach($pages as $page)
                            @if($page->relation)
                                <li class="menu-item-has-children">
                                    @if($page->redirect=='')
                                        @if($page->relation)
                                            <span>
                                                {!! $page->name  !!}
                                            </span>
                                        @else
                                            <a href='/{{ $page->url }}'>{!! $page->name  !!} </a>
                                        @endif
                                    @else
                                        <a href='{{ $page->redirect }}'>{!! $page->name  !!} </a>
                                    @endif
                                    <ul class="sub-menu">
                                        @foreach($page->sub_pages as $sub_page)
                                            @if($sub_page->redirect=='')
                                                <li><a href='/{{ $sub_page->url }}'>{!! $sub_page->name  !!} </a></li>
                                            @else
                                                <li><a href='/{{ $sub_page->redirect }}'>{!! $sub_page->name  !!} </a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li>
                                    @if($page->redirect=='')
                                        <a href='/{{ $page->url }}'>{!! $page->name  !!} </a>
                                    @else
                                        <a href='/{{ $page->redirect }}'>{!! $page->name  !!} </a>
                                    @endif
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <!--end moblie menu-->
            </div>
            <!--end nav area-->
            <div class="col-md-2 col-sm-2 col-xs-12 text-right header-phone">
               <a href="tel:{{ $phone }}">
                {{ $phone }}
               </a>
            </div>
        </div>
    </div>
</div>
<!--end header  area -->
