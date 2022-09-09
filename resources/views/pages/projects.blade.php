@extends('layouts.main')

@section('title', 'Dashboard')
@section('titlePage', 'Projects')

@section('content')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Info boxes -->

    <div class="card">
      <!-- /.card-header -->
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table m-0">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama Project</th>
              <th>Keterangan</th>
              <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($projects as $project)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $project->nama }}</td>
                <td class="text-truncate" style="max-width: 200px;">{{ $project->keterangan }}</td>
                @if($project->status == 1)
                  <td><span class="badge badge-warning">Waiting</span></td>
                @elseif($project->status == 2)
                <td><span class="badge badge-info">On Progress</span></td>
                @elseif($project->status == 3)
                <td><span class="badge badge-success">Done</span></td>
                @elseif($project->status == 4)
                <td><span class="badge badge-danger">Cancel</span></td>
                @endif
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- /.card -->
  </div>
    <!-- /.card-footer -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection