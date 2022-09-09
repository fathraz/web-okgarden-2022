@extends('layouts.main')

@section('title', 'Manage Project')
@section('titlePage', 'Manage Projects')

@section('content')
<!-- Main content -->
<section class="content">
  	<div class="container-fluid">
  	
  		<div class="row">
          <div class="col-12">
            <div class="card">
              	<div class="card-header">
	                <a href="" class="card-title" data-toggle="modal" data-target="#addProjectModal" style="color: white;">
	                	<i class="fas fa-plus-circle mr-1"></i>
	                	Add New
	                </a>

	                <div class="card-tools"></div>
              	</div>
                
		        <div class="card-body p-0">
			        <div class="table-responsive">
			          <table class="table m-0">
			            <thead>
			            <tr>
			              <th>No</th>
			              <th>Nama Project</th>
			              <th>Keterangan</th>
			              <th>Status</th>
			              <th class="text-center">Action</th>
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
			                <td class="text-center">
		                        <a href="" class="text-primary" data-toggle="modal" data-target="#detailProjectModal{{ $project->id }}">
		                          <i class="far fa-eye"></i>
		                        </a>
		                        |
		                        <a href="" class="text-warning" data-toggle="modal" data-target="#updateProjectModal{{ $project->id }}">
		                          <i class="far fa-edit"></i>
		                        </a>
		                        |
		                        <a href="" class="text-danger" data-toggle="modal" data-target="#deleteProjectDataModal{{ $project->id }}">
		                          <i class="fas fa-trash"></i>
		                        </a>
		                      </td>
			              </tr>

			              <div class="modal fade" id="deleteProjectDataModal{{ $project->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered modal-sm">
                            <div class="modal-content">
                              <div class="modal-body">
                                <div>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div>
                                  <div class="text-center">
                                    <div style="font-size: 100px; color: tomato;">
                                      <i class="fas fa-exclamation-triangle"></i>
                                    </div>
                                  </div>
                                  <div class="mt-4 text-center">
                                    <label>Are you sure want to delete this data?</label>
                                    <div>
                                      <p class="small">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tincidunt feugiat nulla, vel blandit arcu facilisis id. Morbi ornare justo a sodales vulputate. Vivamus quis dictum nulla.</p>
                                    </div>
                                  </div>
                                  <form action="/project/destroy/{{ $project->id }}" method="post">
                                    @csrf
                                    <div class="text-center">
                                      <button type="submit" class="btn btn-outline-danger">Keep Delete</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="modal fade" id="updateProjectModal{{ $project->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											  	<div class="modal-dialog">
												    <div class="modal-content">
												      <div class="modal-header">
												        <h5 class="modal-title" id="exampleModalLabel">Update Project</h5>
												        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
												          <span aria-hidden="true">&times;</span>
												        </button>
												      </div>
													    <form action="/project/update/{{ $project->id }}" method="post">
										            	@csrf
																	<div class="modal-body">
																		<div class="form-group">
									                    <label for="name">Nama Project</label>
									                    <input type="text" class="form-control" id="name" name="textName" value="{{ $project->nama }}" required>
									                  </div>
									                  <div class="form-group">
									                    <label for="desc">Keterangan</label>
									                    <textarea class="form-control" id="desc" name="textKet">{{ $project->keterangan }}</textarea>
									                  </div>
									                  <div class="form-group">
									                    <select class="custom-select" name="textStatus">
										                    @if($project->status == 1)
																				  <option value="1" selected>Waiting</option>
																				  <option value="2">Progress</option>
																				  <option value="3">Done</option>
																				  <option value="4">Cancle</option>
																				@elseif($project->status == 2)
																				  <option value="1">Waiting</option>
																				  <option value="2" selected>Progress</option>
																				  <option value="3">Done</option>
																				  <option value="4">Cancle</option>
																				@elseif($project->status == 3)
																				  <option value="1">Waiting</option>
																				  <option value="2">Progress</option>
																				  <option value="3" selected>Done</option>
																				  <option value="4">Cancle</option>
																				@elseif($project->status == 4)
																				  <option value="1">Waiting</option>
																				  <option value="2">Progress</option>
																				  <option value="3">Done</option>
																				  <option value="4" selected>Cancle</option>
																				@endif
																			</select>
									                  </div>
									                </div>
																	<div class="modal-footer">
																		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																		<button type="submit" class="btn btn-primary">Save</button>
																	</div>
													    </form>
												    </div>
											  	</div>
												</div>

												<div class="modal fade" id="detailProjectModal{{ $project->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											  	<div class="modal-dialog">
												    <div class="modal-content">
												      <div class="modal-header">
												        <h5 class="modal-title" id="exampleModalLabel">Detail Project</h5>
												        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
												          <span aria-hidden="true">&times;</span>
												        </button>
												      </div>
													    <form>
										            	@csrf
																	<div class="modal-body">
																		<div class="form-group">
									                    <label for="name">Nama Project</label>
									                    <input type="text" class="form-control" id="name" name="textName" value="{{ $project->nama }}" disabled>
									                  </div>
									                  <div class="form-group">
									                    <label for="desc">Keterangan</label>
									                    <textarea class="form-control" id="desc" name="textKet" disabled>{{ $project->keterangan }}</textarea>
									                  </div>
									                  <div class="form-group">
									                    <select class="custom-select" name="textStatus" disabled>
										                    @if($project->status == 1)
																				  <option value="1">Waiting</option>
																				  <option value="2">Progress</option>
																				  <option value="3">Done</option>
																				  <option value="4">Cancle</option>
																				@elseif($project->status == 2)
																				  <option value="1">Waiting</option>
																				  <option value="2" selected>Progress</option>
																				  <option value="3">Done</option>
																				  <option value="4">Cancle</option>
																				@elseif($project->status == 3)
																				  <option value="1">Waiting</option>
																				  <option value="2">Progress</option>
																				  <option value="3" selected>Done</option>
																				  <option value="4">Cancle</option>
																				@elseif($project->status == 4)
																				  <option value="1">Waiting</option>
																				  <option value="2">Progress</option>
																				  <option value="3">Done</option>
																				  <option value="4" selected>Cancle</option>
																				@endif
																			</select>
									                  </div>
									                </div>
																	<div class="modal-footer">
																		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																	</div>
													    </form>
												    </div>
											  	</div>
												</div>
			            @endforeach
			            </tbody>
			          </table>
			        </div>
			     </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

  	</div>
    <!-- /.card-footer -->
    <div class="modal fade" id="addProjectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  	<div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Add New Project</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
			    <form action="/add/project" method="post">
            	@csrf
				<div class="modal-body">
					<div class="form-group">
            <label for="name">Nama Project</label>
            <input type="text" class="form-control" id="name" name="textName" required>
          </div>
          <div class="form-group">
            <label for="desc">Keterangan</label>
            <textarea class="form-control" id="desc" name="textKet"></textarea>
          </div>
          <div class="form-group">
            <select class="custom-select" name="textStatus">
						  <option value="1" selected>Waiting</option>
						  <option value="2">Progress</option>
						</select>
	        </div>
					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save</button>
					</div>
			    </form>
		    </div>
	  	</div>
	</div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection