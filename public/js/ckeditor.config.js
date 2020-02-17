CKEDITOR.config.enterMode = CKEDITOR.ENTER_DIV;
CKEDITOR.config.extraAllowedContent = '*(*);div(*){*}[*]';
CKEDITOR.config.lang = 'ru';
CKEDITOR.config.autoParagraph = false;
CKEDITOR.config.filebrowserBrowseUrl =  '/ckfinder/browser';

CKEDITOR.editorConfig = function( config ) {
    config.lang  = 'ru';
    config.extraPlugins = 'imageuploader';
    config.filebrowserBrowseUrl =  '/ckfinder/browser';
    config.filebrowserImageBrowseUrl =  '/ckfinder/browser';
    config.filebrowserUploadUrl = '/ckfinder/browser?type=Files';
    config.filebrowserImageUploadUrl = '/ckfinder/browser?command=QuickUpload&type=Images';
};
