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
											{!! @$selayang->isi !!}
											 <!-- Share Media Sosial dan Print -->
                                     

									 </div>
								</div>
								 <hr/><h6>Bagikan :</h6><br/>
                                       <a href="whatsapp://send?text={{ route('Selayang-Pandang.index') }}" 
										data-action="share/whatsapp/share">
										<img src='/pemksm5.4/public/temafrontend/images/wa.png' ></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://www.facebook.com/sharer.php?u={{ route('Selayang-Pandang.index') }}'>
                                     <img src='/pemksm5.4/public/temafrontend/images/logofb.png' alt='' width='50' height='50'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://twitter.com/share?url={{ route('Selayang-Pandang.index') }}'>
                                    <img src='/pemksm5.4/public/temafrontend/images/logotwitter.png' alt='' width='40' height='40'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://plus.google.com/share?url={{ route('Selayang-Pandang.index') }}'>
                                      <img src='/pemksm5.4/public/temafrontend/images/logogoogle.png' alt='' width='35' height='35'></a>
                                    | &nbsp<a href="#" onclick="window.print()"><img src="/pemksm5.4/public/temafrontend/images/print.png" alt='' width='50' height='50'></a>	
			  </div>
			  @include('frame_depan.kanan', @$kanan ? $kanan : [])
	  	</div>    
 </div>    
@endsection
