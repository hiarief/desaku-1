@extends('frontend.index')
@section('berita')
<main id="content" class="mt-4">
	<div class="container-fluid">
	  <div class="row">
	<!-- start left column -->
	<div class="col-md-8">
		<!-- block start -->
			<div class="block-area">
			<!-- block title -->
			<div class="block-title-6">
				<h4 class="h5 alert alert-success">
				<span class="text-black">Latest post</span>
				</h4>
			</div>
			<!-- block content -->
		
				<div class="border-bottom-last-0 first-pt-0">
					<!--post start-->@foreach($posts  as $p)
						<article class="card card-full hover-a py-4">
							<div class="row">
									<div class="col-sm-6 col-md-12 col-lg-6">
									<!--thumbnail-->
									<div class="ratio_360-202 image-wrapper">
										<a href="{{ url('beritana/'.$p->id)  }}">
										<img class="img-fluid lazy" src="{{ asset('/data_file/'.$p->file) }}" width="250px" height="250px" alt="">
										</a>
									</div>
									</div>
									<div class="col-sm-6 col-md-12 col-lg-6">
										<div class="card-body pt-3 pt-sm-0 pt-md-3 pt-lg-0">
												<!--title-->
												<h3 class="card-title h2 h3-sm h2-md">
												<a href="{{ url('beritana/'.$p->id)  }}">{{ $p->judul }}</a>
												</h3>
												<!--author and date-->
												<div class="card-text mb-2 text-muted small">
												<span class="d-none d-sm-inline mr-1">
												<a class="font-weight-bold" href="{{ url('beritana/'.$p->id) }}">{{ $p->name }}</a>
												</span>
											<time datetime="2019-10-21">{{ $p->created_at }}</time>
												</div>
												<!--description-->
											<p class="card-text"> {!! substr($p->keterangan,0,200) !!}....</p>
												<!-- read more button -->
												<a class="btn btn-outline-primary" href="{{ url('beritana/'.$p->id)  }}">Read more</a>
										</div>
									</div>
								</div>
						</article>
						@endforeach
				</div>
			<!-- end block content -->
			</div>

		<!--end block-->
	
		<!--Pagination-->
		<div class="clearfix my-4">
		<nav class="float-left" aria-label="Page navigation example">
			{{ $posts ->links() }}
			<!--page number-->
			{{-- <ul class="pagination">
			<li class="page-item active"><span class="page-link">1</span></li>
			<li class="page-item"><a class="page-link" href="../category/category.html">2</a></li>
			<li class="page-item"><a class="page-link" href="../category/category.html">3</a></li>
			<li class="page-item"><a class="page-link" href="../category/category.html">4</a></li>
			<li class="page-item"><span class="page-link disabled">....</span></li>
			<li class="page-item"><a class="page-link" href="../category/category.html">12</a></li>
			<li class="page-item">
				<a class="page-link" href="../category/category.html" aria-label="Next" title="Next page">
				<span aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
				<span class="sr-only">Next</span>
				</a>
			</li>
			</ul> --}}
			<!--end page number-->
		</nav>
		<span class="py-2 float-right">Page {{ $posts ->total() }}<br/></span>
		</div>
		<!--end pagination-->
	</div>
  <!-- end left column -->

		<!-- start right column -->
		<aside class="col-md-4 right-sidebar-lg">
			<!-- sidebar sticky start -->
				<div class="sticky">
						<!--widget start-->
						<aside class="widget">
								<!-- block title -->
								<div class="block-title-4">
									<h4 class="h5 alert alert-success">
										<span>Most read</span>
									</h4>
								</div>
							
								<!-- block content -->
										<div class="small-post">
										<!--post list-->
										@foreach($postslimit  as $pl)
											<article class="card card-full hover-a mb-4">
												<div class="row">
												<!--thumbnail-->
												<div class="col-3 col-md-4 pr-2 pr-md-0">
													<div class="ratio_110-77 image-wrapper">
													<a href="{{ url('beritana/'.$pl->id)  }}">
														<img class="img-fluid lazy" src="{{ asset('/data_file/'.$pl->file) }}" width="80px" height="80px" alt="">
													</a>
													</div>
												</div>
												<!-- title & date -->
												<div class="col-9 col-md-8">
													<div class="card-body pt-0">
													<h3 class="card-title h6 h5-sm h6-md">
													<a href="{{ url('beritana/'.$pl->id)  }}">{{ $pl->judul }}</a>
													</h3>
													<div class="card-text small text-muted">
													<time datetime="2019-10-16">{{ $pl->created_at }}</time>
													</div>
													</div>
												</div>
												</div>
											</article>
											@endforeach			
											</div>
											
								<!--end block content-->
								<div class="gap-0"></div>
						</aside>
						<!--End widget-->

						<!-- widget start -->
						<!-- custom post -->
						<aside class="widget">
							<div class="block-title-4">
								<h4 class="h5 alert alert-success">
									<span class="text-black">Program Desa</span>
									</h4>
					
							</div>
							<!--style 2-->
							<div class="small-post">
							<!--post list-->
							<article class="card card-full hover-a mb-2">
								<div class="card-body pt-0">
								<!--title-->
								<h3 class="card-title h5">
									<a href="#">Fans celebrate in Paris after side reaches World Cup final</a>
								</h3>
								<!--date-->
								<div class="card-text small text-muted">
									<time datetime="2019-06-16">Jun 16, 2019</time>
								</div>
								</div>
							</article>
							<!--post list-->
							<article class="card card-full hover-a mb-2">
								<div class="card-body pt-0">
								<!--title-->
								<h3 class="card-title h5">
									<a href="#">5 Tips to Save Money Booking Your Next Hotel Room</a>
								</h3>
								<!--date-->
								<div class="card-text small text-muted">
									<time datetime="2019-06-16">Jun 16, 2019</time>
								</div>
								</div>
							</article>
							<!--post list-->
							<article class="card card-full hover-a mb-2">
								<div class="card-body pt-0">
								<!--title-->
								<h3 class="card-title h5">
									<a href="#">The 52 Places Traveler: Summer in France, in Two Very Different Ways</a>
								</h3>
								<!--date-->
								<div class="card-text small text-muted">
									<time datetime="2019-06-16">Jun 16, 2019</time>
								</div>
								</div>
							</article>
							<!--post list-->
							<article class="card card-full hover-a mb-2">
								<div class="card-body pt-0">
								<!--title-->
								<h3 class="card-title h5">
									<a href="#">6 Simple Tips to Help Vegetarian or Vegan Travelers Eat Well, Anywhere</a>
								</h3>
								<!--date-->
								<div class="card-text small text-muted">
									<time datetime="2019-06-16">Jun 16, 2019</time>
								</div>
								</div>
							</article>
							</div>
							<div class="gap-0"></div>
						</aside>
				</div>
			<!--end Sidebar sticky-->
		</aside>
  <!-- end right column -->
	</div>
	</div>
</main>
<!--End Content-->    


@endsection
