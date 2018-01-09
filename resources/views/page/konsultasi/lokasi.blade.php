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
                             <p>&nbsp</p>
                             <p>&nbsp</p>
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
