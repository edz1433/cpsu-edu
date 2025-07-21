@extends('webadmin.layouts.mainlayout')
@include('webadmin.layouts.header')
@include('webadmin.layouts.sidebar')

@section('content')
<main class="ttr-wrapper">
	<div class="container-fluid">
		<div class="db-breadcrumb">
			<h4 class="breadcrumb-title">User</h4>
			<ul class="db-breadcrumb-list">
				<li><a href="#"><i class="fa fa-home"></i>Dashboard</a></li>
				<li>User</li>
			</ul>
		</div>	
		<div class="row">
			<!-- Your Profile Views Chart -->
			<div class="col-lg-4 m-b30">
				<div class="widget-box">
					<div class="wc-title">
						<h4><i class="fa fa-file-alt"></i> User Details</h4>
					</div>
					<div class="wrapper">
						<div class="container">
							<form class="mail-compose" action="{{ route('admin-userCreate') }}" method="post">
								@if($errors->any())
									<div class="alert alert-danger">
										<ul>
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif
	
								@if(session('success'))
									<div class="alert alert-success">
										{{ session('success') }}
									</div>
								@endif
								@csrf
								<div class="form-group row">
								  	<div class="col-12 mb-3">
										<input class="form-control"  type="text"  name="fname" placeholder="First Name">
								  	</div>
									<div class="col-12 mb-3">
									  	<input class="form-control"  type="text"  name="mname" placeholder="Middle Name">
									</div>
									<div class="col-12 mb-3">
									  	<input class="form-control"  type="text"  name="lname" placeholder="Last Name">
									</div>
									<div class="col-12 mb-3">
										<select class="form-control"  name="role">
											<option value="1">Web Administrator</option>
											<option value="2">Content Administrator</option>
										</select>
								  	</div>
									<div class="col-12 mb-3">
									  	<input class="form-control"  type="text"  name="username" placeholder="Username">
									</div>
									<div class="col-12 mb-3">
									  	<input class="form-control"  type="password"  name="password" placeholder="Password">
									</div>
									<div class="col-12 mb-3">
										<input class="form-control"  type="password"  name="password_confirmation" placeholder="Confirm Password">
								  </div>
									<div class="col-12 mb-3">
										<button class="form-control default-bg"  type="submit"><i class="fa fa-save"></i> Save</button>
								  </div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-8 m-b30">
				<div class="widget-box">
					<div class="wrapper">
						<div class="container pt-4">
							<div class="table-responsive">
		                        <table id="example1" class="table table-bordered table-hover">
		                            <thead>
		                                <tr>
											<th>#</th>
		                                    <th>Full Name</th>
		                                    <th>Username</th>
		                                    <th>Role</th>
		                                    <th>Action</th>
		                                </tr>
		                            </thead>
		                            <tbody id="tbody">
										@php $no = 1; @endphp
										@foreach ($user as $us)
		                                <tr>
											<td>{{ $no++ }}</td>
		                                	<td>{{ $us->fname }} {{ $us->mname }} {{ $us->lname }}</td>
		                                	<td>{{ $us->username }}</td>
		                                	<td>{{ $us->role == 1 ? 'Web Administrator' : 'Content Administrator' }}</td>
		                                	<td>
		                                		<a href="#" class="btn button-sm gray">
		                                			<i class="fa fa-pencil"></i>
		                                		</a>
		                                		<a href="#" class="btn button-sm red">
		                                			<i class="fa fa-trash"></i>
		                                		</a>
		                                	</td>
		                                </tr>
										
											
										@endforeach
		                            </tbody>
		                        </table>
		                    </div>
						</div>
					</div>
				</div> 
			</div>
			<!-- Your Profile Views Chart END-->
		</div>
	</div>
</main>
@endsection