@extends('layouts.app')
@section('title', 'Games')
@section('content')
<style>
.banner {
    width: 100%;
    height: auto;
    background-image: none;
    background-color: #EBFAFF;
    background-size: cover;
    background-position: center;
}

.navbar ul li a {
    color: black
}

.select-age {
    background-color: #eee;
}




.container h1 {
    display: block;
    font-size: 34px;
    text-decoration: none;
    color: #fff;
    font-weight: bold;
    margin: 50px;
    background-color: #ff6147;
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
    color: black;
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
    color: #fff;
    font-weight: bold;
    margin: 50px;
    background-color: #ff6147;
    max-width: 100%;
    border-radius: 10px;
    text-align: center;
}





.lesson-card {
    /* gap: 10px;
    justify-content: flex-start;
    border: 1px solid #ccc;
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    background-color: #f9f9f9;
    border-radius: 10px;
    transition: filter 0.3s ease-in-out; */
    /* Hiệu ứng khi hover */
    position: relative;
    width: 300px;
    /* Điều chỉnh kích thước chiều rộng của lesson-card */
    height: 500px;
    /* Điều chỉnh kích thước chiều cao của lesson-card */
    margin: 10px;
    /* Khoảng cách giữa các lesson-card */
    border: 1px solid #ccc;
    background-color: #f9f9f9;
    border-radius: 10px;
    transition: filter 0.3s ease-in-out;
    background-color: white;
    overflow: hidden;
    /* Ẩn phần nội dung vượt ra khỏi lesson-card */
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-end;
    /* Để đảm bảo nội dung nằm ở phía dưới */
    padding: 50px;
    /* Thêm padding cho phần nội dung */
    flex: 0 0 calc(25% - 20px);
    /* 25% là để hiển thị 4 cột, 20px là khoảng cách giữa các lesson-card */
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

.lesson-card-container {
    display: flex;
    flex-wrap: nowrap;
    /* Loại bỏ việc wrap các lesson-card khi không đủ không gian ngang */
    overflow-x: auto;
    /* Thêm thanh trượt ngang khi nội dung vượt quá khung nhìn */
    white-space: nowrap;
    /* Ngăn các nội dung bên trong lesson-card wrap */
}

.ages-container {
    width: 100%;
    height: 100px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.ages-item {
    width: 200px;
    height: 50px;
    background-color: #ff6147;
    border-radius: 5px;
    margin: 10px;
    cursor: pointer;
}

.ages-item:hover {
    background-color: #ddd;
    color: #ffffff;
}
</style>

<div class="container">
    <h1>Games</h1>
    <div class="image-gallery">
        <div class="image-card">
            <a href="{{ asset('games/snake')}}"><img src="{{ asset('uploads/games/snake/snake.jpg')}}" alt="Image"
                    class="zoom-image"></a>
            <label for="">Snake Master</label>
        </div>
        <div class="image-card">
            <a href="{{ asset('games/Menja-Game-master')}}"><img
                    src="{{ asset('uploads/games/Menja-Game-master/Menja-Game-master.png')}}" alt="Image"
                    class="zoom-image"></a>
            <label for="">Menja Game Master</label>
        </div>
        <div class="image-card">
            <a href="{{ asset('games/piano')}}"><img src="{{ asset('uploads/games/piano/piano.jpg')}}" alt="Image"
                    class="zoom-image"></a>
            <label for="">Playable PIANO</label>
        </div>
        <div class="image-card">
            <a href="{{ asset('games/flappy-bird')}}"><img src="{{ asset('uploads/games/flappy-bird/flappy-bird.png')}}"
                    alt="Image" class="zoom-image"></a>
            <label for="">Flappy Bird</label>
        </div>
        <div class="image-card">
            <a href="{{ asset('games/draw-app')}}"><img src="{{ asset('uploads/games/draw-app/draw-app.jpg')}}"
                    alt="Image" class="zoom-image"></a>
            <label for="">Draw App</label>
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
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ageButtons = document.querySelectorAll('.ages-item');

    // Khi người dùng chọn độ tuổi
    ageButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Lấy giá trị độ tuổi từ data-age của nút
            const selectedAge = this.getAttribute('data-age');
            const lessonContainers = document.querySelectorAll('.lesson-card[data-age*="' +
                selectedAge + '"]');

            // Ẩn tất cả các containers bài học
            document.querySelectorAll('.lesson-card').forEach(container => {
                container.style.display = 'none';
            });

            // Hiển thị các container tương ứng với độ tuổi đã chọn
            lessonContainers.forEach(container => {
                container.style.display = 'block';
            });
        });
    });
});
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection