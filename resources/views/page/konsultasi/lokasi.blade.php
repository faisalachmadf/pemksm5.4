@extends('frame_depan.frame')


@section('content')
    <div class="banner two">
        <div class="container"> 
            <h2 class="inner-tittle">Lokasi Kami</h2>
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

                               <div class="peta-responsive">
                               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.900380904207!2d107.6165933143177!3d-6.9025156950124416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e64c5e8866e5%3A0x37be7ac9d575f7ed!2sGedung+Sate!5e0!3m2!1sen!2sid!4v1515469892608" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
                             </div>
                             <hr/>
                             <h3>Biro Pemerintahan dan Kerja Sama</h3>
                             <h4> Sekretariat Daerah Provinsi Jawa Barat </h4>
                             <br/>
                             <p>Alamat Jl. Diponegoro No. 22 Bandung</p>
                             <p>Telp : (022) 4231161</p>
                             <p>email : biropemkes@jabarprov.go.id, biropemksm@gmail.com</p>
                             <p>&nbsp</p>
                             <a href="https://www.facebook.com/pemksm"><img src="/temafrontend/images/fb.png" width="40px" height="40px"/> &nbsp Facebook</a> |
              <a href="https://twitter.com/pemksm_jabar"><img src="/temafrontend/images/twit.png" width="30px" height="30px"/> &nbsp Twiter </a>|
              <a href="https://www.instagram.com/biropemksmjabar/"><img src="/temafrontend/images/ig.png" width="30px" height="30px"/> &nbsp Instagram</a>
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
