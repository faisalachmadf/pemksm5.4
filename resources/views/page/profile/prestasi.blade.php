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
											 <!-- Share Media Sosial dan Print -->
                                      <hr/><h6>Bagikan :</h6><br/>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://www.facebook.com/sharer.php?u={{ route('prestasi.index') }}'>
                                    <img src='http://syam.eu.org/icon/fb.jpg' alt='' width='30' height='30'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://twitter.com/share?url={{ route('prestasi.index') }}'>
                                    <img src='http://syam.eu.org/icon/tw.jpg' alt='' width='30' height='30'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://plus.google.com/share?url={{ route('prestasi.index') }}'>
                                     <img src='http://syam.eu.org/icon/g.jpg' alt='' width='30' height='30'></a>
                                    | &nbsp<a href="#" onclick="window.print()"><img src="/temafrontend/images/print.png" alt='' width='50' height='50'></a>	
			  </div>
			  @include('frame_depan.kanan', @$kanan ? $kanan : [])
	  	</div>    
 </div>    
@endsection
