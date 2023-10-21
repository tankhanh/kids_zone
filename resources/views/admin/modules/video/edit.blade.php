@extends('admin.master')

@section('module', 'Video')
@section('action', 'Edit')

@section('content')
<!-- Default box -->
<form method="post" action="{{ route('admin.video.update',['id' => $id]) }}" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Video Edit</h3>

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
                <input type="text" class="form-control" placeholder="Enter caption for video" name="caption"
                    value="{{ old('caption', $video->caption)}}">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>URL Current</label>
                        <br>
                        <video controls width="300" height="300">
                            <source src="{{ asset('uploads/videos/'.$video->url)}}" type="video/mp4"> Your browser does
                            not support the video tag.
                        </video>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>URL</label>
                        <input type="file" class="form-control" name="url" value="{{ old('url') }}">
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