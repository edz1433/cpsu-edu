@extends('webadmin.layouts.mainlayout')
@include('webadmin.layouts.header')
@include('webadmin.layouts.sidebar')

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
			<div class="col-lg-12 m-b30">
				<div class="widget-box">
					<div class="wrapper">
						<div class="container pt-4">
							<a href="{{ route('admin-createFile') }}" class="btn default-success mb-2 float-right">+ <i class="ti-file"></i></a>
							<div class="table-responsive">
		                        <table id="example1" class="table table-bordered table-hover">
		                            <thead>
		                                <tr>
											<th>#</th>
		                                    <th width="300">Title</th>
		                                    <th>File Name</th>
											<th>Category</th>
		                                    <th width="100">Action</th>
		                                </tr>
		                            </thead>
		                            <tbody id="tbody">
										@php $no = 1; @endphp
										@foreach ($file as $f)
		                                <tr>
											<td>{{ $no++ }}</td>
											<td>{{ $f->title }}</td>
											<td><a href="{{ asset('Uploads/Files/'. $f->storage .'/' . $f->file_name) }}" class="text-warning" target="_blank" rel="noopener noreferrer">{{ $f->file_name }}</a></td>
											<td>{{ $f->category }}</td>
		                                	<td>
		                                		<a href="{{ route('admin-editSublink', ['id' => $f->id]) }}" class="btn button-sm gray">
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
		</div>
	</div>
</main>
@endsection