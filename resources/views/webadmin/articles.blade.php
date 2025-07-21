@extends('webadmin.layouts.mainlayout')
@include('webadmin.layouts.header')
@include('webadmin.layouts.sidebar')

@section('content')
<main class="ttr-wrapper">
	<div class="container-fluid">
		<div class="db-breadcrumb">
			<h4 class="breadcrumb-title">Articles</h4>
			<ul class="db-breadcrumb-list">
				<li><a href="#"><i class="fa fa-home"></i>Dashboard</a></li>
				<li>Articles</li>
			</ul>
		</div>	
		<div class="row">
			<div class="col-lg-12 m-b30">
				<div class="widget-box">
					<div class="wrapper">
						<div class="container pt-4">
							<a href="{{ route('admin-createArticles') }}" class="btn default-success mb-2 float-right">+ <i class="ti-book"></i></a>
							<div class="table-responsive">
		                        <table id="example1" class="table table-bordered table-hover">
		                            <thead>
		                                <tr>
											<th>#</th>
		                                    <th>Title</th>
		                                    <th>Content</th>
											<th>Thumbnail</th>
		                                    <th>Status</th>
		                                    <th>Action</th>
		                                </tr>
		                            </thead>
		                            <tbody id="tbody">
										@php $no = 1; @endphp
										@foreach ($article as $art)
		                                <tr>
											<td>{{ $no++ }}</td>
											<td>{{ $art->title }}</td>
											<td><a href="{{ route('admin-articleContent', ['id' => $art->id]) }}" class="text-success" rel="noopener noreferrer">view</a></td>
											<td><a href="{{ asset('Uploads/News/thumbnail/' . $art->thumbnail) }}" class="text-warning" target="_blank" rel="noopener noreferrer">view</a></td>
											<td><span class="badge badge-{{ $art->status == 1 ? 'success' : 'danger'}}">{{ $art->status == 1 ? 'active' : 'inactive'}}</span></td>
		                                	<td>
		                                		<a href="{{ route('admin-editArticles', ['id' => $art->id]) }}" class="btn button-sm gray">
		                                			<i class="fa fa-pencil"></i>
		                                		</a>
		                                		<button id="{{ $art->id }}" onclick="deletethis(this.id, 'Article')" class="btn button-sm red">
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