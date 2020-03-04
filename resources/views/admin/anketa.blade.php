<div class="form-group">

    <table class="table table-stripe">
        <tbody>
            <tr>
                <td>
                    Город
                </td>
                <td>
                    {{ $user->city->name }}
                </td>
            </tr>
            <tr>
                <td>
                    ФИО
                </td>
                <td>
                    {{ $user->name }}
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
