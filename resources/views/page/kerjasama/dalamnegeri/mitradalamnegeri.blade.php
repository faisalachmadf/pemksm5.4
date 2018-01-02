@extends('frame_depan.frame')


@section('content')
 <div class="banner two">
    <div class="container">
	    <h2 class="inner-tittle">Mitra Kerja Sama Dalam Negeri</h2>
    </div>
 </div>
    
 <div class="main-content">
	    <div class="container">
	    	   
  <!-- untuk Provinsi -->
        <div class="col-md-12">
          <br/>
          <h3><font color="green"><b><center>PROVINSI</center> </b></font> </h3>
                <br/><br/>
          <div class="row">
          @foreach($provinsis as $provinsi)
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->

                  <center><img src="{{ asset('image/mitradn/thumbnail/'.$provinsi->gambar) }}" class="img-responsive img-thumbnail wp-post-image" alt="{{ $provinsi->judul }}" ></center>
                 

                <center><div class="inner">
                  <br/>
                  <p>{{ strtoupper($provinsi->judul) }}</p>
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
          
          <h3><font color="green"><b><center>KABUPATEN/KOTA DI JAWA BARAT</center> </b></font> </h3>
                <br/><br/>
          <div class="row">
          @foreach($kabkots as $kabkot)
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->

                  <center><img src="{{ asset('image/mitradn/thumbnail/'.$kabkot->gambar) }}" class="img-responsive img-thumbnail wp-post-image" alt="{{ $kabkot->judul }}" ></center>
                 

                <center><div class="inner">
                  <br/>
                  <p>{{ strtoupper($kabkot->judul) }}</p>
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
          
          <h3><font color="green"><b><center>PIHAK KETIGA</center> </b></font> </h3>
                <br/><br/>
          <div class="row">
          @foreach($pihakketigas as $pihakketiga)
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->

                  <center><img src="{{ asset('image/mitradn/thumbnail/'.$pihakketiga->gambar) }}" class="img-responsive img-thumbnail wp-post-image" alt="{{ $pihakketiga->judul }}" ></center>
                 

                <center><div class="inner">
                  <br/>
                  <p>{{ strtoupper($pihakketiga->judul) }}</p>
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
