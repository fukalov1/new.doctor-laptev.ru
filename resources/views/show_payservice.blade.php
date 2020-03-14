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

    @if($payservice->count()>0)
        <section class="banner_bottom py-5">
            <div class="container py-md-5">
                <h3 class="tittle-w3ls text-left mb-5"><span class="pink">Онлайн</span> сервисы</h3>

                @foreach($payservice as $item)
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="tittle-w3ls text-left mb-5">{{ $item->name }}</h4>
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
                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                <input id="code" type="text" class="form-control" name="code" placeholder="код" required>
                                            </p>
                                            <button class="btn btn-danger" type="submit">Смотреть</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body">
                                            <h4 class="card-title">Покупка</h4>
                                            <p class="card-text">Вы можете купить код доступа к услуге прямо сейчас и приступить к просмотру! </p>
                                            <p>
                                            <h5>Стоимость: {{ $item->price }} руб.</h5>
                                            </p>
                                            <p></p>
                                            <a href="#" class="btn btn-success">Купить</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    &nbsp;
                                </div>

                            </div>
                        </div>
                @endguest

                @endforeach

            </div>
        </section>

    @endif


@stop
