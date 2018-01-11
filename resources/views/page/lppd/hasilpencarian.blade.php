@extends('frame_depan.frame')


@section('content')
 <div class="banner two">
    <div class="container">
	    <h2 class="inner-tittle">lppd</h2>
    </div>
 </div>
    
 <div class="main-content">
	    <div class="container">
	    	
	  
              <div class="col-md-8 mag-innert-left">
                  <form class="form" action="{{ url('Lppd/Hasilpencarian') }}" method="GET">
                        
                        <div class="form-group">
                            <label for="pencarian">Pencarian lppd:</label>
                            <div class="input-group btn-katberita">
                                <input type="text" name="q" id="pencarian" class="form-control" placeholder="Masukan kata kunci..." required="">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </div>
                        </div>
            </form>


                      @if (count($hasil))
            <div class="box box-danger">Hasil pencarian : <b>{{$query}}</b></div>
              <br/>
   <table  class="table  ">
                  <thead>
                             <tr>
                             <th>No</th>
                             <th>Nama File</th>
                             <th>Download</th>
                             </tr>   
                            </thead>
                   <tbody style="background-color: gold;">
                    <?php $no = 0;?>
                      @foreach($hasil as $data)
                    <?php $no++ ;?>               
                    <tr>

                    <td style="width: 10px;"><h5>{{ $no }}</h5> </td>
                    <td><h5>{{ strtoupper($data->judul) }} </h5><h6><i>diunduh : {{ $data->diunduh }} kali | tanggal upload :  {{ date('d M Y', strtotime($data->created_at)) }}</i></h6> </td>
                  <td style="width: 100px;">  <a href="{{ route('Lppd.unduh', [$data->slug]) }}" class="btn btn-info">
                         
                        Download</a> </td>
       
                    </tr>
                 @endforeach
              </tbody>
              </table>

            {{ $hasil->render() }}
              
            @else
               <div class="card-panel red darken-3 white-text">File dengan Nama <b>{{$query}}</b> Tidak Ditemukan</div>
            @endif



            <h2 class="tittle"></h2>
                @foreach($lppds as $lppd)
                            <div class="technology">
                            <div class="editor-pics">
                                <div class="edit-pics">
                               <div class="col-md-4 item-pic">
                                     <h4><p>{{ @$lppd->judul }}</p></h4>
                                </div>
                                <div class="col-md-8 item-details">
                                   
                                  
                                    
                                     <p><font color="grey"><i>{!! @$lppd->isi !!}</i></font></p>
                                     

                                  <br>
                                    <h5>
                                       <a href="{{ route('lppd.unduh', [$lppd->slug]) }}" class="btn btn-info">
                         
                        Download</a><p>&nbsp</p>
                         <h6><i>diunduh : <b>{{ $lppd->diunduh }}</b> kali | tanggal upload :  {{ date('d M Y', strtotime($lppd->created_at)) }}</i></h6>
                                    </h5>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>


                    @endforeach 
                       {{ $lppds->links() }}
                   
	           <p> &nbsp</p>
                            <p> &nbsp</p>
                            <p> &nbsp</p>
                     <h2 class="tittle"><li class="glyphicon glyphicon-picture"></li> &nbsp Galeri lppd </h2>
                            <div >
                               
                                <div id="owl-demo" class="owl-carousel text-center">
                                     @foreach($galerilppds as $galerilppd)
                                    <div class="item" style="margin-left: 2em;">

                                        <a href="#""><img class="img-responsive lot img-thumbnail" src="{{ asset('image/galeri-lppd/'.$galerilppd->gambar) }}" alt="{{ $galerilppd->judul }}" /></a>
                                      
                                        <hr/>
                                        <h6><font color="brown"><i> {{ $galerilppd->judul }} </i></font></h6>
                                    </div>
                                    @endforeach
                               
                                </div>
                            </div>

                <!-- requried-jsfiles-for owl -->
                                        <script src="/temafrontend/js/owl.carousel.js"></script>
                                          <script>
                                          $(document).ready(function() {
                                               $("#owl-demo").owlCarousel({
                                                items :4,
                                                lazyLoad : true,
                                                autoPlay : true,
                                                navigation : true,
                                                navigationText :  true,
                                                pagination : false,
                                                responsiveBreakpoints: { 
                                        portrait: { 
                                            changePoint:480,
                                            visibleItems: 2
                                        }, 
                                        landscape: { 
                                            changePoint:640,
                                            visibleItems: 2
                                        },
                                        tablet: { 
                                            changePoint:768,
                                            visibleItems: 3
                                        }
                                    }
                                                });
                                          });
                                        </script>
                        <!-- //requried-jsfiles-for owl -->

											<!--Komentar-->
									<div class="post">
										 <!-- Share Media Sosial dan Print -->
                                      <hr/><h6>Bagikan :</h6><br/>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://www.facebook.com/sharer.php?u={{ route('Lppd') }}'>
                                    <img src='http://syam.eu.org/icon/fb.jpg' alt='' width='30' height='30'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://twitter.com/share?url={{ route('Lppd') }}'>
                                    <img src='http://syam.eu.org/icon/tw.jpg' alt='' width='30' height='30'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://plus.google.com/share?url={{ route('Lppd') }}'>
                                     <img src='http://syam.eu.org/icon/g.jpg' alt='' width='30' height='30'></a>
                                    | &nbsp<a href="#" onclick="window.print()"><img src="/temafrontend/images/print.png" alt='' width='50' height='50'></a>
									</div>
			  </div>
			  @include('frame_depan.kanan', @$kanan ? $kanan : [])
	  	</div>    
 </div>    
@endsection
