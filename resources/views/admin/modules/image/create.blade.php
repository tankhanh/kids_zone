@extends('admin.master')

@section('module', 'Image')
@section('action', 'Create')

@section('content')
<!-- Default box -->
<form method="post" action="{{ route('admin.image.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Image create</h3>

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
                        <label>Caption</label>
                        <input type="text" class="form-control" placeholder="Enter caption for image" name="caption"
                            value="{{ old('caption')}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Lesson</label>
                        <select class="form-control" name="lessonDetail_id">
                            @foreach($lessons as $lesson)
                            <option value="{{ $lesson->id}}" {{ old('lesson_id') == $lesson->id ? 'selected' : ''}}>
                                {{$lesson->title}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>URL</label>
                <input type="file" class="form-control" name="url" value="{{ old('url') }}">
            </div>
        </div>
        <div class=" card-footer">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </div>
</form>

<!-- /.card -->


@endsection