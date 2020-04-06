<template>
<div id="outer-frame" class="container">

    <div id="bac-frame" class="container col s12 m12 l12">
        <p id="welcome" class="pink-text text-darken-1 center-align">Tweeter</p>
        <img class="responsive-img" id="background-image" src="/image/birds-singing.jpg" alt="bird singing">
    </div>

    <div id="main-body" class="container">
        <div class="row col s12 m6 l4" id="link-frame">
            <div class="btn-flat " ><a href="#about" id="link" class="black-text text-darken-3">What is this?</a></div>
            <div class="btn-flat " ><a href="#features" id="link" class="black-text text-darken-3">Features</a></div>
            <div class="btn-flat " ><a href="#benefits" id="link" class="black-text text-darken-3">Benefits</a></div>
        </div>
        <div id="about" class="row col s12 m12 l12">
            <div id="tweeter-text1" class="black-text"><p>What is Tweeter?</p></div>
            <div id="about-text1"  class="grey-text text-darken-4">
                <ul>
                    <li id="fact1">* a social networking website</li>
                    <li id="fact2">* users can share posts called tweets</li>
                    <li id="fact3">* can post comments to others tweets and retweet them</li>
                </ul>
            </div>
            <div class="marketing">
                <img src="/image/marketing.png" alt="a group of people using social network like twitter" class="responsive-img marketing-size">
            </div>
        </div><br><br>
        <div class="divider"></div>
        <div id="features"  class="row col s12 m12 l12">
            <div  id="tweeter-text2" class="black-text"><p class="p2">What can you do here?</p></div>
            <div id="about-text2"  class="grey-text text-darken-4">
                <ul>
                    <li id="fact4">* Tweeter is user-friendly and open to everyone</li>
                    <li id="fact5">* Even the least technical-minded people can sign up and begin posting on Tweeter</li>
                    <li id="fact6">* a way to keep in touch or reconnect with long-lost friends</li>
                   <li id="fact7">* Tweeter makes it simple to share text messages, status posts and feelings on Tweeter</li>
                </ul>
            </div>
            <div class="likeShare">
                <img src="/image/like-share-follow.jpg" alt="like, share and follow symbol" class="responsive-img marketing-size">
            </div>
        </div>
        <div class="divider"></div>
        <div id="benefits" class="row">
            <div id="tweeter-text3" class="black-text"><p class="p3">Benefits?</p></div>
            <div id="about-text3"  class="grey-text text-darken-4">
                <ul>
                    <li id="fact8">* reach a large number of people quickly through tweets and retweets</li>
                    <li id="fact9">* build relationships with experts and other followers</li>
                    <li id="fact10">* build relationships with experts and other followers</li>
                    <li id="fact11">* seek feedback about your work and give feedback to others</li>
                </ul>
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
    background: rgb(238, 236, 237);
}
#bac-frame {
    @include frame-setting(relative, 7vh, 0.3vw);
    //@include widthHeight(78w, null);
    background: #c2185b;
}
#login{
    @include frame-setting(relative, 1vh, 2vw);
}
#welcome{
    @include frame-setting(relative, 2vh, 2vw);
    @include widthHeight(70vw, null);
    background: white;
    padding-top: 10px;
}
#background-image{
    @include frame-setting(relative, -1vh, 2vw);
    @include widthHeight(70vw, null);
    object-fit: cover;
}

#main-body{
    // display: grid;
    // grid-template-columns: 1fr;
    // grid-template-rows: repeat(auto-fill, minmax(10rem,1fr));
    // justify-content: center;
    // justify-items: center;
    @include frame-setting(relative, 7vh, null);
    @include widthHeight(72vw, null);
    border: 3px solid #c2185b;
}
#link-frame {
    padding-top: 20px;
}
#link {
    font-size: 15px;
}
#about{
    @include frame-setting(relative, 2vh, 2vw);
    @include widthHeight(66vw, null);
    // background: rgb(238, 236, 237);
}
#features{
    @include frame-setting(relative, 2vh, 2vw);
    @include widthHeight(66vw, null);
}
#benefits {
    @include frame-setting(relative, 2vh, 2vw);
    @include widthHeight(66vw, null);
    padding-bottom: 15px;
}
#tweeter-text1, #tweeter-text2, #tweeter-text3 {
    padding: 30px 0;
    font-size: 25px;
}
.p2{
    padding-left: 40px;
}
.p3{
    padding-left: 55px;
}
#about-text1, #about-text2, #about-text3 {
    padding: 5px;
    font-size: 18px;
}
.marketing {
    @include widthHeight(70vw, null);
    padding-bottom: 15px;
}
.likeShare{
    @include widthHeight(70vw, null);
    padding-bottom: 30px;
}
.marketing-size{
    @include widthHeight(50vw, null);
    margin-left: 4vw;
    margin-top: 5vw;
}


</style>
