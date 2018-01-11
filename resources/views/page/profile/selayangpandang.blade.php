@extends('frame_depan.frame')


@section('content')
 <div class="banner two">
    <div class="container">
	    <h2 class="inner-tittle">{{ @$selayang->judul }}</h2>
    </div>
 </div>
    
 <div class="main-content">
	    <div class="container">

              <div class="col-md-8 mag-innert-left">

 						

	                            <div class="banner-bottom-left-grids">
									<div class="single-left-grid">
											<p>{!! @$selayang->isi !!}</p>
											 <!-- Share Media Sosial dan Print -->
                                      <hr/><h6>Bagikan :</h6><br/>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://www.facebook.com/sharer.php?u={{ route('Selayang-Pandang.index') }}'>
                                    <img src='http://syam.eu.org/icon/fb.jpg' alt='' width='30' height='30'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://twitter.com/share?url={{ route('Selayang-Pandang.index') }}'>
                                    <img src='http://syam.eu.org/icon/tw.jpg' alt='' width='30' height='30'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://plus.google.com/share?url={{ route('Selayang-Pandang.index') }}'>
                                     <img src='http://syam.eu.org/icon/g.jpg' alt='' width='30' height='30'></a>
                                    | &nbsp<a href="#" onclick="window.print()"><img src="/temafrontend/images/print.png" alt='' width='50' height='50'></a>

									 </div>
								</div>
									
			  </div>
			  @include('frame_depan.kanan', @$kanan ? $kanan : [])
	  	</div>    
 </div>    
@endsection
