<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Доктор Лаптев. Программа клиента.</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
    </style>
</head>
<body>
<h1 align="center">
    Ваша индивидуальная программа
</h1>
    @foreach($profile->answers as $answer)
        <p>
            {{ $answer->block  }}
        </p>
    @endforeach
</body>
</html>
