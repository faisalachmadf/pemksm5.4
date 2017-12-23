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


									 <!--/start-Technology-->
                        <div class="technology">
                         
                            <!-- Di isi dengan tabel beritas kategori urusan pemerintahan daerah -->
                            
                            <div class="editor-pics">
                                <div class="col-md-5 item-pic">

                                   di isi dengan gambar

                                </div>
                                <div class="col-md-7 item-details">
                                   <h3 class="inner two">di isi dengan judul</h3>
                                    <p><h6>
                                    di isi dengan tanggal, pengupload dan di baca</h6></p>
                                    <hr/>
                                    di isi dengan isi
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <hr/>
                          
                            <div class="clearfix"></div>
                            
                            <br/><br/>
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
              @include('frame_depan.kanan', @$kanan ? $kanan : [])
        </div>
    </div>   
@endsection
