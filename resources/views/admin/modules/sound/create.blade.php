@extends('admin.master')

@section('module', 'Sound')
@section('action', 'Create')

@section('content')
<!-- Default box -->
<form method="post" action="{{ route('admin.sound.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Sound create</h3>

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
                <label>Caption</label>
                <input type="text" class="form-control" placeholder="Enter caption for sound" name="caption"
                    value="{{ old('caption')}}">
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