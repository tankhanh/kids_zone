@extends('layouts.app')
@section('title', 'Lessons')
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
    height: 150px;
    border-radius: 15px;
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
    border-radius: 15px;
}

.lesson-title {
    font-size: 24px;
    font-weight: bold;
    margin: 10px 0;
}

.lesson-description {
    margin: 10px 0;
    overflow-wrap: break-word;
    /* Áp dụng word wrap */
    word-wrap: break-word;
    /* Hỗ trợ trình duyệt cũ hơn */
    white-space: normal;
    /* Đảm bảo văn bản tự động xuống dòng */
    text-align: center;
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

.memberships-container {
    width: 100%;
    height: 100px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.memberships-item {
    width: 200px;
    height: 50px;
    background-color: #ff6147;
    border-radius: 5px;
    margin: 10px;
    cursor: pointer;
}

.memberships-item:hover {
    background-color: #ddd;
    color: #ffffff;
}

.reset-container {
    width: 100%;
    height: 100px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.reset-item {
    width: 200px;
    height: 50px;
    background-color: #ff6147;
    border-radius: 5px;
    margin: 10px;
    cursor: pointer;
}

.reset-item:hover {
    background-color: #ddd;
    color: #ffffff;
}

/* CSS cho nút "lên đầu trang" */
#backToTopButton {
    width: 50px;
    height: 50px;
    background-color: #ff6147;
    color: #fff;
    border-radius: 50%;
    position: fixed;
    bottom: 30px;
    right: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 24px;
    cursor: pointer;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s, visibility 0.3s;
}

#backToTopButton.show {
    opacity: 1;
    visibility: visible;
}

.arrow {
    position: absolute;
    top: 67%;
    /* Đặt mũi tên ở giữa theo chiều dọc */
    left: 38%;
    /* Đặt mũi tên ở giữa theo chiều ngang */
    transform: translate(-50%, -50%);
    /* Dịch chuyển mũi tên chính giữa tâm hình tròn */
}

.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
    position: relative;
    background-color: #EBFAFF;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    border-radius: 10px;
    width: 60%;
    text-align: center;
    border-radius: 20px;
}

.close {
    position: absolute;
    top: 0;
    right: 0;
    padding: 0 20px;
    cursor: pointer;
    font-size: 40px;
    /* Đặt biểu tượng "X" cho nút đóng */
}


/* CSS cho nút "Upgrade Now" */
#redirectButton {
    background-color: #ff6147;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
}

#redirectButton:hover {
    background-color: #d12d17;
}
</style>
<div id="myModal" class="modal">
    <div class="modal-content">
        <div class="close" id="closeModal">&times;</div>
        <p>You need to upgrade to have access to this lesson.</p>
        <button id="redirectButton">Upgrade Now</button>
    </div>
</div>
<div id="categoriesContainer" class="container">
    <h1>Category</h1>

    <div class="image-gallery">
        @foreach($categories as $category)
        <div class="image-card" data-target="{{'#' . $category->category_name}}">
            <a href="#"><img src="{{ asset('uploads/background/'.$category->category_Background)}}" alt="Image"
                    class="zoom-image"></a>
            <label for="">{{ $category->category_name }}</label>
        </div>
        @endforeach
    </div>

    <div class="container">
        <h1>Find age-appropriate lessons</h1>

        <div class="ages-container">
            <button class="ages-item" data-age="1">1 years old</button>
            <button class="ages-item" data-age="2">2 years old</button>
            <button class="ages-item" data-age="3">3 years old</button>
        </div>
        <div class="memberships-container">
            @foreach($memberships as $membership)
            <button class="memberships-item"
                data-membership="{{ $membership->id }}">{{ $membership->package_name }}</button>
            @endforeach
        </div>
        <div class="reset-container">
            <button id="resetFilterButton" class="memberships-item">Reset</button>
        </div>
    </div>

    @foreach($categories as $category)
    <div id="{{$category->category_name}}">
        <div class="container">
            <div class="cate-name">{{$category->category_name}}</div>
            <div class="lesson-card-container">
                @foreach($lessons as $lesson)
                @if($lesson->category_id == $category->id)
                <div class="lesson-card" data-age="{{$lesson->age}}" data-membership="{{ $lesson->package_id}}">
                    <a href="{{ route('lesson-detail', ['lessonId' => $lesson->id]) }}">
                        <img src="{{ asset('uploads/background/'. $lesson->mainImage) }}" alt="Lesson Image">
                    </a>
                    <div class="lesson-title">
                        @if($lesson->package_id != 1)
                        <i class="fa-solid fa-crown" style="color: #d1dd2c;"></i>
                        @endif
                        {{$lesson->title}}
                    </div>
                    <div class="lesson-description">{{$lesson->description}}</div>
                    <div class="lesson-duration">Time duration: No limit</div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
    @endforeach
    <div id="backToTopButton">
        <span class="arrow">&uarr;</span>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById("myModal");
    const closeModal = document.getElementById("closeModal");
    const redirectButton = document.getElementById("redirectButton");
    const lessonCards = document.querySelectorAll('.lesson-card');

    lessonCards.forEach(lessonCard => {
        lessonCard.addEventListener('click', function(event) {
            const accountPackageId = '{{ $account->package_id }}';
            const lessonPackageId = this.getAttribute('data-membership');

            // Thêm điều kiện kiểm tra cả package_id = 1
            if (accountPackageId !== lessonPackageId && lessonPackageId !== "1") {
                // Mở cửa sổ modal
                modal.style.display = "block";

                // Đặt sự kiện cho nút đóng modal
                closeModal.addEventListener("click", function() {
                    modal.style.display = "none";
                });

                // Đặt sự kiện cho nút "Upgrade Now"
                redirectButton.addEventListener("click", function() {
                    // Điều hướng đến trang cần chuyển đến
                    window.location.href = "/memebershipPackages";
                });

                // Ngăn chặn người dùng chuyển đến trang bài học
                event.preventDefault();
            }
        });
    });
});
</script>


