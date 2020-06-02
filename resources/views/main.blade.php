@extends('layouts.page')


@section('content')

    <div>

    @foreach($page_blocks as $page_block)
        @if($page_block->type == '1')
            <!-- about -->
                <section class="about py-5">
                    <div class="container p-md-5">
                        <div class="about-hny-info text-left px-md-5">
                            <h3 class="tittle-w3ls mb-3">{{ $page_block->header }}</h3>
                            <div class="sub-tittle mt-3 mb-4"> {!! $page_block->text !!}</div>
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
                                <img src="{{ asset('/uploads/'.preg_replace('/\s/','%20',$page_block->image) ) }}" loading="lazy" alt=" "
                                     class="img-fluid">
                            </div>
                            <div class="col-md-6 banner_bottom_left mt-lg-0 mt-4">
                                <h4><a class="link-hny" href="services.html">
                                        {{ $page_block->header }}</a></h4>
                                {!! $page_block->text !!}

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
                {{--            промо-блок--}}
            @elseif($page_block->type=='5')
                <section class="services" id="block{{$page_block->id}}">
                    <div class="over-lay-blue py-5">
                        <div class="container py-md-5">
                            <div class="row my-4">
                                <div class="col-lg-5 services-innfo pr-5">
                                    <h3 class="tittle-w3ls two mb-3 text-left">{{ $page_block->header }}</h3>
                                    <p class="sub-tittle mt-2 mb-sm-3 text-left"></p>
                                    <a href="services.html"><img src="{{ asset('/uploads/'.preg_replace('/\s/','%20',$page_block->image) ) }}"
                                                                 loading="lazy" alt="w3pvt" class="img-fluid"></a>
                                </div>
                                <div class="col-lg-7 services-grid-inf">
                                    {!! $page_block->text !!}
                                </div>
                            </div>
                        </div>
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
                    <input type="radio" class="cs_anchor radio" name="slider" id="play1" checked=""/>
                    @foreach($page_block->sliders as $slider)
                        @foreach($slider->items as $item)
                            <input type="radio" class="cs_anchor radio" name="slider" id="slide{{ $item->id }}"/>
                        @endforeach
                    @endforeach
                    <div class="images">
                        <div class="images-inner">
                            @foreach($page_block->sliders as $slider)
                                @foreach($slider->items as $item)
                                    <div class="image-slide">
                                        <div class="banner-w3pvt-{{ $item->id }}"
                                             style="background: url({{ asset('/uploads/'.preg_replace('/\s/','%20',$item->image) ) }}) no-repeat top;">
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
                        <h3>{{ config('main_slider_line1', 'Создаем новое') }}
                            <br>{{ config('main_slider_line2', 'Пишевое поведение') }} </h3>
                        <div class="top-buttons mx-auto text-center mt-md-5 mt-3">
                            <a href="{{ config('main_slider_link1', '/ob-avtore/moy-trenning') }}"
                               class="btn more mr-2">{{ config('main_slider_btn1', 'Подробнее') }}</a>
                            <a href="{{ config('main_slider_link2', '/onlayn-servis/anketirovanie') }}"
                               class="btn">{{ config('main_slider_btn2', 'Записаться') }}</a>
                        </div>
                        <div class="d-flex hny-stats-inf">
                            <div class="col-md-4 stats_w3pvt_counter_grid mt-3">
                                <div class="justify-content-center">
                                    <h5 class="counter">{{ config('main_slider_col1_value', 38) }}</h5>
                                    <p class="para-w3pvt">{{ config('main_slider_col1_text', 'лет практики') }}</p>
                                </div>
                            </div>
                            <div class="col-md-4 stats_w3pvt_counter_grid mt-3">
                                <div class="justify-content-center">
                                    <h5 class="counter">{{ config('main_slider_col2_value', 200000) }}</h5>
                                    <p class="para-w3pvt">{{ config('main_slider_col2_text', 'тренингов') }}</p>
                                </div>
                            </div>
                            <div class="col-md-4 stats_w3pvt_counter_grid mt-3">
                                <div class="justify-content-center">
                                    <h5 class="counter">{{ config('main_slider_col3_value', 300000) }}</h5>
                                    <p class="para-w3pvt">{{ config('main_slider_col3_text', 'клиентов') }}</p>
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
                                                <img src="/uploads/images/thumbnail/{{preg_replace('/\s/','%20',$photo->image)}}" alt="{{ $photoset->name }}">
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
                                            <input type="text" class="form-control {{ $field->field_name }}"
                                                   rel="{{ $field->field_name }}"
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
                            <h3 class="tittle-w3ls text-left mb-5"><span class="pink">Потрясающие</span> результаты!
                            </h3>
                            <div class="row news-grids mt-md-5 mt-4 text-center">
                                @foreach($item->items as $item)
                                    <div class="col-md-4 gal-img">
                                        <a href="#gal1"><img src="{{ asset('uploads/images/thumbnail/'.preg_replace('/\s/','%20',$item->image) ) }}"
                                                             alt="w3pvt" class="img-fluid"></a>
                                        <div class="gal-info">
                                            <h5>{{ $item->title }}<span
                                                    class="decription">{{  strip_tags($item->text) }}</span></h5>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- popup-->
                            @foreach($item->items as $item)
                                <div id="gal1" class="pop-overlay">
                                    <div class="popup">
                                        <img src="{{ asset('uploads/images/thumbnail/'.preg_replace('/\s/','%20',$item->image) ) }}"
                                             alt="Popup Image" class="img-fluid"/>
                                        <div class="mt-4">test{!! $item->text !!}</div>
                                        <a class="close" href="#gallery">&times;</a>
                                    </div>
                                </div>
                        @endforeach
                        <!-- //popup -->
                        </div>
                    </section>
                    <!-- //projects -->

                @endforeach
            @elseif($page_block->type=='12')
                <div class="container py-md-5" id="micro-block{{$page_block->id}}">
                            <div class="features-w3pvt-main row" id="features{{$page_block->id}}">
                                @foreach($page_block->micro_blocks as $item)
                                    <div class="col-md-4 feature-gird">
                                        <div class="features-hny-inner-gd row">
                                            <div class="col-md-3 featured_grid_left">
                                                <div class="icon_left_grid">&nbsp;</div>
                                            </div>

                                            <div class="col-md-9 featured_grid_right_info pl-lg-0">
                                                <h4><a class="link-hny" href="{{ $item->url }}" title="переход на {{ $item->name }}">{{ $item->name }}</a></h4>
                                                {!! $item->text !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                </div>
            @endif
        @endforeach


    </div>
    <!-- //banner -->

    @if($cities->count()>0)
        <section class="block_maps" id="map_city" style="padding-top: 90px;">
            <div class="container">
                <h3 class="tittle-w3ls text-left mb-5"><span class="pink">Города в расписании</span> сейчас</h3>

                <div class="contact-maps" id="block_city">
                    <div class="map-item">
                        <div id="map" style="width:100%; height:400px;"></div>
                    </div>

                </div>

                <script defer
                        src="https://api-maps.yandex.ru/2.1/?apikey=e5db01fb-1c20-456d-b884-cf0d71279a63&lang=ru_RU"
                        type="text/javascript"></script>
                <script type="text/javascript">

                    document.addEventListener('DOMContentLoaded', () => {
                        var myMap;

                        // Как только будет загружен API и готов DOM, выполняем инициализацию
                        ymaps.ready(init);

                        function init() {
                            // Создание экземпляра карты и его привязка к контейнеру с
                            // заданным id ("map")
                            myMap = new ymaps.Map('map', {
                                // При инициализации карты, обязательно нужно указать
                                // ее центр и коэффициент масштабирования
                                center: [56.326797, 44.006516], // Тольятти
                                // controls: ['fullscreenControl','zoomControl'],
                                // behaviors: ['default', 'scrollZoom'],
                                zoom: 5
                            });

                            destinations = {
                                'center': [56.326797, 44.006516]
                            };

                            // массив меток
                            let myPoints = [];
                            @foreach($cities as $point)
                            {{--                        console.log('{{$point->name}}','{{$point->xcoord}}','{{$point->ycoord}}');--}}
                            myPoints.push(
                                new ymaps.Placemark(
                                    // Координаты метки
                                    [{{$point->xcoord}}, {{$point->ycoord}}], {
                                        hintContent: '{{$point->name}}',
                                        balloonContent: '<a href="/cities#city{{$point->id}}">Подробности проведения тренинга в г.{{$point->name}}</a>'
                                    },
                                    {
                                        iconLayout: 'default#image',
                                        iconImageHref: '/images/map-icon.png',
                                        iconImageSize: [10, 10],
                                        iconImageOffset: [-3, -3]
                                    }
                                )
                            );
                            @endforeach

                            // Добавление меток на карту
                            myPoints.forEach(function (item) {
                                myMap.geoObjects.add(item);
                            });
                        }
                    });
                </script>
            </div>
        </section>
    @endif


    <section class="projects py-5" id="gallery">
        <div class="container py-md-5">
            <h3 class="tittle-w3ls text-left mb-5"><span class="pink">Потрясающие</span> результаты!</h3>
            <div class="row news-grids mt-md-5 mt-4 text-center">
                @foreach($main_photo_review as $item)
                    <div class="col-md-4 gal-img">
                        <a href="#gal{{ $item->id }}">
                            <div class="img-dbl">
                                <img src="{{ asset('uploads/images/thumbnail/'.preg_replace('/\s/','%20',$item->image)) }}"
                                     loading="lazy" alt="w3pvt" class="img-fluid">
                                <img src="{{ asset('uploads/images/thumbnail/'.preg_replace('/\s/','%20',$item->image1) ) }}"
                                     loading="lazy" alt="w3pvt" class="img-fluid">
                            </div>
                        </a>
                        <div class="gal-info">
                            <h5>{{ $item->title }}<span class="decription">{{  strip_tags($item->text) }}</span></h5>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- popup-->
            @foreach($main_photo_review as $item)
                <div id="gal{{ $item->id }}" class="pop-overlay">
                    <div class="popup">
                        <img src="{{ asset('uploads/images/'.preg_replace('/\s/','%20',$item->image) ) }}" alt="Popup Image"
                             loading="lazy" class="img-fluid img-photo-review"/>
                        <img src="{{ asset('uploads/images/'.preg_replace('/\s/','%20',$item->image1) ) }}" alt="Popup Image"
                             loading="lazy" class="img-fluid img-photo-review"/>
                        <img src="{{ asset('uploads/images/'.preg_replace('/\s/','%20',$item->image2) ) }}" alt="Popup Image"
                             loading="lazy" class="img-fluid img-photo-review"/>
                        <div class="mt-4">{!! $item->text  !!}</div>
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
                @foreach($main_article as $article)
                    @if($loop->iteration<3)
                        @foreach($article->page_blocks as $item)
                            <div class="col-lg-3 col-md-6 blog-grid-img px-0">
                                <img
                                    src="{{ asset('uploads/images/thumbnail/'.preg_replace('/images\//', '',$item->image) ) }}"
                                    alt="Popup Image"
                                    loading="lazy" class="img-fluid"/>
                            </div>
                            <div class="col-lg-3 col-md-6 blog-grid-info px-0">
                                <div class="date-post">
                                    {{--                                    <h6 class="date">--}}
                                    {{--                                                                    {{ $item->created_at }}--}}
                                    {{--                                    </h6>--}}
                                    <h4><a class="link-hny" href="{{ $article->url }}">{{ $article->name }}</a></h4>
                                    <div>{!! $article->anons !!}</div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        @foreach($article->page_blocks as $item)
                            <div class="col-lg-3 col-md-6 blog-grid-info px-0">
                                <div class="date-post">
                                    {{--                                    <h6 class="date">--}}
                                    {{--                                                                            {{ $item->created_at }}--}}
                                    {{--                                    </h6>--}}
                                    <h4><a class="link-hny" href="{{ $article->url }}">{{ $article->name }}</a></h4>
                                    <div>{!! $article->anons !!}</div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 blog-grid-img px-0">
                                <img
                                    src="{{ asset('uploads/images/thumbnail/'.preg_replace('/images\//', '',$item->image)) }}"
                                    alt="Popup Image"
                                    class="img-fluid"/>
                            </div>
                        @endforeach
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
                    <div class="col-lg-4">
                        <a class="btn more black" href="/reviews" role="button">Все отзывы</a>
                    </div>
                    <div class="col-lg-4 text-right">

                    </div>
                    <div class="col-lg-4 text-right">
                        <a class="btn more black" href="/reviews#sendform" role="button">Оставить отзыв</a>
                    </div>
                </div>
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

                </div>
            </div>
        </div>
    </section>
    <!--//testimonials-->


@stop
