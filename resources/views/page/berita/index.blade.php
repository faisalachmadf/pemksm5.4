@extends('frame_depan.frame')


@section('content')
 <div class="banner two">
    <div class="container"> 
	    <h2 class="inner-tittle">BERITA</h2>  
    </div>
 </div>
    
 <div class="main-content">
	    <div class="container">

              <div class="col-md-8 mag-innert-left">

	                            <div class="banner-bottom-left-grids">

	                            	Kategori Berita:<br/><br/>
	                            	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
					                <h6>Semua Berita</h6> 
					              </button> 
					              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">
					                <h6>Berita Umum </h6> 
					              </button> 
					              <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-warning">
					                <h6>Berita Urusan Pemerintahan Daerah </h6> 
					              </button> 
					              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-success">
					                <h6>Berita Tata Pemerintahan </h6> 
					              </button> 
					              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
					                <h6>Berita Kerja Sama </h6> 
					              </button> 
					             <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
					                <h6>Artikel</h6> 
					              </button> 
					              <hr/>


									<div class="single-left-grid">
										<img src="/temafrontend/images/single.jpg" alt="">
											<h4>Aliquam dapibus tincidunt metus. Praesent justo dolor, lobortis quis, lobortis dignissim, pulvinar ac, lorem.</h4>
												<p class="text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem. Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. Donec sit amet eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus.</p>
												<h4>Vestibulum urna nulla, ultrices ut suscipit vel, suscipit vitae nunc. Quisque nec velit et nibh ultrices molestie.</h4>
												<p class="text">Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse sem neque.Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse sem neque</p>
											
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
