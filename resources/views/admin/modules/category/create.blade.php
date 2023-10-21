@extends('admin.master')

@section('module', 'Category')
@section('action', 'Create')

@section('content')
<!-- Default box -->
<form method="post" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Category create</h3>

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
            <div class="form-group">
                <label>Category name</label>
                <input type="text" class="form-control" placeholder="Enter category name" name="category_name"
                    value="{{ old('category_name')}}">
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="form-group">
                        <label>Background Preview</label>
                        <div class="avatar-preview" style="text-align:center">
                            <img style="width:145px" id="profilePicPreview"
                                src="{{ asset('uploads/background/default-image.png')}}" alt="Preview">
                        </div>
                    </div>
                    <label for="category_Background">Change background</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="category_Background"
                            name="category_Background">
                        <label class="custom-file-label" for="category_Background">Choose file</label>
                    </div>
                </div>
            </div>
        </div>
        <div class=" card-footer">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </div>
</form>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const category_BackgroundInput = document.getElementById('category_Background');
    const profilePicPreview = document.getElementById('profilePicPreview');
    const customFileLabel = document.querySelector('.custom-file-label');

    category_BackgroundInput.addEventListener('change', function() {
        if (category_BackgroundInput.files && category_BackgroundInput.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                profilePicPreview.src = e.target.result;
                customFileLabel.innerText = category_BackgroundInput.files[0].name;
            };

            reader.readAsDataURL(category_BackgroundInput.files[0]);
        }
    });
});
</script>
<!-- /.card -->


@endsection