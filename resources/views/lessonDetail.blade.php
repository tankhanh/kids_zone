<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>Slider</title>
    <style>
    html {
        background-color: #EBFAFF;
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
        position: relative;
    }

    .slide img {
        max-width: 100%;
        max-height: 50%;
        display: block;
        margin: 0 auto;
    }

    .slide audio {
        width: 500px;
        height: 30px;
        display: block;
        margin: 20px auto;
    }

    .slide video {
        max-width: 100%;
        max-height: 50%;
        display: block;
        margin: 0 auto;
    }

    .prev,
    .next {
        position: absolute;
        top: 20%;
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
    </style>
</head>

<body>
    <a href="{{ asset('/lessons') }}" class="goback">
        &lt; Back
    </a>
    @if ($lesson)
    <h1 style="text-align:center; font-weight:bold;font-family: arial;">{{ $lesson->title }}</h1>
    <div class="slider">
        @if ($images->count() > 0 || $sounds->count() > 0 || $videos->count() > 0)
        @foreach ($images as $image)
        <div class="slide">
            <img src="{{ asset('uploads/imageDetail/' . $image->url) }}" alt="{{ $image->caption }}" />
            @foreach ($sounds as $sound)
            <audio controls>
                <source src="{{ asset('uploads/sounds/' . $sound->url) }}" type="audio/mpeg">
            </audio>
            @endforeach
        </div>
        @endforeach
        @foreach ($videos as $video)
        <div class="slide">
            <video controls>
                <source src="{{ asset('uploads/videos/' . $video->url) }}" type="video/mp4">
            </video>
        </div>
        @endforeach
        <a href="#" class="prev">❮</a>
        <a href="#" class="next">❯</a>
        @else
        <p>No content available for this lesson.</p>
        @endif
    </div>
    @else
    <p>Lesson not found.</p>
    @endif

    <script>
    var slideIndex = 0;
    var slides = document.getElementsByClassName("slide");
    var videos = document.querySelectorAll(".slide video");
    var isVideoPlaying = false;

    function pauseVideo() {
        if (isVideoPlaying) {
            var currentVideo = videos[slideIndex];
            if (currentVideo) {
                currentVideo.pause();
                isVideoPlaying = false; // Đánh dấu rằng video không đang phát
            }
        }
    }

    function checkVideoPlaying() {
        var currentVideo = videos[slideIndex];
        if (currentVideo) {
            currentVideo.play();
            isVideoPlaying = true; // Đánh dấu rằng video đang phát
        }
    }

    function showSlides(n) {
        if (n < 0) {
            slideIndex = slides.length - 1;
        } else if (n >= slides.length) {
            slideIndex = 0;
        }

        pauseVideo(); // Dừng video khi chuyển slide

        for (var i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }

        slides[slideIndex].style.display = "block";

        if (slides[slideIndex].contains(videos[slideIndex])) {
            checkVideoPlaying();
        }
    }

    function playVideoOnSlideChange() {
        videos[slideIndex].addEventListener("playing", function() {
            isVideoPlaying = true;
        });
    }

    document.querySelector(".prev").addEventListener("click", function() {
        showSlides(slideIndex -= 1);
        playVideoOnSlideChange();
    });

    document.querySelector(".next").addEventListener("click", function() {
        showSlides(slideIndex += 1);
        playVideoOnSlideChange();
    });

    showSlides(slideIndex);
    </script>
</body>

</html>