@extends('admin.master')

@section('module', 'Cart')
@section('action', 'List')

@push('css')
<link rel="stylesheet" href="{{ asset('administrator/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('administrator/plugins/datatables-responsive/css/responsive.bootstrap4.min.css ') }}">
<link rel="stylesheet" href="{{ asset('administrator/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush
@push('js')
<script src="{{ asset('administrator/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('administrator/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('administrator/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('administrator/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('administrator/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('administrator/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('administrator/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('administrator/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('administrator/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{asset('administrator/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('administrator/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('administrator/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
@endpush
@push('handlejs')
<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});

function confirmationDelete(module) {
    return confirm(`Are yout sure you want to delete this ${module} ?`)
}
</script>
@endpush
@section('content')
<!--
    Default box -->
<div class="card">
    <div class="card-header ">
        <h3 class="card-title"> Cart list </h3>

        <div class="card-tools">
            <button type="button" class=" btn btn-tool " data-card-widget="collapse " title=" Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type=" button" class="btn btn-tool " data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    @if($cart->count() > 0)
    <div class="card-body ">
        <table id="example1" class="table table-bordered table-striped ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
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
                    <td>{{ $cartItem->id}}</td>
                    <td>{{ $cartItem->account->user->firstname}} {{ $cartItem->account->user->lastname}} </td>
                    <td>{{ $cartItem->account->email}}</td>
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
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Package</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </tfoot>
        </table>
    </div>
    @else
    <div class="cart-empty">
        <p>Your cart is empty.</p>
        <div class="btn-container">
            <a href="{{ asset('/admin/dashboard')}}" class="btn btn-primary">Go back</a>
        </div>
    </div>
    @endif
</div>
<!-- /.card -->
@endsection