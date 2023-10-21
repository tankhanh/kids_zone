<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frequently Asked Questions</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.cdnfonts.com/css/cartoon-free" rel="stylesheet" />
</head>

<style>
    body {
        background-color: #EBFAFF;
    }

    h1 {
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
    }

    .brand-name h2 {
        font-family: "CARTOON FREE", sans-serif;
    }

    .goback {
        position: absolute;
        top: 10px;
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

    footer {
        text-align: center;
    }
</style>

<body>
    <a href="{{ asset('/') }}" class="goback">
        < Back</a>
            <header>
                <h1>Frequently Asked Questions</h1>
            </header>
            <br>
            <div class="container">
                <div class="col-12" id="accordion">
                    <div class="card card-primary card-outline">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                            <div class="card-header">
                                <h4 class="card-title w-100">
                                    1. What is Kidszone?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseOne" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                Kidszone is a vibrant and engaging learning platform designed specifically for toddlers.
                                Our mission is to make learning fun and accessible for children aged 1-3 years.
                                We offer a variety of interactive lessons that are tailored to stimulate the curiosity
                                of
                                toddlers while teaching them essential skills.
                                Our lessons cover a wide range of topics, from numbers and letters to shapes and colors,
                                all
                                presented in an engaging and kid-friendly manner.
                                To learn more, please visit us <a href="{{ asset('/') }}">here</a> or check out the
                                <a href="{{ asset('/about') }}">About Us</a> page.
                            </div>
                        </div>
                    </div>
                    <div class="card card-primary card-outline">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                            <div class="card-header">
                                <h4 class="card-title w-100">
                                    2. What are your terms of service?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseTwo" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                The full text of our Terms of Service is available <a
                                    href="{{ asset('/terms') }}">here</a>.
                            </div>
                        </div>
                    </div>
                    <div class="card card-primary card-outline">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseThree">
                            <div class="card-header">
                                <h4 class="card-title w-100">
                                    3. What is your privacy policy?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseThree" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                Kidszone does not collect personal information from children or track children's
                                progress. Our websites and apps directed toward children operate in accordance with
                                COPPA and FERPA. Kidszone does not display any advertising to children.
                            </div>
                        </div>
                    </div>
                    <div class="card card-warning card-outline">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseFour">
                            <div class="card-header">
                                <h4 class="card-title w-100">
                                    4. How many lessons do you guys offer?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseFour" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                Here we offer 3 particular type of lessons:
                                1. **Infant Explorer (1 Year Old)**: This package is designed to stimulate your child's
                                senses
                                and curiosity. It includes interactive lessons that introduce basic concepts such as
                                colors, shapes, and sounds.
                                2. **Toddler Discoverer (2 Years Old)**: Building on the foundation laid in the Infant
                                Explorer package,
                                the Toddler Discoverer package introduces more complex concepts such as numbers,
                                letters, and simple words.
                            </div>
                        </div>
                    </div>
                    <div class="card card-warning card-outline">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseFive">
                            <div class="card-header">
                                <h4 class="card-title w-100">
                                    5. How do I sign out of Starfall?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseFive" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                To sign out of Starfall, click <a href="{{ asset('/logout') }}">here</a>
                            </div>
                        </div>
                    </div>
                    <div class="card card-warning card-outline">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseSix">
                            <div class="card-header">
                                <h4 class="card-title w-100">
                                    6. How do I sign in to my account on a computer?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseSix" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                To sign in to your Kidszone account, click <a href="{{ asset('/auth.login') }}">here</a>
                                Haven't have an account yet? Sign up <a href="{{ asset('/auth.register') }}">here</a>
                            </div>
                        </div>
                    </div>
                    <div class="card card-danger card-outline">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseSeven">
                            <div class="card-header">
                                <h4 class="card-title w-100">
                                    7. How do I cancel my monthly subscription?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseSeven" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                You can cancel your monthly subscription through Settings on your device or through the
                                store from which you purchased your subscription. You must cancel your subscription at
                                least 24 hours before the end of the current period to avoid an additional monthly
                                charge. See below for device-specific instructions.
                            </div>
                        </div>
                    </div>
                    <div class="card card-danger card-outline">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseEight">
                            <div class="card-header">
                                <h4 class="card-title w-100">
                                    8. Can I use my membership on more than one computer?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseEight" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                Yes, you may use your membership on more than one computer.
                            </div>
                        </div>
                    </div>
                    <div class="card card-danger card-outline">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseNine">
                            <div class="card-header">
                                <h4 class="card-title w-100">
                                    9. Device and browser support for desktop?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseNine" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                For optimal performance, we recommend keeping your devices and browsers up to date. You
                                may experience performance issues using older browsers and operating systems. Starfall
                                recommends the latest version of the following desktop device and browser
                                configurations.

                                Windows 10 and above: Chrome, Edge, and Firefox
                                Mac OS 10 and above: Chrome, Edge, Firefox, and Safari
                                Chromebook: Chrome
                                Linux: Firefox
                            </div>
                        </div>
                    </div>
                    <div class="card card-danger card-outline">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseNine">
                            <div class="card-header">
                                <h4 class="card-title w-100">
                                    10. Contact Us
                                </h4>
                            </div>
                        </a>
                        <div id="collapseNine" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                Need help with Kidszone? Please <a href="{{ asset('/contact') }}">contact us</a>.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer>
                <p style="font-weight: bold;">&copy; 2023 Kids Zone</p>
            </footer>
</body>
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

</html>
