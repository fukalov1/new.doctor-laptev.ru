@component('mail::message')
Верификация почтового адреса

Вы получили это письмо, так как регистрировались на сайте https://doctor-laptev.ru
Для подтверждения почты нажмите на кнопку "Подтвердить email".
Если Вы не регистрировались, игнорируйте это письмо.

@component('mail::button', ['url' => route('register.verify', ['token' => $user->verify_token])])
    Подтвердить email
@endcomponent

С уважением, администрация сайта Доктор Лаптев<br>
{{ config('app.name') }}
@endcomponent
