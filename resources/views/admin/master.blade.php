<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.partials.head')
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('admin.partials.main-header')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('admin.partials.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @include('admin.partials.content-header')

            <!-- Main content -->
            <section class="content">
                @if($errors->any())
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-ban"></i> Error!</h5>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </div>
                @endif

                @if(Session::get('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                    {{ Session::get('success')}}
                </div>
                @endif

                @if(Session::get('error'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> error!</h5>
                    {{ Session::get('error')}}
                </div>
                @endif

                @yield('content')
            </section>
            <!-- /.content -->

        </div>
        <!-- /.content-wrapper -->

        @include('admin.partials.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @include('admin.partials.foot')
</body>

</html>