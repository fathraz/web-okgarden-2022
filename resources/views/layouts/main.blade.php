<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>OK Garden App | @yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

<!-- Navbar -->
  	<nav class="main-header navbar navbar-expand navbar-dark">
	    <!-- Left navbar links -->
	    <ul class="navbar-nav">
	      <li class="nav-item">
	        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
	      </li>
	    </ul>

	    <!-- Right navbar links -->
	    <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <!-- <form action="{{ route('logout_action') }}" method="POST"> -->
            <!-- @csrf -->
  	        <a class="nav-link" href="{{ route('logout_action') }}">
  	        	Logout<i class="fas fa-sign-out-alt ml-2"></i>
  	        </a>
          <!-- </form> -->
	      </li>
        
	    </ul>
  	</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex nav-item">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
          <div class="info">
            <a class="d-block">{{ auth()->user()->name }}</a>
          </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item user-panel mb-2 pb-2">
            <?php if (auth()->user()->role == '3') {?>
            <a href="/" class="nav-link active">
              <i class="fas fa-tachometer-alt mr-2"></i>
              <p>
                Dashboard
              </p>
            </a>
          <?php } else if (auth()->user()->role == '2') { ?>
            <a href="/designer" class="nav-link active">
              <i class="fas fa-tachometer-alt mr-2"></i>
              <p>
                Dashboard
              </p>
            </a>
            <?php } else { ?>
            <a href="/gardener" class="nav-link active">
              <i class="fas fa-tachometer-alt mr-2"></i>
              <p>
                Dashboard
              </p>
            </a>
            <?php } ?>
          </li>
          <li class="nav-item">
            <?php if (auth()->user()->role == '3') {?>
            <a href="/projects" class="nav-link">
              <i class="fas fa-project-diagram mr-2"></i>
              <p>
                Projects
              </p>
            </a> 
          <?php } else if (auth()->user()->role == '2') { ?>
            <a href="/designer_projects" class="nav-link">
              <i class="fas fa-project-diagram mr-2"></i>
              <p>
                Projects
              </p>
            </a> 
            <?php } else { ?>
              <a href="/gardener_projects" class="nav-link">
              <i class="fas fa-project-diagram mr-2"></i>
              <p>
                Projects
              </p>
            </a>
            <?php } ?>
          </li>
        </ul>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  	<div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1 class="m-0">@yield('titlePage')</h1>
	          </div><!-- /.col -->
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="/">Home</a></li>
	              <li class="breadcrumb-item active">@yield('titlePage')</li>
	            </ol>
	          </div><!-- /.col -->
	        </div><!-- /.row -->
	     </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

  @yield('content')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->



<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
</body>
</html>