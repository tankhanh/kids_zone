@extends('layouts.app')
@section('title', 'Lessons')
@section('content')
<style>
.banner {
    width: 100%;
    height: auto;
    background-image: linear-gradient(rgb(21 21 21 / 20%), rgb(46 46 46 / 75%)), url('/img/PBS_KIDS.jpg');
    /* background-size: cover; */
    background-position: center;
}




.container h1 {
    display: block;
    font-size: 34px;
    text-decoration: none;
    color: #ff6147;
    font-weight: bold;
    margin: 50px;
    background-color: aliceblue;
    max-width: 100%;
    border-radius: 10px;
    text-align: center;
}

/* styles.css */
.image-gallery {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 10px;
    justify-content: flex-start;
    align-items: center;
    margin: 20px;
}

.image-card {
    margin: 10px;
    overflow: hidden;
    cursor: pointer;
    transition: transform 0.3s ease;
}

.image-card label {
    display: flex;
    justify-content: center;
    font-weight: bold;
    color: white;
}

.image-card label:hover {
    color: #ff6147;
}

.zoom-image {
    width: 200px;
    /* Điều chỉnh kích thước ảnh theo mong muốn */
    height: 150px;
    /* Điều chỉnh kích thước ảnh theo mong muốn */
}

.image-card:hover {
    transform: scale(1.1);
}

.cate-name {
    display: block;
    font-size: 34px;
    text-decoration: none;
    color: #ff6147;
    font-weight: bold;
    margin: 50px;
    background-color: aliceblue;
    max-width: 100%;
    border-radius: 10px;
    text-align: center;
}





.lesson-card {
    gap: 10px;
    justify-content: flex-start;
    border: 1px solid #ccc;
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    background-color: #f9f9f9;
    border-radius: 10px;
    transition: filter 0.3s ease-in-out;
    /* Hiệu ứng khi hover */
}


.lesson-card:hover img {
    filter: brightness(0.8);
}


.lesson-card img {
    max-width: 100%;
    height: auto;
}

.lesson-title {
    font-size: 24px;
    font-weight: bold;
    margin: 10px 0;
}

.lesson-description {
    margin: 10px 0;
}

.lesson-duration {
    color: #666;
}



.lesson-card-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-start;
    /* Khoảng cách giữa các lesson-card */
}

