@extends('layouts.page')


@section('content')

    <div id="home">

        <!-- banner slider -->
        <div id="homepage-slider" class="st-slider">
            <input type="radio" class="cs_anchor radio" name="slider" id="play1" checked="" />
            <input type="radio" class="cs_anchor radio" name="slider" id="slide1" />
            <input type="radio" class="cs_anchor radio" name="slider" id="slide2" />
            <input type="radio" class="cs_anchor radio" name="slider" id="slide3" />
            <div class="images">
                <div class="images-inner">
                    <div class="image-slide">
                        <div class="banner-w3pvt-1">
                            <div class="overlay-w3ls">

                            </div>

                        </div>
                    </div>
                    <div class="image-slide">
                        <div class="banner-w3pvt-2">
                            <div class="overlay-w3ls">

                            </div>
                        </div>
                    </div>
                    <div class="image-slide">
                        <div class="banner-w3pvt-3">
                            <div class="overlay-w3ls">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="labels">
                <div class="fake-radio">
                    <label for="slide1" class="radio-btn"></label>
                    <label for="slide2" class="radio-btn"></label>
                    <label for="slide3" class="radio-btn"></label>
                </div>
            </div>
            <!-- banner-hny-info -->
            <div class="banner-hny-info">
                <h3>Создаем новое
                    <br>Пишевое поведение</h3>
                <div class="top-buttons mx-auto text-center mt-md-5 mt-3">
                    <a href="single.html" class="btn more mr-2">Подробнее</a>
                    <a href="contact.html" class="btn">Записаться</a>
                </div>
                <div class="d-flex hny-stats-inf">
                    <div class="col-md-4 stats_w3pvt_counter_grid mt-3">
                        <div class="d-md-flex justify-content-center">
                            <h5 class="counter">38</h5>
                            <p class="para-w3pvt">лет практики</p>
                        </div>
                    </div>
                    <div class="col-md-4 stats_w3pvt_counter_grid mt-3">
                        <div class="d-md-flex justify-content-center">
                            <h5 class="counter">200000</h5>
                            <p class="para-w3pvt"> тренингов</p>
                        </div>
                    </div>
                    <div class="col-md-4 stats_w3pvt_counter_grid mt-3">
                        <div class="d-md-flex justify-content-center">
                            <h5 class="counter">300000</h5>
                            <p class="para-w3pvt">пациентов</p>
                        </div>
                    </div>
                </div>

            </div>
            <!-- //banner-hny-info -->
        </div>
        <!-- //banner slider -->
    </div>
    <!-- //banner -->

    <!-- //home -->

    <!-- about -->
    <section class="about py-5">
        <div class="container p-md-5">
            <div class="about-hny-info text-left px-md-5">
                <h3 class="tittle-w3ls mb-3"><span class="pink">Доктор</span> Лаптев</h3>
                <p class="sub-tittle mt-3 mb-4">Лаптев Андрей Викторович - врач-психиатр, психотерапевт, нарколог, психолог.  Окончил московский  медицинский  институт им. Семашко, лечебный факультет. Специализация психиатрия и психотерапия. Врачебный стаж с 1983г. Работал врачом-ординатором в психиатрической больнице №15 в остром отделении и в отделении лечения наркоманов. Четыре года заведовал наркологическим стационаром. Более двадцати лет занимается частной психотерапевтической и психологической практикой. Гипнолог, суггестолог, аддиктолог (специалист по зависимостям), коучинг тренер. Работал во многих городах России и ближнего зарубежья. Широко известен авторскими психологическими тренингами по коррекции пищевого поведения. Огромный практический опыт сделал Лаптева Андрея Викторовича специалистом экстра-класса в этой области. На своих тренингах Андрей Викторович раскрывает тонкие психологические причины появления булимии, эмоциональной зависимости от еды и других признаков неправильного пищевого поведения. Каждый тренинг уникален и представляет собой сплав современных психотехник. Используется как групповой ,так и индивидуальный коучинг. В процессе тренинга происходит обучение новому пищевому поведению, вырабатываются приёмы самоконтроля и самосуггестии, нивелируются симптомы зависимости от еды.</p>
                <a class="btn more black" href="single.html" role="button">Читать больше</a>
            </div>
        </div>
    </section>
    <!-- //about -->
    <!--/ab-->
    <section class="banner_bottom py-5">
        <div class="container py-md-5">
            <div class="row inner_sec_info">

                <div class="col-md-6 banner_bottom_grid help">
                    <img src="images/ab.jpg" alt=" " class="img-fluid">
                </div>
                <div class="col-md-6 banner_bottom_left mt-lg-0 mt-4">
                    <h4><a class="link-hny" href="services.html">
                            Тренинги в городах и онлайн-поддержка</a></h4>
                    <p>Постоянно проводим выездные треннинги в городах России</p>
                    <p>Всегда на связи и рядом! Постоянная онлайн-поддержка и видео-сеансы для пациентов.</p>
                    <a class="btn more black mt-3" href="services.html" role="button">Подробнее</a>

                </div>
            </div>
            <div class="row features-w3pvt-main" id="features">
                <div class="col-md-4 feature-gird">
                    <div class="row features-hny-inner-gd">
                        <div class="col-md-3 featured_grid_left">
                            <div class="icon_left_grid">
                                <span class="fa fa-globe" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="col-md-9 featured_grid_right_info pl-lg-0">
                            <h4><a class="link-hny" href="single.html">Онлайн-сервисы</a></h4>
                            <p>Эта услуга дает возможность перезапустить программу, продлить программу, выполнить дополнительный питьевой режим или приступить к выполнению программы через некоторое время после основного тренинга.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 feature-gird">
                    <div class="row features-hny-inner-gd">
                        <div class="col-md-3 featured_grid_left">
                            <div class="icon_left_grid">
                                <span class="fa fa-laptop" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="col-md-9 featured_grid_right_info pl-lg-0">
                            <h4><a class="link-hny" href="single.html">Нейромозговые карты</a></h4>
                            <p>Лаптев Андрей Викторович создаёт для своих клиентов удивительные картины. Источником вдохновения становятся мозговые волны, которые вырабатывает мозг доктора во время суггестивной фиксации или в момент максимального психоэмоционального напряжения при проведении сеансов.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 feature-gird">
                    <div class="row features-hny-inner-gd">
                        <div class="col-md-3 featured_grid_left">
                            <div class="icon_left_grid">
                                <span class="fa fa-handshake-o" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="col-md-9 featured_grid_right_info pl-lg-0">
                            <h4><a class="link-hny" href="single.html">Восстанавливающий сеанс</a></h4>
                            <p>Lorem Ipsum is simply text the printing and typesetting standard industry.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--//ab-->

    <!--/services-->
    <section class="services" id="services">
        <div class="over-lay-blue py-5">
            <div class="container py-md-5">
                <div class="row my-4">
                    <div class="col-lg-5 services-innfo pr-5">
                        <h3 class="tittle-w3ls two mb-3 text-left"><span class="pink">Мой</span> арсенал</h3>
                        <p class="sub-tittle mt-2 mb-sm-3 text-left">Современные психотехники и авторские разработки.</p>
                        <a href="services.html"><img src="images/ab2.jpg" alt="w3pvt" class="img-fluid"></a>
                    </div>
                    <div class="col-lg-7 services-grid-inf">
                        <div class="row services-w3pvt-main mt-5">
                            <div class="col-lg-6 feature-gird">
                                <div class="row features-hny-inner-gd mt-3">
                                    <div class="col-md-2 featured_grid_left">
                                        <div class="icon_left_grid">
                                            <span class="fa fa-paint-brush" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-10 featured_grid_right_info">
                                        <h4><a class="link-hny" href="single.html">Суггестивные формулы</a></h4>
                                        <p>Lorem Ipsum is simply text the printing and typesetting standard industry.</p>

                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6 feature-gird">
                                <div class="row features-hny-inner-gd mt-3">
                                    <div class="col-md-2 featured_grid_left">
                                        <div class="icon_left_grid">
                                            <span class="fa fa-bullhorn" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-10 featured_grid_right_info">
                                        <h4><a class="link-hny" href="single.html">Снятие зажимов</a></h4>
                                        <p>Lorem Ipsum is simply text the printing and typesetting standard industry.</p>

                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="row services-w3pvt-main mt-5">
                            <div class="col-lg-6 feature-gird ">
                                <div class="row features-hny-inner-gd mt-3">
                                    <div class="col-md-2 featured_grid_left">
                                        <div class="icon_left_grid">
                                            <span class="fa fa-shield" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-10 featured_grid_right_info">
                                        <h4><a class="link-hny" href="single.html">Рефрейминг</a></h4>
                                        <p>Lorem Ipsum is simply text the printing and typesetting standard industry.</p>

                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6 feature-gird">
                                <div class="row features-hny-inner-gd mt-3">
                                    <div class="col-md-2 featured_grid_left">
                                        <div class="icon_left_grid">
                                            <span class="fa fa-lightbulb-o" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-10 featured_grid_right_info">
                                        <h4><a class="link-hny" href="single.html">Психопластика желудка</a></h4>
                                        <p>Lorem Ipsum is simply text the printing and typesetting standard industry.</p>

                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//services-->
    <!-- /projects -->
    <section class="projects py-5" id="gallery">
        <div class="container py-md-5">
            <h3 class="tittle-w3ls text-left mb-5"><span class="pink">Потрясающие</span> результаты!</h3>
            <div class="row news-grids mt-md-5 mt-4 text-center">
                <div class="col-md-4 gal-img">
                    <a href="#gal1"><img src="images/g1.jpg" alt="w3pvt" class="img-fluid"></a>
                    <div class="gal-info">
                        <h5>View Project<span class="decription">Website</span></h5>
                    </div>
                </div>
                <div class="col-md-4 gal-img">
                    <a href="#gal2"><img src="images/g2.jpg" alt="w3pvt" class="img-fluid"></a>
                    <div class="gal-info">
                        <h5>View Project<span class="decription">Website</span></h5>
                    </div>
                </div>
                <div class="col-md-4 gal-img">
                    <a href="#gal3"><img src="images/g3.jpg" alt="w3pvt" class="img-fluid"></a>
                    <div class="gal-info">
                        <h5>View Project<span class="decription">Website</span></h5>
                    </div>
                </div>
                <div class="col-md-4 gal-img">
                    <a href="#gal4"><img src="images/g4.jpg" alt="w3pvt" class="img-fluid"></a>
                    <div class="gal-info">
                        <h5>View Project<span class="decription">Website</span></h5>
                    </div>
                </div>

                <div class="col-md-4 gal-img">
                    <a href="#gal5"><img src="images/g5.jpg" alt="w3pvt" class="img-fluid"></a>
                    <div class="gal-info">
                        <h5>View Project<span class="decription">Website</span></h5>
                    </div>
                </div>
                <div class="col-md-4 gal-img">
                    <a href="#gal6"><img src="images/g6.jpg" alt="w3pvt" class="img-fluid"></a>
                    <div class="gal-info">
                        <h5>View Project<span class="decription">Website</span></h5>
                    </div>
                </div>
                <div class="col-md-4 gal-img">
                    <a href="#gal7"><img src="images/g7.jpg" alt="w3pvt" class="img-fluid"></a>
                    <div class="gal-info">
                        <h5>View Project<span class="decription">Website</span></h5>
                    </div>
                </div>
                <div class="col-md-4 gal-img">
                    <a href="#gal8"><img src="images/g8.jpg" alt="w3pvt" class="img-fluid"></a>
                    <div class="gal-info">
                        <h5>View Project<span class="decription">Website</span></h5>
                    </div>
                </div>
                <div class="col-md-4 gal-img">
                    <a href="#gal9"><img src="images/g9.jpg" alt="w3pvt" class="img-fluid"></a>
                    <div class="gal-info">
                        <h5>View Project<span class="decription">Website</span></h5>
                    </div>
                </div>

            </div>
            <!-- popup-->
            <div id="gal1" class="pop-overlay">
                <div class="popup">
                    <img src="images/g1.jpg" alt="Popup Image" class="img-fluid" />
                    <p class="mt-4">Nulla viverra pharetra se, eget pulvinar neque pharetra ac int. placerat placerat dolor.</p>
                    <a class="close" href="#gallery">&times;</a>
                </div>
            </div>
            <!-- //popup -->
            <!-- popup-->
            <div id="gal2" class="pop-overlay">
                <div class="popup">
                    <img src="images/g2.jpg" alt="Popup Image" class="img-fluid" />
                    <p class="mt-4">Nulla viverra pharetra se, eget pulvinar neque pharetra ac int. placerat placerat dolor.</p>
                    <a class="close" href="#gallery">&times;</a>
                </div>
            </div>
            <!-- //popup -->
            <!-- popup-->
            <div id="gal3" class="pop-overlay">
                <div class="popup">
                    <img src="images/g3.jpg" alt="Popup Image" class="img-fluid" />
                    <p class="mt-4">Nulla viverra pharetra se, eget pulvinar neque pharetra ac int. placerat placerat dolor.</p>
                    <a class="close" href="#gallery">&times;</a>
                </div>
            </div>
            <!-- //popup3 -->
            <!-- popup-->
            <div id="gal4" class="pop-overlay">
                <div class="popup">
                    <img src="images/g4.jpg" alt="Popup Image" class="img-fluid" />
                    <h5>View Project</h5>
                    <p class="mt-4">Nulla viverra pharetra se, eget pulvinar neque pharetra ac int. placerat placerat dolor.</p>
                    <a class="close" href="#gallery">&times;</a>
                </div>
            </div>
            <!-- //popup -->
            <!-- popup-->
            <div id="gal5" class="pop-overlay">
                <div class="popup">
                    <img src="images/g5.jpg" alt="Popup Image" class="img-fluid" />
                    <h5 class="mt-3">View Project</h5>
                    <p class="mt-4">Nulla viverra pharetra se, eget pulvinar neque pharetra ac int. placerat placerat dolor.</p>
                    <a class="close" href="#gallery">&times;</a>
                </div>
            </div>
            <!-- //popup -->
            <!-- popup-->
            <div id="gal6" class="pop-overlay">
                <div class="popup">
                    <img src="images/g6.jpg" alt="Popup Image" class="img-fluid" />
                    <h5 class="mt-3">View Project</h5>
                    <p>Nulla viverra pharetra se, eget pulvinar neque pharetra ac int. placerat placerat dolor.</p>
                    <a class="close" href="#gallery">&times;</a>
                </div>
            </div>
            <!-- //popup -->
            <!-- popup-->
            <div id="gal7" class="pop-overlay">
                <div class="popup">
                    <img src="images/g7.jpg" alt="Popup Image" class="img-fluid" />
                    <h5 class="mt-3">View Project</h5>
                    <p class="mt-4">Nulla viverra pharetra se, eget pulvinar neque pharetra ac int. placerat placerat dolor.</p>
                    <a class="close" href="#gallery">&times;</a>
                </div>
            </div>
            <!-- //popup -->
            <!-- popup-->
            <div id="gal8" class="pop-overlay">
                <div class="popup">
                    <img src="images/g8.jpg" alt="Popup Image" class="img-fluid" />
                    <h5 class="mt-3">View Project</h5>
                    <p class="mt-4">Nulla viverra pharetra se, eget pulvinar neque pharetra ac int. placerat placerat dolor.</p>
                    <a class="close" href="#gallery">&times;</a>
                </div>
            </div>
            <!-- //popup -->
            <!-- popup-->
            <div id="gal9" class="pop-overlay">
                <div class="popup">
                    <img src="images/g9.jpg" alt="Popup Image" class="img-fluid" />
                    <h5 class="mt-3">View Project</h5>s
                    <p class="mt-4">Nulla viverra pharetra se, eget pulvinar neque pharetra ac int. placerat placerat dolor.</p>
                    <a class="close" href="#gallery">&times;</a>
                </div>
            </div>
            <!-- //popup -->
        </div>
    </section>
    <!-- //projects -->
    <!-- /blogs -->
    <section class="blog-posts" id="blog">
        <div class="blog-w3pvt-info-content container-fluid">
            <h3 class="tittle-w3ls text-center mb-5">Что почитать...</h3>
            <div class="blog-grids-main row text-left">
                <div class="col-lg-3 col-md-6 blog-grid-img px-0">
                    <img src="images/g2.jpg" alt="Popup Image" class="img-fluid" />
                </div>
                <div class="col-lg-3 col-md-6 blog-grid-info px-0">
                    <div class="date-post">
                        <h6 class="date">May, 04th 2019</h6>
                        <h4><a class="link-hny" href="single.html">Как удержать вес после похудения</a></h4>
                        <p>Как стать стройным, похудеть, обрести желанные формы – большинство полных людей знают о здоровом образе жизни всё, или почти всё. Несмотря на это, армия страдающих ожирением неуклонно растёт. Интернет буквально напичкан разными советами - как похудеть быстро, «сжечь» лишние калории, убрать жир с живота, какой диеты придерживаться.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 blog-grid-img px-0">
                    <img src="images/g4.jpg" alt="Popup Image" class="img-fluid" />
                </div>
                <div class="col-lg-3 col-md-6 blog-grid-info px-0 ">
                    <div class="date-post">
                        <h6 class="date">May, 04th 2019</h6>
                        <h4><a class="link-hny" href="single.html">Слабительные средства при похудении</a></h4>
                        <p>При похудении очень важна регулярная работа кишечника. Сбои в работе пищеварительной системы не только мешают похудеть, но и ведут к быстрой утомляемости, нарушению сна, неприятной тяжести и вздутию в области живота.</p>
                    </div>
                </div>

            </div>
            <div class="blog-grids-main row text-left">

                <div class="col-lg-3 col-md-6 blog-grid-info px-0">
                    <div class="date-post">
                        <h6 class="date">May, 04th 2019</h6>
                        <h4><a class="link-hny" href="single.html">Витамины и микроэлементы для быстрого похудения</a></h4>
                        <p>В современном мире взаимоотношение человека и природы стало качественно меняться. Создано множество искусственных экосистем, среда обитания стала другой, природные ресурсы существенно истощились. Неконтролируемая деятельность человека влияет на его здоровье, внешний вид и самочувствие.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 blog-grid-img px-0">
                    <img src="images/g6.jpg" alt="Popup Image" class="img-fluid" />
                </div>

                <div class="col-lg-3 col-md-6 blog-grid-info px-0">
                    <div class="date-post">
                        <h6 class="date">May, 04th 2019</h6>
                        <h4><a class="link-hny" href="single.html">Углеводы - условие для похудения</a></h4>
                        <p>Мнение, что углеводы ведут к лишнему весу, верно лишь отчасти. Для жизнедеятельности организма они необходимы. Здоровое питание предполагает, что при составлении меню для похудения следует учитывать гликемический индекс продуктов, которые мы потребляем.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 blog-grid-img px-0">
                    <img src="images/g8.jpg" alt="Popup Image" class="img-fluid" />
                </div>

            </div>
        </div>

    </section>
    <!-- //blogs -->
    <!--/mid-->
    <section class="banner_bottom py-5" id="appointment">
        <div class="container py-md-5">
            <div class="row inner_sec_info">


                <div class="col-lg-5 banner_bottom_left">

                    <div class="login p-md-5 p-4 mx-auto bg-white mw-100">
                        <h4>
                            Письмо Доктору Лаптеву</h4>
                        <form action="#" method="post">
                            <div class="form-group">
                                <label>Ваше имя</label>

                                <input type="text" class="form-control" id="validationDefault01" placeholder="" required="">
                            </div>
                            <div class="form-group">
                                <label>Ваш Email</label>
                                <input type="text" class="form-control" id="validationDefault02" placeholder="" required="">
                            </div>

                            <div class="form-group mb-4">
                                <label class="mb-2">Ваш телефон</label>
                                <input type="text" class="form-control" id="password1" placeholder="" required="">
                            </div>

                            <button type="submit" class="btn more black submit mb-4">Отправить</button>

                        </form>

                    </div>

                </div>
                <div class="col-lg-7 banner_bottom_grid help pl-lg-5">
                    <img src="images/ab2.jpg" alt=" " class="img-fluid mb-4">
                    <h4><a class="link-hny" href="contact.html">Stat Your Project Now?</a></h4>
                    <p class="mt-3">Lorem Ipsum is simply text the printing and typesetting standard industry.Quisque sagittis lacus eu lorem. </p>

                </div>
            </div>

        </div>
    </section>
    <!--//mid-->

    <!--/services-->
    <section class="testmonials" id="test">
        <div class="over-lay-blue py-5">
            <div class="container py-md-5">
                <h3 class="tittle-w3ls two text-center mb-5">Отзывы</h3>
                <div class="row my-4">
                    <div class="col-lg-4 testimonials_grid mt-3">
                        <div class="p-lg-5 p-4 testimonials-gd-vj">
                            <p class="sub-test"><span class="fa fa-quote-left s4" aria-hidden="true"></span> Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod possimus, omnis voluptas.
                            </p>
                            <div class="row mt-4">
                                <div class="col-3 testi-img-res">
                                    <img src="images/t1.jpg" alt=" " class="img-fluid">
                                </div>
                                <div class="col-9 testi_grid">
                                    <h5 class="mb-2">Thomas Carl</h5>
                                    <p>Add xxxx</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 testimonials_grid mt-3">
                        <div class="p-lg-5 p-4 testimonials-gd-vj">
                            <p class="sub-test"><span class="fa fa-quote-left s4" aria-hidden="true"></span>Quisque sagittis lacus eu lorem , cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod possimus.
                            </p>
                            <div class="row mt-4">
                                <div class="col-3 testi-img-res">
                                    <img src="images/t2.jpg" alt=" " class="img-fluid">
                                </div>
                                <div class="col-9 testi_grid">
                                    <h5 class="mb-2">Adam Ster</h5>
                                    <p>Add xxxx</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 testimonials_grid mt-3">
                        <div class="p-lg-5 p-4 testimonials-gd-vj">
                            <p class="sub-test"><span class="fa fa-quote-left s4" aria-hidden="true"></span> Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod possimus, omnis voluptas.
                            </p>
                            <div class="row mt-4">
                                <div class="col-3 testi-img-res">
                                    <img src="images/t1.jpg" alt=" " class="img-fluid">
                                </div>
                                <div class="col-9 testi_grid">
                                    <h5 class="mb-2">Dane Walker</h5>
                                    <p>Add xxxx</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//testimonials-->

    <!-- /news-letter -->
    <section class="news-letter-w3pvt py-5">
        <div class="container contact-form mx-auto text-left">
            <h3 class="title-w3ls two text-left mb-3">Newsletter </h3>
            <form method="post" action="#" class="w3ls-frm">
                <div class="row subscribe-sec">
                    <p class="news-para col-lg-3">Start working together?</p>
                    <div class="col-lg-6 con-gd">
                        <input type="email" class="form-control" id="email" placeholder="Your Email here..." name="email" required>

                    </div>
                    <div class="col-lg-3 con-gd">
                        <button type="submit" class="btn submit">Subscribe</button>
                    </div>

                </div>

            </form>
        </div>
    </section>
    <!-- //news-letter -->

@stop
