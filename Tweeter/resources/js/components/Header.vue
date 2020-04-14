<template>
<div id="outer-frame" class="container">

    <div id="bac-frame" class=" col s12 m12 l12">
        <p id="welcome" class="pink-text text-darken-1 center-align">Tweeter</p>
        <img class="responsive-img" id="background-image" src="/image/birds-singing.jpg" alt="bird singing">
    </div>

    <div id="main-body" class="main-width">
        <div class="row col l12" id="link-frame">
            <div class="btn-floating pink darken-2 pulse col s12 m4 l4 center-align" ><a href="#about" id="link" class="white-text text-darken-3" data-out-effect="fadeOut" data-out-shuffle="true">What is this?</a></div>
            <div class="btn-floating pink darken-2 pulse col s12 m4 l4 center-align" ><a href="#features" id="link" class="white-text text-darken-3">Features</a></div>
            <div class="btn-floating pink darken-2 pulse col s12 m4 l4 center-align" ><a href="#benefits" id="link" class="white-text text-darken-3">Benefits</a></div>
        </div>
        <div class="divider"></div>
        <div id="about">
            <div class="layer hide-on-med-and-down">
                <div class="layer1 la1 hide-on-med-and-down">
                    <div class="layer2 la2 hide-on-med-and-down">
                        <div class="layer3 la3 hide-on-med-and-down">
                        </div>
                    </div>
                </div>
            </div>
            <div id="tweeter-text1" class="black-text center-align text1-valign"><p>What is Tweeter?</p></div>
            <div class="row col s12 m12 l12">
                <div id="about-text1" class="col s12 m6 l6 grey-text text-darken-4 b1">

                        <ul>
                            <li id="fact1" class="flow-text">* a social networking website</li>
                            <li id="fact2" class="flow-text">* users can share posts called tweets</li>
                            <li id="fact3" class="flow-text">* can post comments to others tweets and retweet them</li>
                        </ul>

                </div>
                <div class="col s12 m5 l5 marketing">
                    <img src="/image/social.jpg" alt="a group of people using social network like twitter" class="responsive-img marketing-size">
                </div>
            </div>
        </div>
        <div class="divider"></div>
        <div id="features">
            <div class="layer hide-on-med-and-down">
                <div class="layer1 la1 hide-on-med-and-down">
                    <div class="layer2 la2 hide-on-med-and-down">
                        <div class="layer3 la3 hide-on-med-and-down">
                        </div>
                    </div>
                </div>
            </div>
            <div id="tweeter-text2" class="black-text center-align  text2-valign"><p>What can you do here?</p></div>
            <div class="row col s12 m12 l12">
                <div id="about-text2"  class=" grey-text text-darken-4 b2 col s12 m6 l6">
                    <ul>
                        <li id="fact4" class="flow-text">* Tweeter is user-friendly and open to everyone</li>
                        <li id="fact5" class="flow-text">* Even the least technical-minded people can sign up and begin posting on Tweeter</li>
                        <li id="fact6" class="flow-text">* a way to keep in touch or reconnect with long-lost friends</li>
                        <li id="fact7" class="flow-text">* Tweeter makes it simple to share text messages, status posts and feelings on Tweeter</li>
                    </ul>
                </div>
                <div class="likeShare col s12 m5 l5">
                    <img src="/image/likesharefollow.png" alt="like, share and follow symbol" class="responsive-img likeshare-size">
                </div>
            </div>
        </div>
        <div class="divider"></div>
        <div id="benefits">
            <div class="layer hide-on-med-and-down">
                <div class="layer1 la1 hide-on-med-and-down">
                    <div class="layer2 la2 hide-on-med-and-down">
                        <div class="layer3 la3 hide-on-med-and-down">
                        </div>
                    </div>
                </div>
            </div>
            <div id="tweeter-text3" class="black-text center-align text3-valign"><p>Benefits?</p></div>
            <div class="row col s12 m12 l12">
                <div id="about-text3" class=" grey-text text-darken-4 b3 col s12 m6 l6">
                    <ul>
                        <li id="fact8" class="flow-text">* reach a large number of people quickly through tweets and retweets</li>
                        <li id="fact9" class="flow-text">* build relationships with experts and other followers</li>
                        <li id="fact10" class="flow-text">* keep up-to-date with the latest news and developments, and share it with others instantly</li>
                        <li id="fact11" class="flow-text">* seek feedback about your work and give feedback to others</li>
                    </ul>
                </div>
                <div class="connect col s12 m5 l5">
                    <img src="/image/connecting.jpg" alt="people connecting and chatting" class="responsive-img connecting-size">
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>

