<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('user/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('auth/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('auth/css/signup.css') }}">

    <title>@yield('title', 'Welcome')</title>
    <style>
        .imageinfo{
        display: flex;
        justify-content: center;
        padding: 0 2px;
    }
    .imageabout1 {
        /* Được sử dụng nếu hình ảnh không khả dụng */
        height: 400px;
        width: 400px;
        /* Bạn phải đặt một chiều cao xác định */
        background-position: center;
        /* Đặt hình ảnh ở giữa */
        background-repeat: no-repeat;
        /* Không lặp lại hình ảnh */
        background-size: auto;
        /* Hình ảnh nền sẽ che phủ toàn bộ container */
        margin: 3px; float: left; padding: 5px;
    }
    </style>
</head>

<body>
    <div class="banner">
        <div class="navbar">
            <a class="brand-name" href="/">
                <img src="../../img/newlogosnip.jpg">
            </a>
            <ul>
                <li><a href="/">Home</a></li>
                <li class="dropdown">
                    <a href="#">AGES</a>
                    <div class="select-age">
                        <a href="#">AGES 1-2</a>
                        <a href="#">AGES 2-3</a>
                        <a href="#">AGES 3+</a>
                    </div>
                </li>
                <li><a href="{{ asset('/lessons') }}">Lessons</a></li>
                <li><a href="#">Membership Packages</a></li>
                <li class="dropdown">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars"></i>
                    </a>
                    <div class="select-age">
                        <a style="color:white" href="{{ route('logout') }}">Logout</a>
                        <a style="color:white" href="{{ asset('editprofile') }}">Edit Profile</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="content">
        <h1>At Kids Zone, children have fun while they learn!</h1>
        <br><br>
        {{-- <div class="imageinfo">
            <a href="{{ asset('') }}">
                <img src="{{ asset('../../img/grade1.jpg') }}" 
                class="imageabout1">
            </a>
            <a href="{{ asset('') }}">
                <img src="{{ asset('../../img/grade2.jpg') }}" 
                class="imageabout1">
            </a>
            <a href="{{ asset('') }}">
                <img src="{{ asset('../../img/grade3.jpg') }}" 
                class="imageabout1">
            </a>
        </div> --}}
    </div>
    <footer class="footer">
        <div class="container">
            <div class="about">
                <a href="{{ asset('/about') }}">About Us</a>
                <a href="{{ asset('/terms') }}">Terms of Service</a>
            </div>
            <div class="support">
                <a href="{{ asset('/contact') }}">Contact Us</a>
                <a href="{{ asset('/FAQ') }}">FAQ</a>
            </div>
            <div class="follow">
                <a href="{{ asset('') }}">Accessibility</a>
                <div class="social">
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                </div>
            </div>
        </div>
        </div>
    </footer>
</body>
</html>
