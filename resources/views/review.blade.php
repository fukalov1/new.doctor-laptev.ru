@extends('layouts.page')


@section('content')

    <div class="fill-top">

    </div>

    @if(isset($message))
        <section class="banner_bottom py-5">
            <div class="container py-md-5">
        <h3>
            {{  $message }}
            <br/> Через 5 секунд Вы будете перенаправлены на страницу с отзывами
            <meta http-equiv="refresh" content="5;URL=/reviews">
        </h3>
            </div>
        </section>
    @endif

    @if($reviews->count()>0)
        <section class="banner_bottom py-5">
            <div class="container py-md-5">
                <h3 class="tittle-w3ls text-left mb-5"><span class="pink">Отзывы</span> </h3>

                @foreach($reviews as $item)
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label>
                                {{ $item->name }}
                                @if($item->city!=' ')
                                    / {{ $item->city }}
                                @endif
                            </label>
                        </div>

                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4 text-right">
                            <label>
                                {{ $item->created_at->format('d.m.Y') }}
                            </label>
                        </div>
                        <div class="col-md-12">
{{--                            {!! $item->text !!}--}}
                            {{ strip_tags($item->text) }}
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <section class="banner_bottom">
            <div class="text-center paginator">
                {{ $reviews->links() }}
            </div>
        </section>

        <section class="banner_bottom py-5">
            <div class="container py-md-5">
                <h3 class="tittle-w3ls text-left mb-5"><span class="pink">Оставьте свой отзыв</span> </h3>
                <form method="POST">
                @if($error!='')
                    <p style="color: #ff0000;">Проверка результата уравнения не прошла!</p>
                @endif

                <div class="row">
                    <div class="col-md-4">
                        <label>ФИО</label>
                        <input type="text"
                               value="{{ $request->name }}"
                               name="name"
                               class="form-control"
                               required="required"
                               placeholder="фамилия имя отчество">
                    </div>
                    <div class="col-md-4">
                        <label>Город</label>
                        <input type="text"
                               name="city"
                               value="{{ $request->city }}"
                               class="form-control"
                               required="required"
                               placeholder="город">
                    </div>
                    <div class="col-md-4">
                        <label>Email</sub>
                        </label>
                        <input type="text"
                               name="email"
                               value="{{ $request->email }}"
                               class="form-control"
                               required="required"
                               placeholder="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>Отзыв</label>
                        <textarea
                            class="form-control"
                            name="text"
                            required="required"
                            placeholder="напишите текст Вашего отзыва"></textarea>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-4">
                        <label>
                            Поститайте результат
                        </label><br/>
                        <img src="{{ Captcha::src('math') }}"/>
                    </div>
                    <div class="col-md-4">
                        <label>
                            запишите ответ
                        </label>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="text" name="captcha" class="form-control" placeholder="введите ответ">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-8">
                    </div>
                    <div class="col-md-4 text-right">
                        <button type="submit" name="submit" class="btn btn-primary">
                            Отправить
                        </button>
                    </div>
                </div>
            </form>
            </div>
        </section>

    @endif


@stop
