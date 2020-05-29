<section class="banner_bottom py-5" id="appointment">
    <div class="container py-md-5">
        <div class="row inner_sec_info">


            <div class="col-lg-5 banner_bottom_left form-area1">
                @guest
                    <div class="login p-md-5 p-4 mx-auto bg-white mw-100">
                        <h4>
                            Письмо Доктору Лаптеву
                        </h4>
                        Вы сможете отправить письмо после <a href="{{ asset('login') }}">авторизации</a> на сайте
                    </div>
                @else
                    <form id="sendform1" class="send-form" method="post">
                    <div class="login p-md-5 p-4 mx-auto bg-white mw-100">
                    <h4>
                        Письмо Доктору Лаптеву
                    </h4>
                        <div class="form-group">
                            <label>Ваше имя</label>

                            <input type="text" class="form-control" name="name1" id="name1" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label>Ваш E-mail</label>
                            <input type="text" class="form-control" name="email1" id="email1" placeholder="" required>
                        </div>

                        <div class="form-group">
                            <label>Ваш телефон</label>
                            <input type="text" class="form-control phone" name="phone1" id="phone1" placeholder="" required>
                        </div>

                        <div class="form-group">
                            <label>Сообщение</label>
                            <textarea class="form-control" name="message1" id="message1" placeholder="" required></textarea>
                        </div>

                        @csrf
                        <input type="hidden" name="uid" value="1">
                        <button type="button" class="btn more black submit mb-4 submit-button" datarel="1">Отправить</button>
                    </div>
                </form>
                @endguest
            </div>
            <div class="col-lg-7 banner_bottom_grid help pl-lg-5">
                <img src="{{ asset('/uploads/'.$postform->image) }}" alt="{{ $postform->title }}" class="img-fluid mb-4" loading="lazy">
                <h4>{{ $postform->header }}</h4>
                {!!  $postform->text !!}

            </div>
        </div>

    </div>
</section>

<!-- footer -->
<footer class="py-lg-5 py-4" id="contacts">
    <div class="container py-sm-3">
        <div class="row footer-grids">
            <div class="col-lg-4 mt-4">
                <p class="mb-3">
                    <img src="{{asset('/images/logo.jpg')}}" width="300" alt="логотип Доктора Лаптева"/>
                </p>
                <h5>Проверено <span> временем</span>,<br/><span>одобрено</span> людьми.</h5>
                <div class="icon-social mt-4">
                    <a href="#" class="button-footr">
                        <span class="fa mx-2 fa-facebook"></span>
                    </a>
                    <a href="#" class="button-footr">
                        <span class="fa mx-2 fa-twitter"></span>
                    </a>
                    <a href="#" class="button-footr">
                        <span class="fa mx-2 fa-dribbble"></span>
                    </a>
                    <a href="#" class="button-footr">
                        <span class="fa mx-2 fa-pinterest"></span>
                    </a>
                    <a href="#" class="button-footr">
                        <span class="fa mx-2 fa-google-plus"></span>
                    </a>

                </div>
            </div>
{{--            <div class="col-lg-4 mt-4">--}}
{{--                <h4 class="mb-4">Quick Links</h4>--}}
{{--                <div class="links-wthree d-flex">--}}
{{--                    <ul class="list-info-wthree">--}}
{{--                        <li><a href="#"><span class="fa fa-angle-double-right" aria-hidden="true"></span> Online Websites</a></li>--}}
{{--                        <li><a href="#"><span class="fa fa-angle-double-right" aria-hidden="true"></span> Free Application</a></li>--}}
{{--                        <li><a href="#"><span class="fa fa-angle-double-right" aria-hidden="true"></span> Support Helpline</a></li>--}}
{{--                        <li><a href="#"><span class="fa fa-angle-double-right" aria-hidden="true"></span> Privacy Ploicy</a></li>--}}
{{--                        <li><a href="#"><span class="fa fa-angle-double-right" aria-hidden="true"></span> Ready to Build</a></li>--}}
{{--                        <li><a href="#"><span class="fa fa-angle-double-right" aria-hidden="true"></span> Free Application</a></li>--}}
{{--                    </ul>--}}
{{--                    <ul class="list-info-wthree ml-5">--}}
{{--                        <li>--}}
{{--                            <a href="index.html"><span class="fa fa-angle-double-right" aria-hidden="true"></span>--}}
{{--                                Home--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="about.html"><span class="fa fa-angle-double-right" aria-hidden="true"></span>--}}
{{--                                About Us--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="single.html"><span class="fa fa-angle-double-right" aria-hidden="true"></span>--}}
{{--                                Single Page--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="team.html"><span class="fa fa-angle-double-right" aria-hidden="true"></span>--}}
{{--                                Team--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="contact.html"><span class="fa fa-angle-double-right" aria-hidden="true"></span>--}}
{{--                                Contact Us--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="col-lg-8 mt-8 ad-info">
                <h4 class="mb-4">Контактная информация</h4>
                <p><span class="fa fa-map-marker"></span>{{ config('address')  }}<span>Москва.</span></p>
                <p ><span class="fa fa-phone"></span>{{ config('mobile')  }}</p>
                <p ><span class="fa fa-fax"></span> {{ config('phone')  }} </p>
                <p><span class="fa fa-envelope"></span><a href="mailto:{{ config('email')  }}">{{ config('email')  }}</a></p>
            </div>

        </div>
    </div>
</footer>
<!-- //footer -->
<!-- copyright -->
<div class="copy_right p-3 d-flex">
    <div class="container">
        <div class="row d-flex">
            <div class="col-lg-9 copy_w3pvt">
                <p class="text-lg-left text-center">© {{ date('Y', time()) }} Доктор Лаптев. Все права зарегистрированы.</p>

            </div>
            <!-- move top -->
            <div class="col-lg-3 move-top text-lg-right text-center">
                <a href="#home" class="move-top">
                    <span class="fa fa-angle-double-up mt-3" aria-hidden="true"></span>
                </a>
            </div>
            <!-- move top -->
        </div>
    </div>

</div>
<!-- //copyright -->
