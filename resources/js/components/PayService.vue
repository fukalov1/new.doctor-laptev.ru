<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h5>Услуга: </h5>
            </div>
            <div class="col-md-6 text-right">
                <h5>Оставшееся количество просмотров: 4</h5>
            </div>
            <div class="col-md-12 text-center pb-5">
                <button class="btn btn-danger" id="video1-play">Начать просмотр</button>
            </div>
            <div class="col-md-12 text-center">
                <div id="frame" class="easyhtml5video">
                    <video id="video1" poster="/1459391843.jpg" style="width:100%" title="1459391843">
                        <source :src="`/get-file/${payservice.video_mp4}`" type="video/mp4"/>
                        <source src="/1459391843.webm" type="video/webm"/>
                        <source src="/1459391843.ogv" type="video/ogg"/>
                        <source src="/1459391843.mp4"/>
                        <object type="application/x-shockwave-flash" data="/flashfox.swf" width="640" height="493" style="position:relative;">
                            <param name="movie" value="/flashfox.swf"/>
                            <param name="allowFullScreen" value="true/">
                            <param name="flashVars" value="autoplay=false&amp;controls=false&amp;fullScreenEnabled=false&amp;posterOnEnd=true&amp;loop=false&amp;poster=/1459391843.jpg&amp;src=/1459391843.m4v"/>
                            <embed src="/flashfox.swf" width="640" height="493" style="position:relative;" flashvars="autoplay=false&amp;controls=false&amp;fullScreenEnabled=false&amp;posterOnEnd=true&amp;loop=false&amp;poster=/1459391843.jpg&amp;src=/1459391843.m4v" allowfullscreen="true" wmode="transparent" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer_en">
                            <img alt="1459391843" src="/1459391843.jpg" style="position:absolute;left:0;" width="100%" title="Video playback is not supported by your browser"/>
                        </object>
                    </video>
                    <div class="eh5v_script">
                    <ul style="position: absolute; display: none; list-style-type: none; margin: 0px; padding: 0px; background: rgb(255, 255, 255); cursor: pointer; z-index: 2147483647; box-shadow: rgb(49, 49, 49) 2px 2px 10px;"><li style="margin: 0px; padding: 3px 20px; display: none;">Pause</li><li style="margin: 0px; padding: 3px 20px; display: block;">Play</li><li style="margin: 0px; padding: 3px 20px; display: block;">Mute</li><li style="margin: 0px; padding: 3px 20px; display: none;">Unmute</li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: 'PayService',
        data() {
            return {
                payservice: null,
            }
        },
        mounted() {
            console.log('Component mounted.');
            this.loadData();
        },
        methods: {
            loadData() {
                axios.post(`/pay-service/get/data`)
                    .then(response => {
                        this.payservice = response.data;
                    })
                    .catch(error => {
                        reject(error);
                    });
            }
        }
    }
</script>

<style>
    .spacer {
        height:493px;
        width:640px;
        z-index: 100;
        position: relative;
        /*background: url('/images/spacer.gif');*/
    }
    .easyhtml5video {
        position:relative;
        width:640px;
        display: inline-grid;
    }
</style>
