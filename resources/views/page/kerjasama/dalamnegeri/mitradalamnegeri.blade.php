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

                  <center><img src="{{ asset('image/mitradn/thumbnail/'.$provinsi->gambar) }}" class="img-responsive img-thumbnail wp-post-image" alt="{{ $provinsi->judul }}" style="margin-top: 10px;"></center>
                 
                  
              <div class="inner">
                  <br/>
                <h5>{{ strtoupper($provinsi->judul) }}</h5>
                </div>
              <br>
                  <button type="button" class="btn btn-info">
               <h6>Selengkapnya</h6>
              </button>
             
              <!-- Modal
               <div class="modal fade" id="modal-info">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                       <center> <h4 class="modal-title">{{ strtoupper($provinsi->judul) }}</h4>  </center>
                    </div>
                    <div class="modal-body">
                       <center><img src="{{ asset('image/mitradn/thumbnail/'.$provinsi->gambar) }}" class="img-responsive img-thumbnail wp-post-image" alt="{{ $provinsi->judul }}" ></center><br>
                      <p>{!! $provinsi->isi !!}</p>
                    </div>
                    <div class="modal-footer">
                     <h6>di upload oleh :  <i class="glyphicon glyphicon-user"></i> {{ generateUser($provinsi->user) }} </h6> 
                    </div>
                  </div>
                  /.modal-content 
                </div>
             /.modal-dialog 
              </div>
              -->

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
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->

                  <center><img src="{{ asset('image/mitradn/thumbnail/'.$kabkot->gambar) }}" class="img-responsive img-thumbnail wp-post-image" alt="{{ $kabkot->judul }}" ></center>
                 

               <div class="inner">
                  <br/>
                <h5>{{ strtoupper($kabkot->judul) }}</h5>
                </div>
                <br>
                  <button type="button" class="btn btn-info" >
               <h6>Selengkapnya</h6>
              </button>
            

               
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
                 

                <div class="inner">
                  <br/>
                 <h5>{{ strtoupper($pihakketiga->judul) }}</h5>
                </div>
                <br>
                  <button type="button" class="btn btn-info" ">
               <h6>Selengkapnya</h6>
              </button>
              

                
            </div>
          @endforeach
          </div>
          <hr/>
        </div>
      </div>
		
	  	</div>    
 </div>    
@endsection
