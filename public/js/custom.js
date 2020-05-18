$(document).ready(function() {


    function removePhoto (id) {
        console.log('remove photo', id);
        $.ajax({
            url: "/admin/remove_photo",
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "Get",
            data: {id: id},
            success: function (data) {
                $('.photo'+id).remove();
            },
            error: function (data) {
                console.log('Фото не удалено.', id);
            },
            complete: function (data) {
            }
        });
    }

    $('input[name="siteEnable"]').on('click', function () {
        // if ($(this).val()==1){
            console.log('Включен');
            $.ajax({
                url: "/admin/set-site-enable",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "Post",
                data: {value: $(this).val()},
                success: function (data) {
                    console.log('Состояния сайта ');
                },
                error: function (data) {
                    console.log('Ошибка при изменении состояния сайта');
                },
                complete: function (data) {
                }
            });
        // } else {
        //     console.log('Выключен');
        // }
    });

    if ($( "a" ).hasClass( "modalbox" ))
        $("a.modalbox").fancybox();


    function prepareUrl() {
        let bread_crumbs = '';
        if ($( "input[type=text]" ).hasClass( "url" )) {
            bread_crumbs = $('input.url').attr('rel');
        }

        let url = translit(bread_crumbs+$('input.name').val());
        console.log('bread_crumbs',bread_crumbs,'name', $('input.name').val(), url);
        if ($( "input[type=text]" ).hasClass( "url" ) && $('input.url').val()==='') {
            $('input.url').val(url)
        }
    }

    function translit(s)
    {
        s = s.replace(/\s+/gi, ' '); // удаляем повторяющие пробелы
        s = s.trim(); // убираем пробелы в начале и конце строки
        s = s.toLowerCase(); // переводим строку в нижний регистр (иногда надо задать локаль)
        let tr = {'а' : 'a', 'б' : 'b', 'в' : 'v', 'г' : 'g', 'д' : 'd', 'е' : 'e', 'ё' : 'e', 'ж' : 'j', 'з' : 'z', 'и' : 'i', 'й' : 'y', 'к' : 'k', 'л' : 'l', 'м' : 'm', 'н' : 'n', 'о' : 'o', 'п' : 'p', 'р' : 'r', 'с' : 's', 'т' : 't', 'у' : 'u', 'ф' : 'f', 'х' : 'h', 'ц' : 'c', 'ч' : 'ch', 'ш' : 'sh', 'щ' : 'shch', 'ы' : 'y', 'э' : 'e', 'ю' : 'yu', 'я' : 'ya', 'ъ' : '', 'ь' : '', ' ': '-', '/': '/'};
        let result = s.split('').map((l) => {
            return tr[l];
        });
        // s = s.replace(/[^0-9a-z-_ ]/, ""); // очищаем строку от недопустимых символов
        result = result.join('').replace(/\s+/gi, "-"); // заменяем пробелы знаком минус
        return result; // возвращаем результат
    }


});
