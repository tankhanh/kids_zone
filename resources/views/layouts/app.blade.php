<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('user/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('auth/css/login.css')}}">
    <link rel="stylesheet" href="{{ asset('auth/css/signup.css')}}">
    <link rel="stylesheet" href="{{ asset('user/css/upgrade.css')}}">
    <link rel="stylesheet" href="{{ asset('user/css/thanhtoan.css')}}">
    <link rel="stylesheet" href="{{ asset('user/css/cart.css')}}">
    <link rel="stylesheet" href="{{ asset('user/css/userprofile.css')}}">
    <link rel="stylesheet" href="{{ asset('user/css/history.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>@yield('title', 'Default title')</title>
</head>

<body>
    <div class="banner">
        <div class="navbar">
            <a class="brand-name" href="/">
                <img src="../../img/newlogosnip.jpg">
            </a>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="{{ asset('/lessons')}}">Lessons</a></li>
                <li><a href="{{ asset('/games')}}">Games</a></li>
                <li><a href="{{ asset('/memebershipPackages')}}">Membership Packages</a></li>
                <li class="dropdown right">
                    <a class="nav-link" href="javascript:void(0);" onclick="toggleDropdown()">
                        @auth
                        {{ Auth::user()->user->firstname }} {{ Auth::user()->user->lastname }}
                        @else
                        <i class="fas fa-bars"></i>
                        @endauth
                    </a>
                    <div id="userPanel" class="select-option">
                        <div class="nav-item">
                            @auth
                            <a href="{{ route('edit-profile') }}"><i class="fa-solid fa-user"></i> Profile</a>
                            <a href="{{ route('history') }}"><i class="fa-solid fa-clock-rotate-left"></i></i>
                                History</a>
                            <a href="{{ route('cart') }}"><i class="fa-solid fa-cart-shopping"></i> Cart</a>
                            <a href="{{ route('logout') }}"> <i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                            @else
                            <a href="{{ route('login') }}">Login</a>
                            <a href="{{ route('register') }}">Register</a>
                            @endauth
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        @if($errors->any())
        <div class="alert alert-danger" id="Alert">
            <h5><i class="icon fas fa-ban"></i> Error!</h5>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </div>
        @endif

        @if(Session::get('success'))
        <div class="alert alert-success alert-dismissible" id="Alert">
            <h5><i class="icon fas fa-check"></i> Success!</h5>
            {{ Session::get('success')}}
        </div>
        @endif


        @yield('content')
    </div>
    <footer class="footer">
        <div class="container">
            <div class="about">
                <a href="{{ asset('/about')}}">About Us</a>
                <a href="{{ asset('/terms')}}">Terms of Service</a>
            </div>
            <div class="support">
                <a href="{{ asset('/contact')}}">Contact Us</a>
                <a href="{{ asset('/FAQ')}}">FAQ</a>
            </div>
            <div class="follow">
                <a href="{{ asset('')}}">Follow Us</a>
                <div class="social">
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <script>
    function toggleDropdown() {
        var userPanel = document.getElementById("userPanel");

        if (userPanel.classList.contains("active")) {
            userPanel.classList.remove("active");
        } else {
            userPanel.classList.add("active");
        }
    }

    // Function to automatically hide the error alert after a specified time
    function closeErrorAlert() {
        var Alert = document.getElementById("Alert");
        if (Alert) {
            setTimeout(function() {
                Alert.style.display = "none";
            }, 3000); // Adjust the time in milliseconds (e.g., 5000ms = 5 seconds)
        }
    }

    // Call the function to automatically hide the error alert
    closeErrorAlert();
    </script>
</body>

</html>