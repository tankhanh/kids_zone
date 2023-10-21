@extends('layouts.app')
@section('title', 'Home')
@section('content')
<div class="content">
    <h1>Welcome to Kids Zone!</h1>
    <p>
        A website for children that will help them gain knowledge and have fun at the same time.
    </p>
    <div>
        @if(auth()->check())
        <!-- Kiểm tra xem đã đăng nhập hay chưa -->
        <a href="{{asset('lessons')}}"><button type="button"><span></span>Let's start!</button></a>
        @else
        <a href="{{asset('auth/login')}}"><button type="button"><span></span>Let's start!</button></a>
        @endif
    </div>
</div>
@endsection