@extends('frame_depan.frame')


@section('content')
 <div class="banner two">
    <div class="container">
	    <h2 class="inner-tittle">PRODUK HUKUM</h2>
    </div>
 </div>
    
 <div class="main-content">
	    <div class="container">
	    	
      <!-- /.row -->

           

              <div class="col-md-8 mag-innert-left">
                <form class="form" action="{{ url('Produk-Hukum/Hasilpencarian') }}" method="GET">
                        
                        <div class="form-group">
                            <label for="pencarian">Pencarian Produk Hukum:</label>
                            <div class="input-group btn-katberita">
                                <input type="text" name="q" id="pencarian" class="form-control" placeholder="Masukan kata kunci..." required="">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </div>
                        </div>
            </form>
            <h2 class="tittle"></h2>
              	
	            <!--/Undang-Undang-->
	            <blockquote> Undang-Undang</blockquote>
	            <table  class="table table-striped">
	            	<thead>
                             <tr>
                             <th>No</th>
                             <th>Nama File</th>
                             <th>Download</th>
                             </tr>   
                            </thead>
                <tbody>
                @if (count($uus))
                <?php $no = 0;?>
                 @foreach($uus as $uu)
                <?php $no++ ;?>               
                <tr>
                
                  <td style="width: 10px;">{{ $no }} </td>
                   <td><p>{{ ($uu->nama) }} </p><h6><font color="grey"><i>diunduh :<b> {{ $uu->diunduh }} kali </b>| tanggal upload :  {{ date('d M Y', strtotime($uu->created_at)) }}</i></font></h6> </td>
                  <td style="width: 50px;">  <a href="{{ route('Produkhukum.unduh', [$uu->slug]) }}">
                         
                        <center><i class="fa fa-download"></i></center></a> </td>
       
                </tr>
                 @endforeach
              </tbody>
              </table>
                @else
                 <div class="card-panel red darken-3 white-text">Belum ada Data</div>
              @endif

              <br/>
              <!--/Peraturan Pemerintah-->
              <blockquote> Peraturan Pemerintah</blockquote>
              <table  class="table table-striped">
                <tbody>
                @if (count($pps))
                <?php $no = 0;?>
                 @foreach($pps as $pp)
                <?php $no++ ;?>               
                <tr>
                
                  <td style="width: 10px;">{{ $no }} </td>
                   <td><p>{{ ($pp->nama) }} </p><h6><font color="grey"><i>diunduh :<b> {{ $pp->diunduh }} kali </b>| tanggal upload :  {{ date('d M Y', strtotime($pp->created_at)) }}</i></font></h6> </td>
                  <td style="width: 100px;">  <a href="{{ route('Produkhukum.unduh', [$pp->slug]) }}" ><center><i class="fa fa-download"></i></center></a> </td>
       
                </tr>
                 @endforeach
              </tbody>
              </table>
                @else
                 <div class="card-panel red darken-3 white-text">Belum ada Data</div>
              @endif

	             <br/>
	            <!--/Peraturan Presiden-->
	            <blockquote> Peraturan Presiden</blockquote>
	            <table  class="table table-striped">
                <tbody>
                <?php $no = 0;?>
                 @foreach($perpress as $perpres)
                <?php $no++ ;?>               
                <tr>
                
                  <td style="width: 10px;">{{ $no }} </td>
                   <td><p>{{ ($perpres->nama) }} </p><h6><font color="grey"><i>diunduh :<b> {{ $perpres->diunduh }} kali </b>| tanggal upload :  {{ date('d M Y', strtotime($perpres->created_at)) }}</i></font></h6> </td>
                  <td style="width: 100px;">  <a href="{{ route('Produkhukum.unduh', [$perpres->slug]) }}" ><center><i class="fa fa-download"></i></center></a> </td>
       
                </tr>
	               @endforeach
	            </tbody>
	            </table>

	            <br/>
	            <!--/Keputusan Presiden-->
	            <blockquote> Keputusan Presiden</blockquote>
	            <table  class="table table-striped">
                <tbody>
                <?php $no = 0;?>
                 @foreach($kepress as $kepres)
                <?php $no++ ;?>               
                <tr>
                
                  <td style="width: 10px;">{{ $no }} </td>
                   <td><p>{{ ($kepres->nama) }} </p><h6><font color="grey"><i>diunduh :<b> {{ $kepres->diunduh }} kali </b>| tanggal upload :  {{ date('d M Y', strtotime($kepres->created_at)) }}</i></font></h6> </td>
                  <td style="width: 100px;">  <a href="{{ route('Produkhukum.unduh', [$kepres->slug]) }}" ><center><i class="fa fa-download"></i></center></a> </td>
       
                </tr>
	               @endforeach
	            </tbody>
	            </table>

	             <br/>
	            <!--/Peraturan Menteri Dalam Negeri-->
	             <blockquote> Peraturan Menteri Dalam Negeri</blockquote>
	            <table  class="table table-striped">
                <tbody>
                <?php $no = 0;?>
                 @foreach($permendagris as $permendagri)
                <?php $no++ ;?>               
                <tr>
                
                  <td style="width: 10px;">{{ $no }} </td>
                   <td><p>{{ ($permendagri->nama) }} </p><h6><font color="grey"><i>diunduh :<b> {{ $permendagri->diunduh }} kali </b>| tanggal upload :  {{ date('d M Y', strtotime($permendagri->created_at)) }}</i></font></h6> </td>
                  <td style="width: 100px;">  <a href="{{ route('Produkhukum.unduh', [$permendagri->slug]) }}" ><center><i class="fa fa-download"></i></center></a> </td>
       
                </tr>
	               @endforeach
	            </tbody>
	            </table>

	             <br/>
	            <!--/Keputusan Menteri Dalam Negeri-->
	             <blockquote> Keputusan Menteri Dalam Negeri</blockquote>
	            <table  class="table table-striped">
                <tbody>
                <?php $no = 0;?>
                 @foreach($kepmendagris as $kepmendagri)
                <?php $no++ ;?>               
                <tr>
                
                  <td style="width: 10px;">{{ $no }} </td>
                   <td><p>{{ ($kepmendagri->nama) }} </p><h6><font color="grey"><i>diunduh :<b> {{ $kepmendagri->diunduh }} kali </b>| tanggal upload :  {{ date('d M Y', strtotime($kepmendagri->created_at)) }}</i></font></h6> </td>
                  <td style="width: 100px;">  <a href="{{ route('Produkhukum.unduh', [$kepmendagri->slug]) }}" ><center><i class="fa fa-download"></i></center></a> </td>
       
                </tr>
	               @endforeach
	            </tbody>
	            </table>

	            <br/>
	            <!--/Peraturan Menteri Luar Negeri-->
	             <blockquote> Peraturan Menteri Luar Negeri</blockquote>
	            <table  class="table table-striped">
                <tbody>
                <?php $no = 0;?>
                 @foreach($permenlus as $permenlu)
                <?php $no++ ;?>               
                <tr>
                
                  <td style="width: 10px;">{{ $no }} </td>
                   <td><p>{{ ($permenlu->nama) }} </p><h6><font color="grey"><i>diunduh :<b> {{ $permenlu->diunduh }} kali </b>| tanggal upload :  {{ date('d M Y', strtotime($permenlu->created_at)) }}</i></font></h6> </td>
                  <td style="width: 100px;">  <a href="{{ route('Produkhukum.unduh', [$permenlu->slug]) }}" ><center><i class="fa fa-download"></i></center></a> </td>
       
                </tr>
	               @endforeach
	            </tbody>
	            </table>

	             <br/>
	            <!--/Peraturan Menteri Ketenagakerjaan-->
	             <blockquote> Peraturan Menteri Ketenagakerjaan</blockquote>
	            <table  class="table table-striped">
                <tbody>
                <?php $no = 0;?>
                 @foreach($permennaks as $permennak)
                <?php $no++ ;?>               
                <tr>
                
                  <td style="width: 10px;">{{ $no }} </td>
                   <td><p>{{ ($permennak->nama) }} </p><h6><font color="grey"><i>diunduh :<b> {{ $permennak->diunduh }} kali </b>| tanggal upload :  {{ date('d M Y', strtotime($permennak->created_at)) }}</i></font></h6> </td>
                  <td style="width: 100px;">  <a href="{{ route('Produkhukum.unduh', [$permennak->slug]) }}" ><center><i class="fa fa-download"></i></center></a> </td>
       
                </tr>
	               @endforeach
	            </tbody>
	            </table>

	             <br/>
	            <!--/Peraturan Daerah Provinsi Jawa Barat-->
	             <blockquote> Peraturan Daerah Provinsi Jawa Barat</blockquote>
	            <table  class="table table-striped">
                <tbody>
                <?php $no = 0;?>
                 @foreach($perdas as $perda)
                <?php $no++ ;?>               
                <tr>
                
                  <td style="width: 10px;">{{ $no }} </td>
                   <td><p>{{ ($perda->nama) }} </p><h6><font color="grey"><i>diunduh :<b> {{ $perda->diunduh }} kali </b>| tanggal upload :  {{ date('d M Y', strtotime($perda->created_at)) }}</i></font></h6> </td>
                  <td style="width: 100px;">  <a href="{{ route('Produkhukum.unduh', [$perda->slug]) }}" ><center><i class="fa fa-download"></i></center></a> </td>
       
                </tr>
	               @endforeach
	            </tbody>
	            </table>

	            <br/>
	            <!--/Peraturan Gubernur Provinsi Jawa Barat-->
	             <blockquote> Peraturan Gubernur Provinsi Jawa Barat</blockquote>
	            <table  class="table table-striped">
                <tbody>
                <?php $no = 0;?>
                 @foreach($pergubs as $pergub)
                <?php $no++ ;?>               
                <tr>
                
                  <td style="width: 10px;">{{ $no }} </td>
                   <td><p>{{ ($pergub->nama) }} </p><h6><font color="grey"><i>diunduh :<b> {{ $pergub->diunduh }} kali </b>| tanggal upload :  {{ date('d M Y', strtotime($pergub->created_at)) }}</i></font></h6> </td>
                  <td style="width: 100px;">  <a href="{{ route('Produkhukum.unduh', [$pergub->slug]) }}" ><center><i class="fa fa-download"></i></center></a> </td>
       
                </tr>
	               @endforeach
	            </tbody>
	            </table>

	            <br/>
	            <!--/Keputusan Gubernur Provinsi Jawa Barat-->
	             <blockquote>Keputusan Gubernur Provinsi Jawa Barat</blockquote>
	            <table  class="table table-striped">
                <tbody>
                <?php $no = 0;?>
                 @foreach($kepgubs as $kepgub)
                <?php $no++ ;?>               
                <tr>
                
                  <td style="width: 10px;">{{ $no }} </td>
                   <td><p>{{ ($kepgub->nama) }} </p><h6><font color="grey"><i>diunduh :<b> {{ $kepgub->diunduh }} kali </b>| tanggal upload :  {{ date('d M Y', strtotime($kepgub->created_at)) }}</i></font></h6> </td>
                  <td style="width: 100px;">  <a href="{{ route('Produkhukum.unduh', [$kepgub->slug]) }}" ><center><i class="fa fa-download"></i></center></a> </td>
       
                </tr>
	               @endforeach
	            </tbody>
	            </table>

	            <br/>
	            <!--/Surat Edaran-->
	            <blockquote>Surat Edaran</blockquote>
	            <table  class="table table-striped">
                <tbody>
                <?php $no = 0;?>
                 @foreach($ses as $se)
                <?php $no++ ;?>               
                <tr>
                
                  <td style="width: 10px;">{{ $no }} </td>
                   <td><p>{{ ($se->nama) }} </p><h6><font color="grey"><i>diunduh :<b> {{ $se->diunduh }} kali </b>| tanggal upload :  {{ date('d M Y', strtotime($se->created_at)) }}</i></font></h6> </td>
                  <td style="width: 100px;">  <a href="{{ route('Produkhukum.unduh', [$se->slug]) }}" ><center><i class="fa fa-download"></i></center></a> </td>
       
                </tr>
	               @endforeach
	            </tbody>
	            </table>


                     


									
											<!--Komentar-->
									<div class="post">
										 <!-- Share Media Sosial dan Print -->
                                      <hr/><h6>Bagikan :</h6><br/>
                                      <a href="whatsapp://send?text={{ route('Produkhukum') }}" 
                                        data-action="share/whatsapp/share">
                                        <img src='/temafrontend/images/wa.png' alt='' width='40' height='40'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://www.facebook.com/sharer.php?u={{ route('Produkhukum') }}'>
                                   <img src='/temafrontend/images/logofb.png' alt='' width='50' height='50'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://twitter.com/share?url={{ route('Produkhukum') }}'>
                                   <img src='/temafrontend/images/logotwitter.png' alt='' width='40' height='40'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://plus.google.com/share?url={{ route('Produkhukum') }}'>
                                     <img src='/temafrontend/images/logogoogle.png' alt='' width='35' height='35'></a>
                                    | &nbsp<a href="#" onclick="window.print()"><img src="/temafrontend/images/print.png" alt='' width='50' height='50'></a>
									</div>
			  </div>
			  @include('frame_depan.kanan', @$kanan ? $kanan : [])
	  	</div>    
 </div>    
@endsection
