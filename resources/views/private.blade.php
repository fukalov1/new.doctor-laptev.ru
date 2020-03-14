@extends('layouts.page')


@section('content')

    <div class="fill-top">

    </div>
    <div class="container p-md-3">
    </div>

    @if(isset($message))
        <section class="banner_bottom py-5">
            <div class="container py-md-5">
        <h3>
            {{  $message }}
            <br/> Через 5 секунд Вы будете перенаправлены на главную страницу
            <meta http-equiv="refresh" content="5;URL=/">
        </h3>
            </div>
        </section>
    @endif

        <section class="banner_bottom py-5" id="app">
            <div class="container py-md-5">
                <h3 class="tittle-w3ls text-left mb-5"><span class="pink">Онлайн</span> сервисы</h3>

                <div class="row">
                    <div class="col-md-12">
                        <pay-service :id="{{ $id }}" :code="'{{ $code }}'">

                        </pay-service>
{{--                        <script>--}}
{{--                            // Обертываем код в функцию для защиты пространства имен--}}
{{--                            var  video = document.getElementById("video1"),--}}
{{--                                playBtn = document.getElementById("video1-play");--}}
{{--                            current = document.getElementById("video1-current");--}}
{{--                            duration = document.getElementById("video1-duration");--}}

{{--                            $(document).ready(function(){--}}

{{--                                /*--}}
{{--                                        $.ajax({--}}
{{--                                            url: "/vso.php",--}}
{{--                                            data: {},--}}
{{--                                            dataType: "html",--}}
{{--                                                success: function(data){--}}
{{--                                //				alert(data);--}}
{{--                                                $('#flash').html(data);--}}
{{--                                            },--}}
{{--                                                error: function(data){--}}
{{--                                                $('#flash').html('<h1>Ошибка показа</h1>');--}}
{{--                                            },--}}
{{--                                                complete: function(data){--}}
{{--                                            }--}}
{{--                                        });--}}

{{--                                */--}}

{{--                                $(document).on("click", "#video1-play", function(){--}}
{{--                                    video.play();--}}
{{--                                    $("#video1-play").hide();--}}
{{--                                });--}}

{{--                                video.addEventListener("loadedmetadata", function() {--}}
{{--                                    duration.innerHTML = formatTime(video.duration);--}}
{{--                                }, false);--}}

{{--// Обновляем текущее время--}}
{{--                                video.addEventListener("timeupdate", function() {--}}
{{--                                    current.innerHTML = formatTime(video.currentTime);--}}
{{--                                    if (current.innerHTML == duration.innerHTML) {--}}
{{--                                        $("#frame").html("<h1>Сеанс окончен</h1>");--}}
{{--                                        $("#play").hide();--}}
{{--                                    }--}}
{{--                                }, false);--}}

{{--                                function formatTime(time) {--}}
{{--                                    var--}}
{{--                                        minutes = Math.floor(time / 60) % 60,--}}
{{--                                        seconds = Math.floor(time % 60);--}}

{{--                                    return   (minutes < 10 ? '0' + minutes : minutes) + ':' +--}}
{{--                                        (seconds < 10 ? '0' + seconds : seconds);--}}
{{--                                }--}}

{{--                            });--}}

{{--                        </script>--}}
                    </div>
                </div>
            </div>
        </section>




@stop
