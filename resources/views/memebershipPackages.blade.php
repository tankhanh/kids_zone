@extends('layouts.app')
@section('title', 'Upgrade')

@section('content')
<div class="container">
    <h1>Open and get more unique lessons!</h1>
    <br>
    <div class="package_tables">
        @foreach($mem_pack as $pack_user)
        <div class="pack">
            <h1>For {{ $pack_user->package_name }}</h1>
            <br>
            <p>{{ $pack_user->benefit }}</p>
            <br>
            <strong> {{ number_format($pack_user->price) }} VNĐ</strong>
            <br>
            <div class="action">
                @if($pack_user->id == $account->package_id)
                <p>You are using this package</p>
                @elseif($pack_user->id == 1)
                <p>Default this package</p>
                @else
                <a class="addtocart"
                    href="{{ route('addToCart',['id' => $pack_user->id, 'quantity' => 1]) }}">Upgrade</a>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection