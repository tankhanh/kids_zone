<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms of Service</title>
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
        font-family: "CARTOON FREE", sans-serif;
        font-weight: bold;
    }

    .brand-name h2 {
        font-family: Arial, Helvetica, sans-serif;
        text-transform: uppercase;
    }

    h3 {
        text-align: left;
        text-transform: uppercase;
    }

    .terms {
        text-align: justify;
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
                <h1>Kids Zone</h1>
            </header>
            <br>
            <div class="container">
                <div class="card">
                    <div class="card-body row">
                        <div class="text-center d-flex align-items-center justify-content-center">
                            <div class="brand-name">
                                <h2><strong>Terms of Service</strong></h2>
                                <p>Last Updated: October 20th 2023</p>
                                <div class="terms">
                                    <p>
                                    <h3>**Introduction**</h3>
                                    Welcome to our educational website. This website is designed to provide educational
                                    content for children in grades 1 to 3. By using our website, you agree to comply
                                    with and be bound by the following terms and conditions.
                                    </p>
                                    <p>
                                    <h3>**Privacy**</h3>
                                    Your privacy is important to us. Please review our Privacy Policy, which explains
                                    how we handle personal information.
                                    </p>
                                    <p>
                                    <h3>**Intellectual Property**</h3>
                                    All content on this website, including text, graphics, logos, images, and software,
                                    is the property of our website or its content suppliers and is protected by
                                    international copyright laws.
                                    </p>
                                    <p>
                                    <h3>**User Conduct**</h3>
                                    Users are expected to use the website in a respectful manner. Any use of
                                    inappropriate language or behavior will result in termination of access to the
                                    website.
                                    </p>
                                    <p>
                                    <h3>**Disclaimer of Warranties and limitation of liability**</h3>
                                    The services including the content are provided by Kidszone on an "as is" and "as
                                    available" basis, unless otherwise specified in writing. We make no representations
                                    or warranties of any kind, express or implied, as to the operation of the services
                                    or the content. You expressly agree that your use of the services and content is at
                                    your sole risk.

                                    To the fullest extent permitted by applicable law, we disclaim all warranties,
                                    express or implied, including, but not limited to, the implied warranties of
                                    merchantability and fitness for a particular purpose. We do not warrant that the
                                    services or the content is free of viruses or other harmful components.

                                    In no event shall Kidszone or any of our directors, officers, or employees, be
                                    liable for any incidental, indirect, punitive, exemplary, special, or consequential
                                    damages whatsoever (including, without limitation, damages for loss of profits,
                                    business interruption, loss of business information, or any other pecuniary loss)
                                    arising from the use of the services or content. To the fullest extent permitted by
                                    applicable law, in no event will Kidszone's total liability to you in connection
                                    with your access to and use of the services and your rights under these terms exceed
                                    the amount paid by you to Kidszone during the previous 12 months for all possible
                                    damages, losses, and causes of action.

                                    While we strive to provide accurate and up-to-date educational content, we make no
                                    warranties or representations as to the accuracy or reliability of any information
                                    on the website.
                                    </p>
                                    <p>
                                    <h3>**Changes to Terms**</h3>
                                    We reserve the right to change these Terms of Service at any time without notice.
                                    Your continued use of the website constitutes your acceptance of any changes.
                                    </p>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-7">
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
                        </div> --}}
                    </div>
                </div>
            </div>
            <footer>
                <p style="font-weight: bold;">&copy; 2023 Kids Zone</p>
            </footer>
</body>

</html>
