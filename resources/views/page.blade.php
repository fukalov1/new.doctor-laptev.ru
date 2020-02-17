@extends('layouts.page')


@section('content')

    <div class="main-content">
        <div class="wrapper flex">
            @foreach($page_blocks as $page_block)
                @if($page_block->type == '1')
                    <div class="about_area" id="about">
                        <div class="container">
                            <div class="row">
                                <!--section title-->
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                    <div class="section_title">
                                        <h2 class="title"><span>{!! $page_block->header !!}</span></h2>
                                    </div>
                                </div>
                                <!--end section title-->
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    {!! $page_block->text !!}
                                </div>
                            </div>
                        </div>
                    </div>

                @elseif($page_block->type=='2')
                    <div class="portfolio_area" id="projects">
                        <div class="container">
                            <div class="row">
                                <!--section title-->
                                <div class="col-md-12">
                                    <div class="section_title">
                                        <h2 class="title"><span>Направления компании</span></h2>
                                    </div>
                                </div>
                                <!--end section title-->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portfolio_nav">
                                        <ul>
                                            @foreach($page_block->directions as $direction)
                                                <li class="filter" data-filter=".{{ $direction->name }}">{{ $direction->name }}</li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                                <div class="project_maxitup">
                                    <!--single portfolio item-->
                                    @foreach($page_block->directions as $direction)
                                        @foreach($direction->items as $item)
                                            <div class="col-md-4 col-sm-6 mix {{ $direction->name }}">
                                                <div class="portfolio  ">
                                                    <div class="single_protfolio">
                                                        <div class="prot_imag">
                                                            <a class="/venobox" href="/uploads/images/{{ $item->image }}" data-gall="myGallery">
                                                                <img src="/uploads/images/thumbnail/{{ $item->image }}" alt="" />
                                                            </a>
                                                            <div class="hover_port_text">
                                                                <h2><a href="#">{{ $direction->name }} {{ $item->title }}</a></h2>
                                                                <p> {{ $item->text }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
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

                <!-- HOME SLIDER -->
                    <div class="slider-wrap home-1-slider" id="home">
                        <div id="mainSlider" class="nivoSlider slider-image">
                            @foreach($page_block->sliders as $slider)
                                @foreach($slider->items as $item)
                                    <img src="/img/slider1.jpg" alt="main slider" title="#htmlcaption{{ $item->id }}"/>
                                @endforeach
                            @endforeach
                        </div>
                        @foreach($page_block->sliders as $slider)
                            @foreach($slider->items as $item)
                                <div id="htmlcaption{{ $item->id }}" class="nivo-html-caption slider-caption-{{ $item->id }}">
                                    <div class="slider-progress"></div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="slide1-text slide-text">
                                                    <div class="middle-text">
                                                        <div class="left_sidet1">
                                                            <div class="cap-title wow slideInRight" data-wow-duration=".9s" data-wow-delay="0s">
                                                                <h1>{{ $item->title }}</h1>
                                                            </div>
                                                            <div class="cap-dec wow slideInRight" data-wow-duration="1.1s" data-wow-delay="0s">
                                                                <h2>{{ $item->text }}</h2>
                                                            </div>
                                                            <div class="cap-readmore animated fadeInUpBig" data-wow-duration="1.5s" data-wow-delay=".5s">
                                                                <a href="#contact" >Заказать</a>
                                                                <!--										<a href="#" class="hover_slider_button">Смотреть каталог</a>-->
                                                            </div>
                                                        </div>
                                                        <div class="right_sidet1">
                                                            <div class="slide-image1">
                                                                <img class="wow slideInUp"  data-wow-duration="1.5s" data-wow-delay="0s" src="/uploads/{{ $item->image }}" alt="slider caption" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach


                    </div>
                    <!-- HOME SLIDER -->
                @elseif($page_block->type=='8')
                    <div class="all-area" style="background: rgba(0, 0, 0, 0) url('/uploads/{{ $page_block->image }}') repeat scroll 0 0 / cover">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    {!! $page_block->text !!}
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
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
        @endif
        @endforeach
    </div>
    </div>

@stop
