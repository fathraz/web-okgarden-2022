@extends('layouts.main')

@section('title', 'Gardener')
@section('titlePage', 'Dashboard')

@section('content')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
     <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Projects</span>
            <span class="info-box-number">
              {{ $projects; }}
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-alt"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Project Done</span>
            <span class="info-box-number"> {{ $done; }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      <!-- /.col -->
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>

      <div class="col-12 col-sm-6 col-md-3">
         <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user-clock"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Project on Progress</span>
            <span class="info-box-number">{{ $progress; }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
       <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-alt-slash"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Waiting List Project</span>
            <span class="info-box-number">{{ $waiting; }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
    </div>
  </div>
    <!-- /.row -->
  </div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection