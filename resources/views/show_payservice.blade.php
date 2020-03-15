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

{{--    v2a+TBXB--}}

    @if($payservice->id)
        <section class="banner_bottom py-5">
            <div class="container py-md-5">
                <h3 class="tittle-w3ls text-left mb-5"><span class="pink">Онлайн</span> сервисы</h3>

                <div class="row">
                    <div class="col-md-12">
                        <h4 class="tittle-w3ls text-left mb-5">{{ $payservice->name }}</h4>
                        <p>
                            Эта услуга дает возможность перезапустить программу, продлить программу, выполнить дополнительный питьевой режим или приступить к выполнению программы через некоторое время после основного тренинга.
                        </p>
                        <p>
                            Перед пользованием услуги необходимо воздержаться от твердой пищи не менее 3-х часов.
                        </p>
                        <p>
                            Для эффективного результата обязательно необходимы наушники!
                        </p>
                        <p>
                            <b>Внимательно прочитайте инструкцию, когда зайдете на страницу сервиса.</b>
                        </p>
                        <p>
{{--                            Вход осуществляется по коду (получить можно или у администратора на тренинге или ".--}}
                        </p>
                    </div>
{{--                    <div class="col-md-12">--}}
{{--                        <h3 class="tittle-w3ls text-left mb-5">Ваш код доступа недействителен. Обратитесь к администратору или купите новый.</h3>--}}
{{--                    </div>--}}

                </div>

                @guest
                        <div class="container py-md-5">

                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Для получения услуги или покупки кода доступа Вам необходимо <a href="/login">авторизоваться</a> на сайте.</h4>
                                </div>
                            </div>
                        </div>

                @else
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="card" style="width: 18rem;">
                                        <form method="Post" action="/pay-service/get">
                                            {{ csrf_field() }}
                                        <div class="card-body">
                                            <h4 class="card-title">Просмотр</h4>
                                            <p class="card-text">Если у Вас купленный на сайте Доктора Лаптева код доступа или полученный на тренинге.</p>
                                            <p>
                                                <input type="hidden" name="id" value="{{ $payservice->id }}">
                                                <input id="code" type="text" class="form-control" name="code" placeholder="код" required>
                                            </p>
                                            <button class="btn btn-danger" type="submit">Смотреть</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="card" style="width: 18rem;">
                                        <form action="https://auth.robokassa.ru/Merchant/Index.aspx" method="POST">
                                            <input type="hidden" name="MrchLogin" value="doctorlaptev">
                                            <input type="hidden" id="OutSum7" name="OutSum" value="{{ $payservice->price }}">
                                            <input type="hidden" id="InvId7" name="InvId" value="{{ $time }}">
                                            <input type="hidden" name="Desc" value="Покупка кода доступа к услуге {{ $payservice->name }}">
                                            <input type="hidden" id="SignatureValue7" name="SignatureValue" value="{{ $sign }}">
                                            <input type="hidden" name="IncCurrLabel" value="">
                                            <input type="hidden" name="payment_method" value="full_prepayment">
                                            <input type="hidden" name="payment_object" value="excise">
                                            <input type="hidden" name="Culture" value="ru">
                                            <input type="hidden" class="shp_email" rel="7" id="shp_email7" name="shp_email" value="{{ Auth::user()->email }}">
                                            <input type="hidden" id="shp_payid7" name="shp_payid" value="7">
                                        <div class="card-body">
                                            <h4 class="card-title">Покупка</h4>
                                            <p class="card-text">Вы можете купить код доступа к услуге прямо сейчас и приступить к просмотру! </p>
                                            <p>
                                            <h5>Стоимость: {{ $payservice->price }} руб.</h5>
                                            </p>
                                            <p></p>
                                            <button class="btn btn-success" type="submit">Купить</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-sm">
                                </div>

                            </div>
                        </div>
                @endguest


            </div>
        </section>

    @endif


@stop
