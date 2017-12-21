@extends('frame_depan.frame')


@section('content')
 <div class="banner two">
    <div class="container"> 
    	@foreach($Selayangs as $Selayang)
	    <h2 class="inner-tittle">{{ $Selayang->judul }}</h2>  
    </div>
 </div>
    
 <div class="main-content">
	    <div class="container">

              <div class="col-md-8 mag-innert-left">

 						

	                            <div class="banner-bottom-left-grids">
									<div class="single-left-grid">

												<p>{!! $Selayang->isi !!}</p>
												
											

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
								@endforeach
									<div class="post">
											<!--Komentar-->
										<div class="leave">
											<h4>Leave a comment</h4>
											<form id="commentform">
												 <p class="comment-form-author-name"><label for="author">Name</label>
													<input id="author" type="text" value="" size="30" aria-required="true">
												 </p>
												 <p class="comment-form-email">
													<label class="email">Email</label>
													<input id="email" type="text" value="" size="30" aria-required="true">
												 </p>
												 <p class="comment-form-comment">
													<label class="comment">Comment</label>
													<textarea></textarea>
												 </p>
												 <div class="clearfix"></div>
												<p class="form-submit">
												   <input type="submit" id="submit" value="Send">
												</p>
												<div class="clearfix"></div>
											   </form>
											</div>
									</div>
			  </div>    
@endsection
