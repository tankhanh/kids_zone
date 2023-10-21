@extends('admin.master')

@section('module', 'Account')
@section('action', 'List')

@section('content')
<!-- Default box -->
<form method="POST" action="{{ route('admin.account.update', ['id' => $id]) }}">
    @csrf
    <div class=" card">
        <div class="card-header">
            <h3 class="card-title">Account Edit</h3>

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
                        <label>First Name: </label>
                        <input type="text" class="form-control" placeholder="Enter First Name" name="fistname"
                            value="{{ old('firstname', $account->user->firstname) }}" disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Last Name: </label>
                        <input type="text" class="form-control" placeholder="Enter First Name" name="lastname"
                            value="{{ old('lastname', $account->user->lastname) }}" disabled>

                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" placeholder="Enter email" name="email"
                    value="{{ old('email', $account->email) }}" disabled>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Enter password" name="password">
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="1" {{ old('status', $account->status) == 1 ? 'selected' : ''}}>Show</option>
                            <option value="2" {{ old('status', $account->status) == 2 ? 'selected' : ''}}>Hidden
                            </option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" placeholder="Enter password"
                            name="password_confirmation">
                    </div>

                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="role" disabled>
                            <option value="1" {{ old('role', $account->role) == 1 ? 'selected' : ''}}>Admin</option>
                            <option value="2" {{ old('role', $account->role) == 2 ? 'selected' : ''}}>Member</option>
                        </select>
                    </div>
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