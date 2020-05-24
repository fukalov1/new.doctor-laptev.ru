<?php

namespace App\Admin\Actions\Post;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;

class ExportPDF extends RowAction
{
    public $name = 'Экспорт PDF';

    public function handle(Model $model)
    {
        $id = $model->id;
        if($id)
            return $this->response()->download('/admin/export/profile-pdf/'.$id);
        else
            return $this->response()->error('Данные для экспорта не найдены')->refresh();

    }

}
