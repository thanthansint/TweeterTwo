<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tweeter</title>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords"
            content="Tweeter, Social, Network, Chat, Post, Comment">
        <meta name="description" content="A user friendly social netwoking website">
        <meta name="author" content="Than, Than Sint">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> --}}
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.14.2/TweenMax.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.3/ScrollMagic.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.3/plugins/animation.gsap.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.3/plugins/debug.addIndicators.js"></script>


        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> --}}
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                /* color: #636b6f; */
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 80px;
                top: 18px;
            }
            .top {
                position: absolute;
                top: 18px;
            }
            .content {
                text-align: center;
            }

            /* .title {
                font-size: 84px;
                color: #ad1457;
                font-weight: bold;
            } */

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
                margin-top: 30px;
            }
        </style>
    </head>
    <body>
        {{-- <div class="flex-center position-ref full-height col s12"> --}}
        <div class="flex-center position-ref col s12 m12 l12">
            @if (Route::has('login'))
                <div class="top links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            {{-- <div class="content col s12">
                <div class="welcome-title">
                   Welcome To TWEETER
                </div>
                <div>
                    <img id="welcome-image" class="responsive-img" src="../image/birds-singing.jpg" alt="birds singing">
                </div>
            </div> --}}
        </div>
        <div id="app">
            <Root/>
        </div>
        <script src="{{ asset('js/app.js')}}"></script>

        <script>
        // this is where our code will go

        var bg_tween = TweenMax.to('#about-text1', 1, {
            //  backgroundColor: '#f5c0d5',
             ease: Linear.easeNone
        });

        var bg_tween2 = TweenMax.to('#about-text2', 1, {
            //  backgroundColor: '#caddf3',
             ease: Linear.easeNone
        });

        var bg_tween3 = TweenMax.to('#about-text3', 1, {
            //  backgroundColor: '#d8f5a8',
             ease: Linear.easeNone
        });

        var yoyo_tween = TweenMax.to('#tweeter-text1', 1, {
            transform: 'scale(2.5)',
            ease: Cubic.easeOut,
            repeat: -1, // this negative value repeats the animation
            yoyo: true // make it bounce…yo!
            });

        var yoyo_tween2 = TweenMax.to('#tweeter-text2', 1, {
            transform: 'scale(2.5)',
            ease: Cubic.easeOut,
            repeat: -1, // this negative value repeats the animation
            yoyo: true // make it bounce…yo!
            });

        var yoyo_tween3 = TweenMax.to('#tweeter-text3', 1, {
            transform: 'scale(2.5)',
            ease: Cubic.easeOut,
            repeat: -1, // this negative value repeats the animation
            yoyo: true // make it bounce…yo!
            });

        var controller = new ScrollMagic.Controller();

        var bg_scene = new ScrollMagic.Scene({
            triggerElement: '#about'
            })
        .setTween(bg_tween);

        var bg_scene2 = new ScrollMagic.Scene({
            triggerElement: '#features'
            })
        .setTween(bg_tween2);

        var bg_scene3 = new ScrollMagic.Scene({
            triggerElement: '#benefits'
            })
        .setTween(bg_tween3);

        var yoyo_scene = new  ScrollMagic.Scene({
            triggerElement: '#about'
            })
            .setTween(yoyo_tween);

        var yoyo_scene2 = new  ScrollMagic.Scene({
            triggerElement: '#features'
            })
            .setTween(yoyo_tween2);

        var yoyo_scene3 = new  ScrollMagic.Scene({
            triggerElement: '#benefits'
            })
            .setTween(yoyo_tween3);

        var scene = new ScrollMagic.Scene({
            offset: 100,
            triggerElement: '#fact1', // starting scene, when reaching this element
            duration: 50, // pin element for the window height - 1
        })
        .setPin('#fact1'); // the element we want to pin

        var scene2 = new ScrollMagic.Scene({
            offset: 100,
            triggerElement: '#fact2', // starting scene, when reaching this element
            duration: 50, // pin element for the window height - 1
        })
        .setPin('#fact2'); // the element we want to pin

        var scene3 = new ScrollMagic.Scene({
            offset: 100,
            triggerElement: '#fact3', // starting scene, when reaching this element
            duration: 50, // pin element for the window height - 1
        })
        .setPin('#fact3'); // the element we want to pin

        var scene4 = new ScrollMagic.Scene({
            offset: 100,
            triggerElement: '#fact4', // starting scene, when reaching this element
            duration: 50, // pin element for the window height - 1
        })
        .setPin('#fact4'); // the element we want to pin

        var scene5 = new ScrollMagic.Scene({
            offset: 100,
            triggerElement: '#fact5', // starting scene, when reaching this element
            duration: 50, // pin element for the window height - 1
        })
        .setPin('#fact5'); // the element we want to pin

        var scene6 = new ScrollMagic.Scene({
            offset: 100,
            triggerElement: '#fact6', // starting scene, when reaching this element
            duration: 50, // pin element for the window height - 1
        })
        .setPin('#fact6'); // the element we want to pin

        var scene7 = new ScrollMagic.Scene({
            offset: 100,
            triggerElement: '#fact7', // starting scene, when reaching this element
            duration: 50, // pin element for the window height - 1
        })
        .setPin('#fact7'); // the element we want to pin

        var scene8 = new ScrollMagic.Scene({
            offset: 100,
            triggerElement: '#fact8', // starting scene, when reaching this element
            duration: 50, // pin element for the window height - 1
        })
        .setPin('#fact8'); // the element we want to pin

        var scene9 = new ScrollMagic.Scene({
            offset: 100,
            triggerElement: '#fact9', // starting scene, when reaching this element
            duration: 50, // pin element for the window height - 1
        })
        .setPin('#fact9'); // the element we want to pin

        var scene10 = new ScrollMagic.Scene({
            offset: 100,
            triggerElement: '#fact10', // starting scene, when reaching this element
            duration: 50, // pin element for the window height - 1
        })
        .setPin('#fact10'); // the element we want to pin

        var scene11 = new ScrollMagic.Scene({
            offset: 100,
            triggerElement: '#fact11', // starting scene, when reaching this element
            duration: 50, // pin element for the window height - 1
        })
        .setPin('#fact11'); // the element we want to pin

        // Add Scene to ScrollMagic Controller
        //controller.addScene(scene);
        controller.addScene([
            yoyo_scene,
            yoyo_scene2,
            yoyo_scene3,
            bg_scene,
            bg_scene2,
            bg_scene3,
            scene,
            scene2,
            scene3,
            scene4,
            scene5,
            scene6,
            scene7,
            scene8,
            scene9,
            scene10,
            scene11
        ]);
        </script>
    </body>
</html>
