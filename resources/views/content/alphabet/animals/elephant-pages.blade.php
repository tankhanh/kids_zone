<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>Elephant</title>
    <style>
    html {
        background-color: #EAEADF;
    }

    .slider {
        position: relative;
        width: 1000px;
        height: 600px;
        overflow: hidden;
        display: block;
        margin: 0 auto;
    }

    .slide {
        width: 100%;
        height: 100%;
        display: none;
    }

    .slide img {
        width: 500px;
        height: auto;
    }

    .slide iframe {
        width: 100%;
        height: 100%;
    }

    .prev,
    .next {
        position: absolute;
        top: 50%;
        font-size: 3em;
        color: #ff6147;
        text-decoration: none;
        cursor: pointer;
    }

    .prev {
        left: 10px;
    }

    .next {
        right: 10px;
    }

    .goback {
        position: absolute;
        top: 40px;
        left: 10px;
        font-size: 1.5em;
        color: black;
        text-decoration: none;
        cursor: pointer;
        padding: 5px 10px;
        border-radius: 10px;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
    }

    .goback:hover {
        background-color: #eee;
        /* Màu nền khi di chuột qua */
    }

    .game {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .controls {
        display: flex;
        gap: 20px;
        margin-bottom: 20px;
    }

    button {
        background: #282A3A;
        color: #FFF;
        border-radius: 5px;
        padding: 10px 20px;
        border: 0;
        cursor: pointer;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 18pt;
        font-weight: bold;
    }

    .disabled {
        color: #757575;
    }

    .stats {
        color: black;
        font-size: 14pt;
        font-weight: bold;
    }

    .board-container {
        position: relative;
    }

    .board,
    .win {
        border-radius: 5px;
        box-shadow: 0 25px 50px rgb(33 33 33 / 25%);
        /* background: linear-gradient(135deg, #03001e 0%, #7303c0 0%, #ec38bc 50%, #fdeff9 100%); */
        background-color: #FFDF41;
        transition: transform .6s cubic-bezier(0.4, 0.0, 0.2, 1);
        backface-visibility: hidden;
    }

    .board {
        padding: 20px;
        display: grid;
        grid-template-columns: repeat(4, auto);
        grid-gap: 20px;
    }

    .board-container.flipped .board {
        transform: rotateY(180deg) rotateZ(50deg);
    }

    .board-container.flipped .win {
        transform: rotateY(0) rotateZ(0);
    }

    .card {
        position: relative;
        width: 100px;
        height: 100px;
        cursor: pointer;
    }

    .card-front,
    .card-back {
        position: absolute;
        border-radius: 5px;
        width: 100%;
        height: 100%;
        background: #282A3A;
        transition: transform .6s cubic-bezier(0.4, 0.0, 0.2, 1);
        backface-visibility: hidden;
    }

    .card-back {
        transform: rotateY(180deg) rotateZ(50deg);
        font-size: 28pt;
        user-select: none;
        text-align: center;
        line-height: 100px;
        background: #FDF8E6;
    }

    .card.flipped .card-front {
        transform: rotateY(180deg) rotateZ(50deg);
    }

    .card.flipped .card-back {
        transform: rotateY(0) rotateZ(0);
    }

    .win {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        text-align: center;
        background: #FDF8E6;
        transform: rotateY(180deg) rotateZ(50deg);
    }

    .win-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 21pt;
        color: #282A3A;
    }

    .highlight {
        color: #7303c0;
    }
    </style>
</head>

<body>
    <a href="{{ asset('lessons')}}" class="goback">
        < Back</a>
            <h1 style="text-align:center; font-weight:bold;font-family: arial;">Elephant</h1>
            <div class="slider">
                <div class="slide">
                    <iframe id="youtube-video"
                            src="https://www.youtube.com/embed/Fk3VdpuFx0Q?si=12wk27LWQHSkw-pC&enablejsapi=1"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                </div>
                <div class="slide">
                    <div class="game">
                        <div class="controls">
                            <button>Start</button>
                            <div class="stats">
                                <div class="moves">0 moves</div>
                                <div class="timer">Time: 0 sec</div>
                            </div>
                        </div>
                        <div class="board-container">
                            <div class="board" data-dimension="4"></div>
                            <div class="win">You won!</div>
                        </div>
                    </div>
                </div>
                <a href="#" class="prev">❮</a>
                <a href="#" class="next">❯</a>
            </div>

            <script>
            var slideIndex = 0;
            var videoPlayer;

            showSlides(slideIndex);

            function showSlides(n) {
                var i;
                var slides = document.getElementsByClassName("slide");
                if (n >= slides.length) {
                    slideIndex = 0;
                }
                if (n < 0) {
                    slideIndex = slides.length - 1;
                }
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                slides[slideIndex].style.display = "block";
            }

            document.querySelector(".prev").addEventListener("click", function() {
                // Kiểm tra nếu video đang chạy, tắt nó trước khi chuyển slide
                if (videoPlayer.getPlayerState() === YT.PlayerState.PLAYING) {
                    videoPlayer.stopVideo();
                }
                showSlides(--slideIndex);
            });

            document.querySelector(".next").addEventListener("click", function() {
                // Kiểm tra nếu video đang chạy, tắt nó trước khi chuyển slide
                if (videoPlayer.getPlayerState() === YT.PlayerState.PLAYING) {
                    videoPlayer.stopVideo();
                }
                showSlides(++slideIndex);
            });

            function onYouTubeIframeAPIReady() {
                videoPlayer = new YT.Player("youtube-video", {
                    events: {
                        onReady: onPlayerReady,
                    },
                });
            }

            function onPlayerReady(event) {
                // Đảm bảo video đã tắt khi nó sẵn sàng
                event.target.pauseVideo();
            }
            </script>
            <script src="https://www.youtube.com/iframe_api"></script>

            <script src="{{ asset('js/memoryGame_animal.js')}}"></script>
</body>

</html>