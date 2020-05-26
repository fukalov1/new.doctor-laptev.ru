<!DOCTYPE html>
<!--[if lt IE 7]><html lang="ru" class="lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html lang="ru" class="lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html lang="ru" class="lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="ru">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>Уведомление о регистрации анкеты. Доктор Лаптев.</title>
    <meta name="description" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            <h4>Спасибо!</h4>
            Анкета успешно отправлена!
            <br/>
            Вы записаны на тренинг <a href="{{ asset('/') }}">Доктора Лаптева</a> в г. {{ $user->cities->name }}
        </td>
    </tr>

</table>
</body>
</html>
