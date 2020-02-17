<!-- JS -->
<!-- jquery-1.11.3.min js
============================================ -->
<script src="/js/vendor/jquery-1.11.3.min.js"></script>
<!-- bootstrap js
============================================ -->
<script src="/js/bootstrap.min.js"></script>
<!-- owl.carousel.min js
============================================ -->
<script src="/js/owl.carousel.min.js"></script>

<!-- plugins js
============================================ -->
<script src="/js/plugins.js"></script>
<!-- counterup js
============================================ -->
<script src="/js/jquery.counterup.min.js"></script>
<script src="/js/waypoints.min.js"></script>
<!-- MixItUp js-->
<script src="/js/jquery.mixitup.js"></script>
<!-- Nivo Slider JS -->
<script src="/js/jquery.nivo.slider.pack.js"></script>
<script src="/js/jquery.nav.js"></script>
<!-- wow js
============================================ -->
<script src="/js/wow.js"></script>
<!--Activating WOW Animation only for modern browser-->
<!--[if !IE]><!-->
<script type="text/javascript">new WOW().init();</script>
<!--<![endif]-->
<!-- Add venobox ja -->
<script type="text/javascript" src="/venobox/venobox.min.js"></script>
<!-- main js
============================================ -->
<script src="{{ asset('/js/jquery.maskedinput.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/inputmask.js') }}" type="text/javascript"></script>

<script src="/js/main.js"></script>
<script src="/js/site.js"></script>
<!-- Google Map js -->
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script>
    function initialize() {
        var mapOptions = {
            zoom: 15,
            scrollwheel: false,
            center: new google.maps.LatLng(40.663293, -73.956351)
        };

        var map = new google.maps.Map(document.getElementById('googleMap'),
            mapOptions);


        var marker = new google.maps.Marker({
            position: map.getCenter(),
            animation:google.maps.Animation.BOUNCE,
            icon: 'img/map-marker.png',
            map: map
        });

    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>
