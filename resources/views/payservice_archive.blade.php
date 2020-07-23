@extends('layouts.page')


@section('content')

    <div class="fill-top">

    </div>
    <div class="container p-md-3">
    </div>

    @if(isset($message))
        <section class="banner_bottom py-5">
            <div class="container py-md-5">
        <h3>
            {{  $message }}
            <br/> Через 5 секунд Вы будете перенаправлены на главную страницу!!!!
            <meta http-equiv="refresh" content="5;URL=/">
        </h3>
            </div>
        </section>
    @endif

    @if($payservice->count()>0)
        <section class="banner_bottom py-5">
            <div class="container py-md-5">
                <h3 class="tittle-w3ls text-left mb-5"><span class="pink">Онлайн</span> сервисы (архив)</h3>
                @if($error!='')
                    <p style="color: #ff0000;">Проверка результата уравнения не прошла!</p>
                @endif

                @foreach($payservice as $item)
                    <div class="row inner_sec_info" id="city{{ $item->id }}">

                        <div class="col-md-4 banner_bottom_grid help">
                            <img src="{{ asset('/uploads/'.$item->image) }}" alt=" " class="img-fluid">
                        </div>
                        <div class="col-md-8 banner_bottom_left mt-lg-0 mt-4">
                            <h4>{{ $item->name }}</h4>
                            {!! $item->text !!}
                            <a href="/pay-service/{{ $item->id }}" class="btn more black"> Получить услугу</a>
                        </div>
                        <div class="col-md-12 banner_bottom_left mt-lg-0 mt-4">
                            <hr/>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

    @endif


@stop
