<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Доктор Лаптев. Программа клиента.</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .text-right {
            text-align: right;
        }
        .brand-custom {
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="text-right">
    <a class="navbar-brand brand-custom" href="https://doctor-laptev.ru">Доктор Лаптев</a><sup>&reg;</sup>
</div>
<h3 align="center">
    Анкета {{ $profile->type }} от {{ date("d.m.Y", strtotime($profile->created_at))  }} г.
</h3>
<h3 align="center">
    {{ $profile->user->name }}
</h3>

<div class="form-group">
    <table class="table table-stripe">
        <tbody>
        <tr>
            <td>
                Город
            </td>
            <td>
                {{ $user->city }}
            </td>
        </tr>
        <tr>
            <td>
                Телефон
            </td>
            <td>
                {{ $user->phone }}
            </td>
        </tr>
        <tr>
            <td>
                Email
            </td>
            <td>
                {{ $user->email }}
            </td>
        </tr>
        <tr>
            <td>
                Полных лет
            </td>
            <td>
                {{ $profile->age }}
            </td>
        </tr>
        <tr>
            <td>
                Вес (в кг)
            </td>
            <td>
                {{$profile->weight }}
            </td>
        </tr>
        <tr>
            <td>
                Рост:
            </td>
            <td>
                {{ $profile->rost }}
            </td>
        </tr>
        <tr>
            <td>
                Артериальное давление
            </td>
            <td>
                {{ $profile->davlen }}
            </td>
        </tr>
        <tr>
            <td>
                Дополнительная информация
            </td>
            <td>
                {{ $profile->info }}
            </td>
        </tr>

        {{--            {{ dd($profile->answers()) }}--}}

        @foreach($profile->answers as $answer)
            <tr>
                <td>
                    {{ $answer->question->text }}
                </td>
                <td>
                    {{ $answer->text }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
