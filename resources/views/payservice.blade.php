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
                <h3 class="tittle-w3ls text-left mb-5"><span class="pink">Онлайн</span> сервисы</h3>
                @if($error!='')
                    <p style="color: #ff0000;">Проверка результата уравнения не прошла!</p>
                @endif
                @foreach($payservice as $item)
                <div class="row">
                    <div class="col-md-10">
                        <h4 class="tittle-w3ls text-left mb-5">{{ $item->name }}</h4>
                        {!! $item->text !!}
                    </div>
                    <div class="col-md-2 text-right">
                        <a href="/pay-service/{{ $item->id }}" class="btn more black"> Получить</a>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

    @endif


@stop
