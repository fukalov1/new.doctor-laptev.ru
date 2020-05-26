@extends('layouts.page')

@section('content')
    <div class="fill-top">

    </div>

<div class="container p-md-3">
</div>
    <section class="banner_bottom py-5">
    <div class="container py-md-5">
        <div class="row justify-content-center">
        <div class="col-md-12">
                <h3>Личные данные</h3>
                <div class="card-header">

                <div class="card-body">
                    <form method="POST" action="{{ route('user-profile') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">ФИО</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required autocomplete="email">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="skype" class="col-md-4 col-form-label text-md-right">Skype</label>

                            <div class="col-md-6">
                                <input id="skype" type="skype" class="form-control" name="skype" value="{{ $user->skype }}" autocomplete="skype">

                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">Город</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" value="{{ $user->city }}" required autocomplete="city">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Телефон</label>

                            <div class="col-md-6">
                                <input id="phone" type="phone"
                                       class="form-control phone"
                                       name="phone" value="{{ $user->phone }}" required
                                       placeholder="+7 (***) ***-****"
                                       autocomplete="phone">

                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn more black">
                                    Сохранить
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </section>
@endsection
