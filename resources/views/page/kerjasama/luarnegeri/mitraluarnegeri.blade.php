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
                 
<div class="inner">
                  <br/>
                <h5>{{ strtoupper($pemerintahan->judul) }}</h5>
                </div>
              <br>
              <a href="{{ route('MitraLuarNegeri.detail', $pemerintahan->slug) }}" class="btn btn-info">
               <h6>Selengkapnya &raquo;&raquo;</h6>
              </a>
             
              <!-- Modal
               <div class="modal fade" id="modal-info">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                       <center> <h4 class="modal-title">{{ strtoupper($pemerintahan->judul) }}</h4>  </center>
                    </div>
                    <div class="modal-body">
                       <center><img src="{{ asset('image/mitradn/thumbnail/'.$pemerintahan->gambar) }}" class="img-responsive img-thumbnail wp-post-image" alt="{{ $pemerintahan->judul }}" ></center><br>
                      <p>{!! $pemerintahan->isi !!}</p>
                    </div>
                    <div class="modal-footer">
                     <h6>di upload oleh :  <i class="glyphicon glyphicon-user"></i> {{ generateUser($pemerintahan->user) }} </h6> 
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
          
          <h3><font color="blue"><b><center>LEMBAGA DI LUAR NEGERI</center> </b></font> </h3>
                <br/><br/>
          <div class="row">
          @foreach($lembagas as $lembaga)
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->

                  <center><img src="{{ asset('image/mitraln/thumbnail/'.$lembaga->gambar) }}" class="img-responsive img-thumbnail wp-post-image" alt="{{ $lembaga->judul }}" ></center>
                 

                <div class="inner">
                  <br/>
                <h5>{{ strtoupper($lembaga->judul) }}</h5>
                </div>
              <br>
              <a href="{{ route('MitraLuarNegeri.detail', $lembaga->slug) }}" class="btn btn-info">
               <h6>Selengkapnya &raquo;&raquo;</h6>
              </a>
             
              <!-- Modal
               <div class="modal fade" id="modal-info">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                       <center> <h4 class="modal-title">{{ strtoupper($lembaga->judul) }}</h4>  </center>
                    </div>
                    <div class="modal-body">
                       <center><img src="{{ asset('image/mitradn/thumbnail/'.$lembaga->gambar) }}" class="img-responsive img-thumbnail wp-post-image" alt="{{ $lembaga->judul }}" ></center><br>
                      <p>{!! $lembaga->isi !!}</p>
                    </div>
                    <div class="modal-footer">
                     <h6>di upload oleh :  <i class="glyphicon glyphicon-user"></i> {{ generateUser($lembaga->user) }} </h6> 
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

          <!-- untuk Pihak Ketiga -->
        <div class="col-md-12">
          
          <h3><font color="blue"><b><center>SWASTA DI LUAR NEGERI</center> </b></font> </h3>
                <br/><br/>
          <div class="row">
          @foreach($swastas as $swasta)
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->

                  <center><img src="{{ asset('image/mitraln/thumbnail/'.$swasta->gambar) }}" class="img-responsive img-thumbnail wp-post-image" alt="{{ $swasta->judul }}" ></center>
                 

                <div class="inner">
                  <br/>
                <h5>{{ strtoupper($swasta->judul) }}</h5>
                </div>
              <br>
              <a href="{{ route('MitraLuarNegeri.detail', $swasta->slug) }}" class="btn btn-info">
               <h6>Selengkapnya &raquo;&raquo;</h6>
              </a>

              
            </div>
          @endforeach
          </div>
          <hr/>
        </div>
      </div>
    
      </div>    
 </div>    
@endsection
