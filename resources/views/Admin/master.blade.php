<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @stack('meta-token')
    <title>Gouda Store Admin | Panel</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('adminAssets/plugins/bootstrap/dist/css/bootstrap.min.css')}}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('adminAssets/plugins/font-awesome/css/font-awesome.min.css')}}">

    <!--favicon-->
    <link rel="icon" href="{{asset('adminAssets/img/mainadmin.png')}}">

    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('adminAssets/plugins/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminAssets/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('adminAssets/css/skins/_all-skins.min.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>G</b>S</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Gouda</b>Store</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a id="sidePanel" href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('adminAssets/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
{{--                            <span class="hidden-xs">{{ Illuminate\Support\Facades\Auth::user()->name }}</span>--}}

                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{asset('adminAssets/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">

                                <p>
{{--                                    {{ Auth::user()->name }}--}}
{{--                                    <small>Member since &nbsp;{{ Auth::user()->created_at->format('F j, Y') }} </small>--}}
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-right">
                                    <form id="logout-form" action="" method="POST" class="d-none">
                                        @csrf
                                        <button class="btn btn-default btn-flat">Sign out</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('adminAssets/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
{{--                    <p>{{ Auth::user()->name }}</p>--}}
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-folder-o"></i> <span>Generals</span>
                        <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
{{--                        @hasanyrole('AdminRole1|governorates')--}}
                        <li><a href=""><i class="fa fa-circle-o"></i> Governorates</a></li>
{{--                        @endrole--}}

{{--                        @hasanyrole('AdminRole1|categories')--}}
                        <li><a href=""><i class="fa fa-circle-o"></i> Categories</a></li>
{{--                        @endrole--}}

{{--                        @hasanyrole('AdminRole1|cities')--}}
                        <li><a href=""><i class="fa fa-circle-o"></i> Cities</a></li>
{{--                        @endrole--}}
                    </ul>
                </li>

{{--                @hasanyrole('AdminRole1|posts')--}}
                <li>
                    <a href="{{url('user/products')}}">
                        <i class="fa fa-shoe-prints"></i> <span>Products</span>
                        <span class="pull-right-container"> </span>
                    </a>
                </li>
{{--                @endrole--}}

                <li>
                    <a href="">
                        <i class="fa fa-user"></i> <span>Clients</span>
                        <span class="pull-right-container"> </span>
                    </a>
                </li>

                <li>
                    <a href="">
                        <i class="fa fa-shoe-prints"></i> <span>Contacts</span>
                        <span class="pull-right-container"> </span>
                    </a>
                </li>

{{--                @hasrole('AdminRole1')--}}
                <li>
                    <a href="">
                        <i class="fa fa-user-circle"></i> <span>Users</span>
                        <span class="pull-right-container"> </span>
                    </a>
                </li>
{{--                @endrole--}}

                <!-- same as above one -->
{{--                @role('AdminRole1')--}}
                <li>
                    <a href="">
                        <i class="fa fa-code-fork"></i> <span>Roles</span>
                        <span class="pull-right-container"> </span>
                    </a>
                </li>
{{--                @endrole--}}

                <li>
                    <a href="">
                        <i class="fa fa-cogs"></i> <span>Settings</span>
                        <span class="pull-right-container"> </span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fa fa-key"></i> <span>Change your password</span>
                        <span class="pull-right-container"> </span>
                    </a>
                </li>
                <li><a><i class="fa fa-book"></i> <span>Documentation</span></a></li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <section class="content-header">
            <h1>
                @yield('title')
                <small> @yield('small-title') </small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Gouda Store</li>
            </ol>
        </section>

        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.0
        </div>
        <strong>Copyright &copy; 2022-2023 </strong> All rights reserved.
    </footer>

    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

@stack('scripts')
<!-- jQuery 3 -->
<script src="{{asset('adminAssets/plugins/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('adminAssets/plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('adminAssets/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('adminAssets/plugins/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminAssets/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('adminAssets/js/demo.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.sidebar-menu').tree();
        // $('#sidePanel').trigger("click");
    });
</script>
</body>
</html>
