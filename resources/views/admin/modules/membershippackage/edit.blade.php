@extends('admin.master')

@section('module', 'Membership Package')
@section('action', 'Edit')

@section('content')
<!-- Default box -->
<form method="post" action="{{ route('admin.membershippackage.update',['id' => $id]) }}">
    @csrf
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Membership Package Edit</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Package Name</label>
                        <input type="text" class="form-control" placeholder="Enter package name" name="package_name"
                            value="{{ old('package_name', $pack->package_name) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control" placeholder="Enter price" name="price"
                            value="{{ old('price', $pack->price) }}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Benefits</label>
                <textarea class="form-control" placeholder="Type an benefits"
                    name="benefit">{{ old('benefit', $pack->benefit) }}</textarea>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label>Expiry</label>
                    <input type="number" class="form-control" placeholder="Enter expiry" name="expiry"
                        value="{{ old('expiry', $pack->expiry)}}">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>
<!-- /.card -->


@endsection