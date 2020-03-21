<?php

namespace App\Admin\Extensions\Form\Field;

use Encore\Admin\Form\Field\File;
use App\Code;
use Illuminate\Support\Facades\Log;

class FileCode extends File
{
//    use PlainInput;

    protected $view = 'admin::form.file';

    public function prepare($file)
    {
        if (request()->has(static::FILE_DELETE_FLAG)) {
            return $this->destroy();
        }


        $id = $this->getId(request()->getPathInfo());
        if($id>0)
            $this->importCode($id, $file);
        $this->name = $this->getStoreName($file);

        return $this->uploadAndDeleteOriginal($file);
    }

    protected function importCode($group_code_id, $file)
    {
        $error ='';
        $count=0;
        $lines=file($file);
        for($i=0;$i<count($lines);$i++)
        {
            $code = preg_replace("/\s/","",$lines[$i]);
            try {
                Code::updateOrCreate(['group_code_id' => $group_code_id, 'code' => $code]);
                $count++;
            }
            catch (\Exception $exception) {
                $error++;
            }
        }
        Log::info("Import $count codes for group $group_code_id. Skip records: $error");
    }

    protected function getId($path)
    {
        $arr=[];
        preg_match("/\/(.*)\/(.*)\/(.*)/", $path, $arr);
        if (count($arr)>0)
            return (int)$arr[count($arr)-1];
        else
            return 0;
    }
}
