@extends('frame_depan.frame')


@section('content')
 <div class="banner two">
    <div class="container">
	    <h2 class="inner-tittle">Prestasi</h2>
    </div>
 </div>
    
 <div class="main-content">
	    <div class="container">

              <div class="col-md-8 mag-innert-left">
 
                            <!-- Di isi dengan tabel beritas kategori urusan pemerintahan daerah -->
                             @foreach($prestasis as $prestasi)
                            <div class="technology">
                            <div class="editor-pics">
                            	<div class="edit-pics">
                                <div class="col-md-5 item-pic">
                                     <img src="{{ asset('image/prestasi/'.$prestasi->gambar) }}" class="img-responsive img-banner" alt="{{ $prestasi->judul }}" width="20px" />
                                </div>
                                <div class="col-md-7 item-details">
                                    <h4><p>{{ @$prestasi->judul }}</p></h4>
                                     <br/>
                                     <div class="td-post-date two">
                                     <p>{!! @$prestasi->isi !!}</p>
                                     </div>

                                  
                                    <h5 class="inner two"></h5>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

					@endforeach	
											
											<!-- Komentar -->
											<div class="single-bottom">
													<ul>
														<li><a href="#">Designer inspiration</a></li>
														<li>August 30 2015</li>
														<li><a href="#">Admin</a></li>
														<li><a href="#">5 Comments</a></li>
													</ul>
											</div>			
			  </div>
			  @include('frame_depan.kanan', @$kanan ? $kanan : [])
	  	</div>    
 </div>    
@endsection
