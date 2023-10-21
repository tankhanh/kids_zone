@extends('layouts.app')
@section('title', 'Histtory')

@section('content')
<div class="cart-container">
    <h1>Your Cart</h1>
    <br>
    @if($cart->count() > 0)
    <div class="cart-list">
        <table class="table">
            <thead>
                <tr>
                    <th>Package</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @php
                $cart_totalPrice = 0;
                @endphp
                @foreach($cart as $cartItem)
                @foreach($cartItem->cartDetails as $item)
                <tr>
                    <td>{{ $item->pack->package_name }}</td>
                    <td>{{ number_format($item->price) }} VNĐ</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price * $item->quantity) }} VNĐ</td>
                    <td>{{ date('d/m/y - H:i:s', strtotime($cartItem->created_at))}}</td>
                    <td>
                        @if ($cartItem->status == 1)
                        <i class="fa-solid fa-xmark"></i>
                        @elseif($cartItem->status == 2)
                        <i class="fa-solid fa-check"></i>
                        @endif
                    </td>
                    @php
                    $cart_totalPrice += $item->price * $item->quantity;
                    @endphp
                </tr>
                @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Hiển thị tổng giá trị giỏ hàng ở đây -->
    @else
    <div class="cart-empty">
        <p>Your cart is empty.</p>
        <div class="btn-container">
            <a href="{{ asset('/')}}" class="btn btn-primary">Go back</a>
        </div>
    </div>
    @endif
</div>
@endsection