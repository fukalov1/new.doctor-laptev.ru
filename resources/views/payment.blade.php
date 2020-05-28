@extends('layouts.page')


@section('content')
    <div class="fill-top">
    </div>
    <div class="container p-md-3">
    </div>

    @if(isset($message))
        <section class="banner_bottom py-5">
            <div class="container py-md-5">
                <h3 class="tittle-w3ls text-left mb-5"><span class="pink">Оплата</span> услуг</h3>
                <h5>
                    {{  $message }}
                    <br/> Через 5 секунд Вы будете перенаправлены на главную страницу
                    <meta http-equiv="refresh" content="5;URL=/">
                </h5>
            </div>
        </section>
    @endif
@stop
