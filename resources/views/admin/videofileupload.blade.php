<form action="{{ route('ajaxFileUpload') }}" enctype="multipart/form-data" method="POST">


    <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>


    <input type="hidden" name="_token" value="{{ csrf_token() }}">


    <div class="form-group">
        <h1>
            Заголовок
        </h1>
    </div>


    <div class="form-group">
        <label>Файл</label>
        <input type="hidden" name="id" value="1">
        <input type="file" name="file" class="form-control">
    </div>


    <div class="form-group">
        <button class="btn btn-success upload-image" type="submit">Загрузить</button>
    </div>


</form>

<script type="text/javascript">
    $("body").on("click",".upload-image",function(e){
        $(this).parents("form").ajaxForm(options);
    });


    var options = {
        complete: function(response)
        {
            if($.isEmptyObject(response.responseJSON.error)){
                // $("input[name='title']").val('');
                alert('Image Upload Successfully.');
            }else{
                printErrorMsg(response.responseJSON.error);
            }
        }
    };


    function printErrorMsg (msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
    }
</script>