export default {

}
</script>


<style lang="scss">
@mixin frame-setting($pos, $top, $left) {
    position: $pos;
    top: $top;
    left: $left;
}
@mixin widthHeight($w, $h){
    width: $w;
    height: $h;
}
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

#outer-frame{
    width: 100%;
    height: auto;
    background: rgb(238, 236, 237);
}
#bac-frame {
    @include frame-setting(relative, 8vh, null);
    background: #c2185b;
}
#login{
    @include frame-setting(relative, 1vh, 2vw);
}
#welcome{
    @include frame-setting(relative, 1.8vh, null);
    background: white;
    padding-top: 10px;
    z-index: 3;
}
#background-image{
    @include frame-setting(relative, -2vh, null);
    @include widthHeight(100%, null);
    object-fit: cover;
}
#main-body{
    @include frame-setting(relative, 7vh, null);
    border: 3px solid #c2185b;
}
.main-width{
    width: 100%;
}
#link-frame {
    padding-top: 50px;
    padding-bottom: 50px;
}
#link {
    font-size: 25px;
}
.layer{
    margin: 15vh 8vw;
}
.layer1, .layer2, .layer3{
    background-color:pink;
    width: 45vw;
    height: 25vh;
    @include frame-setting(relative, 2vh, 1vw);
}
.la1{
    background-color:pink;
    @include frame-setting(relative, 2vh, 1vw);
}
.la2{
    background-color:rgb(0, 234, 255);
    @include frame-setting(relative, 2.3vh, 1.3vw);
}
.la3{
    background-color: rgb(192, 247, 167);
    @include frame-setting(relative, 2.3vh, 1.3vw);
}
#about, #features, #benefits{
    @include frame-setting(relative, 2vh, null);
    @include widthHeight(66vw, null);
}
#tweeter-text1, #tweeter-text2, #tweeter-text3 {
    padding-bottom: 30px;
    font-size: 25px;
    margin: 8vh 0;
}
.text1-valign, .text2-valign, .text3-valign{
    @include frame-setting(absolute, 10vh, 28vw);
}
#about-text1, #about-text2, #about-text3 {
    width: 45%;
    font-size: 18px;
    margin-top: 15vh;
    margin-bottom: 50px;
    margin-left: 2vw;
}
.marketing {
    margin-top: 18vh;
    margin-bottom: 10px;
    margin-left: 7vw;
}
.marketing-size{
    @include widthHeight(100%, null);
    margin-top: 5vh;
    margin-left: 7vw;
}
.likeShare{
    margin-top: 20vh;
    margin-bottom: 15px;
    margin-left: 7vw;
}
.likeshare-size{
    @include widthHeight(100%, null);
    margin-top: 5vh;
    margin-left: 7vw;
}
.connect {
    margin-top: 15vh;
    margin-bottom: 15px;
    margin-left: 7vw;
}
.connecting-size{
    @include widthHeight(100%, null);
    margin-top: 5vh;
    margin-left: 7vw;
}
.b1, .b2, .b3{
    background-color: none;
}

