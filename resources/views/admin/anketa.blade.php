<div class="form-group">

    <label for="" class="col-sm-12 control-label"> Анкета {{ $profile->type }}</label>

    Город {{ $user->city }}<br/>
    Ф.И.О {{ $user->name }}<br/>
    Телефон {{ $user->phone }}<br/>
    Email {{ $profile->user->email }}<br/>
    Полных лет {{ $profile->age }}<br/>
    Вес (в кг) {{$profile->weight }} Рост: {{ $profile->rost }}<br/>
    Артериальное давление {{ $profile->davlen }}<br/>
    Информация: Беспокоит:<br/>
    Инвалидность: нет<br/>
    Узнал из: от знакомых<br/>

    <div class="col-sm-6">
        @foreach($questions as $question)
            {{ $question->text }}: <br/>
            @endforeach

    </div>
</div>
