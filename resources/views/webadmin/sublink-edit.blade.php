@extends('webadmin.layouts.mainlayout')

@section('content')

<main class="ttr-wrapper">

	<div class="floating-div" id="myDiv">
		<table>
			
		</table>
		<div class="resize-handle" id="resizeHandle">
        
		</div>
    </div>
	<div class="container-fluid">
		<div class="db-breadcrumb">
			<h4 class="breadcrumb-title">Sub Link</h4>
			<ul class="db-breadcrumb-list">
				<li><a href="#"><i class="fa fa-home"></i>Dashboard</a></li>
				<li>Edit</li>
			</ul>
		</div>	
		<div class="row">
			
			<div style="margin-left: 97%">
				<i class="fa fa-eye fa-lg" id="toggleButton"></i>
			</div>
			<!-- Your Profile Views Chart -->
			<div class="col-lg-12 m-b30">
				<div class="widget-box">
					<div class="email-wrapper">
						<div class="mail-list-container">
							<form class="mail-compose" action="{{ route('admin-updateSublink', ['id' => $sublink->id]) }}" method="post" enctype="multipart/form-data">
								@csrf
								<div class="form-group row">
								  <div class="col-12 col-md-12">
									<label for="title">Title</label>
									<input class="form-control" name="title" value="{{  $sublink->title }}" type="text" placeholder="Title">
								  </div>
								</div>
								<div class="form-group row">
								  <div class="form-group col-12">
									<label for="content">Content</label>
									<div class="summernote">
										<p>
											@php $content = file_get_contents('Uploads/Sublink/content/'.$sublink->content); @endphp
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
										<img src="{{ $sublink->thumbnail == '' ? asset('Uploads/default-thumbnail.png') : asset("Uploads/Sublink/thumbnail/{$sublink->thumbnail}") }}" alt="Default Thumbnail" width="100%">
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