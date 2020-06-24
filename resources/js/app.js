require('./bootstrap');

window.Vue = require('vue');

import moment from 'moment';
moment().format();

Vue.component('pay-service', require('./components/PayService.vue').default);

import PayService from './components/PayService.vue'

const app = new Vue({
    el: '#app',
    components: {
        PayService
    },
    data() {
        return {
            password: '',
            password_confirmation: '',
            passwordFieldType: 'password',
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
    },
    methods: {
        switchVisibility() {
            this.passwordFieldType = this.passwordFieldType === 'password' ? 'text' : 'password'
        }
    }
});


$(document).ready(function() {
    $(document).on("click", "#video1-play", function () {

        var  video = document.getElementById("video1");
        var playBtn = document.getElementById("video1-play");
        var current = document.getElementById("video1-current");
        var duration = document.getElementById("video1-duration");

        video.play();
        $("#video1-play").hide();
    });
});
