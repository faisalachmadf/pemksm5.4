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
              <div class="col-lg-2 col-xs-4">
              <!-- small box -->

                  <center><a href="{{ route('MitraLuarNegeri.detail', $pemerintahan->slug) }}" target="_blank"><img src="{{ asset('image/mitraln/thumbnail/'.$pemerintahan->gambar) }}" class="img-kabkot img-thumbnail" alt="{{ $pemerintahan->judul }}" ></a></center>
                 
<div class="inner">
                  <br/>
                <h6><center>{{ strtoupper($pemerintahan->judul) }}</center></h6>
                </div>
              <br>
             
             
                
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
            <div class="col-lg-2 col-xs-4">
              <!-- small box -->

                  <center><a href="{{ route('MitraLuarNegeri.detail', $lembaga->slug) }}" target="_blank"><img src="{{ asset('image/mitraln/thumbnail/'.$lembaga->gambar) }}" class="img-kabkot img-thumbnail" alt="{{ $lembaga->judul }}" ></a></center>
                 

                <div class="inner">
                  <br/>
                <h6><center>{{ strtoupper($lembaga->judul) }}</center></h6>
                </div>
              <br>
            
             
            
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
            <div class="col-lg-2 col-xs-4">
              <!-- small box -->

                  <center> <a href="{{ route('MitraLuarNegeri.detail', $swasta->slug) }}" target="_blank"><img src="{{ asset('image/mitraln/thumbnail/'.$swasta->gambar) }}" class="img-kabkot img-thumbnail" alt="{{ $swasta->judul }}" ></a></center>
                 

                <div class="inner">
                  <br/>
                <h6><center>{{ strtoupper($swasta->judul) }}</center></h6>
                </div>
              <br>
            

              
            </div>
          @endforeach
          </div>
            <hr/><h6>Bagikan :</h6><br/>
                                       <a href="whatsapp://send?text={{ route('MitraLuarNegeri') }}" 
                                        data-action="share/whatsapp/share">
                                        <img src='/temafrontend/images/wa.png' alt='' width='40' height='40'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://www.facebook.com/sharer.php?u={{ route('MitraLuarNegeri') }}'>
                                     <img src='/temafrontend/images/logofb.png' alt='' width='50' height='50'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://twitter.com/share?url={{ route('MitraLuarNegeri') }}'>
                                   <img src='/temafrontend/images/logotwitter.png' alt='' width='40' height='40'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://plus.google.com/share?url={{ route('MitraLuarNegeri') }}'>
                                    <img src='/temafrontend/images/logogoogle.png' alt='' width='35' height='35'></a>
                                    | &nbsp<a href="#" onclick="window.print()"><img src="/temafrontend/images/print.png" alt='' width='50' height='50'></a>
        </div>
      </div>
    
      </div>    
 </div>    
@endsection
