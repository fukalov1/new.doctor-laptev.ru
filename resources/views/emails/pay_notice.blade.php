<!DOCTYPE html>
<!--[if lt IE 7]><html lang="ru" class="lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html lang="ru" class="lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html lang="ru" class="lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="ru">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>Уведомление оплате услуги. Доктор Лаптев.</title>
    <meta name="description" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/favicon.png" type="image/png"/>
    <link rel="stylesheet" href="css/menu-style.css" />
    @include('layouts.styles')
</head>
<body>

<table border="0" width="80%">
    <tr>
        <td>
            <img src="{{ asset('/images/logo.jpg') }}" width="150"/>
        </td>
        <td align="right"><a class="navbar-brand brand-custom" href="/">Доктор Лаптев<sup>®</sup></a></td>
    </tr>
    <tr>
        <td colspan="2">
            <h4>Успешная оплата</h4>
            Счет № {{ $data['inv_id'] }} на сумму {{ $data['pay_service']->price }}  руб.
            <br/>Услуга <b>"{{ $data['pay_service']->name }}"</b>
{{--            @if($data['code'] === null)--}}
{{--                После получения кода доступа Вы можете осуществить просмотр услуги по ссылке <a href="{{ asset('/pay-services') }}">платные сервисы</a><br/><br/>--}}
{{--            @else--}}
                <br/>Ваш код доступа: <b>{{ $data['code'] }}</b>
                Просмотр услуги Вы можете осуществить по ссылке <a href="{{ asset('/pay-services') }}">платные сервисы</a><br/><br/>
{{--            @endif--}}
            <br/>
            <br/>

            С уважением, администрация сайта Доктор Лаптев.

        </td>
    </tr>

</table>
</body>
</html>