.lesson-card {
    flex: 0 0 calc(25% - 20px);
    /* 25% là để hiển thị 4 cột, 20px là khoảng cách giữa các lesson-card */
    margin: 10px;
    /* Khoảng cách giữa các lesson-card */
}
</style>
<div class="container">
    <h1>Category</h1>
    <div class="image-gallery">
        <div class="image-card" data-target="#alphabet">
            <a href="#"><img src="{{ asset('img/abc.jpg')}}" alt="Image 1" class="zoom-image"></a>
            <label for="">Alphabet</label>
        </div>
        <div class="image-card" data-target="#number">
            <img src="{{ asset('img/123.jpg')}}" alt="Image 2" class="zoom-image">
            <label for="">Numbers</label>
        </div>
        <div class="image-card" data-target="#animal">
            <img src="{{ asset('img/animal.jpg')}}" alt="Image 1" class="zoom-image">
            <label for="">Animals</label>
        </div>
        <div class="image-card" data-target="#fruit">
            <img src="{{ asset('img/fruit.jpg')}}" alt="Image 2" class="zoom-image">
            <label for="">Fruits</label>
        </div>
        <div class="image-card" data-target="#car">
            <img src="{{ asset('img/car.jpg')}}" alt="Image 1" class="zoom-image">
            <label for="">Cars</label>
        </div>
        <div class="image-card" data-target="#weather">
            <img src="{{ asset('img/weather.jpg')}}" alt="Image 2" class="zoom-image">
            <label for="">Weathers</label>
        </div>
        <div class="image-card" data-target="#country">
            <img src="{{ asset('img/country.jpg')}}" alt="Image 1" class="zoom-image">
            <label for="">Countries</label>
        </div>
        <div class="image-card" data-target="#shape">
            <img src="{{ asset('img/shapes.jpg')}}" alt="Image 2" class="zoom-image">
            <label for="">Shapes</label>
        </div>
        <div class="image-card" data-target="#sea">
            <img src="{{ asset('img/sea.jpg')}}" alt="Image 1" class="zoom-image">
            <label for="">Sea</label>
        </div>
        <div class="image-card" data-target="#food">
            <img src="{{ asset('img/food.jpg')}}" alt="Image 2" class="zoom-image">
            <label for="">Foods</label>
        </div>
    </div>
    <hr>
    <div id="alphabet">
        <div class="container">
            <div class="cate-name">Alphabet</div>
            <div class="lesson-card-container">
                <div class="lesson-card">
                    <a href="{{ asset('memory-game')}}"><img src="{{ asset('img/abc.jpg')}}" alt="Lesson Image"></a>
                    <div class="lesson-title">Lesson Title</div>
                    <div class="lesson-description">Mô tả bài học của bạn ở đây...</div>
                    <div class="lesson-duration">Thời gian bài học: 60 phút</div>
                </div>
                <div class="lesson-card">
                    <a href="{{ asset('memory-game')}}"><img src="{{ asset('img/abc.jpg')}}" alt="Lesson Image"></a>
                    <div class="lesson-title">Lesson Title</div>
                    <div class="lesson-description">Mô tả bài học của bạn ở đây...</div>
                    <div class="lesson-duration">Thời gian bài học: 60 phút</div>
                </div>
                <div class="lesson-card">
                    <a href="{{ asset('memory-game')}}"><img src="{{ asset('img/abc.jpg')}}" alt="Lesson Image"></a>
                    <div class="lesson-title">Lesson Title</div>
                    <div class="lesson-description">Mô tả bài học của bạn ở đây...</div>
                    <div class="lesson-duration">Thời gian bài học: 60 phút</div>
                </div>
                <div class="lesson-card">
                    <a href="{{ asset('memory-game')}}"><img src="{{ asset('img/abc.jpg')}}" alt="Lesson Image"></a>
                    <div class="lesson-title">Lesson Title</div>
                    <div class="lesson-description">Mô tả bài học của bạn ở đây...</div>
                    <div class="lesson-duration">Thời gian bài học: 60 phút</div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div id="number">
        <div class="container">
            <div class="cate-name">Number</div>
            <div class="lesson-card-container">
                <div class="lesson-card">
                    <img src="{{ asset('img/123.jpg')}}" alt="Lesson Image">
                    <div class="lesson-title">Lesson Title</div>
                    <div class="lesson-description">Mô tả bài học của bạn ở đây...</div>
                    <div class="lesson-duration">Thời gian bài học: 60 phút</div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div id="animal">
        <div class="container">
            <div class="cate-name">Animals</div>
            <div class="lesson-card-container">
                <div class="lesson-card">
                    <img src="{{ asset('img/animal.jpg')}}" alt="Lesson Image">
                    <div class="lesson-title">Lesson Title</div>
                    <div class="lesson-description">Mô tả bài học của bạn ở đây...</div>
                    <div class="lesson-duration">Thời gian bài học: 60 phút</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const imageCards = document.querySelectorAll('.image-card');

    imageCards.forEach(card => {
        card.addEventListener('click', () => {
            // Lấy giá trị thuộc tính data-target của phần tử
            const target = card.getAttribute('data-target');

            // Kiểm tra xem có giá trị data-target hay không
            if (target) {
                // Lấy phần tử có ID tương ứng và kiểm tra xem nó có tồn tại không
                const targetElement = document.querySelector(target);
                if (targetElement) {
                    // Tính toán khoảng cách cần trượt
                    const offset = targetElement.getBoundingClientRect().top - document.body
                        .getBoundingClientRect().top;
                    const duration = 1000; // Thời gian trượt (milliseconds)
                    const startTime = performance.now();

                    function scroll(timestamp) {
                        const elapsed = timestamp - startTime;
                        const progress = Math.min(elapsed / duration, 1);
                        window.scrollTo(0, offset * progress);

                        if (progress < 1) {
                            requestAnimationFrame(scroll);
                        }
                    }

                    requestAnimationFrame(scroll);
                }
            }
        });
    });
});
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection