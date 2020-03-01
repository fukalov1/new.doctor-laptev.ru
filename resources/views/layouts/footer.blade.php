<!-- footer -->
<footer class="py-lg-5 py-4" id="contacts">
    <div class="container py-sm-3">
        <div class="row footer-grids">
            <div class="col-lg-4 mt-4">

                <h2> <a class="footer-brand px-0 mx-0 mb-4" href="index.html">
                    </a>
                </h2>
                <p class="mb-3">
                    <img src="{{asset('/images/logo.jpg')}}" width="300"/>
                </p>
                <h5>Одобрено <span>  людьми</span> </h5>
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
            <div class="col-lg-4 mt-4">
                <h4 class="mb-4">Quick Links</h4>
                <div class="links-wthree d-flex">
                    <ul class="list-info-wthree">
                        <li><a href="#"><span class="fa fa-angle-double-right" aria-hidden="true"></span> Online Websites</a></li>
                        <li><a href="#"><span class="fa fa-angle-double-right" aria-hidden="true"></span> Free Application</a></li>
                        <li><a href="#"><span class="fa fa-angle-double-right" aria-hidden="true"></span> Support Helpline</a></li>
                        <li><a href="#"><span class="fa fa-angle-double-right" aria-hidden="true"></span> Privacy Ploicy</a></li>
                        <li><a href="#"><span class="fa fa-angle-double-right" aria-hidden="true"></span> Ready to Build</a></li>
                        <li><a href="#"><span class="fa fa-angle-double-right" aria-hidden="true"></span> Free Application</a></li>
                    </ul>
                    <ul class="list-info-wthree ml-5">
                        <li>
                            <a href="index.html"><span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="about.html"><span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="single.html"><span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                Single Page
                            </a>
                        </li>
                        <li>
                            <a href="team.html"><span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                Team
                            </a>
                        </li>
                        <li>
                            <a href="contact.html"><span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                Contact Us
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 mt-4 ad-info">
                <h4 class="mb-4">Contact Info</h4>
                <p><span class="fa fa-map-marker"></span>{{ config('address')  }}<span>Москва.</span></p>
                <p class="phone"><span class="fa fa-phone"></span>{{ config('mobile')  }}</p>
                <p class="phone"><span class="fa fa-fax"></span> {{ config('phone')  }} </p>
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
                <p class="text-lg-left text-center">© 2019 Доктор Лаптев. Все права зарегистрированы.</p>

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
