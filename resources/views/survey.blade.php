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

    @if($questions->count()>0)
        <section class="banner_bottom py-5">
            <form method="POST" action="/survey">
            <div class="container py-md-5">
                <h3 class="tittle-w3ls text-left mb-5"><span class="pink">Анкета</span> {{ $type }}</h3>
                @if($error!='')
                    <p style="color: #ff0000;">Проверка результата уравнения не прошла!</p>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <label>Город</label>
                        <select class="form-control" name="city">
                            @foreach($cities as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label>ФИО</label>
                        <input type="text"
                               value="{{ $request->name }}"
                               name="name"
                               class="form-control"
                               placeholder="фамилия имя отчество">
                    </div>
                    <div class="col-md-4">
                        <label>Телефон</label>
                        <input type="text"
                               name="phone"
                               value="{{ $request->phone }}"
                               class="form-control"
                               placeholder="+7">
                    </div>
                    <div class="col-md-4">
                        <label>Email</sub>
                        </label>
                        <input type="text"
                               name="email"
                               value="{{ $request->email }}"
                               class="form-control"
                               placeholder="">
                        <sub>Внимание! В случае неверного (несуществующего) адреса Вы не сможете получить подтверждение о регистрации.</sub>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label>Полных лет</label>
                        <input type="text"
                               value="{{ $request->age }}"
                               name="age" class="form-control" placeholder="">
                    </div>
                    <div class="col-md-3">
                        <label>Вес, кг</label>
                        <input type="text" name="weight"
                               value="{{ $request->weight }}"
                               class="form-control" placeholder="">
                    </div>
                    <div class="col-md-3">
                        <label>Рост, см</label>
                        <input type="text" name="rost"
                               value="{{ $request->rost }}"
                               class="form-control" placeholder="">

                    </div>
                    <div class="col-md-3">
                        <label>Артериальное давление</label>
                        <input type="text" name="davlen"
                               value="{{ $request->davlen }}"
                               class="form-control" placeholder="">

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Когда было последнее обращение</label>
                        <input type="text"
                               name="last_visit"
                               value="{{ $request->last_visit }}"
                               class="form-control" placeholder="">
                    </div>
                    <div class="col-md-6">
                        <label>Какие заболевания беспокоят?</label>
                        <input type="text"
                               name="diseases"
                               value="{{ $request->diseases }}"
                               class="form-control" placeholder="">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <label>Из какого источника получили рекламную информацию?</label>
                    </div>
                    <div class="col-md-3">

                        <div class="row">
                            <div class="col-md-2">
                              <input type="radio" name="source" class="form-control">
                            </div>
                            <div class="col-md-10">
                                <label>из газеты (какой?)</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                        <div class="col-md-2">
                            <input type="radio" name="source" class="form-control">
                        </div>
                        <div class="col-md-10">
                            <label>из ТВ (какой канал?)</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="row">
                            <div class="col-md-3">
                                <input type="radio" name="source" class="form-control">
                            </div>
                            <div class="col-md-9">
                                <label>из афиши</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="row">
                            <div class="col-md-3">
                                <input type="radio" name="source" class="form-control">
                            </div>
                            <div class="col-md-9">
                                <label>от знакомых</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="row">
                            <div class="col-md-3">
                                <input type="radio" name="source" class="form-control">
                            </div>
                            <div class="col-md-9">
                                <label>из интернет</label>
                            </div>
                        </div>
                    </div>
                </div>

        @foreach($questions as $item)
                    <div class="row form-group">
                        <div class="col-md-6">
                            {{ $item->text }}
                        </div>
                        <div class="col-md-6">
                            <select class="form-control" name="answer[]">
                                @foreach($item->answers as $answer)
                                    <option value="{{ $answer->id }}">
                                        {{ $answer->text }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
        @endforeach
                <div class="row form-group">
                    <div class="col-md-4">
                        Поститайте результат и запишите ответ
                    </div>
                    <div class="col-md-4">
                        <img src="{{ Captcha::src('math') }}"/>
                    </div>
                    <div class="col-md-4">
                        <input type="hidden" name="type" value="{{ $type }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="text" name="captcha" class="form-control" placeholder="введите ответ">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-8">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" name="submit" class="btn btn-primary">
                            Отправить
                        </button>
                    </div>
                </div>

            </div>
            </form>
        </section>

    @endif


@stop