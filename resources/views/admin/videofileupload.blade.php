<link href="{{ asset('/assets/css/style.css') }}" rel="stylesheet" />

    <style>
        .video-file {
            padding: 3px 5px;
        }
    </style>

    <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>

    <div class="form-group">
        <h1>
           {{ $payservice->name }}
        </h1>
    </div>


    <div class="form-group">

        <form action="/admin/video-files/save" method="post">
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
        <form id="upload" method="post" action="/admin/ajax-upload" enctype="multipart/form-data">
            <label>Файлы к сервису (m4v,webm,ogv,mp4)</label>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div id="drop">
                <a>Выберите файл</a>
                <input type="file" name="upl" multiple="" />
            </div>

            <ul>
                <!-- The file uploads will be shown here -->
            </ul>

        </form>
        <label>Схранненные файлы</label><br/>
        @if ($payservice->video_m4v)
            <div class="video-file m4v row">
                <div class="col-md-6">
                    {{ $payservice->video_m4v }}
                </div>
                <div class="col-md-3">
                    <button class="btn btn-success"> просмотр </button>
                </div>
                <div class="col-md-3">
                <form action="/admin/video-files/delete" method="post">
                    <input type="hidden" name="filename" value="{{ $payservice->video_m4v }}">
                    <input type="hidden" name="filetype" value="video_m4v">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-danger"> удалить </button>
                </form>
                </div>
            </div>
        @endif
        @if ($payservice->video_webm)
            <div class="video-file webm row">
                <div class="col-md-6">
                    {{ $payservice->video_webm }}
                </div>
                <div class="col-md-3">
                    <button class="btn btn-success"> просмотр </button>
                </div>
                <div class="col-md-3">
                <form action="/admin/video-files/delete" method="post">
                    <input type="hidden" name="filename" value="{{ $payservice->video_webm }}">
                    <input type="hidden" name="filetype" value="video_webm">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-danger"> удалить </button>
                </form>
                </div>
            </div>
        @endif
        @if ($payservice->video_ogv)
            <div class="video-file ogv row">
                <div class="col-md-6">
                    {{ $payservice->video_ogv }}
                </div>
                <div class="col-md-3">
                    <button class="btn btn-success"> просмотр </button>
                </div>
                <div class="col-md-3">
                <form action="/admin/video-files/delete" method="post">
                    <input type="hidden" name="filename" value="{{ $payservice->video_ogv }}">
                    <input type="hidden" name="filetype" value="video_ogv">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-danger"> удалить </button>
                </form>
                </div>
            </div>
        @endif
        @if ($payservice->video_mp4)
            <div class="video-file mp4 row">
                <div class="col-md-6">
                    {{ $payservice->video_mp4 }}
                </div>
                <div class="col-md-3">
                    <button class="btn btn-success"> просмотр </button>
                </div>
                <div class="col-md-3">
                <form action="/admin/video-files/delete" method="post">
                    <input type="hidden" name="filename" value="{{ $payservice->video_mp4 }}">
                    <input type="hidden" name="filetype" value="video_mp4">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-danger"> удалить </button>
                </form>
                </div>
            </div>
        @endif
        @if ($payservice->audio_mp3)
            <div class="video-file mp4 row">
                <div class="col-md-6">
                    {{ $payservice->audio_mp3 }}
                </div>
                <div class="col-md-3">
                    <button class="btn btn-success"> просмотр </button>
                </div>
                <div class="col-md-3">
                <form action="/admin/video-files/delete" method="post">
                    <input type="hidden" name="filename" value="{{ $payservice->audio_mp3 }}">
                    <input type="hidden" name="filetype" value="audio_mp3">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-danger"> удалить </button>
                </form>
                </div>
            </div>
        @endif

    </div>



<script src="{{ '/assets/js/jquery.knob.js' }}"></script>

<!-- jQuery File Upload Dependencies -->
<script src="{{ asset('/assets/js/jquery.ui.widget.js') }}"></script>
<script src="{{ asset('/assets/js/jquery.iframe-transport.js') }}"></script>
<script src="{{ asset('/assets/js/jquery.fileupload.js') }}"></script>

<!-- Our main JS file -->
<script src="{{ asset('/assets/js/script.js') }}"></script>
