@extends('admin.admin_master')
@section('admin')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">


		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  


			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">User List</h3>
                  <a href="{{ route('user.add') }}" style="float: right; " class="btn btn-round btn-success mb-5">Add User</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table  class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">SL</th>
								<th>Role</th>
								<th>Name</th>
								<th>Email</th>
								<th width="25%">Action</th>
					
							</tr>
						</thead>
						<tbody>
                            @foreach ($allData as $key => $user)
                                
                     
							<tr>
								<td>{{ $key +1 }}</td>
								<td>{{ $user->usertype }}</td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								<td>
                                    
                                    <a href="#" class="btn btn-info">Edit</a>
                                    <a href="#" class="btn btn-danger">Delete</a>
                                </td>
					
							</tr>
							@endforeach
						</tbody>
						{{-- <tfoot>
							<tr>
									<th>SL</th>
								<th>Role</th>
								<th>Name</th>
								<th>Email</th>
								<th>Action</th>
					
							</tr>
						</tfoot> --}}
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			 
			  <!-- /.box -->          
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>
  <!-- /.content-wrapper -->
  

@endsection