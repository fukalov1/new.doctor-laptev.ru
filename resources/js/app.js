/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import axios from 'axios';

require('./bootstrap');

window.Vue = require('vue');

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

const app = new Vue({
    el: '#app',
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
