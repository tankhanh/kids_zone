<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.cdnfonts.com/css/cartoon-free" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>

<style>
    body {
        background-color: #EBFAFF;
        padding: 10px;
        margin: 0 0 10;
        font-size: larger;
    }

    .imageinfo {
        display: flex;
        justify-content: center;
        padding: 0 15px;
    }

    .imageabout1 {
        /* Được sử dụng nếu hình ảnh không khả dụng */
        height: 300px;
        width: 300px;
        /* Bạn phải đặt một chiều cao xác định */
        background-position: center;
        /* Đặt hình ảnh ở giữa */
        background-repeat: no-repeat;
        /* Không lặp lại hình ảnh */
        background-size: auto;
        /* Hình ảnh nền sẽ che phủ toàn bộ container */
        margin: 20px;
    }

    h1 {
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
    }

    .info-container {
        text-align: justify;
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
        position: relative;
    }
</style>

<body>
    <a href="{{ asset('/') }}" class="goback">
        < Back</a>
            <br>
            <section class="content">
                <div class="info-container">
                    <h1>Welcome to Kids Zone!</h1>
                    <p>
                        A vibrant and engaging learning platform designed specifically for toddlers.
                        Our mission is to make learning fun and accessible for children aged 1-3 years.
                        We offer a variety of interactive lessons that are tailored to stimulate the curiosity of
                        toddlers while teaching them essential skills.
                        Our lessons cover a wide range of topics, from numbers and letters to shapes and colors, all
                        presented in an engaging and kid-friendly manner.
                        The website is designed with bright colors and simple navigation to make it easy for both
                        parents and children to use.
                        We believe that every child deserves the best start in life, and we're here to support that
                        journey through quality education.
                    </p>
                    <div class="imageinfo">
                        <img src="{{ asset('../../img/kid-s-zoneconcept-poster-with-cloud-paper-balloons-kid-s-illustration_203228-182.jpg') }}"
                            alt="Kids Zone image" class="imageabout1" />
                        <img src="{{ asset('../../img/kids-zone-children-entertaiment-cartoons_18591-51530.jpg') }}"
                            alt="Kids Zone image" class="imageabout1" />
                    </div>
                    <br>
                    <h1>What We Offer</h1>
                    <p>
                        1. **Infant Explorer (1 Year Old)**: This package is designed to stimulate your child's senses
                        and curiosity.
                        It includes interactive lessons that introduce basic concepts such as colors, shapes, and
                        sounds.
                        The activities are designed to be fun and engaging,
                        encouraging your child to explore and learn at their own pace.
                    </p>
                    <p>
                        2. **Toddler Discoverer (2 Years Old)**: Building on the foundation laid in the Infant Explorer
                        package,
                        the Toddler Discoverer package introduces more complex concepts such as numbers, letters, and
                        simple words.
                        The lessons are interactive and include a variety of games and activities that make learning fun
                        and exciting.
                    </p>
                    <p>
                        3. **Preschool Adventurer (3 Years Old)**: This package is designed to prepare your child for
                        preschool.
                        It includes lessons on reading readiness, basic math concepts, and social skills.
                        The activities are more challenging, but still fun and engaging,
                        promoting a love of learning that will last a lifetime.
                    </p>
                    <p>
                        Each package is carefully crafted to suit the developmental stage of your child,
                        ensuring they get the most out of their learning experience.
                    </p>
                </div>
                <div class="imageinfo">
                    <img src="{{ asset('../../img/kids-zone-fun-play-banner-design_1017-33753.jpg') }}"
                        alt="Kids Zone image" class="imageabout1" />
                    <img src="{{ asset('../../img/flat-world-children-s-day-background_23-2149725957.jpg') }}"
                        alt="Kids Zone image" class="imageabout1" />
                </div>
            </section>
            <footer>
                <p>Kids Zone is committed to reducing our impact on the environment.
                    For the services we provided, we seek trusted and credible manufacturers first to minimize impact on
                    global warming.
                    Our goal is to create the best possible product for you and the earth.</p>
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
