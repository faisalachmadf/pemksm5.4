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
             <div class="col-lg-2 col-xs-4">
              <!-- small box -->

                  <center> <a href="{{ route('MitraDalamNegeri.detail', $provinsi->slug) }}"><img src="{{ asset('image/mitradn/thumbnail/'.$provinsi->gambar) }}" class="img-kabkot img-thumbnail" alt="{{ $provinsi->judul }}" style="margin-top: 10px;"></a></center>
                 
                  
              <div class="inner">
                  <br/>
                <h6>{{ strtoupper($provinsi->judul) }}</h6>
                </div>
              <br>
            
              
              <!-- /.modal -->    
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
            <div class="col-lg-2 col-xs-4">
              <!-- small box -->

                  <center><a href="{{ route('MitraDalamNegeri.detail', $kabkot->slug) }}">
                    <img src="{{ asset('image/mitradn/thumbnail/'.$kabkot->gambar) }}" alt="{{ $kabkot->judul }}" class="img-kabkot img-thumbnail">
                  </a></center>
                 

               <div class="inner">
                  <br/>
                <font color="brown"><h6><center>{{ strtoupper($kabkot->judul) }}</center></h6></font>
                </div>
                <br>
              
              </a>
            

               
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
             <div class="col-lg-2 col-xs-4">
              <!-- small box -->

                  <center> <a href="{{ route('MitraDalamNegeri.detail', $pihakketiga->slug) }}"><img src="{{ asset('image/mitradn/thumbnail/'.$pihakketiga->gambar) }}" class="img-kabkot img-thumbnail" alt="{{ $pihakketiga->judul }}" ></a></center>
                 

                <div class="inner">
                  <br/>
                 <h6>{{ strtoupper($pihakketiga->judul) }}</h6>
                </div>
                <br>
            
              

                
            </div>
          @endforeach
          </div>
          <hr/>
        </div>
      </div>
		
	  	</div>    
 </div>    
@endsection
