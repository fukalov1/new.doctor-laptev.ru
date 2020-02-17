<?php

namespace App\Admin\Extensions\Form;

use Encore\Admin\Form\Field;

class CKEditor extends Field
{
    public static $js = [
        '//cdn.ckeditor.com/4.9.2/full/ckeditor.js',
        '/js/ckeditor.config.js',
//        '/packages/ckeditor/ckeditor.js',
        '/js/ckfinder/ckfinder.js',
        '/packages/ckeditor/adapters/jquery.js',
//        '/packages/ckeditor/plugins/imageuploader',
    ];

    protected $view = 'admin.ckeditor';

    public function render()
    {
        $this->script = "var editor = $('textarea.{$this->getElementClassString()}').ckeditor();";
//        $this->script .= "CKFinder.setupCKEditor( editor, '/ckfinder/' ) ;";


        return parent::render();
    }
}
