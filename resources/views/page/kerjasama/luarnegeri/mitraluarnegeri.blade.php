@extends('frame_depan.frame')


@section('content')
 <div class="banner two">
    <div class="container">
      <h2 class="inner-tittle">Mitra Kerja Sama Luar Negeri</h2>
    </div>
 </div>
    
 <div class="main-content">
      <div class="container">
           
  <!-- untuk Provinsi -->
        <div class="col-md-12">
          <br/>
          <h3><font color="blue"><b><center>PEMERINTAHAN DI LUAR NEGERI</center> </b></font> </h3>
                <br/><br/>
          <div class="row">
          @foreach($pemerintahans as $pemerintahan)
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->

                  <center><img src="{{ asset('image/mitraln/thumbnail/'.$pemerintahan->gambar) }}" class="img-responsive img-thumbnail wp-post-image" alt="{{ $pemerintahan->judul }}" ></center>
                 

                <center><div class="inner">
                  <br/>
                  <p>{{ strtoupper($pemerintahan->judul) }}</p>
                </div>
            
                <a href="#">
                  Selengkapnya
                </a></center>

              
            </div>
          @endforeach
          </div>
          <hr/>
        </div>
      
    


          <!-- untuk kabkot -->
        <div class="col-md-12">
          
          <h3><font color="blue"><b><center>LEMBAGA DI LUAR NEGERI</center> </b></font> </h3>
                <br/><br/>
          <div class="row">
          @foreach($lembagas as $lembaga)
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->

                  <center><img src="{{ asset('image/mitraln/thumbnail/'.$lembaga->gambar) }}" class="img-responsive img-thumbnail wp-post-image" alt="{{ $lembaga->judul }}" ></center>
                 

                <center><div class="inner">
                  <br/>
                  <p>{{ strtoupper($lembaga->judul) }}</p>
                </div>
            
                <a href="#">
                  Selengkapnya
                </a></center>

              
            </div>
          @endforeach
          </div>
           <hr/>
        </div>
   

          <!-- untuk Pihak Ketiga -->
        <div class="col-md-12">
          
          <h3><font color="blue"><b><center>SWASTA DI LUAR NEGERI</center> </b></font> </h3>
                <br/><br/>
          <div class="row">
          @foreach($swastas as $swasta)
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->

                  <center><img src="{{ asset('image/mitraln/thumbnail/'.$swasta->gambar) }}" class="img-responsive img-thumbnail wp-post-image" alt="{{ $swasta->judul }}" ></center>
                 

                <center><div class="inner">
                  <br/>
                  <p>{{ strtoupper($swasta->judul) }}</p>
                </div>
            
                <a href="#">
                  Selengkapnya
                </a></center>

              
            </div>
          @endforeach
          </div>
           
        </div>
      </div>
    
      </div>    
 </div>    
@endsection
