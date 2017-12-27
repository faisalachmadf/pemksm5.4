@extends('frame_depan.frame')


@section('content')
 <div class="banner two">
    <div class="container">
	    <h2 class="inner-tittle">{{ @$selayang->judul }}</h2>
    </div>
 </div>
    
 <div class="main-content">
	    <div class="container">

              <div class="col-md-12 ">

 						

	                            <div class="banner-bottom-left-grids">
									<div class="single-left-grid">
											<p>{!! @$selayang->isi !!}</p>
											<div class="single-bottom">
													<ul>
														<li><a href="#">Designer inspiration</a></li>
														<li>August 30 2015</li>
														<li><a href="#">Admin</a></li>
														<li><a href="#">5 Comments</a></li>
													</ul>
											</div>

									 </div>
								</div>
									
			  </div>
			 
	  	</div>    
 </div>    
@endsection
