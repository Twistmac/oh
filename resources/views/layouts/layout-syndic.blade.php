<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SYNDIC</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {{-- Custom style --}}
    <link rel="stylesheet" href="{{ asset('css/my-style.css') }}">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('lte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('lte/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('lte/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('lte/bower_components/jvectormap/jquery-jvectormap.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('lte/dist/css/AdminLTE.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('lte/dist/css/skins/_all-skins.css') }}">

    <link rel="stylesheet" href="{{ asset('lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <!-- jQuery 3 -->
    <script src="{{ asset('lte/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/my-script.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="{{ asset('lte/bower_components/datatables.net/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('lte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-black sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>S</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Syndic</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            {{--<img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">--}}
                            <span class="hidden-xs">{{ Auth::user()->email }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                {{--<img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">--}}
                                <p>
                                    {{ Auth::user()->email }} - Syndic
                                    {{--<small>Member since Nov. 2012</small>--}}
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-danger btn-flat" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <button class="btn btn-danger" style="margin-top: 5px"
                           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            <span class="glyphicon glyphicon-off"></span> &nbsp;{{ __('Logout') }}
                        </button>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>

        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user-circle"></i> <span>Immeuble</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="{{ route('syndic.gestion-residence') }}"><i class="fa fa-circle-o"></i> Liste des immeubles</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user-circle"></i> <span>Resident</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href={{ route('syndic.add-resident') }}><i class="fa fa-circle-o"></i> Liste des residents</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Ajouter Resident</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-table"></i> <span>Partenaire publicitaire</span>
                    </a>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user-circle"></i> <span>Annonces</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('syndic.gestion-annonces-syndic') }}"><i class="fa fa-circle-o"></i> Mes Annonces</a></li>
                        <li><a href="{{ route('syndic.gestion-annonces-syndic') }}"><i class="fa fa-circle-o"></i> Annnonce des residents</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('syndic.messagerie') }}">
                        <i class="fa fa-envelope-o"></i>Messagerie &nbsp; &nbsp; <span class="label label-warning" id="non-lue">0</span>
                    </a>
                </li>
            </ul>

        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        @if(Session::has('success'))
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    </div>
                </div>
            </div>
        @endif
        @if(Session::has('error'))
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-error">{{ Session::get('error') }}</div>
                    </div>
                </div>
            </div>
    @endif
    @yield('content')
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('lte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('lte/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('lte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap  -->
<script src="{{ asset('lte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('lte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('lte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('lte/bower_components/chart.js/Chart.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{--<script src="{{ asset('dist/js/pages/dashboard2.js') }}"></script>--}}
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('lte/dist/js/demo.js') }}"></script>

<script>
    $.ajax({
        type:'GET',
        url:'{{ route('syndic.newMessage') }}',
        success:function(data){
            if(data==0){
                $("#non-lue").hide();
            }
            else{
                $("#non-lue").html(data);
                $("#pull-right").html(data);
                $("#non-lue").show();
            }
        }
    });

    // read document
    $(document).ready(function(){
        if($("#non-lue").text()=='0'){
            $("#non-lue").hide();
        }
        setInterval(function () {
            $.ajax({
                type:'GET',
                url:'{{ route('syndic.newMessage') }}',
                success:function(data){
                    if(data==0){
                        $("#non-lue").hide();
                    }
                    else{
                        $("#non-lue").html(data);
                        $("#pull-right").html(data);
                        $("#non-lue").show();
                    }
                }
            });
        },4000);
    })
</script>
</body>
</html>
