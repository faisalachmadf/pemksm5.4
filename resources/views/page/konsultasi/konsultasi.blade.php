@extends('frame_depan.frame')


@section('content')
    <div class="banner two">
        <div class="container"> 
            <h2 class="inner-tittle">Form Konsultasi</h2>
        </div>
    </div>
    
    <div class="main-content">
        <div class="container">
            <div class="col-md-8 mag-innert-left">
                <div class="banner-bottom-left-grids">
                    <br/>
                    

                    <!--/Show dari Kelembagaan-->
                    <div class="technology">
                      
                        <div class="editor-pics">
                            <div class="item-details">

                              
                              <iframe src="https://docs.google.com/forms/d/e/1FAIpQLScfIF-4uZiElNP2K7Sw6x12Mk39Vvhp-u3KFhzqE7U1yYu7BQ/viewform?embedded=true" width="100%" height="1600" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
                            
                             <h3>Biro Pemerintahan dan Kerja Sama</h3>
                             <h4> Sekretariat Daerah Provinsi Jawa Barat </h4>
                             <br/>
                             <p>Alamat Jl. Diponegoro No. 22 Bandung</p>
                             <p>Telp : (022) 4231161</p>
                             <p>email : biropemkes@jabarprov.go.id, biropemksm@gmail.com</p>
                             <p>&nbsp</p>
                             <a href="https://www.facebook.com/pemksm"><img src="/pemksm5.4/public/temafrontend/images/fb.png" width="40px" height="40px"/> &nbsp Facebook</a> |
              <a href="https://twitter.com/pemksm_jabar"><img src="/pemksm5.4/public/temafrontend/images/twit.png" width="30px" height="30px"/> &nbsp Twiter </a>|
              <a href="https://www.instagram.com/biropemksmjabar/"><img src="/pemksm5.4/public/temafrontend/images/ig.png" width="30px" height="30px"/> &nbsp Instagram</a>
                             <p>&nbsp</p>
                             <p>&nbsp</p>

                               <hr/><h6>Bagikan : </h6>
                                <a href="whatsapp://send?text={{ route('Lokasi') }}" 
                                        data-action="share/whatsapp/share">
                                        <img src='/temafrontend/images/wa.png' alt='' width='40' height='40'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://www.facebook.com/sharer.php?u={{ route('Lokasi') }}'>
                                    <img src='/temafrontend/images/logofb.png' alt='' width='50' height='50'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://twitter.com/share?url={{ route('Lokasi') }}'>
                                   <img src='/temafrontend/images/logotwitter.png' alt='' width='40' height='40'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://plus.google.com/share?url={{ route('Lokasi') }}'>
                                     <img src='/temafrontend/images/logogoogle.png' alt='' width='35' height='35'></a>
                                    | &nbsp<a href="#" onclick="window.print()"><img src="/temafrontend/images/print.png" alt='' width='50' height='50'></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                      
                        <div class="clearfix"></div>
                    </div>
                </div>

                <!--Komentar-->
               
            </div>
            @include('frame_depan.kanan', @$kanan ? $kanan : [])
        </div>
    </div>   
@endsection
