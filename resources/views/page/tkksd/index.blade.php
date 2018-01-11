@extends('frame_depan.frame')


@section('content')
 <div class="banner two">
    <div class="container">
        <h2 class="inner-tittle">tkksd</h2>
    </div>
 </div>
    
 <div class="main-content">
        <div class="container">

              <div class="col-md-8 mag-innert-left">
 
                            <!-- Di isi dengan tabel beritas kategori urusan pemerintahan daerah -->
                             @foreach($tkksds as $tkksd)
                            <div class="technology">
                            <div class="editor-pics">
                                <div class="edit-pics">
                                <div class="col-md-3 item-pic">
                                     <img src="{{ asset('image/tkksd/'.$tkksd->gambar) }}" class="img-responsive img-banner" alt="{{ $tkksd->judul }}" width="20px" />
                                </div>
                                <div class="col-md-9 item-details">
                                    <h4><p>{{ @$tkksd->judul }}</p></h4>
                                  
                                     <div class="td-post-date two">
                                     <p>{!! @$tkksd->isi !!}</p>
                                     </div>

                                  
                                    <h5 class="inner two">
                                       <a href="{{ route('Tkksd.unduh', [$tkksd->slug]) }}" class="btn btn-info">
                         
                        <span>Download</span></a><p>&nbsp</p>
                         <h6><i>diunduh : <b>{{ $tkksd->diunduh }}</b> kali | tanggal upload :  {{ date('d M Y', strtotime($tkksd->created_at)) }}</i></h6>
                                    </h5>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>


                    @endforeach 
                    {{ $tkksds->links() }}
                                            
                                            <!-- Komentar -->
                                             <!-- Share Media Sosial dan Print -->
                                      <hr/><h6>Bagikan :</h6><br/>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://www.facebook.com/sharer.php?u={{ route('Tkksd')}}'>
                                    <img src='http://syam.eu.org/icon/fb.jpg' alt='' width='30' height='30'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://twitter.com/share?url={{ route('Tkksd')}}'>
                                    <img src='http://syam.eu.org/icon/tw.jpg' alt='' width='30' height='30'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://plus.google.com/share?url={{ route('Tkksd')}}'>
                                     <img src='http://syam.eu.org/icon/g.jpg' alt='' width='30' height='30'></a>
                                    | &nbsp<a href="#" onclick="window.print()"><img src="/temafrontend/images/print.png" alt='' width='50' height='50'></a>    
              </div>
              @include('frame_depan.kanan', @$kanan ? $kanan : [])
        </div>    
 </div>    
@endsection
