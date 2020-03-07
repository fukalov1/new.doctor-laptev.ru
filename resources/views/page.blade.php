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
                            <h3 class="tittle-w3ls mb-3">{{ $page_block->header }}</h3>
                            <p class="sub-tittle mt-3 mb-4"> {!! $page_block->text !!}</p>

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
                <section class="about py-5">
                    <div class="container p-md-5">
                        <div class="about-hny-info text-left px-md-5">
                            <h3 class="tittle-w3ls mb-3"><span class="pink">{{ $page_block->header }}</span></h3>
                            <p class="sub-tittle mt-3 mb-4">
{{--                                <img src="/uploads/images/thumbnail/{{ $page_block->image }}" class="img-article"/>--}}
                                {!! $page_block->text !!}
                            </p>
                        </div>
                    </div>
                </section>
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

{{--            @elseif($page_block->type=='11')--}}
{{--                @foreach($page_block->photo_reviews as $review)--}}
{{--                <!-- /projects -->--}}
{{--                    <section class="projects py-5" id="block{{ $page_block->id }}">--}}
{{--                        <div class="container py-md-5">--}}
{{--                            <h3 class="tittle-w3ls text-left mb-5"><span class="pink">Потрясающие</span> результаты!</h3>--}}
{{--                            <div class="row news-grids mt-md-5 mt-4 text-center">--}}
{{--                                @foreach($review->items as $item)--}}
{{--                                    <div class="col-md-4 gal-img">--}}
{{--                                        <a href="#gal{{ $item->id }}">--}}
{{--                                            <div class="img-dbl">--}}
{{--                                                <img src="{{ asset('uploads/images/thumbnail/'.$item->image) }}"--}}
{{--                                                     alt="w3pvt" class="img-fluid">--}}
{{--                                                <img src="{{ asset('uploads/images/thumbnail/'.$item->image1) }}"--}}
{{--                                                     alt="w3pvt" class="img-fluid">--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                        <div class="gal-info">--}}
{{--                                            <h5>{{ $item->title }}<span class="decription">{!!  $item->text !!}</span></h5>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
{{--                            <!-- popup-->--}}
{{--                            @foreach($review->items as $item)--}}
{{--                                <div id="gal{{ $item->id }}" class="pop-overlay">--}}
{{--                                    <div class="popup">--}}
{{--                                        <img src="{{ asset('uploads/images/'.$item->image) }}" alt="Popup Image"--}}
{{--                                             class="img-fluid" width="30%"/>--}}
{{--                                        <img src="{{ asset('uploads/images/'.$item->image1) }}" alt="Popup Image"--}}
{{--                                             class="img-fluid" width="30%"/>--}}
{{--                                        <img src="{{ asset('uploads/images/'.$item->image2) }}" alt="Popup Image"--}}
{{--                                             class="img-fluid" width="30%"/>--}}
{{--                                        <p class="mt-4">{{ $item->text }}</p>--}}
{{--                                        <a class="close" href="#gallery">&times;</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                        @endforeach--}}
{{--                        <!-- //popup -->--}}
{{--                        </div>--}}
{{--                    </section>--}}
{{--                    <!-- //projects -->--}}

{{--                @endforeach--}}
            @endif
        @endforeach


    </div>
    <!-- //banner -->

    @if($articles->count()>0)
        <section class="banner_bottom py-5">
            <div class="container py-md-5">
                <h3 class="tittle-w3ls text-left mb-5"><span class="pink">Статьи</span> о похудении</h3>
        @foreach($articles as $article)
                    <div class="py-md-5">
                    <div class="row inner_sec_info">

                        <div class="col-md-6 banner_bottom_grid help">
                            <img src="{{ asset('/uploads/images/'.$article->image) }}" alt=" " class="img-fluid">
                        </div>
                        <div class="col-md-6 banner_bottom_left mt-lg-0 mt-4">
                            <h4><a class="link-hny" href="{{ $article->url }}">
                                    {{ $article->name }}</a></h4>
                            {!! $article->anons !!}
                           <div class="text-right">
                               <a class="btn more black mt-3" href="{{ $article->url }}" role="button">Читать</a>
                           </div>

                        </div>
                    </div>
                    </div>
        @endforeach
            </div>
        </section>
        <section class="banner_bottom py-5">
            <div class="container text-center paginator">
                {{ $articles->links() }}
            </div>
        </section>
    @endif

    @if($photo_reviews->count()>0)
        <section class="projects py-5" id="gallery">
            <div class="container py-md-5">
                <h3 class="tittle-w3ls text-left mb-5"><span class="pink">Потрясающие</span> результаты!</h3>
                <div class="row news-grids mt-md-5 mt-4 text-center">
                    @foreach($photo_reviews as $item)
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
                @foreach($photo_reviews as $item)
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
            </div>
            <!-- //projects -->
            <div class="container text-center paginator">
                {{ $photo_reviews->links() }}
            </div>
        </section>


    @endif

    @if($cities->count()>0)
        <section class="projects py-5" id="gallery">
            <div class="container py-md-5">
                <h3 class="tittle-w3ls text-left mb-5"><span class="pink">Расписание</span> по городам</h3>

                <div class="row">
                    <div class="col-md-6">

                    </div>
                    <div class="col-md-3">
                        <select class="form-control months">
                            <option value="0">
                                все месяцы
                            </option>
                            @foreach($months as $item)
                                <option value="{{ $loop->index+1 }}">
                                    {{ $item }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-primary">
                            сбросить фильтр
                        </button>
                    </div>
                </div>


                @foreach($cities as $item)
                        <div class="row inner_sec_info">

                            <div class="col-md-4 banner_bottom_grid help">
                                <img src="{{ asset('/uploads/images/thumbnail/'.$item->image) }}" alt=" " class="img-fluid">
                            </div>
                            <div class="col-md-8 banner_bottom_left mt-lg-0 mt-4">
                                <h4><a class="link-hny" href="services.html">
                                        {{ $item->name }}</a></h4>
                                {!! $item->text !!}

                            </div>
                        </div>
                @endforeach
                </div>
            </div>
        </section>
    @endif




@stop
