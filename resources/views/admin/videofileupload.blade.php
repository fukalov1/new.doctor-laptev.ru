<link href="{{ asset('/assets/css/style.css') }}" rel="stylesheet" />

    <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>

    <div class="form-group">
        <h1>
           {{ $payservice->name }}
        </h1>
    </div>


    <div class="form-group">
        <label>Файлы к сервису (jpg,m4v,webm,ogv,mp4,mp3,txt)</label>
        <form id="upload" method="post" action="/admin/ajax-upload" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div id="drop">
                <a>Выберите файл</a>
                <input type="file" name="upl" multiple="" />
            </div>

            <ul>
                <!-- The file uploads will be shown here -->
            </ul>

        </form>
        test {{ session('payservice_id') }}
        <form action="/admin/save-video-files" method="post">
            <div class="form-group">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-default" type="reset">Отменить</button>
                    </div>
                    <div class="col-md-6 text-right">
                        <button class="btn btn-success" type="submit">Сохранить</button>
                    </div>
                </div>
            </div>
        </form>

    </div>



<script src="{{ '/assets/js/jquery.knob.js' }}"></script>

<!-- jQuery File Upload Dependencies -->
<script src="{{ asset('/assets/js/jquery.ui.widget.js') }}"></script>
<script src="{{ asset('/assets/js/jquery.iframe-transport.js') }}"></script>
<script src="{{ asset('/assets/js/jquery.fileupload.js') }}"></script>

<!-- Our main JS file -->
<script src="{{ asset('/assets/js/script.js') }}"></script>
