<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kids Zone - The Number 4</title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- lightgallery css cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{asset('user/css/123.css')}}">
</head>
<body>

    <!-- header section starts -->

    <header class="header">

        <a href="{{ asset('/ ')}}" class="logo"> <i class="fas fa-school"></i> Kids Zone</a>

        <nav class="navbar">
            <a href="{{ asset('/ ')}}">Home</a>
            <a href="#ages">Ages</a>
            <a href="#lessons">Lessons</a>
            <a href="#member">Membership Packages</a>
            <a href="#contact">Contact</a>
        </nav>

        <div class="icons">
            <div class="fas fa-user" id="login-btn"></div>
            <div class="fas fa-bars" id="menu-btn"></div>
        </div>

        <form action="" class="login-form">
            <h3>login now</h3>
            <input type="email" placeholder="your email" class="box">
            <input type="password" placeholder="your password" class="box">
            <p>forget your password <a href="#">click here</a> </p>
            <input type="submit" value="login now" class="btn">
        </form>

    </header>

    <!-- header section ends -->

    <!-- home section starts -->

    <section class="home" id="home">

        <div class="content">
            <h3>Kids Zone Learning <span>The Number 4</span></h3>
            <p>You will be able to sound out and recognize the number 4.</p>
            <p>Scroll down to learn.</p>
            <a href="{{ asset('lessons')}}" class="btn">More Lessons</a>
        </div>

        <div class="image">
            <img src="{{asset('img/images/home1.png')}}" alt="">
        </div>

        <div class="custom-shape-divider-bottom-1684324473">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
            </svg>
        </div>

    </section>

    <!-- home section ends -->

    <!-- lessons section starts -->

    <section class="lesson" id="lesson">

        <h1 class="heading"> <span>Counting for Kids</span></h1>

        <div class="row">

            <div class="image">
                <img src="{{asset('img/images/lesson image.png')}}" alt="">
            </div>

            <div class="content">
                <h3>The Number of the Day: 4</h3>
                <p>Click on the video below to watch the song about the number 4.</p>
                <div class="video-container">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/C0s9Y81rdBQ?si=D-I7vd1jiKHdaeVg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
            
        </div>

    </section>

    <!-- lessons section ends -->

    <!-- flashcard and worksheet section starts -->

    <section class="gallery" id="gallery">
        <h1 class="heading"><span>Flashcard</span> & <span>Worksheet</span></h1>
        
        <div class="gallery-container">
        
            <a href="{{asset('img/images/4.png')}}" class="box">
                <img src="{{asset('img/images/4.png')}}" alt="">
                <div class="icon"> <i class="fas fa-plus"></i></div>
            </a>

            <a href="{{asset('img/images/4c.png')}}" class="box">
                <img src="{{asset('img/images/4c.png')}}" alt="">
                <div class="icon"> <i class="fas fa-plus"></i></div>
            </a>

        </div>

    </section>

    <!-- flashcard and worksheet section ends -->
    
    <!-- footer section starts -->

    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3> <i class="fas fa-school"></i> Kids Zone </h3>
                <p>Website for Learning and Playing</p>
            </div>

            <div class="box">
                <h3>Category</h3>
                <a href="#"> <i class="fas fa-caret-right"></i> Alphabet</a>
                <a href="#"> <i class="fas fa-caret-right"></i> Numbers</a>
                <a href="#"> <i class="fas fa-caret-right"></i> Animals</a>
                <a href="#"> <i class="fas fa-caret-right"></i> Fruits</a>
            </div>
            
            <div class="box">
                <h3>Category</h3>
                <a href="#"> <i class="fas fa-caret-right"></i> Cars</a>
                <a href="#"> <i class="fas fa-caret-right"></i> Weathers</a>
                <a href="#"> <i class="fas fa-caret-right"></i> Countries</a>
            </div>

            <div class="box">
                <h3>Category</h3>
                <a href="#"> <i class="fas fa-caret-right"></i> Shapes</a>
                <a href="#"> <i class="fas fa-caret-right"></i> Sea</a>
                <a href="#"> <i class="fas fa-caret-right"></i> Foods</a>
            </div>

        </div>

        <div class="credit"> &copy; copyright @ 2023 by <span>Tui</span></div>

    </section>

    <!-- footer section ends -->


    <!-- lightgallery cdn js link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script>
    <!-- custom js file link -->
    <script src="{{asset('js/abc.js')}}"></script>
    <script>
        lightGallery(document.querySelector('.gallery .gallery-container'));
    </script>

</body>
</html>