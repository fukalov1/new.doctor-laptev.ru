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

                </td>
                <td>
                    {{ $user->city->name }}
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
                    Информация
                </td>
                <td>
                    {{ $profile->response }}
                </td>
            </tr>
            <tr>
                <td>
                    Беспокоит
                </td>
                <td>
                    {{ $profile->response }}
                </td>
            </tr>
            <tr>
                <td>
                    Инвалидность
                </td>
                <td>

                </td>
            </tr>
            <tr>
                <td>
                    Что беспокоит
                </td>
                <td>

                </td>
            </tr>
        </tbody>
    </table>

    <div class="col-sm-6">
        @foreach($questions as $question)
            {{ $question->text }}: <br/>
            @endforeach

    </div>
</div>
