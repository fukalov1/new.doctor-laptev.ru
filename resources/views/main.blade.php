@extends('layouts.page')


@section('content')

    <div id="home">

        @foreach($page_blocks as $page_block)
            @if($page_block->type == '1')
                <!-- about -->
                    <section class="about py-5">
                        <div class="container p-md-5">
                            <div class="about-hny-info text-left px-md-5">
                                <h3 class="tittle-w3ls mb-3">{{ $page_block->header }}</h3>
                                <p class="sub-tittle mt-3 mb-4"> {!! $page_block->text !!}</p>
{{--                                <a class="btn more black" href="single.html" role="button">Читать больше</a>--}}
                            </div>
                        </div>
                    </section>
                    <!-- //about -->

            @elseif($page_block->type=='2')
                    <section class="banner_bottom py-5">
                        <div class="container py-md-5">
                            <div class="row inner_sec_info">

                                <div class="col-md-6 banner_bottom_grid help">
                                    <img src="{{ asset('/uploads/'.$page_block->image) }}" alt=" " class="img-fluid">
                                </div>
                                <div class="col-md-6 banner_bottom_left mt-lg-0 mt-4">
                                    <h4><a class="link-hny" href="services.html">
                                            {{ $page_block->header }}</a></h4>
                                    {!! $page_block->text !!}
                                    <a class="btn more black mt-3" href="services.html" role="button">Подробнее</a>

                                </div>
                            </div>
                        </div>
                    </section>

            @elseif($page_block->type=='3')
                {!! $page_block->text !!}
            @elseif($page_block->type=='4')
                <section class="page-block-doc" id="block{{$page_block->id}}">
                    <div class="container">
                        <h1>{{ $page_block->header }}</h1>
                        {!! $page_block->text !!}
                    </div>
                </section>
            @elseif($page_block->type=='5')
                <section class="page-block-link" id="block{{$page_block->id}}">
                    <div class="container">
                        <h1>{{ $page_block->header }}</h1>
                        {!! $page_block->text !!}
                    </div>
                </section>
            @elseif($page_block->type=='6')
                <section class="page-block-pdf" id="block{{$page_block->id}}">
                    <div class="container">
                        <h1>{{ $page_block->header }}</h1>
                        {!! $page_block->text !!}
                    </div>
                </section>
            @elseif($page_block->type=='7')

            <!-- banner slider -->
                <div id="homepage-slider" class="st-slider">
                    <input type="radio" class="cs_anchor radio" name="slider" id="play1" checked="" />
                    @foreach($page_block->sliders as $slider)
                        @foreach($slider->items as $item)
                            <input type="radio" class="cs_anchor radio" name="slider" id="slide{{ $item->id }}" />
                        @endforeach
                    @endforeach
                    <div class="images">
                        <div class="images-inner">
                            @foreach($page_block->sliders as $slider)
                                @foreach($slider->items as $item)
                                    <div class="image-slide">
                                        <div class="banner-w3pvt-{{ $item->id }}"
                                             style="background: url({{ asset('/uploads/'.$item->image) }}) no-repeat top;">
                                            <div class="overlay-w3ls">

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach

                        </div>
                    </div>
                    <div class="labels">
                        <div class="fake-radio">
                            @foreach($page_block->sliders as $slider)
                                @foreach($slider->items as $item)
                                    <label for="slide{{ $item->id }}" class="radio-btn"></label>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                    <!-- banner-hny-info -->
                    <div class="banner-hny-info">
                        <h3>СОЗДАЕМ НОВОЕ
                            <br>ПИЩЕВОЕ ПОВЕДЕНИЕ</h3>
                        <div class="top-buttons mx-auto text-center mt-md-5 mt-3">
                            <a href="/ob-avtore/moy-trenning" class="btn more mr-2">Подробнее</a>
                            <a href="/onlayn-servis" class="btn">Записаться</a>
                        </div>
                        <div class="d-flex hny-stats-inf">
                            <div class="col-md-4 stats_w3pvt_counter_grid mt-3">
                                <div class="d-md-flex justify-content-center">
                                    <h5 class="counter">{{ config('practic_years') }}</h5>
                                    <p class="para-w3pvt">лет практики</p>
                                </div>
                            </div>
                            <div class="col-md-4 stats_w3pvt_counter_grid mt-3">
                                <div class="d-md-flex justify-content-center">
                                    <h5 class="counter">{{ config('trennings') }}</h5>
                                    <p class="para-w3pvt">тренингов</p>
                                </div>
                            </div>
                            <div class="col-md-4 stats_w3pvt_counter_grid mt-3">
                                <div class="d-md-flex justify-content-center">
                                    <h5 class="counter">{{ config('clients') }}</h5>
                                    <p class="para-w3pvt">клиентов</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- //banner-hny-info -->
                </div>
                <!-- //banner slider -->

            @elseif($page_block->type=='8')
                    {!! $page_block->text !!}
    @elseif($page_block->type=='9')
        @foreach($page_block->photosets as $photoset)
            <section id="photo-gallery">
                <div class="container" id="block{{ $page_block->id }}">
                    <h2>{{ $photoset->name }}</h2>
                    <div class="wrapper flex">
                        @foreach($photoset->photos as $photo)
                            <div class="image-preview">
                                <div class="photo-gallery-item">
                                    <a href="/uploads/images/{{$photo->image}}" class="modalbox">
                                        <img src="/uploads/images/thumbnail/{{$photo->image}}" alt="">
                                    </a>

                                    <div class="title">
                                        {{ $photo->name }}
                                    </div>
                                    @if($photo->text!='')
                                        <div class="title">
                                            {{ $photo->text }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endforeach
    @elseif($page_block->type=='10')
        @foreach($page_block->mail_forms as $item)
            <section class="mail-form" id="block{{ $page_block->id }}">
                <div class="container form-area{{ $item->id }}">
                    <h2>{{ $item->name }}</h2>
                    {!! $page_block->text  !!}
                    <form id="sendform{{ $item->id }}" class="send-form" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            @foreach($item->fields as $field)
                                <div class="col4">
                                    <input type="text" class="form-control {{ $field->field_name }}" rel="{{ $field->field_name }}"
                                           id="{{ $field->field_name }}{{ $item->id }}"
                                           name="{{ $field->field_name }}"
                                           required
                                           placeholder="{{ $field->field_value }}">
                                </div>
                            @endforeach
                        </div>
                        <div class="form-textarea">
                                    <textarea name="message{{ $item->id }}" id="message{{ $item->id }}"
                                              placeholder="Комментарий…"></textarea>
                        </div>
                        <div class="text-center">
                            <button type="button" class="submit-button" rel="{{ $item->id }}">Отправить</button>
                        </div>
                        <div class="clearfix"></div>
                        <input type="hidden" name="uid" value="{{ $item->id }}">
                    </form>
                </div>
            </section>
        @endforeach
   @elseif($page_block->type=='11')
        @foreach($page_block->photo_reviews as $item)
            <!-- /projects -->
            <section class="projects py-5" id="block{{ $page_block->id }}">
                            <div class="container py-md-5">
                                <h3 class="tittle-w3ls text-left mb-5"><span class="pink">Потрясающие</span> результаты!</h3>
                                <div class="row news-grids mt-md-5 mt-4 text-center">
                                    @foreach($item->items as $item)
                                        <div class="col-md-4 gal-img">
                                        <a href="#gal1"><img src="{{ asset('uploads/images/thumbnail/'.$item->image) }}" alt="w3pvt" class="img-fluid"></a>
                                        <div class="gal-info">
                                            <h5>{{ $item->title }}<span class="decription">{{ $item->text }}</span></h5>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- popup-->
                                @foreach($item->items as $item)
                                <div id="gal1" class="pop-overlay">
                                    <div class="popup">
                                        <img src="{{ asset('uploads/images/thumbnail/'.$item->image) }}" alt="Popup Image" class="img-fluid" />
                                        <p class="mt-4">{{ $item->text }}</p>
                                        <a class="close" href="#gallery">&times;</a>
                                    </div>
                                </div>
                                @endforeach
                                <!-- //popup -->
                            </div>
                        </section>
            <!-- //projects -->

        @endforeach
    @endif
    @endforeach


    </div>
    <!-- //banner -->

    <!-- //home -->

    <!--/ab-->
    <section class="banner_bottom py-5">
        <div class="container py-md-5">
            <div class="row features-w3pvt-main" id="features">
                <div class="col-md-4 feature-gird">
                    <div class="row features-hny-inner-gd">
                        <div class="col-md-3 featured_grid_left">
                            <div class="icon_left_grid">
                                <span class="fa fa-globe" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="col-md-9 featured_grid_right_info pl-lg-0">
                            <h4><a class="link-hny" href="single.html">Онлайн-сервисы</a></h4>
                            <p>Эта услуга дает возможность перезапустить программу, продлить программу, выполнить дополнительный питьевой режим или приступить к выполнению программы через некоторое время после основного тренинга.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 feature-gird">
                    <div class="row features-hny-inner-gd">
                        <div class="col-md-3 featured_grid_left">
                            <div class="icon_left_grid">
                                <span class="fa fa-laptop" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="col-md-9 featured_grid_right_info pl-lg-0">
                            <h4><a class="link-hny" href="single.html">Нейромозговые карты</a></h4>
                            <p>Лаптев Андрей Викторович создаёт для своих клиентов удивительные картины. Источником вдохновения становятся мозговые волны, которые вырабатывает мозг доктора во время суггестивной фиксации или в момент максимального психоэмоционального напряжения при проведении сеансов.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 feature-gird">
                    <div class="row features-hny-inner-gd">
                        <div class="col-md-3 featured_grid_left">
                            <div class="icon_left_grid">
                                <span class="fa fa-handshake-o" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="col-md-9 featured_grid_right_info pl-lg-0">
                            <h4><a class="link-hny" href="single.html">Восстанавливающий сеанс</a></h4>
                            <p>Lorem Ipsum is simply text the printing and typesetting standard industry.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--//ab-->

    <!--/services-->
    <section class="services" id="services">
        <div class="over-lay-blue py-5">
            <div class="container py-md-5">
                <div class="row my-4">
                    <div class="col-lg-5 services-innfo pr-5">
                        <h3 class="tittle-w3ls two mb-3 text-left"><span class="pink">Мой</span> арсенал</h3>
                        <p class="sub-tittle mt-2 mb-sm-3 text-left">Современные психотехники и авторские разработки.</p>
                        <a href="services.html"><img src="images/ab2.jpg" alt="w3pvt" class="img-fluid"></a>
                    </div>
                    <div class="col-lg-7 services-grid-inf">
                        <div class="row services-w3pvt-main mt-5">
                            <div class="col-lg-6 feature-gird">
                                <div class="row features-hny-inner-gd mt-3">
                                    <div class="col-md-2 featured_grid_left">
                                        <div class="icon_left_grid">
{{--                                            <span class="fa fa-paint-brush" aria-hidden="true"></span>--}}
                                        </div>
                                    </div>
                                    <div class="col-md-10 featured_grid_right_info">
                                        <h4><a class="link-hny" href="single.html">Суггестивные формулы</a></h4>
                                        <p>Lorem Ipsum is simply text the printing and typesetting standard industry.</p>

                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6 feature-gird">
                                <div class="row features-hny-inner-gd mt-3">
                                    <div class="col-md-2 featured_grid_left">
                                        <div class="icon_left_grid">
{{--                                            <span class="fa fa-bullhorn" aria-hidden="true"></span>--}}
                                        </div>
                                    </div>
                                    <div class="col-md-10 featured_grid_right_info">
                                        <h4><a class="link-hny" href="single.html">Снятие зажимов</a></h4>
                                        <p>Lorem Ipsum is simply text the printing and typesetting standard industry.</p>

                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="row services-w3pvt-main mt-5">
                            <div class="col-lg-6 feature-gird ">
                                <div class="row features-hny-inner-gd mt-3">
                                    <div class="col-md-2 featured_grid_left">
                                        <div class="icon_left_grid">
{{--                                            <span class="fa fa-shield" aria-hidden="true"></span>--}}
                                        </div>
                                    </div>
                                    <div class="col-md-10 featured_grid_right_info">
                                        <h4><a class="link-hny" href="single.html">Рефрейминг</a></h4>
                                        <p>Lorem Ipsum is simply text the printing and typesetting standard industry.</p>

                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6 feature-gird">
                                <div class="row features-hny-inner-gd mt-3">
                                    <div class="col-md-2 featured_grid_left">
                                        <div class="icon_left_grid">
{{--                                            <span class="fa fa-lightbulb-o" aria-hidden="true"></span>--}}
                                        </div>
                                    </div>
                                    <div class="col-md-10 featured_grid_right_info">
                                        <h4><a class="link-hny" href="single.html">Психопластика желудка</a></h4>
                                        <p>Lorem Ipsum is simply text the printing and typesetting standard industry.</p>

                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//services-->

        <section class="projects py-5" id="gallery">
                <div class="container py-md-5">
                    <h3 class="tittle-w3ls text-left mb-5"><span class="pink">Потрясающие</span> результаты!</h3>
                    <div class="row news-grids mt-md-5 mt-4 text-center">
                        @foreach($main_photo_review as $item)
                            <div class="col-md-4 gal-img">
                                <a href="#gal{{ $item->id }}">
                                    <div class="img-dbl">
                                        <img src="{{ asset('uploads/images/thumbnail/'.$item->image) }}"
                                                     alt="w3pvt" class="img-fluid">
                                        <img src="{{ asset('uploads/images/thumbnail/'.$item->image1) }}"
                                                     alt="w3pvt" class="img-fluid">
                                    </div>
                                </a>
                                <div class="gal-info">
                                    <h5>{{ $item->title }}<span class="decription">{!!  $item->text !!}</span></h5>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- popup-->
                    @foreach($main_photo_review as $item)
                        <div id="gal{{ $item->id }}" class="pop-overlay">
                            <div class="popup">
                                <img src="{{ asset('uploads/images/'.$item->image) }}" alt="Popup Image"
                                     class="img-fluid" width="30%"/>
                                <img src="{{ asset('uploads/images/'.$item->image1) }}" alt="Popup Image"
                                     class="img-fluid" width="30%"/>
                                <img src="{{ asset('uploads/images/'.$item->image2) }}" alt="Popup Image"
                                     class="img-fluid" width="30%"/>
                                <p class="mt-4">{{ $item->text }}</p>
                                <a class="close" href="#gallery">&times;</a>
                            </div>
                        </div>
                    @endforeach
                <!-- //popup -->
                    <div class="text-right">
                        <a class="btn more black" href="/photo-reviews" role="button">Смотреть еще</a>
                    </div>
                </div>
            <!-- //projects -->
        </section>

    <!-- /blogs -->
    <section class="blog-posts" id="blog">
        <div class="blog-w3pvt-info-content container-fluid">
            <h3 class="tittle-w3ls text-center mb-5">Полезная информация</h3>

            <div class="blog-grids-main row text-left">
                @foreach($main_article as $item)
                    @if($loop->iteration<3)
                <div class="col-lg-3 col-md-6 blog-grid-img px-0">
                    <img src="{{ asset('uploads/images/thumbnail/'.$item->image) }}" alt="Popup Image" class="img-fluid" />
                </div>
                <div class="col-lg-3 col-md-6 blog-grid-info px-0">
                    <div class="date-post">
                        <h6 class="date">
{{--                            {{ $item->created_at }}--}}
                        </h6>
                        <h4><a class="link-hny" href="{{ $item->url }}">{{ $item->name }}</a></h4>
                        <p>{!! $item->anons !!}</p>
                    </div>
                </div>
                    @else
                        <div class="col-lg-3 col-md-6 blog-grid-info px-0">
                            <div class="date-post">
                                <h6 class="date">{{ $item->created_at }}</h6>
                                <h4><a class="link-hny" href="{{ $item->url }}">{{ $item->name }}</a></h4>
                                <p>{!! $item->anons !!}</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 blog-grid-img px-0">
                            <img src="{{ asset('uploads/images/thumbnail/'.$item->image) }}" alt="Popup Image" class="img-fluid" />
                        </div>
                    @endif
                @endforeach

            </div>
            <div class="text-right">
                <a class="btn more black" href="/articles" role="button">Читать еще</a>
            </div>
        </div>

    </section>
    <!-- //blogs -->


    <!--/services-->
    <section class="testmonials" id="test">
        <div class="over-lay-blue py-5">
            <div class="container py-md-5">
                <h3 class="tittle-w3ls two text-center mb-5">Отзывы</h3>
                <div class="row my-4">
                    @foreach($reviews as $item)
                    <div class="col-lg-4 testimonials_grid mt-3">
                        <div class="p-lg-5 p-4 testimonials-gd-vj">
                            <p class="text-main-review">
{{--                                <span class="fa fa-quote-left s4" aria-hidden="true"></span>--}}
                                {{ strip_tags($item->text) }}
                            </p>
                            <div class="row mt-4">
                                <div class="col-3 testi-img-res">
                                </div>
                                <div class="col-9 testi_grid">
                                    <h5 class="mb-2">
                                        {{ $item->name }}
                                    </h5>
                                    <p>{{ $item->city }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                        <div class="text-right">
                            <a class="btn more black" href="/reviews" role="button">Все отзывы</a>
                        </div>
                </div>
            </div>
        </div>
    </section>
    <!--//testimonials-->


@stop
