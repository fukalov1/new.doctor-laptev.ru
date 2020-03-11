@extends('layouts.page')


@section('content')

    <div class="fill-top">

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
                @if($error!='')
                    <p style="color: #ff0000;">Проверка результата уравнения не прошла!</p>
                @endif
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
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="name" placeholder="ФИО">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="city" placeholder="город">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="code" placeholder="код">
                    </div>
                    <div class="col-md-2 text-right">
                        <button class="btn more black">смотреть</button>
                    </div>
                </div>
                @endforeach
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="tittle-w3ls text-left mb-5">Купить код доступа?</h4>
                        <p>
                            ВНИМАНИЕ! ПЕРЕД ОПЛАТОЙ ПРОВЕРЬТЕ СВОЙ E-MAIL! КОД ПРИДЕТ НА УКАЗАННЫЙ АДРЕС! ЕСЛИ ВОЗНИКЛИ ПРОБЛЕМЫ, ЗВОНИТЕ +7 966 143 99 43 ИЛИ ПИШИТЕ НА office@doctor-laptev
                        </p>
                    </div>
                    <div class="col-md-4">
                        Услуга "Восстанавливающий сеанс"
                    </div>
                    <div class="col-md-2">
                        Стоимость: 1000 руб.
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div class="col-md-2 text-right">
                        <button class="btn more black">купить</button>
                    </div>
                </div>
            </div>
        </section>

    @endif


@stop
