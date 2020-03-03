<div class="form-group">

    <label for="" class="col-sm-12 control-label"> Анкета {{ $profile->user->name }}</label>

    <div class="col-sm-6">
        @foreach($questions as $question)
            {{ $question->text }}: <br/>
            @endforeach

    </div>
</div>
