@extends('webadmin.layouts.mainlayout')
@include('webadmin.layouts.header')
@include('webadmin.layouts.sidebar')

@section('content')
<main class="ttr-wrapper">
	<div class="container-fluid">
		<div class="db-breadcrumb">
			<h4 class="breadcrumb-title">Sub Link</h4>
			<ul class="db-breadcrumb-list">
				<li><a href="#"><i class="fa fa-home"></i>Dashboard</a></li>
				<li>Sub Link</li>
			</ul>
		</div>	
		<div class="row">
			<div class="col-lg-12 m-b30">
				<div class="widget-box">
					<div class="wrapper">
						<div class="container pt-4">
							<a href="{{ route('admin-createSubLink') }}" class="btn default-success mb-2 float-right">+ <i class="ti-link"></i></a>
							<div class="table-responsive">
		                        <table id="example1" class="table table-bordered table-hover">
		                            <thead>
		                                <tr>
											<th>#</th>
		                                    <th width="400">Title</th>
		                                    <th>Content</th>
											<th>Thumbnail</th>
		                                    <th>Status</th>
		                                    <th width="100">Action</th>
		                                </tr>
		                            </thead>
		                            <tbody id="tbody">
										@php $no = 1; @endphp
										@foreach ($sublink as $sub)
		                                <tr>
											<td>{{ $no++ }}</td>
											<td>{{ $sub->title }}</td>
											<td><a href="{{ route('admin-sublinkContent', ['id' => $sub->id]) }}" class="text-success" rel="noopener noreferrer">view</a></td>
											<td><a href="{{ asset('Uploads/Sublink/thumbnail/' . $sub->thumbnail) }}" class="text-warning" target="_blank" rel="noopener noreferrer">view</a></td>
											<td><span class="badge badge-{{ $sub->status == 1 ? 'success' : 'danger'}}">{{ $sub->status == 1 ? 'active' : 'inactive'}}</span></td>
		                                	<td>
												<a href="#" class="btn button-sm gray copy-link" data-clipboard-text="{{ route('view-sublink-content', ['id' => $sub->id]) }}">
													<i class="fa fa-copy"></i>
												</a>
		                                		<a href="{{ route('admin-editSublink', ['id' => $sub->id]) }}" class="btn button-sm gray">
		                                			<i class="fa fa-pencil"></i>
		                                		</a>
		                                		<button id="{{ $sub->id }}" onclick="deletethis(this.id, 'Sublink')" class="btn button-sm red">
		                                			<i class="fa fa-trash"></i>
		                                		</button>
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