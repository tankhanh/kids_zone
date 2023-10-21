@extends('admin.master')

@section('module', 'Lesson Detail')
@section('action', 'Create')

@section('content')
<!-- Default box -->
<form method="post" action="{{ route('admin.lesson.store') }}">
    @csrf
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lesson Detail create</h3>

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
                        <label>Title </label>
                        <input type="text" class="form-control" placeholder="Enter Lesson Name" name="title"
                            value="{{ old('title')}}">
                    </div>
                </div>
                <div class="form-group">

                </div>
            </div>
            <div class=" form-group">
                <label>Description</label>
                <textarea class="form-control" placeholder="Enter description" name="description"
                    value="{{ old('description')}}"></textarea>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </div>
</form>
<!-- /.card -->


@endsection