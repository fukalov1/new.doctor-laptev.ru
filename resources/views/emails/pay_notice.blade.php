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
            <h4>Поступила оплата</h4>
            Номер чека {{ $data['pay_service']->price }} на сумму  руб
            <br/>Услуга "{{ $data['pay_service']->name }}"
            <br/>Ваш код доступа: <b>{{ $data['code'] }}</b>

            <br/>
            Просмотр услуги Вы можете осуществить по ссылке <a href="{{ asset('/pay_services') }}">платные сервисы</a>
        </td>
    </tr>

</table>
</body>
</html>
