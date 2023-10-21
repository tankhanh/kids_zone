@extends('admin.master')

@section('module', 'Video')
@section('action', 'List')

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
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Video list</h3>

        <div class="card-tools">
            <button type=" button" class=" btn btn-tool " data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class=" btn btn-tool " data-card-widget="remove" title=" Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <div class="card-body ">
        <table id="example1" class=" table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>URL</th>
                    <th>Lesson</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <!-- <th>Edit</th>
                    <th>Delete</th> -->
                </tr>
            </thead>
            <tbody>
                @foreach ($videos as $video)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>
                        <video width="300" height="200" controls>
                            <source src="{{ asset('uploads/videos/'.$video->url) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </td>
                    <td> @if($video->lesson)
                        {{ $video->lesson->title}}
                        @endif
                    </td>
                    <td>{{ date('d/m/y - H:i:s',strtotime($video->created_at))}}
                    </td>
                    <td>
                        {{ date('d/m/y - H:i:s ', strtotime($video->updated_at))}}
                    </td>
                    <!-- <td> <a href="{{ route('admin.video.edit', ['id' => $video->id]) }}">
                            Edit </a>
                    </td>
                    <td> <a onclick="return confirmationDelete('video')"
                            href="{{route('admin.video.destroy', ['id'=> $video->id])}}"> Delete </a> </td> -->
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th> ID </th>
                    <th> URL </th>
                    <th> Lesson</th>
                    <th> Created At </th>
                    <th> Updated At </th>
                    <!-- <th> Edit</th>
                    <th>Delete
                    </th> -->
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<!-- /.card -->
@endsection