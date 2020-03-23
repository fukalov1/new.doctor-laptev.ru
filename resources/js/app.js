/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import axios from 'axios';

require('./bootstrap');

window.Vue = require('vue');



import { yandexMap, ymapMarker } from 'vue-yandex-maps'

import YmapPlugin from 'vue-yandex-maps'

// Vue.use(YmapPlugin, settings);


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('pay-service', require('./components/PayService.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const settings = {
//     apiKey: 'e5db01fb-1c20-456d-b884-cf0d71279a63',
//     lang: 'ru_RU',
//     coordorder: 'latlong',
//     version: '2.1'
// }


const app = new Vue({
    el: '#app',
    components: { yandexMap, ymapMarker },
    data() {
        return {
            settings: {
                apiKey: 'e5db01fb-1c20-456d-b884-cf0d71279a63',
                lang: 'ru_RU',
                coordorder: 'latlong',
                version: '2.1'
            },
            coords: [54, 39],
            markerIcon: {
                layout: 'default#imageWithContent',
                imageHref: '/images/33447.png',
                imageSize: [43, 43],
                imageOffset: [0, 0],
                content: '123 v12',
                contentOffset: [0, 15],
                contentLayout: '<div style="background: red; width: 50px; color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
            }
        }
    }
});


$(document).ready(function() {

    /*
            $.ajax({
                url: "/vso.php",
                data: {},
                dataType: "html",
                    success: function(data){
    //				alert(data);
                    $('#flash').html(data);
                },
                    error: function(data){
                    $('#flash').html('<h1>Ошибка показа</h1>');
                },
                    complete: function(data){
                }
            });

    */

    $(document).on("click", "#video1-play", function () {

        var  video = document.getElementById("video1");
        var playBtn = document.getElementById("video1-play");
        var current = document.getElementById("video1-current");
        var duration = document.getElementById("video1-duration");

        video.play();
        $("#video1-play").hide();
    });
});
