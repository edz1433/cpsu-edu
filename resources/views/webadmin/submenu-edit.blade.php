@extends('webadmin.layouts.mainlayout')

@section('content')

<main class="ttr-wrapper">
	<div class="container-fluid">
		<div class="db-breadcrumb">
			<h4 class="breadcrumb-title">Sub Menu</h4>
			<ul class="db-breadcrumb-list">
				<li><a href="{{ route('admin-dashboard') }}"><i class="fa fa-home"></i>Dashboard</a></li>
				<li>Sub Menu</li>
				<li>Edit</li>
			</ul>
		</div>	
		<div class="row">
			<!-- Your Profile Views Chart -->
			<div class="col-lg-12 m-b30">
				<div class="widget-box">
					<div class="email-wrapper">
						<div class="mail-list-container">
							<form class="mail-compose" action="{{ route('admin-updateSubmenu', ['id' => $submenu->id]) }}" method="post" enctype="multipart/form-data">
								@csrf
								<div class="form-group row">
								  <div class="col-12 col-md-6">
									<label for="title">Title</label>
									<input class="form-control" name="title" type="text" value="{{ $submenu->title }}" placeholder="Title">
								  </div>
								  <div class="col-12 col-md-6">
									<label for="category">Category</label>
									<select class="form-control" name="category" placeholder="Category">
									@foreach ($category as $cat)
										<option value="{{ $cat->id }}" @if($submenu->Category == $cat->id) selected @endif>{{ $cat->cat_name }}</option>
									@endforeach
									  {{-- <option>Administration</option>
									  <option>Academic</option>
									  <option>Support to Services</option>
									  <option>Research & Extension</option>
									  <option>Procurement</option>
									  <option>About</option> --}}
									</select>
								  </div>
								</div>
								<div class="form-group row">
								  <div class="form-group col-12">
									<label for="content">Content</label>
									<div class="summernote">
										<p>
											@php $content = file_get_contents('Uploads/Submenu/content/'.$submenu->content); @endphp
											{!! $content !!}
										</p>
									</div>
									<textarea id="summernote-textarea" name="content" style="display: none;">{!! $content !!}</textarea>
								  </div>
								</div>
								<div class="form-group row">
									<div class="form-group col-12">
										<label for="thumbnail">Thumbnail</label>
										<input class="form-control" type="file" name="thumbnail" accept="image/*">
										<img src="{{ $submenu->thumbnail == '' ? asset('Uploads/default-thumbnail.png') : asset("Uploads/Submenu/thumbnail/{$submenu->thumbnail}") }}" alt="Default Thumbnail" width="100%">
									</div>
								</div>
								{{--<div class="form-group row">
									<div class="form-group col-12">
										<label for="images">Images</label>
										<input type="file" name="images[]" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
									</div>
								</div> --}}
								<div class="form-group col-12">
									<button type="submit" class="btn btn-lg bg-success text-light float-right">
										<li class="fa fa-save"></li> Save
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