@media screen and (max-width: 600px) {
.main-width{
    width: 90%;
    margin-left: 5vw;
}
.b1{
    background-color: #f5c0d5;
}
.b2{
    background-color: #caddf3;
}
.b3{
    background-color: #d8f5a8;
}
.text1-valign, .text2-valign, .text3-valign{
    @include frame-setting(relative, 5vh, 2vw);
}
#tweeter-text1, #tweeter-text2, #tweeter-text3 {
    font-size: 15px;
    padding-bottom: 30px;
}
#about-text1, #about-text2, #about-text3 {
    width: 100%;
    font-size: 15px;
    margin-top: 10vh;
    margin-left: 6vw;
}
#link {
    font-size: 15px;
}
.marketing {
    margin-top: 18vh;
    margin-bottom: 5vh;
    margin-left: 5vw;
    margin-right: 5vw;
}
.marketing-size{
    @include widthHeight(100%, null);
    margin-left: 6vw;
}
.likeShare{
    margin-top: 20vh;
    margin-bottom: 15px;
    margin-left: 5vw;
    margin-right: 5vw;
}
.likeshare-size{
    @include widthHeight(100%, null);
    margin-left: 6vw;
}
.connect {
    margin-top: 15vh;
    margin-bottom: 15px;
    margin-left: 5vw;
    margin-right: 5vw;
}
.connecting-size{
    @include widthHeight(100%, null);
    margin-left: 6vw;
}
}

@media screen and (min-width: 601px) and (max-width: 992px) {
.main-width{
    width: 90%;
    margin-left: 5vw;
}
.b1{
    background-color: #f5c0d5;
}
.b2{
    background-color: #caddf3;
}
.b3{
    background-color: #d8f5a8;
}
.text1-valign, .text2-valign, .text3-valign{
    @include frame-setting(relative, 5vh, 2vw);
}
#tweeter-text1, #tweeter-text2, #tweeter-text3 {
    padding-bottom: 30px;
    font-size: 25px;
    margin: 8vh 0;
}
#link {
    font-size: 20px;
}
#about-text1, #about-text2, #about-text3 {
    width: 100%;
    font-size: 15px;
    margin-top: 10vh;
    margin-left: 6vw;
}
.marketing, .likeShare, .connect{
    margin-top: 10vh;
    margin-bottom: 10px;
    margin-left: 5vw;
    margin-right: 5vw;
}
.marketing-size, .likeshare-size, .connecting-size{
    @include widthHeight(100%, null);
    margin-left: 25vw;
    margin-bottom: 10vh;
}
}

@media screen and (min-width: 993px) and (max-width: 1199px) {
.main-width{
    width: 100%;
}
.b1, .b2, .b3{
    background-color: none;
}
.layer{
    margin-left: 15vw;
    margin-top: 10vh;
    margin-bottom: 10vh;
}
.layer1, .layer2, .layer3{
    background-color:pink;
    width: 35vw;
    height: 15vh;
    @include frame-setting(relative, 1vh, 1.5vw);
}
.la1{
    background-color:pink;
    @include frame-setting(relative, 1vh, 1vw);
}
.la2{
    background-color:rgb(0, 234, 255);
    @include frame-setting(relative, 1.2vh, 1.5vw);
}
.la3{
    background-color: rgb(192, 247, 167);
    @include frame-setting(relative, 1.2vh, 1.5vw);
}
#about, #features, #benefits{
    @include frame-setting(relative, 2vh, null);
    @include widthHeight(66vw, null);
}
#tweeter-text1, #tweeter-text2, #tweeter-text3 {
    padding: 30px;
    font-size: 20px;
    font-weight: bold;
    margin: 2vh 0;
}
.text1-valign, .text2-valign, .text3-valign{
    @include frame-setting(absolute, 5vh, 27vw);
}
#link-frame {
    padding-top: 50px;
}
#link {
    font-size: 25px;
}
#about-text1, #about-text2, #about-text3 {
    width: 30vw;
    font-size: 15px;
    margin-top: 10vh;
    margin-bottom: 10vh;
}
.marketing {
    margin-top: 10vh;
}
.marketing-size{
    @include widthHeight(100%, null);
    margin-top: 5vh;
    margin-left: 6vw;
}
.likeShare{
    margin-top: 20vh;
    margin-bottom: 15px;
}
.likeshare-size, .connecting-size{
    @include widthHeight(100%, null);
    margin-left: 6vw;
}
.connect {
    margin-top: 15vh;
    margin-bottom: 15px;
}
}

</style>
