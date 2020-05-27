<?php

namespace App\Admin\Actions\Post;

use App\Profile;
use Encore\Admin\Actions\BatchAction;
use Illuminate\Database\Eloquent\Collection;

class BatchProcessed extends BatchAction
{
    public $name = 'групповая обработка анкет';

    public function handle(Collection $collection)
    {
        $profile = new Profile();
        foreach ($collection as $model) {
            $profile->find($model->id)->update(['processed' => 1]);
        }

        return $this->response()->success('Выбранные анкеты успешно обработаны')->refresh();
    }

}
