@extends('admin.master')

@section('module', 'Lesson')
@section('action', 'Create')
@push('handlejs')
<!-- Add Image -->
<script type="text/javascript">
$(document).ready(function() {
    var imageCount = 0;
    $("#add-image").click(function() {
        imageCount++;
        var newRow = ` <div class="row d-flex align-items-center"> <div class="col-md-3"> <img
    src="{{ asset('uploads/imageDetail/default-image.png')}}" width="100%" id="image-${imageCount}"
    class="img-fluid img-circle">
            </div>
            <div class="col-md-7 custom-file">
                <input type="file" name="images[]" class="custom-file-input" data-image="${imageCount}" id="mainImage-${imageCount}">
                <label class="custom-file-label" for="mainImage-${imageCount}">Choose file</label>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger w-100 delete-image" data-image="${imageCount}">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>`;
        $(".group-image-detail").append(newRow);
    });

    $(".group-image-detail").on('click', '.delete-image', function() {
        var imageNumber = $(this).data("image");
        $("#image-" + imageNumber).closest(".row").remove();
    });

    $(".group-image-detail").on('change', 'input[name="images[]"]', function() {
        var imageNumber = $(this).data("image");
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#image-" + imageNumber).attr("src", e.target.result);
                // Cập nhật label với tên tệp đã chọn
                $(this).siblings(".custom-file-label").html(file.name);
            }.bind(this);
            reader.readAsDataURL(file);
        }
    });
});
</script>
<!-- Add Sound -->
<script type="text/javascript">
$(document).ready(function() {
    var soundCount = 0;
    $("#add-sound").click(function() {
        soundCount++;
        var newRow = `
        <div class="row d-flex align-items-center">
            <div class="col-md-12" style="text-align: center">
                <audio width="100%" src="{{ asset('uploads/sounds/a.mp3')}}" controls id="sound-${soundCount}" type="audio/mpeg"></audio>
            </div>
            <div class="col-md-10 custom-file">
                <input type="file" name="sounds[]" class="custom-file-input" data-sound="${soundCount}" id="mainsound-${soundCount}">
                <label class="custom-file-label" for="mainsound-${soundCount}">Choose file</label>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger w-100 delete-sound" data-sound="${soundCount}">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>`;
        $(".group-sound-detail").append(newRow);
    });

    $(".group-sound-detail").on('click', '.delete-sound', function() {
        var soundNumber = $(this).data("sound");
        $("#sound-" + soundNumber).closest(".row").remove();
    });

    $(".group-sound-detail").on('change', 'input[name="sounds[]"]', function() {
        var soundNumber = $(this).data("sound");
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#sound-" + soundNumber).attr("src", e.target.result);
                // Cập nhật label với tên tệp đã chọn
                $(this).siblings(".custom-file-label").html(file.name);
            }.bind(this);
            reader.readAsDataURL(file);
        }
    });
});
</script>
<!-- Add Video -->
<script type="text/javascript">
$(document).ready(function() {
    var videoCount = 0;
    $("#add-video").click(function() {
        videoCount++;
        var newRow = `
        <div class="row d-flex align-items-center">
            <div class="col-md-12" style="text-align: center">
                <video width="100%" controls id="video-${videoCount}" type="video/mp4"></video>
            </div>
            <div class="col-md-10 custom-file">
                <input type="file" name="videos[]" class="custom-file-input" data-video="${videoCount}" id="mainvideo-${videoCount}">
                <label class="custom-file-label" for="mainvideo-${videoCount}">Choose file</label>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger w-100 delete-video" data-video="${videoCount}">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>`;

        $(".group-video-detail").append(newRow);
    });

    $(".group-video-detail").on('click', '.delete-video', function() {
        var videoNumber = $(this).data("video");
        $("#video-" + videoNumber).closest(".row").remove();
    });

    $(".group-video-detail").on('change', 'input[name="videos[]"]', function() {
        var videoNumber = $(this).data("video");
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#video-" + videoNumber).attr("src", e.target.result);
                // Cập nhật label với tên tệp đã chọn
                $(this).siblings(".custom-file-label").html(file.name);
            }.bind(this);
            reader.readAsDataURL(file);
        }
    });
});
</script>
@endpush
@section('content')
<!-- Default box -->
<form method="post" action="{{ route('admin.lesson.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lesson create</h3>

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
                        <label>Category</label>
                        <select class="form-control" name="category_id">
                            <option value="0" {{ old('category_id')==0 ? 'selected' : '' }}> --- Root --- </option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id}}" {{ old('category_id')==$category->id ? 'selected' : ''}}>
                                {{$category->category_name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Title </label>
                        <input type="text" class="form-control" placeholder="Enter Lesson Name" name="title"
                            value="{{ old('title')}}">
                    </div>
                    <div class=" form-group">
                        <label>Description</label>
                        <textarea class="form-control" placeholder="Enter description" name="description"
                            value="{{ old('description')}}"></textarea>
                    </div>
                    <div class=" form-group">
                        <label>Age</label>
                        <input type="number" class="form-control" placeholder="Enter age" name="age"
                            value="{{ old('age')}}">
                    </div>
                    <div class="group-image-detail">
                        <div class="row">
                            <button type="button" class="btn btn-info w-100 " id="add-image">
                                <i class="fas fa-plus"></i> Add image detail
                            </button>
                        </div>
                    </div>
                    <hr>
                    <div class="group-sound-detail">
                        <div class="row">
                            <button type="button" class="btn btn-info w-100 " id="add-sound">
                                <i class="fas fa-plus"></i> Add sound detail
                            </button>
                        </div>
                    </div>
                    <hr>
                    <div class="group-video-detail">
                        <div class="row">
                            <button type="button" class="btn btn-info w-100 " id="add-video">
                                <i class="fas fa-plus"></i> Add video detail
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group">
                            <label>Background Preview</label>
                            <div class="avatar-preview" style="text-align:center">
                                <img style="width:145px" id="profilePicPreview" class="img-fluid img-circle"
                                    src="{{ asset('uploads/imageDetail/default-image.png')}}" alt="Preview">
                            </div>
                        </div>
                        <label for="mainImage">Change background</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="mainImage" name="mainImage">
                            <label class="custom-file-label" for="mainImage">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Membership Package</label>
                        <select class="form-control" name="package_id">
                            @foreach($memberships as $membership)
                            <option value="{{ $membership->id }}">{{ $membership->package_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </div>
</form>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const mainImageInput = document.getElementById('mainImage');
    const profilePicPreview = document.getElementById('profilePicPreview');
    const customFileLabel = document.querySelector('.custom-file-label');

    mainImageInput.addEventListener('change', function() {
        if (mainImageInput.files && mainImageInput.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                profilePicPreview.src = e.target.result;
                customFileLabel.innerText = mainImageInput.files[0].name;
            };

            reader.readAsDataURL(mainImageInput.files[0]);
        }
    });
});
</script>
<!-- /.card -->


@endsection