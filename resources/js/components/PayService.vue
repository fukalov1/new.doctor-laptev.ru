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
            <div class="col-md-12 text-center pb-5 d-none d-sm-block"  v-if="lastCount>0">
                <div v-if="start_date">
                    <h4 v-if="playing">
                        Идет трансляция
                    </h4>
                    <h4 v-else-if="showVideo===0">
                        Начало трансляции в  {{ startDate }}
                    </h4>
                    <div v-if="!playing && showVideo>0">
                        <h4 class="tittle-w3ls text-center mb-5">
                            {{ payservice.name }} окончен.
                        </h4>
                    </div>
                </div>
                <button
                    class="btn btn-danger"
                    id="video1-play"
                    @click="playVideo()" v-else>Начать просмотр</button>
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

<!--                        <div v-else-if="showVideo==0">-->
<!--                            <h4 class="tittle-w3ls text-left mb-5">-->
<!--                                Трансляция {{ payservice.name }} еще не начата.-->
<!--                            </h4>-->
<!--                        </div>-->
                        <div>
                            <video v-show="playing"
                                   id="video1"
                                   :poster="payservice.image"
                                   style="width:100%" :title="payservice.name">
                                <source v-if="payservice.video_mp4" :src="payservice.video_mp4" type="video/mp4"/>
                                <source v-if="payservice.video_webm" :src="payservice.video_webm" type="video/webm"/>
                                <source v-if="payservice.video_ogv" :src="payservice.video_ogv" type="video/ogg"/>
                                <source v-if="payservice.video_m4v" :src="payservice.video_m4v"/>
                            </video>
                            <audio id="audio1">
                                <source v-if="payservice.audio_mp3" :src="payservice.audio_mp3" type="audio/mpeg">
                            </audio>
                        </div>
                    </div>
                    <div class="eh5v_script">
                    <ul style="position: absolute; display: none; list-style-type: none; margin: 0px; padding: 0px; background: rgb(255, 255, 255); cursor: pointer; z-index: 2147483647; box-shadow: rgb(49, 49, 49) 2px 2px 10px;"><li style="margin: 0px; padding: 3px 20px; display: none;">Pause</li><li style="margin: 0px; padding: 3px 20px; display: block;">Play</li><li style="margin: 0px; padding: 3px 20px; display: block;">Mute</li><li style="margin: 0px; padding: 3px 20px; display: none;">Unmute</li>
                    </ul>
                    </div>
                </div>
            </div>
<!--            <div class="col-md-12 text-center d-md-none d-xs-block">-->
<!--                <h3>Услуга не доступна для получения на мобильных устройствах</h3>-->
<!--            </div>-->
        </div>

    </div>
</template>

<script>

    import moment from 'moment'

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
                start_date: null,
                current_date: null,
                finish_date: null,
                timer: null,
                timer1: null,
                currentTime: 0,
                finishPlay: false,
                max_time: null,
                playing: false
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
            startDate: function () {
                return moment(this.payservice.start_date).format('DD-MM-YYYY HH:mm:ss');
            },
            showVideo: function () {
                let result = 0;
                if ( (this.current_date >= this.start_date)
                    && (this.current_date <= this.finish_date) ) {
                    result = 1;
                }
                else if (this.current_date < this.start_date) {
                    result = 0;
                }
                else {
                    result = 2;
                }

                return result;
            },
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
                        this.payservice.video_mp4 = this.payservice.video_mp4 ? `${path}/${this.payservice.video_mp4}` : null;
                        this.payservice.video_m4v = this.payservice.video_m4v ? `${path}/${this.payservice.video_m4v}` : null;
                        this.payservice.video_ogv = this.payservice.video_ogv ? `${path}/${this.payservice.video_ogv}` : null;
                        this.payservice.video_webm = this.payservice.video_webm ? `${path}/${this.payservice.video_webm}` : null;
                        this.payservice.audio_mp3 = this.payservice.audio_mp3 ? `${path}/${this.payservice.audio_mp3}` : null;
                        if (this.payservice.start_date) {
                            this.start_date = Date.parse(this.payservice.start_date)/1000;
                            this.finish_date = Date.parse(this.payservice.start_date)/1000+this.payservice.max_time;
                            this.current_date = Date.parse(Date())/1000;
                            console.log('start_date', this.start_date, 'finish_date', this.finish_date, this.current_date);
                            this.startVideo();
                        }
                    })
                    .catch(error => {
                        reject(error);
                    });
            },
            playVideo() {
                console.log('start timer');
                let video = document.getElementById("video1");
                video.play();
                this.playAudio();

                this.startTimer();
                this.playing = true;
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
            startVideo() {
                this.timer1 = setInterval(() => {
                    this.current_date++;
                    if ( this.showVideo === 1 ){
                        this.playVideo();
                        clearTimeout(this.timer1);
                    }
                    else if ( this.showVideo == 0 ){
                    }
                    else {
                        this.finishPlay = true;
                    }
                }, 1000)
            },
            playAudio() {
                if (this.payservice.audio_mp3) {
                    let audio = document.getElementById("audio1");
                    audio.play();
                }
            },
            stopAudio() {
                if (this.payservice.audio_mp3) {
                    let audio = document.getElementById("audio1");
                    audio.pause();
                }
            },
            startTimer() {
                this.timer = setInterval(() => {
                    this.currentTime++
                }, 1000)
            },
            stopTimer() {
                console.log('stop player');
                clearTimeout(this.timer);
                let video = document.getElementById("video1");
                video.pause();
                this.stopAudio();
                this.playing = false;
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
