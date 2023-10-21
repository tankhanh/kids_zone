@extends('admin.master')

@section('module', 'Admin')
@section('action', 'Profile')
@push('css')
<link rel="stylesheet" href="{{ asset('administrator/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('administrator/plugins/datatables-responsive/css/responsive.bootstrap4.min.css ') }}">
<link rel="stylesheet" href="{{ asset('administrator/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush @push('js') <script src="{{ asset('administrator/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('administrator/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('administrator/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}">
</script>
<script src="{{ asset('administrator/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('administrator/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('administrator/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('administrator/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{
    asset('administrator/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('administrator/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{asset('administrator/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{
    asset('administrator/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('administrator/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
@endpush
@push('handlejs')
<script>
$(function() {
    $("#example1 ").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper.col - md - 6: eq(0) ');
});

function confirmationDelete(module) {
    return confirm(`Are yout sure you want to delete this ${module} ?`)
}
</script>
@endpush
@section('content')
<!-- Default box -->
<section class="content">
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card">
                <div class="card-body box-profile ">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                            src="{{ asset('uploads/avatar/' .Auth::user()->user->profile_pic)}}"
                            alt="Admin profile picture">
                    </div>
                    <h3 class="profile-username text-center">{{ Auth::user()->user->firstname}}
                        {{ Auth::user()->user->lastname}}</h3>

                    <p class="text-muted text-center"> Admin </p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Email</b> <a class="float-right">{{ old('email', Auth::user()->email) }}</a>
                        </li>
                        <li class="list-group-item ">
                            <b>Birthday</b> <a
                                class="float-right">{{old('birthday ', date('d-m-Y',strtotime(Auth::user() -> user -> birthday)))}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Join date</b><a
                                class="float-right">{{ date('d-m-Y ', strtotime(Auth::user()->user->created_at))}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/.col -->
        <div class="col-md-9">
            <div class="card">
                <form method="POST" action=" {{ route('admin.profile.update') }}" enctype="multipart/form-data">
                    <input type="hidden" name="from_profile" value="{{ Auth::user()->user->id}}">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" placeholder="Enter first name"
                                        name="firstname" value="{{ old('firstname', Auth:: user()->user->firstname)}}">
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" placeholder="Enter last name"
                                        name="lastname" value="{{old('lastname', Auth:: user()->user->lastname) }}">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" placeholder="Enter email" name="email"
                                        {{ $myself ? 'disabled': '' }} value="{{ old('email', Auth::user()->email) }}">
                                </div>
                                <div class="form-group">
                                    <label>New password</label>
                                    <input type="password" class="form-control" placeholder="Enter password"
                                        name="password">
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" placeholder="Enter password"
                                        name="password_confirmation">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Avatar Preview</label>
                                    <div class="avatar-preview" style="text-align:center">
                                        <img style="width:125px" id="profilePicPreview" class="img-fluid img-circle"
                                            src="{{ asset('uploads/avatar/' . Auth::user()->user->profile_pic) }}"
                                            alt="Admin profile picture">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="profilePicInput">Change Avatar</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="profilePicInput"
                                            name="profile_pic">
                                        <label class="custom-file-label" for="profilePicInput">
                                            {{ !empty(Auth::user()->user->profile_pic) ? Auth::user()->user->profile_pic : 'Choose file' }}
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select class="form-control" name="gender">
                                        <option value="1"
                                            {{ old('gender', Auth::user()->user->gender) == 1 ? 'selected' : ''}}>
                                            Male</option>
                                        <option value="2"
                                            {{ old('gender', Auth::user()->user->gender) == 2 ? 'selected' : ''}}>
                                            Female
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Birthday</label>
                                    <input type="date" class="form-control" name="birthday"
                                        value="{{ old('birthday', Auth::user()->user->birthday) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
            <!-- /.col -->
        </div>
    </div>
</section>
<!-- /.card -->
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