<body>
    <div class="banner">
        <div class="navbar">
            <a class="brand-name" href="/">Kids Zone</a>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="{{ asset('/lessons')}}">Lessons</a></li>
                <li><a href="#">Membership Packages</a></li>
                <li><a href="{{ asset('/contact')}}">Contact</a></li>
            </ul>
            <div class="login-signup">
                <a href="{{ asset('/auth/login_new')}}">Login</a>
                <a href="{{ asset('/auth/signup')}}">Sign Up</a>
            </div>
        </div>

    </div>

</body>