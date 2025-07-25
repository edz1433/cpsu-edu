@extends('web.layouts.mainlayout')
{{-- @include('web.layouts.sidebar') --}}
@section('content')
@php
$current_route = request()->route()->getName();

// Normalize and extract significant keywords from title
$keywords = collect(explode(' ', strtolower($article->title)))
    ->filter(fn($word) => strlen($word) > 3)
    ->values();

$relatedArticles = $articles
    ->filter(function ($art) use ($keywords, $article) {
        if ($art->id === $article->id) return false;

        // Count how many keywords appear in the title (case-insensitive)
        $titleLower = strtolower($art->title);
        $matchCount = $keywords->filter(fn($keyword) => str_contains($titleLower, $keyword))->count();

        return $matchCount > 0;
    })
    // Rank by number of keyword matches
    ->sortByDesc(function ($art) use ($keywords) {
        $titleLower = strtolower($art->title);
        return $keywords->filter(fn($keyword) => str_contains($titleLower, $keyword))->count();
    })
    ->take(3);
@endphp
<section id="corses-singel" class="pt-40 pb-120" style="background-image: url('{{ asset('images/bg-article.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; padding: 30px;">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				@php
					$thumbnail = $article->thumbnail == '' 
						? asset('Uploads/default-thumbnail.png') 
						: asset("Uploads/News/thumbnail/{$article->thumbnail}");

					// Load and clean content
					$content = file_get_contents('Uploads/News/content/' . $article->content);

					// Remove all <img> tags, even with newlines or spaces
					$content = preg_replace('/<img\b[^>]*>(?:<\/img>)?/i', '', $content);
				@endphp

				<div class="corses-singel-left" style="background-color: transparent !important;">
					<div class="corses-singel-image">
						<img src="{{ $thumbnail }}" alt="Courses">
					</div>

					<div class="title pt-2">
						<h5>{{ $article->title }}</h5>
					</div> 
					<p class="pb-2">June 20, 2025</p>
					<p>{!! $content !!}</p>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="row">
					<div class="col-lg-12 col-md-6">
						<div class="course-features" style="background-color: transparent !important;">
							<h4>RECENT NEWS</h4>

							@foreach ($articles->take(10) as $art)
								<p>
									<a href="{{ route('view-article', ['id' => $art->id]) }}" style="color: inherit; text-decoration: none;">
										{{ $art->title }}
									</a>
								</p><br>
							@endforeach

						</div> <!-- course features -->
					</div>
				</div>
			</div>
		</div> <!-- row -->
		<div class="row">
			<div class="col-lg-8">
				<div class="releted-courses pt-95">
					<div class="row d-flex align-items-stretch">
						<div class="col-12">
							<h5>RELATED ARTICLE</h5>
						</div>

						@foreach ($relatedArticles as $related)
							@php
								$thumbnail = $related->thumbnail == '' 
									? asset('Uploads/default-thumbnail.png') 
									: asset("Uploads/News/thumbnail/{$related->thumbnail}");
							@endphp

							<div class="col-md-6 d-flex">
								<div class="singel-course mt-30 w-100 d-flex flex-column">
									<div class="thum">
										<div class="image">
											<a href="{{ route('view-article', ['id' => $related->id]) }}">
												<img src="{{ $thumbnail }}" alt="Related Article" class="img-fluid w-100" style="height: 200px; object-fit: cover;">
											</a>
										</div>
									</div>
									<div class="cont p-3 d-flex flex-column justify-content-between" style="flex-grow: 1;">
										<a href="{{ route('view-article', ['id' => $related->id]) }}">
											<h6 style="font-size: 16px; line-height: 1.4; margin: 0;">
												{{ $related->title }}
											</h6>
										</a>
									</div>
								</div> <!-- singel course -->
							</div>
						@endforeach

					</div> <!-- row -->
				</div> <!-- releted courses -->
			</div>
		</div>
	</div>
</section>

@endsection
