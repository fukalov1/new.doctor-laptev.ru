<?php

namespace App\Admin\Actions\Post;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;

class ExportVcard extends RowAction
{
    public $name = 'Контакт VCard';

    public function handle(Model $model)
    {
        $id = $model->id;
        if($id)
            return $this->response()->download('/admin/export/vcard30/'.$id);
        else
            return $this->response()->error('Данные для экспорта не найдены')->refresh();

    }

}
