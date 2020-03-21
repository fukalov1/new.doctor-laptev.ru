<?php

/**
 * Laravel-admin - admin builder based on Laravel.
 * @author z-song <https://github.com/z-song>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 * Encore\Admin\Form::forget(['map', 'editor']);
 *
 * Or extend custom form field:
 * Encore\Admin\Form::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */

Admin::js('/js/custom.js');


use Encore\Admin\Form;
use App\Admin\Extensions\Form\CKEditor;
use App\Admin\Extensions\Form\Field\MyResizeImage;
use App\Admin\Extensions\Form\Field\ImageReview;
use App\Admin\Extensions\Form\Field\TextTranslate;
use App\Admin\Extensions\Form\Field\FileCode;

Form::extend('ckeditor', CKEditor::class);
Form::extend('translate', TextTranslate::class);
Form::extend('myimage', MyResizeImage::class);
Form::extend('imageReview', ImageReview::class);
Form::extend('filecode', FileCode::class);

