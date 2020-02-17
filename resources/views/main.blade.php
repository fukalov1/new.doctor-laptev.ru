@extends('layouts.page')


@section('content')

    <!-- HOME SLIDER -->
    <div class="slider-wrap home-1-slider" id="home">
        <div id="mainSlider" class="nivoSlider slider-image">
            <img src="/img/slider1.jpg" alt="main slider" title="#htmlcaption1"/>
            <img src="/img/slider1.jpg" alt="main slider" title="#htmlcaption2"/>
            <img src="/img/slider1.jpg" alt="main slider" title="#htmlcaption3"/>
        </div>
        <div id="htmlcaption1" class="nivo-html-caption slider-caption-1">
            <div class="slider-progress"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="slide1-text slide-text">
                            <div class="middle-text">
                                <div class="left_sidet1">
                                    <div class="cap-title wow slideInRight" data-wow-duration=".9s" data-wow-delay="0s">
                                        <h1>Оборудование для СТО</h1>
                                    </div>
                                    <div class="cap-dec wow slideInRight" data-wow-duration="1.1s" data-wow-delay="0s">
                                        <h2>Мы предлагаем самое современнои и технологичное оборудование для СТО, автосервисов, автомоек и пр.</h2>
                                    </div>
                                    <div class="cap-readmore animated fadeInUpBig" data-wow-duration="1.5s" data-wow-delay=".5s">
                                        <a href="#" >Заказать</a>
                                        <!--										<a href="#" class="hover_slider_button">Смотреть каталог</a>-->
                                    </div>
                                </div>
                                <div class="right_sidet1">
                                    <div class="slide-image1">
                                        <img class="wow slideInUp"  data-wow-duration="1.5s" data-wow-delay="0s" src="/img/home1/1.png" alt="slider caption" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="htmlcaption2" class="nivo-html-caption slider-caption-2">
            <div class="slider-progress"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="slide2-text slide-text">
                            <div class="middle-text">
                                <div class="left_sidet1">
                                    <div class="cap-title wow bounceInDown" data-wow-duration=".9s" data-wow-delay="0s">
                                        <h1>Компрессорное оборудование</h1>
                                    </div>
                                    <div class="cap-dec wow slideInRight" data-wow-duration="1.1s" data-wow-delay="0s">
                                        <h2>Предлагаем широкий ассортимент насосного и копрессорного оборудования лучших производителей!</h2>
                                    </div>
                                    <div class="cap-readmore animated fadeInUpBig" data-wow-duration="1.5s" data-wow-delay=".5s">
                                        <a href="#" >Купить сейчас</a>
                                        <a href="#" class="hover_slider_button">Смотреть каталог</a>
                                    </div>
                                </div>
                                <div class="right_sidet1">
                                    <div class="slide-image2">
                                        <img class="wow slideInUp"  data-wow-duration="1.5s" data-wow-delay="0s" src="/img/home1/2.png" alt="slider caption" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="htmlcaption3" class="nivo-html-caption slider-caption-3">
            <div class="slider-progress"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="slide2-text slide-text">
                            <div class="middle-text">
                                <div class="left_sidet1">
                                    <div class="cap-title wow bounceInDown" data-wow-duration=".9s" data-wow-delay="0s">
                                        <h1>Автохимию для автомоек</h1>
                                    </div>
                                    <div class="cap-dec wow slideInRight" data-wow-duration="1.1s" data-wow-delay="0s">
                                        <h2>Предлагаем широкий ассортимент расходных материалов для автомоек</h2>
                                    </div>
                                    <div class="cap-readmore animated fadeInUpBig" data-wow-duration="1.5s" data-wow-delay=".5s">
                                        <a href="#" >Купить сейчас</a>
                                        <a href="#" class="hover_slider_button">Смотреть каталог</a>
                                    </div>
                                </div>
                                <div class="right_sidet1">
                                    <div class="slide-image2">
                                        <img class="wow slideInUp"  data-wow-duration="1.5s" data-wow-delay="0s" src="/img/home1/1-2.png" alt="slider caption" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- HOME SLIDER -->
    <!-- about  area -->
    <div class="about_area" id="about">
        <div class="container">
            <div class="row">
                <!--section title-->
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="section_title">
                        <h2 class="title"><span>О нас</span></h2>
                    </div>
                </div>
                <!--end section title-->
            </div>
            <div class="row">
                <!--single Item-->
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="icon"><i class="fas fa-wrench"></i></div>
                    <div class="about_content">
                        <h2><span>Автохимия</span></h2>
                        <p>Мы можем предложить любые моющие средства, которые разрабатывает современная промышленность, а также нанопокрытия, нанополироли и наношампуни для автомобиля</p>
                    </div>
                </div>
                <!--single Item-->
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="icon"><i class="fa fa-car"></i></div>
                    <div class="about_content">
                        <h2><span>Все для автосервисов</span></h2>
                        <p>Предлагаем материалы для шиномонтажа, запчасти для компрессорного и моечного оборудования, запчасти для электроинструмента, пневмосоединения, аксессуары для оборудования.</p>
                    </div>
                </div>
                <!--single Item-->
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="icon"><i class="fa fa-cog"></i></div>
                    <div class="about_content">
                        <h2><span>Сервис и обслуживание</span></h2>
                        <p>Продажа и ремонт автомоечного, компрессорного, сервисного оборудования и инструмента</p>
                    </div>
                </div>
                <!--single Item-->
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="icon">
                        <i class="fa fa-star"></i>
                    </div>
                    <div class="about_content">
                        <h2><span>Профессионализм</span></h2>
                        <p>Большой опыт работы наших специалистов позволяет делать нашу работы быстро и качественно.  </p>
                    </div>
                </div>
                <!-- end single Item-->
            </div>
        </div>
    </div>
    <!-- end about  area -->
    <!-- progress area -->
    <!--	<div class="progress_area">-->
    <!--		<div class="container">-->
    <!--			<div class="row">-->
    <!--				&lt;!&ndash; progress content &ndash;&gt;-->
    <!--				<div class="col-md-6">-->
    <!--					<div class="progress_text">-->
    <!--						<h2><span>Show off your skill?</span></h2>-->
    <!--						<p>Praesent consequat mi vel magna cursus blandit. Cras semper ultrices libero vel interdum. In congue justo sit amet odio semper, non suscipit elit fringilla. Aenean vitae metus efficitur, mattis dolor ac, condimentum lacus...</p>-->
    <!--					</div>-->
    <!--				</div>-->
    <!--				&lt;!&ndash; end progress content &ndash;&gt;-->
    <!--				&lt;!&ndash; progress bar &ndash;&gt;-->
    <!--				<div class="col-md-6">-->
    <!--					<div class="progress_content">-->
    <!--						&lt;!&ndash;single progress bar&ndash;&gt;-->
    <!--						<div class="progress  progress-bar-value">					-->
    <!--							<div class="progress-bar wow fadeInLeft" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 60%;" data-wow-duration="1.5s" data-wow-delay="1.2s">-->
    <!--								<span class="p_text_left">Photoshop</span>-->
    <!--								<span class="p_text_right">60%</span>-->
    <!--							</div>-->
    <!--						</div>-->
    <!--						&lt;!&ndash;single progress bar&ndash;&gt;-->
    <!--						<div class="progress  progress-bar-value">					-->
    <!--							<div class="progress-bar wow fadeInLeft" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 90%;" data-wow-duration="1.5s" data-wow-delay="1.2s">-->
    <!--								<span class="p_text_left">Applications</span>-->
    <!--								<span class="p_text_right">90%</span>-->
    <!--							</div>-->
    <!--						</div>-->
    <!--						&lt;!&ndash;single progress bar&ndash;&gt;-->
    <!--						<div class="progress  progress-bar-value">					-->
    <!--							<div  class="progress-bar wow fadeInLeft" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 45%;" data-wow-duration="1.5s" data-wow-delay="1.2s">-->
    <!--								<span class="p_text_left">Development</span>-->
    <!--								<span class="p_text_right">45%</span>-->
    <!--							</div>-->
    <!--						</div>-->
    <!--						&lt;!&ndash; end single progress bar&ndash;&gt;-->
    <!--					</div>-->
    <!--				</div>-->
    <!--				&lt;!&ndash; end progress bar &ndash;&gt;-->
    <!--			</div>-->
    <!--		</div>	-->
    <!--	</div>-->
    <!--end  progress area -->

    <!-- team area -->
    <!--	<div class="team_area" id="teams">-->
    <!--		<div class="container">-->
    <!--			<div class="row">-->
    <!--				&lt;!&ndash;section title&ndash;&gt;-->
    <!--				<div class="col-md-12">	-->
    <!--					<div class="section_title">-->
    <!--						<h2 class="title"><span>Our Team</span></h2>-->
    <!--					</div>-->
    <!--				</div>-->
    <!--				&lt;!&ndash;end section title&ndash;&gt;-->
    <!--			</div>		-->
    <!--			<div class="row">-->
    <!--				<div class="team_own curosel-style">-->
    <!--				&lt;!&ndash;single team item&ndash;&gt;-->
    <!--				<div class="col-md-12">-->
    <!--					<div class="team">-->
    <!--						<div class="single_team">-->
    <!--							<div class="team_img hover_effect">-->
    <!--								<a href=""><img src="/img/team/t1.jpg" alt="" /></a>-->
    <!--								<div class="social_icon">-->
    <!--									<div class="social_icon_inner">-->
    <!--										<a href="#" class="fb"><i class="fa fa-facebook"></i></a>-->
    <!--										<a href="#" class="tw"><i class="fa fa-twitter"></i></a>-->
    <!--										<a href="#" class="go"><i class="fa fa-google-plus"></i></a>-->
    <!--										<a href="#" class="lin"><i class="fa fa-linkedin"></i></a>-->
    <!--										<a href="#" class="pin"><i class="fa fa-pinterest"></i></a>-->
    <!--									</div>								-->
    <!--								</div>									-->
    <!--							</div>						-->
    <!--							<div class="team_content">-->
    <!--								<h2><a href="#">John Doe</a></h2>-->
    <!--								<p>Creative Designer</p>-->
    <!--							</div>-->
    <!--						</div>-->
    <!--					</div>-->
    <!--				</div>-->
    <!--				&lt;!&ndash;end single team item&ndash;&gt;-->
    <!--				&lt;!&ndash;single team item&ndash;&gt;-->
    <!--				<div class="col-md-12">-->
    <!--					<div class="team">-->
    <!--						<div class="single_team">-->
    <!--							<div class="team_img hover_effect">-->
    <!--								<a href=""><img src="/img/team/t2.jpg" alt="" /></a>-->
    <!--								<div class="social_icon">-->
    <!--									<div class="social_icon_inner">-->
    <!--										<a href="#" class="fb"><i class="fa fa-facebook"></i></a>-->
    <!--										<a href="#" class="tw"><i class="fa fa-twitter"></i></a>-->
    <!--										<a href="#" class="go"><i class="fa fa-google-plus"></i></a>-->
    <!--										<a href="#" class="lin"><i class="fa fa-linkedin"></i></a>-->
    <!--										<a href="#" class="pin"><i class="fa fa-pinterest"></i></a>-->
    <!--									</div>								-->
    <!--								</div>									-->
    <!--							</div>						-->
    <!--							<div class="team_content">-->
    <!--								<h2><a href="#">John Doe</a></h2>-->
    <!--								<p>Creative Designer</p>-->
    <!--							</div>-->
    <!--						</div>-->
    <!--					</div>-->
    <!--				</div>-->
    <!--				&lt;!&ndash;end single team item&ndash;&gt;-->
    <!--				&lt;!&ndash;single team item&ndash;&gt;-->
    <!--				<div class="col-md-12">-->
    <!--					<div class="team">-->
    <!--						<div class="single_team">-->
    <!--							<div class="team_img hover_effect">-->
    <!--								<a href=""><img src="/img/team/t3.jpg" alt="" /></a>-->
    <!--								<div class="social_icon">-->
    <!--									<div class="social_icon_inner">-->
    <!--										<a href="#" class="fb"><i class="fa fa-facebook"></i></a>-->
    <!--										<a href="#" class="tw"><i class="fa fa-twitter"></i></a>-->
    <!--										<a href="#" class="go"><i class="fa fa-google-plus"></i></a>-->
    <!--										<a href="#" class="lin"><i class="fa fa-linkedin"></i></a>-->
    <!--										<a href="#" class="pin"><i class="fa fa-pinterest"></i></a>-->
    <!--									</div>								-->
    <!--								</div>									-->
    <!--							</div>						-->
    <!--							<div class="team_content">-->
    <!--								<h2><a href="#">John Doe</a></h2>-->
    <!--								<p>Creative Designer</p>-->
    <!--							</div>-->
    <!--						</div>-->
    <!--					</div>-->
    <!--				</div>-->
    <!--				&lt;!&ndash;end single team item&ndash;&gt;-->
    <!--				&lt;!&ndash;single team item&ndash;&gt;-->
    <!--				<div class="col-md-12">-->
    <!--					<div class="team">-->
    <!--						<div class="single_team">-->
    <!--							<div class="team_img hover_effect">-->
    <!--								<a href=""><img src="/img/team/t4.jpg" alt="" /></a>-->
    <!--								<div class="social_icon">-->
    <!--									<div class="social_icon_inner">-->
    <!--										<a href="#" class="fb"><i class="fa fa-facebook"></i></a>-->
    <!--										<a href="#" class="tw"><i class="fa fa-twitter"></i></a>-->
    <!--										<a href="#" class="go"><i class="fa fa-google-plus"></i></a>-->
    <!--										<a href="#" class="lin"><i class="fa fa-linkedin"></i></a>-->
    <!--										<a href="#" class="pin"><i class="fa fa-pinterest"></i></a>-->
    <!--									</div>								-->
    <!--								</div>									-->
    <!--							</div>						-->
    <!--							<div class="team_content">-->
    <!--								<h2><a href="#">John Doe</a></h2>-->
    <!--								<p>Creative Designer</p>-->
    <!--							</div>-->
    <!--						</div>-->
    <!--					</div>-->
    <!--				</div>-->
    <!--				&lt;!&ndash;end single team item&ndash;&gt;-->
    <!--				&lt;!&ndash;single team item&ndash;&gt;-->
    <!--				<div class="col-md-12">-->
    <!--					<div class="team">-->
    <!--						<div class="single_team">-->
    <!--							<div class="team_img hover_effect">-->
    <!--								<a href=""><img src="/img/team/t1.jpg" alt="" /></a>-->
    <!--								<div class="social_icon">-->
    <!--									<div class="social_icon_inner">-->
    <!--										<a href="#" class="fb"><i class="fa fa-facebook"></i></a>-->
    <!--										<a href="#" class="tw"><i class="fa fa-twitter"></i></a>-->
    <!--										<a href="#" class="go"><i class="fa fa-google-plus"></i></a>-->
    <!--										<a href="#" class="lin"><i class="fa fa-linkedin"></i></a>-->
    <!--										<a href="#" class="pin"><i class="fa fa-pinterest"></i></a>-->
    <!--									</div>								-->
    <!--								</div>									-->
    <!--							</div>						-->
    <!--							<div class="team_content">-->
    <!--								<h2><a href="#">John Doe</a></h2>-->
    <!--								<p>Creative Designer</p>-->
    <!--							</div>-->
    <!--						</div>-->
    <!--					</div>-->
    <!--				</div>-->
    <!--				&lt;!&ndash;end single team item&ndash;&gt;-->
    <!--				&lt;!&ndash;single team item&ndash;&gt;-->
    <!--				<div class="col-md-12">-->
    <!--					<div class="team">-->
    <!--						<div class="single_team">-->
    <!--							<div class="team_img hover_effect">-->
    <!--								<a href=""><img src="/img/team/t2.jpg" alt="" /></a>-->
    <!--								<div class="social_icon">-->
    <!--									<div class="social_icon_inner">-->
    <!--										<a href="#" class="fb"><i class="fa fa-facebook"></i></a>-->
    <!--										<a href="#" class="tw"><i class="fa fa-twitter"></i></a>-->
    <!--										<a href="#" class="go"><i class="fa fa-google-plus"></i></a>-->
    <!--										<a href="#" class="lin"><i class="fa fa-linkedin"></i></a>-->
    <!--										<a href="#" class="pin"><i class="fa fa-pinterest"></i></a>-->
    <!--									</div>								-->
    <!--								</div>									-->
    <!--							</div>						-->
    <!--							<div class="team_content">-->
    <!--								<h2><a href="#">John Doe</a></h2>-->
    <!--								<p>Creative Designer</p>-->
    <!--							</div>-->
    <!--						</div>-->
    <!--					</div>-->
    <!--				</div>-->
    <!--				&lt;!&ndash;end single team item&ndash;&gt;-->
    <!--				&lt;!&ndash;single team item&ndash;&gt;-->
    <!--				<div class="col-md-12">-->
    <!--					<div class="team">-->
    <!--						<div class="single_team">-->
    <!--							<div class="team_img hover_effect">-->
    <!--								<a href=""><img src="/img/team/t3.jpg" alt="" /></a>-->
    <!--								<div class="social_icon">-->
    <!--									<div class="social_icon_inner">-->
    <!--										<a href="#" class="fb"><i class="fa fa-facebook"></i></a>-->
    <!--										<a href="#" class="tw"><i class="fa fa-twitter"></i></a>-->
    <!--										<a href="#" class="go"><i class="fa fa-google-plus"></i></a>-->
    <!--										<a href="#" class="lin"><i class="fa fa-linkedin"></i></a>-->
    <!--										<a href="#" class="pin"><i class="fa fa-pinterest"></i></a>-->
    <!--									</div>								-->
    <!--								</div>									-->
    <!--							</div>						-->
    <!--							<div class="team_content">-->
    <!--								<h2><a href="#">John Doe</a></h2>-->
    <!--								<p>Creative Designer</p>-->
    <!--							</div>-->
    <!--						</div>-->
    <!--					</div>-->
    <!--				</div>-->
    <!--				&lt;!&ndash;end single team item&ndash;&gt;-->
    <!--				&lt;!&ndash;single team item&ndash;&gt;-->
    <!--				<div class="col-md-12">-->
    <!--					<div class="team">-->
    <!--						<div class="single_team">-->
    <!--							<div class="team_img hover_effect">-->
    <!--								<a href=""><img src="/img/team/t4.jpg" alt="" /></a>-->
    <!--								<div class="social_icon">-->
    <!--									<div class="social_icon_inner">-->
    <!--										<a href="#" class="fb"><i class="fa fa-facebook"></i></a>-->
    <!--										<a href="#" class="tw"><i class="fa fa-twitter"></i></a>-->
    <!--										<a href="#" class="go"><i class="fa fa-google-plus"></i></a>-->
    <!--										<a href="#" class="lin"><i class="fa fa-linkedin"></i></a>-->
    <!--										<a href="#" class="pin"><i class="fa fa-pinterest"></i></a>-->
    <!--									</div>								-->
    <!--								</div>									-->
    <!--							</div>						-->
    <!--							<div class="team_content">-->
    <!--								<h2><a href="#">John Doe</a></h2>-->
    <!--								<p>Creative Designer</p>-->
    <!--							</div>-->
    <!--						</div>-->
    <!--					</div>-->
    <!--				</div>-->
    <!--				&lt;!&ndash;end single team item&ndash;&gt;-->
    <!--				-->
    <!--				</div>-->
    <!--			</div>-->
    <!--		</div>	-->
    <!--	</div>-->
    <!-- end team area -->

    <div class="portfolio_area" id="projects">
        <div class="container">
            <div class="row">
                <!--section title-->
                <div class="col-md-12">
                    <div class="section_title">
                        <h2 class="title"><span>Направления компании</span></h2>
                    </div>
                </div>
                <!--end section title-->
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="portfolio_nav">
                        <ul>
                            <!--							<li class="active filter" data-filter="all">Автохимия</li>-->
                            <li class="filter" data-filter=".Автохимия">Автохимия</li>
                            <li class="filter" data-filter=".Автомойки">Все для автомоек</li>
                            <li class="filter" data-filter=".Шиномонтаж">Шиномонтаж</li>
                            <li class="filter" data-filter=".Пневматика">Пневматика</li>
                            <li class="filter" data-filter=".Присадки">Присадки</li>
                        </ul>
                    </div>
                </div>
                <div class="project_maxitup">
                    <!--single portfolio item-->
                    <div class="col-md-4 col-sm-6 mix Автохимия">
                        <div class="portfolio  ">
                            <div class="single_protfolio">
                                <div class="prot_imag">
                                    <a class="/venobox" href="/img/home2/tab/t1.jpg" data-gall="myGallery"><img src="/img/portfolio/p1.jpg" alt="" /></a>
                                    <div class="hover_port_text">
                                        <h2><a href="#">Моющие средства PLEX</a></h2>
                                        <p>Автошампуни</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end single portfolio item-->
                    <!--single portfolio item-->
                    <div class="col-md-4 col-sm-6 mix Автохимия">
                        <div class="portfolio ">
                            <div class="single_protfolio">
                                <div class="prot_imag">
                                    <a class="/venobox" href="/img/home2/tab/t3.jpg" data-gall="myGallery"><img src="/img/portfolio/p2.jpg" alt="" /></a>
                                    <div class="hover_port_text">
                                        <h2><a href="#">Моющие средства</a></h2>
                                        <p>Автошампуни</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end single portfolio item-->
                    <!--single portfolio item-->
                    <div class="col-md-4 col-sm-6 mix Автохимия">
                        <div class="portfolio ">
                            <div class="single_protfolio">
                                <div class="prot_imag">
                                    <a class="/venobox" href="/img/home2/tab/t4.jpg" data-gall="myGallery"><img src="/img/portfolio/p3.jpg" alt="" /></a>
                                    <div class="hover_port_text">
                                        <h2><a href="#">Очистители GRASS</a></h2>
                                        <p>Автокосметика</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end single portfolio item-->
                    <!--single portfolio item-->
                    <div class="col-md-4 col-sm-6 mix Шиномонтаж">
                        <div class="portfolio ">
                            <div class="single_protfolio">
                                <div class="prot_imag">
                                    <a class="/venobox" href="/img/home2/tab/t5.jpg" data-gall="myGallery"><img src="/img/portfolio/p5.jpg" alt="" /></a>
                                    <div class="hover_port_text">
                                        <h2><a href="#">CURABITUR VEL IMPERDIET ORCI</a></h2>
                                        <p>Шиномонтаж</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end single portfolio item-->
                    <!--single portfolio item-->
                    <div class="col-md-4 col-sm-6 mix Photoshop  Шиномонтаж Пневматика">
                        <div class="portfolio ">
                            <div class="single_protfolio">
                                <div class="prot_imag">
                                    <a class="/venobox" href="/img/home2/tab/t5.jpg" data-gall="myGallery"><img src="/img/portfolio/p5.jpg" alt="" /></a>
                                    <div class="hover_port_text">
                                        <h2><a href="#">CURABITUR VEL IMPERDIET ORCI</a></h2>
                                        <p>Присадки / Art / Автомойки</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end single portfolio item-->
                    <!--single portfolio item-->
                    <div class="col-md-4 col-sm-6 mix Photoshop Photoshop Шиномонтаж">
                        <div class="portfolio ">
                            <div class="single_protfolio">
                                <div class="prot_imag">
                                    <a class="/venobox" href="/img/home2/tab/t4.jpg" data-gall="myGallery"><img src="/img/portfolio/p5.jpg" alt="" /></a>
                                    <div class="hover_port_text">
                                        <h2><a href="#">CURABITUR VEL IMPERDIET ORCI</a></h2>
                                        <p>Присадки / Art / Автомойки</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end single portfolio item-->
                </div>
            </div>
        </div>
    </div>
    <!--end portfolio area -->
    <!-- client  area -->
    <div class="client_area">
        <div class="container">
            <div class="row">
                <div class="client_own curosel-style client_style">
                    <div class="col-md-12">
                        <div class="client">
                            <div class="client_img">
                                <a href="#"><img src="/img/man1.jpg" alt="" /></a>
                            </div>
                        </div>
                        <div class="client_content">
                            <div class="client_text">
                                <h3 class="text-white"><span>Отзыв клиента</span></h3>
                                <p>Покупали оборудование для автомоек. Все очень быстро и профессионально было. Грамотная консультация, реальные сроки.</p>
                                <a href="">Петов Федор <span>- Владелец сети автомоек -</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="client">
                            <div class="client_img">
                                <a href="#"><img src="/img/man2.jpg" alt="" /></a>
                            </div>
                        </div>
                        <div class="client_content">
                            <div class="client_text">
                                <h3 class="text-white"><span>Отзыв клиента</span></h3>
                                <p>Постоянно покупаем расхдники для автомоек. Высокое качество и низкие цены!</p>
                                <a href="">Круглов Иван <span>- Бизнесмен -</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="client">
                            <div class="client_img">
                                <a href="#"><img src="/img/man3.jpg" alt="" /></a>
                            </div>
                        </div>
                        <div class="client_content">
                            <div class="client_text">
                                <h3 class="text-white"><span>Отзыв клиента</span></h3>
                                <p>Praesent consequat mi vel magna cursus blandit. Cras semper ultrices libero vel interdum. In congue justo sit amet odio semper, non suscipit elit fringilla. Aenean vitae metus efficitur, mattis dolor ac, condimentum lacus...</p>
                                <a href="">John doe <span>- Busines Man -</span></a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- end client  area -->
    <!--pricing area -->
    <!--	<div class="pricing_area" id="pricing">-->
    <!--		<div class="container">-->
    <!--			<div class="row">-->
    <!--				&lt;!&ndash;section title&ndash;&gt;-->
    <!--				<div class="col-md-12">	-->
    <!--					<div class="section_title">-->
    <!--						<h2 class="title"><span>Pricing Table</span></h2>-->
    <!--					</div>-->
    <!--				</div>-->
    <!--				&lt;!&ndash;end section title&ndash;&gt;-->
    <!--			</div>		-->
    <!--			<div class="row">-->
    <!--				&lt;!&ndash;single Pricing Table&ndash;&gt;-->
    <!--				<div class="col-md-3 col-sm-6">-->
    <!--					<div class="pricing">-->
    <!--						<div class="pricing_content">-->
    <!--							<div class="single_pricint">-->
    <!--								<div class="prising_top">-->
    <!--									<h2>$10 <span>/MONTH</span></h2>-->
    <!--								</div>-->
    <!--								<div class="prising_middle">-->
    <!--									<h3>Basic Plan</h3>-->
    <!--									<ul>-->
    <!--										<li>1 Months Time Durution</li>-->
    <!--										<li>Unlimited Template download</li>-->
    <!--										<li>Unlimited Extension download</li>-->
    <!--										<li>05 Domain License</li>-->
    <!--										<li>Free setup</li>-->
    <!--									</ul>-->
    <!--								</div>-->
    <!--								<div class="prising_bottom">-->
    <!--									<a href="#">Get started Now</a>-->
    <!--								</div>-->
    <!--							</div>-->
    <!--						</div>-->
    <!--					</div>-->
    <!--				</div>-->
    <!--				&lt;!&ndash;single Pricing Table&ndash;&gt;-->
    <!--				&lt;!&ndash;single Pricing Table&ndash;&gt;-->
    <!--				<div class="col-md-3 col-sm-6">-->
    <!--					<div class="pricing">-->
    <!--						<div class="pricing_content">-->
    <!--							<div class="single_pricint">-->
    <!--								<div class="prising_top">-->
    <!--									<h2>$10 <span>/MONTH</span></h2>-->
    <!--								</div>-->
    <!--								<div class="prising_middle">-->
    <!--									<h3>Basic Plan</h3>-->
    <!--									<ul>-->
    <!--										<li>1 Months Time Durution</li>-->
    <!--										<li>Unlimited Template download</li>-->
    <!--										<li>Unlimited Extension download></li>-->
    <!--										<li>05 Domain License</li>-->
    <!--										<li>Free setup</li>-->
    <!--									</ul>-->
    <!--								</div>-->
    <!--								<div class="prising_bottom">-->
    <!--									<a href="#">Get started Now</a>-->
    <!--								</div>-->
    <!--							</div>-->
    <!--						</div>-->
    <!--					</div>-->
    <!--				</div>-->
    <!--				&lt;!&ndash;single Pricing Table&ndash;&gt;-->
    <!--				&lt;!&ndash;single Pricing Table&ndash;&gt;-->
    <!--				<div class="col-md-3 col-sm-6">-->
    <!--					<div class="pricing">-->
    <!--						<div class="pricing_content">-->
    <!--							<div class="single_pricint active">-->
    <!--								<div class="prising_top">-->
    <!--									<h2>$10 <span>/MONTH</span></h2>-->
    <!--								</div>-->
    <!--								<div class="prising_middle">-->
    <!--									<h3>Basic Plan</h3>-->
    <!--									<ul>-->
    <!--										<li>1 Months Time Durution</li>-->
    <!--										<li>Unlimited Template download</li>-->
    <!--										<li>Unlimited Extension download</li>-->
    <!--										<li>05 Domain License</li>-->
    <!--										<li>Free setup</li>-->
    <!--									</ul>-->
    <!--								</div>-->
    <!--								<div class="prising_bottom">-->
    <!--									<a href="#">Get started Now</a>-->
    <!--								</div>-->
    <!--							</div>-->
    <!--						</div>-->
    <!--					</div>-->
    <!--				</div>-->
    <!--				&lt;!&ndash;single Pricing Table&ndash;&gt;-->
    <!--				&lt;!&ndash;single Pricing Table&ndash;&gt;-->
    <!--				<div class="col-md-3 col-sm-6">-->
    <!--					<div class="pricing">-->
    <!--						<div class="pricing_content">-->
    <!--							<div class="single_pricint">-->
    <!--								<div class="prising_top">-->
    <!--									<h2>$10 <span>/MONTH</span></h2>-->
    <!--								</div>-->
    <!--								<div class="prising_middle">-->
    <!--									<h3>Basic Plan</h3>-->
    <!--									<ul>-->
    <!--										<li>1 Months Time Durution</li>-->
    <!--										<li>Unlimited Template download</li>-->
    <!--										<li>Unlimited Extension download</li>-->
    <!--										<li>05 Domain License</li>-->
    <!--										<li>Free setup</li>-->
    <!--									</ul>-->
    <!--								</div>-->
    <!--								<div class="prising_bottom">-->
    <!--									<a href="#">Get started Now</a>-->
    <!--								</div>-->
    <!--							</div>-->
    <!--						</div>-->
    <!--					</div>-->
    <!--				</div>-->
    <!--				&lt;!&ndash;single Pricing Table&ndash;&gt;-->
    <!--				-->
    <!--			</div>-->
    <!--		</div>	-->
    <!--	</div>-->
    <!--end pricing area -->
    <!--	<div class="service_area service_color" id="services">-->
    <!--		<div class="container">-->
    <!--			<div class="row">-->
    <!--				<div class="col-md-4">-->
    <!--					<div class="service_thum">-->
    <!--						<div class="service_img"><img src="/img/sr2.png" alt="" /></div>-->
    <!--					</div>-->
    <!--				</div>-->
    <!--				<div class="col-md-8">-->
    <!--					<div class="row">-->
    <!--						&lt;!&ndash;section title&ndash;&gt;-->
    <!--						<div class="col-md-12">	-->
    <!--							<div class="section_title">-->
    <!--								<h2 class="title"><span>Amazing Features</span></h2>-->
    <!--							</div>-->
    <!--						</div>-->
    <!--						&lt;!&ndash;end section title&ndash;&gt;-->
    <!--					</div>				-->
    <!--					<div class="row">-->
    <!--						&lt;!&ndash;single service item&ndash;&gt;						-->
    <!--						<div class="col-sm-6 col-md-6 col-lg-6">-->
    <!--							<div class="icon"><i class="fa fa-bolt"></i></div>-->
    <!--							<div class="about_content">-->
    <!--								<h2><span>Modern design Trends</span></h2>-->
    <!--								<p>Vestibulum feugiat cursus velit, vel maximus orci. Pellentesque et finibus est, eu pulvinar sapien. Aenean vel libero porta</p>-->
    <!--							</div>						-->
    <!--						</div>-->
    <!--						&lt;!&ndash;end single service item&ndash;&gt;-->
    <!--						&lt;!&ndash;single service item&ndash;&gt;							-->
    <!--						<div class="col-sm-6 col-md-6 col-lg-6">-->
    <!--							<div class="icon"><i class="fa fa-laptop"></i></div>-->
    <!--							<div class="about_content">-->
    <!--								<h2><span>Responsive Design</span></h2>-->
    <!--								<p>Vestibulum feugiat cursus velit, vel maximus orci. Pellentesque et finibus est, eu pulvinar sapien. Aenean vel libero porta</p>-->
    <!--							</div>-->
    <!--						</div>-->
    <!--						&lt;!&ndash;end single service item&ndash;&gt;-->
    <!--						&lt;!&ndash;single service item&ndash;&gt;						-->
    <!--						<div class="col-sm-6 col-md-6 col-lg-6">-->
    <!--							<div class="icon"><i class="fa fa-cogs"></i></div>-->
    <!--							<div class="about_content">-->
    <!--								<h2><span>Easy to Customize</span></h2>-->
    <!--								<p>Vestibulum feugiat cursus velit, vel maximus orci. Pellentesque et finibus est, eu pulvinar sapien. Aenean vel libero porta</p>-->
    <!--							</div>-->
    <!--						</div>-->
    <!--						&lt;!&ndash;end single service item&ndash;&gt;-->
    <!--						&lt;!&ndash;single service item&ndash;&gt;-->
    <!--						<div class="col-sm-6 col-md-6 col-lg-6">-->
    <!--							<div class="icon"><i class="fa fa-file-text-o"></i></div>-->
    <!--							<div class="about_content">-->
    <!--								<h2><span>Multi Layouts</span></h2>-->
    <!--								<p>Vestibulum feugiat cursus velit, vel maximus orci. Pellentesque et finibus est, eu pulvinar sapien. Aenean vel libero porta</p>-->
    <!--							</div>-->
    <!--						</div>-->
    <!--						&lt;!&ndash;end single service item&ndash;&gt;-->
    <!--						&lt;!&ndash;single service item&ndash;&gt;-->
    <!--						<div class="col-sm-6 col-md-6 col-lg-6">-->
    <!--							<div class="icon"><i class="fa fa-arrows-alt"></i></div>-->
    <!--							<div class="about_content">-->
    <!--								<h2><span>Retina Ready</span></h2>-->
    <!--								<p>Vestibulum feugiat cursus velit, vel maximus orci. Pellentesque et finibus est, eu pulvinar sapien. Aenean vel libero porta</p>-->
    <!--							</div>-->
    <!--						</div>-->
    <!--						&lt;!&ndash;end single service item&ndash;&gt;-->
    <!--						&lt;!&ndash;single service item&ndash;&gt;						-->
    <!--						<div class="col-sm-6 col-md-6 col-lg-6">-->
    <!--							<div class="icon"><i class="fa fa-briefcase"></i></div>-->
    <!--							<div class="about_content">-->
    <!--								<h2><span>24/7 Online Support</span></h2>-->
    <!--								<p>Vestibulum feugiat cursus velit, vel maximus orci. Pellentesque et finibus est, eu pulvinar sapien. Aenean vel libero porta</p>-->
    <!--							</div>-->
    <!--						</div>-->
    <!--						&lt;!&ndash;end single service item&ndash;&gt;-->
    <!--					</div>-->
    <!--				</div>				-->
    <!--			</div>-->
    <!--		</div>	-->
    <!--	</div>-->
    <!--blog area -->
    <!--	<div class="blog_area" id="blogs">-->
    <!--		<div class="container">-->
    <!--			<div class="row">-->
    <!--				&lt;!&ndash;section title&ndash;&gt;-->
    <!--				<div class="col-md-12">	-->
    <!--					<div class="section_title">-->
    <!--						<h2 class="title"><span>Blog Posts</span></h2>-->
    <!--					</div>-->
    <!--				</div>-->
    <!--				&lt;!&ndash;end section title&ndash;&gt;-->
    <!--			</div>			-->
    <!--			<div class="row">-->
    <!--				<div class="team_own curosel-style">-->
    <!--				&lt;!&ndash;single blog item&ndash;&gt;-->
    <!--				<div class="col-md-12">-->
    <!--					<div class="blog_content">-->
    <!--						<div class="blog_img hover_effect blog_hover">-->
    <!--							<a href="blog-deatils-1.html"><img src="/img/blog/b1.jpg" alt="" /></a>-->
    <!--							<div class="bolg_date">-->
    <!--								<a href="blog-deatils-1.html">-->
    <!--									<span>28</span>-->
    <!--									<span class="month">sept</span>-->
    <!--								</a>-->
    <!--							</div>-->
    <!--							-->
    <!--						</div>-->
    <!--						<div class="blog_comment fix">-->
    <!--							<ul>-->
    <!--								<li><a href="#"><i class="fa fa-picture-o"></i></a></li>-->
    <!--								<li><a href="#"><i class="fa fa-user"></i>Authur</a></li>-->
    <!--								<li><a href="#"><i class="fa fa-comment-o"></i>12 Comments</a></li>-->
    <!--							</ul>-->
    <!--						</div>-->
    <!--						<div class="blog_text">-->
    <!--							<h2><a href="blog-deatils-1.html">Sample text image blogs ...</a></h2>-->
    <!--							<p>Aliquam sed libero neque. Duis ut finibus dui. Sed egestas elit tortor, vel volutpat est ultrices sed. </p>-->
    <!--							<a href="#">See more ...</a>-->
    <!--						</div>-->
    <!--					</div>-->
    <!--				</div>-->
    <!--				&lt;!&ndash;end single blog item&ndash;&gt;-->
    <!--				&lt;!&ndash;single blog item&ndash;&gt;-->
    <!--				<div class="col-md-12">-->
    <!--					<div class="blog_content">-->
    <!--						<div class="blog_img hover_effect blog_hover">-->
    <!--							<a href="blog-deatils-1.html"><img src="/img/blog/b2.jpg" alt="" /></a>-->
    <!--							<div class="bolg_date">-->
    <!--								<a href="blog-deatils-1.html">-->
    <!--									<span>28</span>-->
    <!--									<span class="month">sept</span>-->
    <!--								</a>-->
    <!--							</div>-->
    <!--							-->
    <!--						</div>-->
    <!--						<div class="blog_comment fix">-->
    <!--							<ul>-->
    <!--								<li><a href="#"><i class="fa fa-picture-o"></i></a></li>-->
    <!--								<li><a href="#"><i class="fa fa-user"></i>Authur</a></li>-->
    <!--								<li><a href="#"><i class="fa fa-comment-o"></i>12 Comments</a></li>-->
    <!--							</ul>-->
    <!--						</div>-->
    <!--						<div class="blog_text">-->
    <!--							<h2><a href="blog-deatils-1.html">Aliquam sed libero neque ...</a></h2>-->
    <!--							<p>Aliquam sed libero neque. Duis ut finibus dui. Sed egestas elit tortor, vel volutpat est ultrices sed. </p>-->
    <!--							<a href="#">See more ...</a>-->
    <!--						</div>-->
    <!--					</div>-->
    <!--				</div>-->
    <!--				&lt;!&ndash;end single blog item&ndash;&gt;-->
    <!--				&lt;!&ndash;single blog item&ndash;&gt;-->
    <!--				<div class="col-md-12">-->
    <!--					<div class="blog_content">-->
    <!--						<div class="blog_img hover_effect blog_hover">-->
    <!--							<a href="blog-deatils-1.html"><img src="/img/blog/b3.jpg" alt="" /></a>-->
    <!--							<div class="bolg_date">-->
    <!--								<a href="blog-deatils-1.html">-->
    <!--									<span>28</span>-->
    <!--									<span class="month">sept</span>-->
    <!--								</a>-->
    <!--							</div>-->
    <!--							-->
    <!--						</div>-->
    <!--						<div class="blog_comment fix">-->
    <!--							<ul>-->
    <!--								<li><a href="#"><i class="fa fa-picture-o"></i></a></li>-->
    <!--								<li><a href="#"><i class="fa fa-user"></i>Authur</a></li>-->
    <!--								<li><a href="#"><i class="fa fa-comment-o"></i>12 Comments</a></li>-->
    <!--							</ul>-->
    <!--						</div>-->
    <!--						<div class="blog_text">-->
    <!--							<h2><a href="blog-deatils-1.html">Sample text image blogs ...</a></h2>-->
    <!--							<p>Aliquam sed libero neque. Duis ut finibus dui. Sed egestas elit tortor, vel volutpat est ultrices sed. </p>-->
    <!--							<a href="#">See more ...</a>-->
    <!--						</div>-->
    <!--					</div>-->
    <!--				</div>-->
    <!--				&lt;!&ndash;end single blog item&ndash;&gt;-->
    <!--				&lt;!&ndash;single blog item&ndash;&gt;-->
    <!--				<div class="col-md-12">-->
    <!--					<div class="blog_content">-->
    <!--						<div class="blog_img hover_effect blog_hover">-->
    <!--							<a href="blog-deatils-1.html"><img src="/img/blog/b4.jpg" alt="" /></a>-->
    <!--							<div class="bolg_date">-->
    <!--								<a href="blog-deatils-1.html">-->
    <!--									<span>28</span>-->
    <!--									<span class="month">sept</span>-->
    <!--								</a>-->
    <!--							</div>-->
    <!--							-->
    <!--						</div>-->
    <!--						<div class="blog_comment fix">-->
    <!--							<ul>-->
    <!--								<li><a href="#"><i class="fa fa-picture-o"></i></a></li>-->
    <!--								<li><a href="#"><i class="fa fa-user"></i>Authur</a></li>-->
    <!--								<li><a href="#"><i class="fa fa-comment-o"></i>12 Comments</a></li>-->
    <!--							</ul>-->
    <!--						</div>-->
    <!--						<div class="blog_text">-->
    <!--							<h2><a href="blog-deatils-1.html">Aliquam sed libero neque ...</a></h2>-->
    <!--							<p>Aliquam sed libero neque. Duis ut finibus dui. Sed egestas elit tortor, vel volutpat est ultrices sed. </p>-->
    <!--							<a href="#">See more ...</a>-->
    <!--						</div>-->
    <!--					</div>-->
    <!--				</div>-->
    <!--				&lt;!&ndash;end single blog item&ndash;&gt;-->
    <!--				&lt;!&ndash;single blog item&ndash;&gt;-->
    <!--				<div class="col-md-12">-->
    <!--					<div class="blog_content">-->
    <!--						<div class="blog_img hover_effect blog_hover">-->
    <!--							<a href="#"><img src="/img/blog/b1.jpg" alt="" /></a>-->
    <!--							<div class="bolg_date">-->
    <!--								<a href="blog-deatils-1.html">-->
    <!--									<span>28</span>-->
    <!--									<span class="month">sept</span>-->
    <!--								</a>-->
    <!--							</div>-->
    <!--							-->
    <!--						</div>-->
    <!--						<div class="blog_comment fix">-->
    <!--							<ul>-->
    <!--								<li><a href="#"><i class="fa fa-picture-o"></i></a></li>-->
    <!--								<li><a href="#"><i class="fa fa-user"></i>Authur</a></li>-->
    <!--								<li><a href="#"><i class="fa fa-comment-o"></i>12 Comments</a></li>-->
    <!--							</ul>-->
    <!--						</div>-->
    <!--						<div class="blog_text">-->
    <!--							<h2><a href="blog-deatils-1.html">Sample text image blogs ...</a></h2>-->
    <!--							<p>Aliquam sed libero neque. Duis ut finibus dui. Sed egestas elit tortor, vel volutpat est ultrices sed. </p>-->
    <!--							<a href="#">See more ...</a>-->
    <!--						</div>-->
    <!--					</div>-->
    <!--				</div>-->
    <!--				&lt;!&ndash;end single blog item&ndash;&gt;-->
    <!--				&lt;!&ndash;single blog item&ndash;&gt;-->
    <!--				<div class="col-md-12">-->
    <!--					<div class="blog_content">-->
    <!--						<div class="blog_img hover_effect blog_hover">-->
    <!--							<a href="blog-deatils-1.html"><img src="/img/blog/b2.jpg" alt="" /></a>-->
    <!--							<div class="bolg_date">-->
    <!--								<a href="blog-deatils-1.html">-->
    <!--									<span>28</span>-->
    <!--									<span class="month">sept</span>-->
    <!--								</a>-->
    <!--							</div>							-->
    <!--						</div>-->
    <!--						<div class="blog_comment fix">-->
    <!--							<ul>-->
    <!--								<li><a href="#"><i class="fa fa-picture-o"></i></a></li>-->
    <!--								<li><a href="#"><i class="fa fa-user"></i>Authur</a></li>-->
    <!--								<li><a href="#"><i class="fa fa-comment-o"></i>12 Comments</a></li>-->
    <!--							</ul>-->
    <!--						</div>-->
    <!--						<div class="blog_text">-->
    <!--							<h2><a href="blog-deatils-1.html">Sample text image blogs ...</a></h2>-->
    <!--							<p>Aliquam sed libero neque. Duis ut finibus dui. Sed egestas elit tortor, vel volutpat est ultrices sed. </p>-->
    <!--							<a href="#">See more ...</a>-->
    <!--						</div>-->
    <!--					</div>-->
    <!--				</div>-->
    <!--				&lt;!&ndash;end single blog item&ndash;&gt;	-->
    <!--				&lt;!&ndash;single blog item&ndash;&gt;-->
    <!--				<div class="col-md-12">-->
    <!--					<div class="blog_content">-->
    <!--						<div class="blog_img hover_effect blog_hover">-->
    <!--							<a href="blog-deatils-1.html"><img src="/img/blog/b3.jpg" alt="" /></a>-->
    <!--							<div class="bolg_date">-->
    <!--								<a href="blog-deatils-1.html">-->
    <!--									<span>28</span>-->
    <!--									<span class="month">sept</span>-->
    <!--								</a>-->
    <!--							</div>							-->
    <!--						</div>-->
    <!--						<div class="blog_comment fix">-->
    <!--							<ul>-->
    <!--								<li><a href="#"><i class="fa fa-picture-o"></i></a></li>-->
    <!--								<li><a href="#"><i class="fa fa-user"></i>Authur</a></li>-->
    <!--								<li><a href="#"><i class="fa fa-comment-o"></i>12 Comments</a></li>-->
    <!--							</ul>-->
    <!--						</div>-->
    <!--						<div class="blog_text">-->
    <!--							<h2><a href="blog-deatils-1.html">Sample text image blogs ...</a></h2>-->
    <!--							<p>Aliquam sed libero neque. Duis ut finibus dui. Sed egestas elit tortor, vel volutpat est ultrices sed. </p>-->
    <!--							<a href="#">See more ...</a>-->
    <!--						</div>-->
    <!--					</div>-->
    <!--				</div>-->
    <!--				&lt;!&ndash;end single blog item&ndash;&gt;	-->
    <!--				&lt;!&ndash;single blog item&ndash;&gt;-->
    <!--				<div class="col-md-12">-->
    <!--					<div class="blog_content">-->
    <!--						<div class="blog_img hover_effect blog_hover">-->
    <!--							<a href="blog-deatils-1.html"><img src="/img/blog/b4.jpg" alt="" /></a>-->
    <!--							<div class="bolg_date">-->
    <!--								<a href="blog-deatils-1.html">-->
    <!--									<span>28</span>-->
    <!--									<span class="month">sept</span>-->
    <!--								</a>-->
    <!--							</div>							-->
    <!--						</div>-->
    <!--						<div class="blog_comment fix">-->
    <!--							<ul>-->
    <!--								<li><a href="#"><i class="fa fa-picture-o"></i></a></li>-->
    <!--								<li><a href="#"><i class="fa fa-user"></i>Authur</a></li>-->
    <!--								<li><a href="#"><i class="fa fa-comment-o"></i>12 Comments</a></li>-->
    <!--							</ul>-->
    <!--						</div>-->
    <!--						<div class="blog_text">-->
    <!--							<h2><a href="blog-deatils-1.html">Sample text image blogs ...</a></h2>-->
    <!--							<p>Aliquam sed libero neque. Duis ut finibus dui. Sed egestas elit tortor, vel volutpat est ultrices sed. </p>-->
    <!--							<a href="#">See more ...</a>-->
    <!--						</div>-->
    <!--					</div>-->
    <!--				</div>-->
    <!--				&lt;!&ndash;end single blog item&ndash;&gt;					-->
    <!--				</div>-->
    <!--			</div>-->
    <!--		</div>	-->
    <!--	</div>-->
    <!--end blog area -->
    <!--counter up area -->
    <div class="counterup_area" id="work">
        <div class="container">
            <div class="row">
                <!--single counterup item-->
                <div class=" col-sm-4 col-md-4 col-lg-4">
                    <div class="counter_up">
                        <div class="iconcounter"><i class="fa fa-coffee"></i></div>
                        <div class="counter">
                            <h1 class="number">10,000</h1>
                            <p class="text">Товаров в наличии</p>
                        </div>
                    </div>
                </div>
                <!--end single counterup item-->
                <!--single counterup item-->
                <div class=" col-sm-4 col-md-4 col-lg-4">
                    <div class="counter_up">
                        <div class="iconcounter cb2"><i class="fa fa-download"></i></div>
                        <div class="counter ">
                            <h1 class="number cn2">100</h1>
                            <p class="text">брендов производителей</p>
                        </div>
                    </div>
                </div>
                <!--end single counterup item-->
                <!--single counterup item-->
                <div class=" col-sm-4 col-md-4 col-lg-4">
                    <div class="counter_up">
                        <div class="iconcounter cb3"><i class="fa fa-heart"></i></div>
                        <div class="counter">
                            <h1 class="number cn3">15</h1>
                            <p class="text">лет успешной работы</p>
                        </div>
                    </div>
                </div>
                <!--end single counterup item-->
            </div>
        </div>
    </div>
    <!--end counterup area -->
    <div class="footer_area ">
        <div class="container">
            <div class="row">
                <!--section title-->
                <div class=" col-sm-12 col-md-12 col-lg-12">
                    <div class="section_title service_color">
                        <h2 class="title"><span>Наши контакты</span></h2>
                    </div>
                </div>
                <!--end section title-->
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A6f5a8fed79d1b3ef6e25e473a5f5ef52a11ea9657a1e32094252d8d6bae7e2ea&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="single_address fix">
                        <div class="address_icon"><span><i class="fa fa-map-marker"></i></span></div>
                        <div class="address_text"><p><span>Address:</span> Тольятти, ул. Горького 65, ТЦ ВЦМ</p></div>
                    </div>
                    <div class="single_address fix">
                        <div class="address_icon"><span><i class="fa fa-phone"></i></span></div>
                        <div class="address_text"><p><span>Phone:</span>  (+12) 3456 7890</p></div>
                    </div>
                    <div class="single_address fix">
                        <div class="address_icon"><span><i class="fa fa-envelope-o"></i></span></div>
                        <div class="address_text"><p><span>Email: </span> office@himik-avto.ru</p></div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <form action="mail.php" method="post">
                        <div class="contract_us">
                            <div class="inputt input_change">
                                <span class="message_icon"><i class="fa fa-user"></i></span>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Ваше ФИО" required>
                            </div>
                            <div class="inputt input_change">
                                <span class="message_icon"><i class="fa fa-envelope-o"></i></span>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                            </div>
                            <div class="inputt">
                                <span class="message_icon"><i class="fa fa-external-link"></i></span>
                                <textarea class="form-control" name="message"  rows="4" id="mes" placeholder="Сообщение"></textarea>
                            </div>
                            <div class="sunmite_button">
                                <button type="submit" name="ok">Отправить сообщение</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

@stop
