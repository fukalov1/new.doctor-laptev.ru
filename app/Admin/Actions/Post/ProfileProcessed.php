<?php

namespace App\Admin\Actions\Post;

use App\Profile;
use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;

class ProfileProcessed extends RowAction
{
    public $name = 'Обработать';

    public function handle(Model $model)
    {
        Profile::find($model->id)->update(['processed' => 1]);
        return $this->response()->success("Анкета ".$model->id." обработана!")->refresh();

    }

}
