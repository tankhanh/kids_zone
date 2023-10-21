<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.dashboard.index')}}" class="brand-link"
        style="text-align:center; font-family:'CARTOON FREE', sans-serif; font-size: xxx-large">
        <!-- <img src="{{ asset('administrator/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <!-- <span class="brand-text font-weight-light">Kids Zone</span> -->
        <span class="brand-text font-weight-light"><img style="width:170px; height:130px"
                src=" {{ asset('img/logo.png')}}" alt=""></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image" style="font-size: 10px;">
                <img src="{{ asset('uploads/avatar/' . Auth::user()->user->profile_pic) }}"
                    class="img-circle elevation-2" alt="User Image">
            </div>
            <ul class="nav" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a data-toggle="collapse" href="#userPanel">
                        <div class="info" style="white-space: normal; word-wrap: break-word; font-weight: bold;">
                            {{ Auth::user()->user->firstname}} {{ Auth::user()->user->lastname}}
                        </div>
                    </a>
                    <div id="userPanel" class="collapse">
                        <div class="info">
                            <a style="font-weight: bold;" href="{{route('admin.profile.index')}}"
                                class="d-block">Profile</a>
                            <a style="font-weight: bold;" href="{{ route('logout')}}" class="d-block">Log out</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('admin.dashboard.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Account
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.account.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create account</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.account.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List account</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            User
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.user.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List user</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-sitemap"></i>
                        <p>
                            Category
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.category.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.category.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Category</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>
                            Lesson
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.lesson.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create lesson</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.lesson.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List lesson</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-address-card"></i>
                        <p>
                            Membership Package
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.membershippackage.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create membership package</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.membershippackage.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List membership package</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.cart.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-cart-arrow-down"></i>
                        <p>
                            Cart
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.image.index') }}" class="nav-link">
                        <!-- <i class="nav-icon fas fa-cart-shopping"></i> -->
                        <i class="nav-icon fas fa-file-image"></i>
                        <p>
                            Image
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.sound.index') }}" class="nav-link">
                        <!-- <i class="nav-icon fas fa-cart-shopping"></i> -->
                        <i class="nav-icon fas fa-file-audio"></i>
                        <p>
                            Sound
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.video.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-file-video"></i>
                        <p>
                            Video
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>