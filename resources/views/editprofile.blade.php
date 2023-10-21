@extends('layouts.app')
@section('title', 'Profile')
@section('content')
<h1>Your profile</h1>
<br>
<div class="container-profile">
    <div class="box-profile">
        <div class="text-center"> <img class="profile-user-img img-fluid img-circle"
                src="{{ asset('uploads/avatar/' .Auth::user()->user->profile_pic)}}" alt="Admin profile picture"> </div>
        <h3 class="profile-username text-center">{{ Auth::user()->user->firstname}}
            {{ Auth::user()->user->lastname}}</h3>

        <p class="text-muted text-center"> Member </p>

        <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
                <b>Email: </b> <a class="float-right">{{ old('email', Auth::user()->email) }}</a>
            </li>
            <br>
            <li class="list-group-item ">
                <b>Birthday: </b> <a
                    class="float-right">{{old('birthday ', date('d-m-Y',strtotime(Auth::user() -> user -> birthday)))}}</a>
            </li>
            <br>
            <li class="list-group-item">
                <b>Join date: </b><a
                    class="float-right">{{ date('d-m-Y ', strtotime(Auth::user()->user->created_at))}}</a>
            </li>
        </ul>
    </div>
    <div class="infomation">
        <form method="POST" action=" {{ route('update') }}" enctype="multipart/form-data">
            @csrf
            <div class="info-container">
                <div class="info-left">
                    <div class="form-group-profile">
                        <label>First Name</label>
                        <input type="text" class="form-control" placeholder="Enter first name" name="firstname"
                            value="{{old('firstname', Auth:: user()->user->firstname) }}">
                    </div>
                    <div class="form-group-profile">
                        <label>Last Name</label>
                        <input type="text" class="form-control" placeholder="Enter last name" name="lastname"
                            value="{{old('lastname', Auth:: user()->user->lastname) }}">
                    </div>
                    <div class="form-group-profile">
                        <label>Email</label>
                        <input type="text" class="form-control" placeholder="Enter email" name="email"
                            {{ $myself ? 'disabled': '' }} value="{{ old('email', Auth::user()->email) }}">
                    </div>
                    <div class="form-group-profile">
                        <label>New password</label>
                        <input type="password" class="form-control" placeholder="Enter password" name="password">
                    </div>
                    <div class="form-group-profile">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" placeholder="Enter password"
                            name="password_confirmation">
                    </div>
                    <div class="form-group-profile">
                        <label>Gender</label>
                        <select class="form-control" name="gender">
                            <option value="1" {{ old('gender', Auth::user()->user->gender) == 1 ? 'selected' : ''}}>
                                Male</option>
                            <option value="2" {{ old('gender', Auth::user()->user->gender) == 2 ? 'selected' : ''}}>
                                Female
                            </option>
                        </select>
                    </div>
                    <div class="form-group-profile">
                        <label>Birthday</label>
                        <input type="date" class="form-control" name="birthday"
                            value="{{ old('birthday', Auth::user()->user->birthday) }}">
                    </div>
                </div>
                <div class="info-right">
                    <div class="form-group-profile">
                        <label>Avatar Preview</label>
                        <div class="avatar-preview" style="text-align:center">
                            <img id="profilePicPreview" class="img-fluid img-circle"
                                src="{{ asset('uploads/avatar/' . Auth::user()->user->profile_pic) }}"
                                alt="User profile picture">
                        </div>
                    </div>
                    <div class="form-group-profile">
                        <label for="profilePicInput">Change Avatar</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="profilePicInput" name="profile_pic">
                            <label class="custom-file-label" for="profilePicInput">Choose file</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const profilePicInput = document.getElementById('profilePicInput');
    const profilePicPreview = document.getElementById('profilePicPreview');
    const customFileLabel = document.querySelector('.custom-file-label');
    profilePicInput.addEventListener('change', function() {
        if (profilePicInput.files && profilePicInput.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                profilePicPreview.src = e.target.result;
                customFileLabel.innerText = profilePicInput.files[0].name;
            };
            reader.readAsDataURL(profilePicInput.files[0]);
        }
    });
});
</script>
@endsection