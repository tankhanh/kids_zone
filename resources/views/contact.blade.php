<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
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
    <a href="{{ asset('/')}}" class="goback">
        < Back</a>
            <header>
                <h1>Contact Us</h1>
            </header>
            <br>
            <div class="container">
                <div class="card">
                    <div class="card-body row">
                        <div class="col-5 text-center d-flex align-items-center justify-content-center">
                            <div class="brand-name">
                                <h2><strong>Kids Zone</strong></h2>
                                <p class="lead mb-5">35/6 D5 Street, Binh Thanh District, HCM City.<br>
                                    Hotline: 1800 1779
                                </p>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input type="text" id="inputName" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">E-Mail</label>
                                <input type="email" id="inputEmail" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label for="inputSubject">Subject</label>
                                <input type="text" id="inputSubject" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputMessage">Message</label>
                                <textarea id="inputMessage" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Send message">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="map">
                    <!-- <h2>Địa Chỉ</h2> -->
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.0624975859346!2d106.71134087500651!3d10.806525389344054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528a30e6d1381%3A0x30b3aeb2be70e5be!2zMzUgxJDGsOG7nW5nIEQ1LCBQaMaw4budbmcgMjUsIELDrG5oIFRo4bqhbmgsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1695791211172!5m2!1svi!2s"
                        width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <footer>
                <p style="font-weight: bold;">&copy; 2023 Kids Zone</p>
            </footer>
</body>

</html>