<script>
document.addEventListener('DOMContentLoaded', function() {
    const resetFilterButton = document.getElementById("resetFilterButton");
    const ageButtons = document.querySelectorAll('.ages-item');
    const membershipButtons = document.querySelectorAll('.memberships-item');
    const lessonCards = document.querySelectorAll('.lesson-card');

    function filterLessons(age, membership) {
        lessonCards.forEach(lessonCard => {
            const lessonAge = lessonCard.getAttribute('data-age');
            const lessonMembership = lessonCard.getAttribute('data-membership');

            if ((age === lessonAge || age === "all") && (membership === lessonMembership ||
                    membership === "all")) {
                lessonCard.style.display = 'block';
            } else {
                lessonCard.style.display = 'none';
            }
        });
    }

    function getSelectedAge() {
        for (const ageButton of ageButtons) {
            if (ageButton.classList.contains('selected')) {
                return ageButton.getAttribute('data-age');
            }
        }
        return "all";
    }

    function getSelectedMemberships() {
        for (const membershipButton of membershipButtons) {
            if (membershipButton.classList.contains('selected')) {
                return membershipButton.getAttribute('data-membership');
            }
        }
        return "all";
    }

    ageButtons.forEach(ageButton => {
        ageButton.addEventListener('click', function() {
            const selectedAge = this.getAttribute('data-age');
            filterLessons(selectedAge, getSelectedMemberships());
        });
    });

    membershipButtons.forEach(membershipButton => {
        membershipButton.addEventListener('click', function() {
            const selectedMembership = this.getAttribute('data-membership');
            filterLessons(getSelectedAge(), selectedMembership);
        });
    });
    // Sự kiện khi nút "Reset" được nhấn
    resetFilterButton.addEventListener('click', function() {
        // Bỏ chọn tất cả các nút "age" và "membership"
        ageButtons.forEach(ageButton => {
            ageButton.classList.remove('selected');
        });

        membershipButtons.forEach(membershipButton => {
            membershipButton.classList.remove('selected');
        });

        // Hiển thị lại tất cả bài học
        lessonCards.forEach(lessonCard => {
            lessonCard.style.display = 'block';
        });
    });
});
</script>
<script>
const backToTopButton = document.getElementById("backToTopButton");

function checkScroll() {
    if (window.pageYOffset > 100) {
        backToTopButton.classList.add("show");
    } else {
        backToTopButton.classList.remove("show");
    }
}

function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
}

window.addEventListener("scroll", checkScroll);
backToTopButton.addEventListener("click", scrollToTop);
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const categoryCards = document.querySelectorAll('.image-card');
    const lessonCardContainers = document.querySelectorAll('.lesson-card-container');

    categoryCards.forEach(categoryCard => {
        categoryCard.addEventListener('click', function(event) {
            const targetId = this.getAttribute('data-target');
            const targetCategory = document.querySelector(targetId);

            if (targetCategory) {
                const topOffset = targetCategory.offsetTop -
                    50; // Điều chỉnh số 100 tuỳ theo kích thước của thanh menu hoặc nội dung mà bạn muốn

                window.scrollTo({
                    top: topOffset,
                    behavior: 'smooth',
                });

                event.preventDefault();
            }
        });
    });
});
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection