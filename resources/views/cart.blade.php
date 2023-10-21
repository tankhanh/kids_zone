@extends('layouts.app')
@section('title', 'Cart')

@section('content')
<div class="container">
    <h1>Your Cart</h1>
    <br>
    <div class="history-container">
        @if($cart && count($cart->cartDetails) > 0)
        <div class="history-list">
            <table class="table">
                <thead>
                    <tr>
                        <th>Package</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $cart_totalPrice = 0;
                    @endphp
                    @foreach($cart->cartDetails as $item)
                    <tr>
                        <td>{{ $item->pack->package_name }}</td>
                        <td>{{ number_format($item->price) }} VNĐ</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->price * $item->quantity) }} VNĐ</td>
                        <td>
                            <a href="{{ route('removeCart', ['id' => $item->id]) }}" class="btn btn-danger">Remove</a>
                        </td>
                        @php
                        $cart_totalPrice = $item->price * $item->quantity;
                        @endphp
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <form action="{{ route('momo_payment') }}" method="post">
            @csrf
            <div class="history-history_total">
                <h2>Cart Total</h2>
                <p><strong>Total: {{ number_format($cart_totalPrice) }} VNĐ</strong></p>
            </div>
            <input type="hidden" name="amount" id="amount_input" value="{{ $cart_totalPrice }}">
            <div class="btn-container">
                <button type="submit" class="btn btn-primary" name="payUrl">
                    <img src="{{ asset('img/logo/MoMo_Logo.png')}}" alt="MoMo Logo" class="btn-icon">
                    Checkout
                </button>
            </div>
        </form>

        @else
        <div class="history-empty">
            <p>Your cart is empty.</p>
            <div class="btn-container">
                <a href="{{ asset('/')}}" class="btn btn-primary">Go back</a>
            </div>
        </div>
        @endif
    </div>
</div>
<script>
// Lấy giá trị của trường ẩn và gán cho biến amount
var amount = document.getElementById('amount_input').value;

// Đặt giá trị của amount cho trường input hidden có name="amount" trong form khi biểu mẫu được gửi
document.querySelector('form').addEventListener('submit', function() {
    document.querySelector('input[name="amount"]').value = amount;
});
</script>
@endsection