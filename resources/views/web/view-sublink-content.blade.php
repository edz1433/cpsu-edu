
@extends('web.layouts.mainlayout')
@include('web.layouts.sidebar')
@section('content')
<style>
    .article-content img {
        max-width: 100%;
        display: block; 
        margin: 10px;
    }
</style>
<div class="page-content bg-white">
	<div class="page-banner ovbl-dark" style="background-image:url({{ $sublink->thumbnail == '' ? asset('Uploads/default-thumbnail.png') : asset("Uploads/Sublink/thumbnail/{$sublink->thumbnail}") }}); margin-top: 10%;">
		<div class="container">
			<div class="page-banner-entry">
				<h1 class="text-white">{{$sublink->title}}</h1>
			 </div>
		</div>
	</div>
	<div class="breadcrumb-row">
		<div class="container-custom">
			<ul class="list-inline">
				<li><a href="#">Home</a></li>
				@if($sublink->title == "Transparency Seal")
				<li>{{ $sublink->title }}</li>
				@else
				<li>Administration</li>
				<li>Sublink</li>
				@endif
			</ul>
		</div>
	</div>
	<div class="content-block">

		<!-- Popular Courses -->
		<div class="section-area section-sp2 popular-courses-bx" style="margin-top: -60px;">
			<div class="container-custom">
				<div class="row">
					<div class="col-lg-8 col-md-7 col-sm-12">
						<div class="courses-post">
							<div class="ttr-post-info">
								<div class="ttr-post-title text-center">
									<h2 class="post-title">{{$sublink->title}}</h2>
								</div>
								<div class="ttr-post-text text-justify article-content">
									<p>
										@php $content = file_get_contents('Uploads/Sublink/content/'.$sublink->content); @endphp
										{!! $content !!}
									</p>
								</div>
							</div>
						</div>
					</div>
					<!-- sideabr -->
					@yield('sidebar')
					<!-- sidebar end -->
				</div>
			</div>
		</div>
	</div>
@endsection