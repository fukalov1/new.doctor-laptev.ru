@extends('layouts.page')


@section('content')

    <div class="fill-top">

    </div>
    <div>

    @foreach($page_blocks as $page_block)
        @if($page_block->type == '1')
            <!-- about -->
                <section class="about py-5">
                    <div class="container p-md-5">
                        <div class="about-hny-info text-left px-md-5">
                            <h3 class="tittle-w3ls mb-3"><span class="pink">Доктор</span> Лаптев</h3>
                            <p class="sub-tittle mt-3 mb-4"> {!! $page_block->text !!}</p>
                            <a class="btn more black" href="single.html" role="button">Читать больше</a>
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
                        <h3>Создаем новое
                            <br>Пишевое поведение</h3>
                        <div class="top-buttons mx-auto text-center mt-md-5 mt-3">
                            <a href="single.html" class="btn more mr-2">Подробнее</a>
                            <a href="contact.html" class="btn">Записаться</a>
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
                                    <p class="para-w3pvt"> тренингов</p>
                                </div>
                            </div>
                            <div class="col-md-4 stats_w3pvt_counter_grid mt-3">
                                <div class="d-md-flex justify-content-center">
                                    <h5 class="counter">{{ config('clients') }}</h5>
                                    <p class="para-w3pvt">пациентов</p>
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

    @if($articles->count()>0)
        @foreach($articles as $article)
            <section class="banner_bottom py-5">
                <div class="container py-md-5">
                    <div class="row inner_sec_info">

                        <div class="col-md-6 banner_bottom_grid help">
                            <img src="{{ asset('/uploads/images/'.$article->image) }}" alt=" " class="img-fluid">
                        </div>
                        <div class="col-md-6 banner_bottom_left mt-lg-0 mt-4">
                            <h4><a class="link-hny" href="services.html">
                                    {{ $article->name }}</a></h4>
                            {!! $article->anons !!}
                            <a class="btn more black mt-3" href="services.html" role="button">Подробнее</a>

                        </div>
                    </div>
                </div>
            </section>
        @endforeach
        <section class="banner_bottom py-5">
            <div class="container text-center paginator">
                {{ $articles->links() }}
            </div>
        </section>
    @endif


    <!-- /blogs -->
{{--    <section class="blog-posts" id="blog">--}}
{{--        <div class="blog-w3pvt-info-content container-fluid">--}}
{{--            <h3 class="tittle-w3ls text-center mb-5">Что почитать...</h3>--}}

{{--            <div class="blog-grids-main row text-left">--}}
{{--                @foreach($main_article as $item)--}}
{{--                    @if($loop->iteration<3)--}}
{{--                        <div class="col-lg-3 col-md-6 blog-grid-img px-0">--}}
{{--                            <img src="{{ asset('uploads/images/thumbnail/'.$item->image) }}" alt="Popup Image" class="img-fluid" />--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-3 col-md-6 blog-grid-info px-0">--}}
{{--                            <div class="date-post">--}}
{{--                                <h6 class="date">{{ $item->created_at }}</h6>--}}
{{--                                <h4><a class="link-hny" href="single.html">{{ $item->name }}</a></h4>--}}
{{--                                <p>{!! $item->anons !!}</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @else--}}
{{--                        <div class="col-lg-3 col-md-6 blog-grid-info px-0">--}}
{{--                            <div class="date-post">--}}
{{--                                <h6 class="date">{{ $item->created_at }}</h6>--}}
{{--                                <h4><a class="link-hny" href="single.html">{{ $item->name }}</a></h4>--}}
{{--                                <p>{!! $item->anons !!}</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-3 col-md-6 blog-grid-img px-0">--}}
{{--                            <img src="{{ asset('uploads/images/thumbnail/'.$item->image) }}" alt="Popup Image" class="img-fluid" />--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                @endforeach--}}
{{--            </div>--}}

{{--        </div>--}}

{{--    </section>--}}
    <!-- //blogs -->
    <!--/mid-->
    <section class="banner_bottom py-5" id="appointment">
        <div class="container py-md-5">
            <div class="row inner_sec_info">


                <div class="col-lg-5 banner_bottom_left">

                    <div class="login p-md-5 p-4 mx-auto bg-white mw-100">
                        <h4>
                            Письмо Доктору Лаптеву</h4>
                        <form action="#" method="post">
                            <div class="form-group">
                                <label>Ваше имя</label>

                                <input type="text" class="form-control" id="validationDefault01" placeholder="" required="">
                            </div>
                            <div class="form-group">
                                <label>Ваш Email</label>
                                <input type="text" class="form-control" id="validationDefault02" placeholder="" required="">
                            </div>

                            <div class="form-group mb-4">
                                <label class="mb-2">Ваш телефон</label>
                                <input type="text" class="form-control" id="password1" placeholder="" required="">
                            </div>

                            <button type="submit" class="btn more black submit mb-4">Отправить</button>

                        </form>

                    </div>

                </div>
                <div class="col-lg-7 banner_bottom_grid help pl-lg-5">
                    <img src="images/ab2.jpg" alt=" " class="img-fluid mb-4">
                    <h4><a class="link-hny" href="contact.html">Stat Your Project Now?</a></h4>
                    <p class="mt-3">Lorem Ipsum is simply text the printing and typesetting standard industry.Quisque sagittis lacus eu lorem. </p>

                </div>
            </div>

        </div>
    </section>
    <!--//mid-->


@stop
