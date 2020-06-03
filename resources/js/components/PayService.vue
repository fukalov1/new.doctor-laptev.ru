<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h4 class="tittle-w3ls text-left mb-5">
                    {{ payservice.name }}
                </h4>
            </div>
            <div class="col-md-6 text-right d-none d-sm-block">
                <h5  v-if="validCode>0">
                    Осталось просмотров: {{ lastCount }}
                </h5>
            </div>
            <div class="col-md-12 text-center pb-5 d-none d-sm-block">
                <button class="btn btn-danger"
                        id="video1-play" @click="playVideo()" v-if="lastCount>0">Начать просмотр</button>
            </div>
            <div class="col-md-12 text-center d-none d-sm-block">
                <div id="frame" class="easyhtml5video">
                    <div class="spacer">

                    </div>

                    <div class="h3" v-if="validCode==0">
                        Веденный код доступа не найден. Просмотр невозможен.
                    </div>
                    <div class="h3" v-else-if="payservice.group_code.codes[0].count>payservice.show_count">
                        Количество просмотров по введенному коду доступа использовано. Просмотр невозможен.
                    </div>
                    <div v-else>
                        <div v-if="finishPlay">
                            <h4 class="tittle-w3ls text-left mb-5">
                                {{ payservice.name }} окончен.
                            </h4>
                        </div>
                        <div v-else>
                            <video v-if="payservice.video_mp4"
                        id="video1"
                        :poster="payservice.image"
                        style="width:100%" :title="payservice.name">
                        <source :src="payservice.video_mp4" type="video/mp4"/>
                        <source :src="payservice.video_webm" type="video/webm"/>
                        <source :src="payservice.video_ogv" type="video/ogg"/>
                        <source :src="payservice.video_m4v"/>
<!--                        <object type="application/x-shockwave-flash" data="/flashfox.swf" width="640" height="493" style="position:relative;">-->
<!--                            <param name="movie" value="/flashfox.swf"/>-->
<!--                            <param name="allowFullScreen" value="true/">-->
<!--                            <param name="flashVars" value="autoplay=false&amp;controls=false&amp;fullScreenEnabled=false&amp;posterOnEnd=true&amp;loop=false&amp;poster=/images/ab1.jpg&amp;src=/1459391843.m4v"/>-->
<!--                            <embed src="/flashfox.swf" width="640" height="493" style="position:relative;" flashvars="autoplay=false&amp;controls=false&amp;fullScreenEnabled=false&amp;posterOnEnd=true&amp;loop=false&amp;poster=/1459391843.jpg&amp;src=/1459391843.m4v" allowfullscreen="true" wmode="transparent" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer_en">-->
<!--                            <img alt="1459391843" src="/1459391843.jpg" style="position:absolute;left:0;" width="100%" title="Video playback is not supported by your browser"/>-->
<!--                        </object>-->
                    </video>
                        </div>
                    </div>
                    <div class="eh5v_script">
                    <ul style="position: absolute; display: none; list-style-type: none; margin: 0px; padding: 0px; background: rgb(255, 255, 255); cursor: pointer; z-index: 2147483647; box-shadow: rgb(49, 49, 49) 2px 2px 10px;"><li style="margin: 0px; padding: 3px 20px; display: none;">Pause</li><li style="margin: 0px; padding: 3px 20px; display: block;">Play</li><li style="margin: 0px; padding: 3px 20px; display: block;">Mute</li><li style="margin: 0px; padding: 3px 20px; display: none;">Unmute</li>
                    </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center d-md-none d-xs-block">
                <h3>Услуга не доступна для получения на мобильных устройствах</h3>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: 'PayService',
        props: {
            id: {
                type: Number,
                required: true
            },
            code: {
                type: String,
                required: true
            }
        },
        data() {
            return {
                payservice: {
                    name: '',
                    image: null,
                    video_mp4: null,
                    video_m4v: null,
                    video_ogv: null,
                    video_webm: null,
                },
                timer: null,
                currentTime: 0,
                finishPlay: false
            }
        },
        created() {
            console.log('Component mounted.');
            this.loadData();
        },
        watch: {
            currentTime(time) {
                if (time === this.payservice.max_time) {
                    this.stopTimer()
                }
            }
        },
        computed: {
            validCode: function () {
                let result = 0;
                if (this.payservice.group_code) {
                    result = this.payservice.group_code.codes.length;
                }
                return result;
            },
            lastCount: function () {
                let count = 0;
                if (this.payservice.group_code) {
                    count = this.payservice.show_count - this.payservice.group_code.codes[0].count;
                }
                return count>=0 ? count : 0;
            }
        },
        methods: {
            loadData() {
                axios.post(`/get-pay-service`, {id: this.id, code: this.code})
                    .then(response => {
                        let path = '/storage';
                        this.payservice = response.data;
                        this.payservice.image = `/uploads/${this.payservice.image}`
                        this.payservice.video_mp4 = `${path}/${this.payservice.video_mp4}`
                        this.payservice.video_m4v = `${path}/${this.payservice.video_m4v}`
                        this.payservice.video_ogv = `${path}/${this.payservice.video_ogv}`
                        this.payservice.video_webm = `${path}/${this.payservice.video_webm}`
                    })
                    .catch(error => {
                        reject(error);
                    });
            },
            playVideo() {
                console.log('start timer');
                this.startTimer();
                axios.post(`/check-pay-service`, {id: this.id, code: this.code})
                    .then(response => {
                        console.log(response.data.success);
                        // if(response.data.success) {
                            this.payservice.group_code.codes[0].count++;
                        // }
                    })
                    .catch(error => {

                    });
            },
            startTimer() {
                this.timer = setInterval(() => {
                    this.currentTime++
                }, 1000)
            },
            stopTimer() {
                clearTimeout(this.timer);
                this.finishPlay = true;
            },
        }
    }
</script>

<style>
    .spacer {
        height:493px;
        width:640px;
        z-index: 100;
        position: absolute  ;
        /*background: url('/images/spacer.gif');*/
    }
    .easyhtml5video {
        position:relative;
        width:640px;
        display: inline-grid;
    }
</style>
