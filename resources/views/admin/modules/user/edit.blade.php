@extends('admin.master')

@section('module', 'User')
@section('action', 'Edit')

@section('content')
<!-- Default box -->
<form method="POST" action="{{ route('admin.user.update', ['id' => $id]) }}" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">User Edit</h3>

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
                        <label>First Name</label>
                        <input type="text" class="form-control" placeholder="Enter first name" name="firstname"
                            value="{{ old('firstname', $user->firstname) }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" placeholder="Enter last name" name="lastname"
                            value="{{ old('lastname', $user->lastname) }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Birthday</label>
                        <input type="date" class="form-control" name="birthday"
                            value="{{ old('birthday', $user->birthday) }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Gender</label>
                        <select class="form-control" name="gender">
                            <option value="1" {{ old('gender', $user->gender) == 1 ? 'selected' : ''}}>Male</option>
                            <option value="2" {{ old('gender', $user->gender) == 2 ? 'selected' : ''}}>Female</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Image Current</label>
                        <br>
                        <img src="{{ asset('uploads/avatar/'.$user->profile_pic)}}" alt="Image Current" width="300px"
                            height="200px">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" name="profile_pic"
                            value="{{ old('profile_pic', $user->profile_pic) }}">
                    </div>
                </div>
            </div>

        </div>
        <div class=" card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>
<!-- /.card -->
@endsection