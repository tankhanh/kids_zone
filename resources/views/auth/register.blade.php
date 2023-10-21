@extends('layouts.app')
@section('title', 'Sign Up')
<!-- <style>
.navbar ul {
    visibility: hidden;
}
</style> -->
@section('content')
<div class="signup">
    <div class="signup-container">
        <img src="../../img/study.jpg" alt="Child-friendly image" style="max-width: auto; height: auto" />
        <br>
        <h1>Join <a href="/">KIDS ZONE</a> for free!</h1>
        <form action="{{route('register')}}" method="post">
            @csrf
            <div class="form-group">
                <input name="firstname" type="text" class="form-control" id="firstname" required />
                <label for="firstname">First Name *</label>
            </div>
            <br>
            <div class="form-group">
                <input name="lastname" type="text" class="form-control" id="lastname" required />
                <label for="lastname">Last Name *</label>
            </div>
            <br>
            <div class="form-group">
                <input name="email" type="text" class="form-control" id="email" required />
                <label for="email">Email *</label>
            </div>
            <br>
            <div class="form-group">
                <input name="password" type="password" class="form-control" id="password" required />
                <label for="password">Password *</label>
            </div>
            <br>
            <div class="form-group">
                <input name="password" type="password" class="form-control" id="passwordRepeat" required />
                <label for="password">Re-type Password *</label>
            </div>
            <br>
            <button type="submit" id="sendsignup" class="btn-signup">
                Sign In
            </button>
        </form>
        <p class="forgot-password">Already have an account? <a href="{{asset('auth/login')}}">Sign in</a></p>
    </div>
</div>
@endsection
<script>
document.addEventListener("DOMContentLoaded", function() {
    const signupContainer = document.querySelector(".signup-container");
    signupContainer.classList.add("animated");
});
</script>