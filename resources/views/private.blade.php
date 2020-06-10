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
            <br/> Через 5 секунд Вы будете перенаправлены на главную страницу
            <meta http-equiv="refresh" content="5;URL=/">
        </h3>
            </div>
        </section>
    @endif

        <section class="banner_bottom py-5" id="app">
            <div class="container py-md-5">
                <h3 class="tittle-w3ls text-left mb-5"><span class="pink">Онлайн</span> сервисы</h3>

                <div class="row">
                    <div class="col-md-12">
                        <h4 class="tittle-w3ls text-left mb-5">{{ $payservice->name }}</h4>
                        {!!  $payservice->private_text !!}
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        @if($payservice->show_private)
                            <pay-service :id="{{ $id }}" :code="'{{ $code }}'">
                            </pay-service>
                        @else
                            <h5 class="text-center">Дополнительное видео будет доступно позже</h5>
                        @endif
                    </div>
                </div>
            </div>
        </section>




@stop
