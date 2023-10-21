@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div class="login">
    <div class="login-container">
        <img src="../../img/vecteezy_cartoon-boy-and-girl-reading-books-on-the-grass_.jpg" alt="Child-friendly image"
            style="max-width: auto; height: auto" />
        <br>
        <h1>Welcome to <a href="#">KIDS ZONE!</a></h1>
        <form action="" method="post">
            @csrf
            <div class="form-group">
                <input name="email" type="text" class="form-control" id="email" required />
                <label for="email">Email</label>
            </div>
            <br><br>
            <div class="form-group">
                <input name="password" type="password" class="form-control" id="password" required />
                <label for="password">Password</label>
            </div>
            <br>
            <button type="submit" id="sendlogin" class="btn-login">
                Login
            </button>
        </form>
        <p class="forgot-password">Don't have an account? <a href="{{asset('auth/register')}}">Sign up</a></p>
    </div>
</div>
@endsection
<script>
document.addEventListener("DOMContentLoaded", function() {
    const loginContainer = document.querySelector(".login-container");
    loginContainer.classList.add("animated");
});
</script>