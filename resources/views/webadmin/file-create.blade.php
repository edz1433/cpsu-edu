@extends('webadmin.layouts.mainlayout')

@section('content')

<main class="ttr-wrapper">

	<div class="container-fluid">
		<div class="db-breadcrumb">
			<h4 class="breadcrumb-title">Upload File</h4>
			<ul class="db-breadcrumb-list">
				<li><a href="#"><i class="fa fa-home"></i>Dashboard</a></li>
				<li>Upload File</li>
			</ul>
		</div>	
		<div class="row">
			<!-- Your Profile Views Chart -->
			<div class="col-lg-12 m-b30">
				<div class="widget-box">
					<div class="email-wrapper">
						<div class="mail-list-container">
							<form class="mail-compose" action="{{ route('admin-storeFile') }}" method="post" enctype="multipart/form-data">
								@csrf
								<div class="form-group row">
									<div class="form-group col-12">
										<label for="file">Title</label>
										<input class="form-control" name="title" type="text" placeholder="Title">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-12 col-md-6">
										<label for="title">Storage</label>
										<select class="form-control" name="storage">
											<option>images</option>
											<option>pdf</option>
											<option>videos</option>
											<option>others</option>
										</select>
									</div>
									<div class="col-12 col-md-6">
										<label for="category">Category</label>
										<select class="form-control" name="category">
											<option>Article</option>
											<option>Sub menu</option>
											<option>Sub link</option>
											<option>Gallery</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<div class="form-group col-12">
										<label for="file">File</label>
										<input class="form-control" type="file" name="file">
									</div>
								</div>
								<div class="form-group col-12">
									<button type="submit" class="btn btn-lg bg-success text-light float-right">
										<i class="fa fa-save"></i> Save
									</button>
								</div>
							</form>					
						</div>
					</div>
				</div> 
			</div>
			<!-- Your Profile Views Chart END-->
		</div>
	</div>
</main>
@endsection