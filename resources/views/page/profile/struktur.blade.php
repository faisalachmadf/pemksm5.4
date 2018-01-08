@extends('frame_depan.frame')


@section('content')
 <div class="banner two">
    <div class="container">
	    <h2 class="inner-tittle">STRUKTUR ORGANISASI</h2>
    </div>
 </div>
    
 <div class="main-content">
	    <div class="container">

              <div class="col-md-12">

 						

	                            <div class="banner-bottom-left-grids">
									<div class="single-left-grid">
											<a href="#"><center><img src="/adminkelola/dist/img/struktur.png" class="img-responsive"></center></a>
											<hr/><br/>
											<center><h2>- - - PEJABAT STRUKTURAL- - -</h2></center><br/><br/>
											 	<div class="row">
											          @foreach($karos as $karo)
											            <div class="col-lg-12 col-xs-12">
											              <!-- small box -->

											                  <center><img src="{{ asset('image/pegawai/thumbnail/'.$karo->gambar) }}" class="img-responsive img-thumbnail wp-post-image" alt="{{ $karo->nama }}" width="150px" ></center>
											                 

											               <div class="inner">
											                  <br/>
											                <center><h5>{{ strtoupper($karo->nama) }}</h5>
											                  <h6><font color="red">{{ $karo->jabatan }}</font></h6></center>
											                </div>
											                <br>
											                 
											            

											               
											            </div>
											          @endforeach
											          </div>

											<!-- Kabag -->
											<div class="row">
												@foreach($kabagurpemdas as $kabagurpemda)
											<div class="col-lg-4 col-xs-4">
												 <center><img src="{{ asset('image/pegawai/thumbnail/'.$kabagurpemda->gambar) }}" class="img-responsive img-thumbnail wp-post-image" alt="{{ $kabagurpemda->nama }}" width="150px" ></center>
											                 

											               <div class="inner">
											                  <br/>
											                <center><h5>{{ strtoupper($kabagurpemda->nama) }}</h5>
											                  <h6><font color="red">{{ $kabagurpemda->jabatan }}</font></h6></center>
											                </div>
											                <br>
											</div>
											 @endforeach
											 @foreach($kabagtapems as $kabagtapem)
											 <div class="col-lg-4 col-xs-4">
												 <center><img src="{{ asset('image/pegawai/thumbnail/'.$kabagtapem->gambar) }}" class="img-responsive img-thumbnail wp-post-image" alt="{{ $kabagtapem->nama }}" width="150px" ></center>
											                 

											               <div class="inner">
											                  <br/>
											                <center><h5>{{ strtoupper($kabagtapem->nama) }}</h5>
											                  <h6><font color="red">{{ $kabagtapem->jabatan }}</font></h6></center>
											                </div>
											                <br>
											</div>
											@endforeach
											 @foreach($kabagkerjasamas as $kabagkerjasama)
											 <div class="col-lg-4 col-xs-4">
												 <center><img src="{{ asset('image/pegawai/thumbnail/'.$kabagkerjasama->gambar) }}" class="img-responsive img-thumbnail wp-post-image" alt="{{ $kabagkerjasama->nama }}" width="150px" ></center>
											                 

											               <div class="inner">
											                  <br/>
											                <center><h5>{{ strtoupper($kabagkerjasama->nama) }}</h5>
											                  <h6><font color="red">{{ $kabagkerjasama->jabatan }}</font></h6></center>
											                </div>
											                <br>
											</div>
											@endforeach
											</div>

											<!-- Kasubag -->
											<div class="col-lg-12 col-xs-12">
											<div class="row">
												@foreach($kasubagurpemdas as $kasubagurpemda)
											<div class="col-lg-4 col-xs-4">
												 <center><img src="{{ asset('image/pegawai/thumbnail/'.$kasubagurpemda->gambar) }}" class="img-responsive img-thumbnail wp-post-image" alt="{{ $kabagurpemda->nama }}" width="150px" ></center>
											                 

											               <div class="inner">
											                  <br/>
											                <center><h5>{{ strtoupper($kasubagurpemda->nama) }}</h5>
											                  <h6><font color="red">{{ $kasubagurpemda->jabatan }}</font></h6></center>
											                </div>
											                <br>
											</div>
											 @endforeach
											 @foreach($kasubagtapems as $kasubagtapem)
											 <div class="col-lg-4 col-xs-4">
												 <center><img src="{{ asset('image/pegawai/thumbnail/'.$kasubagtapem->gambar) }}" class="img-responsive img-thumbnail wp-post-image" alt="{{ $kasubagtapem->nama }}" width="150px" ></center>
											                 

											               <div class="inner">
											                  <br/>
											                <center><h5>{{ strtoupper($kasubagtapem->nama) }}</h5>
											                  <h6><font color="red">{{ $kasubagtapem->jabatan }}</font></h6></center>
											                </div>
											                <br>
											</div>
											@endforeach
											 @foreach($kasubagkerjasamas as $kasubagkerjasama)
											 <div class="col-lg-4 col-xs-4">
												 <center><img src="{{ asset('image/pegawai/thumbnail/'.$kasubagkerjasama->gambar) }}" class="img-responsive img-thumbnail wp-post-image" alt="{{ $kasubagkerjasama->nama }}" width="150px" ></center>
											                 

											               <div class="inner">
											                  <br/>
											                <center><h5>{{ strtoupper($kasubagkerjasama->nama) }}</h5>
											                  <h6><font color="red">{{ $kasubagkerjasama->jabatan }}</font></h6></center>
											                </div>
											                <br>
											</div>
											@endforeach
											</div>

										</div>

										<!-- Pelaksana -->
										<hr/>
										<p>&nbsp</p>

									<center><h2>- - - Pelaksana - - -</h2></center>
									<p>&nbsp</p>
									<blockquote>Bagian Urusan Pemerintahan Daerah</blockquote>
									<table  class="table table-striped">
                                                    <thead style="background-color: white; color: white;">
                                                     <tr>

                                                     <th style="width: 25%;"><h5><p>NIP</p></h5></th>
                                                   
                                                     <th style="width: 50%;"><h5><p>Nama</p></h5></th>
                                                     <th ><h5><p>Jabatan</p></h5></th>
                                                    

                                                     </tr>   
                                                    </thead>
                                        <tbody>
                                        @if (count($analisisurpemdas))
                                      
                                         @foreach($analisisurpemdas as $analisisurpemda)
                                                    
                                        <tr>
                                           
                                          <td><p><h5>{{ $analisisurpemda->nip }} </h5></p></td>
                                       
                                           <td><p><h5>{{ strtoupper($analisisurpemda->nama) }} 
                                           </h5></p></td>
                                       	<td><font color="red"><h5>{{ $analisisurpemda->jabatan }}</h5></font></td>
                                       
                                        
                                        </tr>
                                         @endforeach
                                          
                                      </tbody>
                                      @else
                                         
                                            --- Belum ada Data ---
                                    
                                      @endif
                                      </table>	
                                      <table  class="table table-striped">
                                                    <thead">
                                                     <tr>
                                                     <th style="width: 25%;"></th>
                                                     <th style="width: 50%;"></th>
                                                     <th ></th>
                                                   
                                                     </tr>   
                                                    </thead>
                                        <tbody>
                                     
                                      
                                         @foreach($administrasiurpemdas as $administrasiurpemda)
                                                    
                                        <tr>
                                           
                                          <td><p><h5>{{ $administrasiurpemda->nip }} </h5></p></td>
                                       
                                           <td><p><h5>{{ strtoupper($administrasiurpemda->nama) }} 
                                           </h5></p></td>
                                       	<td><font color="red"><h5>{{ $administrasiurpemda->jabatan }}</h5></font></td>
                                       
                                        
                                        </tr>
                                         @endforeach
                                          
                                      </tbody>
                                  
                                      </table>

                                      <blockquote>Bagian Tata Pemerintahan</blockquote>
									<table  class="table table-striped">
                                                    <thead style="background-color: white; color: white;">
                                                     <tr>

                                                     <th style="width: 25%;"><h5><p>NIP</p></h5></th>
                                                   
                                                     <th style="width: 50%;"><h5><p>Nama</p></h5></th>
                                                     <th ><h5><p>Jabatan</p></h5></th>
                                                    

                                                     </tr>   
                                                    </thead>
                                        <tbody>
                                        @if (count($analisistapems))
                                      
                                         @foreach($analisistapems as $analisistapem)
                                                    
                                        <tr>
                                           
                                          <td><p><h5>{{ $analisistapem->nip }} </h5></p></td>
                                       
                                           <td><p><h5>{{ strtoupper($analisistapem->nama) }} 
                                           </h5></p></td>
                                       	<td><font color="red"><h5>{{ $analisistapem->jabatan }}</h5></font></td>
                                       
                                        
                                        </tr>
                                         @endforeach
                                          
                                      </tbody>
                                      @else
                                         
                                            --- Belum ada Data ---
                                    
                                      @endif
                                      </table>	
                                      <table  class="table table-striped">
                                                    <thead">
                                                     <tr>
                                                     <th style="width: 25%;"></th>
                                                     <th style="width: 50%;"></th>
                                                     <th ></th>
                                                   
                                                     </tr>   
                                                    </thead>
                                        <tbody>
                                     
                                      
                                         @foreach($administrasitapems as $administrasitapem)
                                                    
                                        <tr>
                                           
                                          <td><p><h5>{{ $administrasitapem->nip }} </h5></p></td>
                                       
                                           <td><p><h5>{{ strtoupper($administrasitapem->nama) }} 
                                           </h5></p></td>
                                       	<td><font color="red"><h5>{{ $administrasitapem->jabatan }}</h5></font></td>
                                       
                                        
                                        </tr>
                                         @endforeach
                                          
                                      </tbody>
                                  
                                      </table>

                                      <blockquote>Bagian Kerja Sama</blockquote>
									<table  class="table table-striped">
                                                    <thead style="background-color: white; color: white;">
                                                     <tr>

                                                     <th style="width: 25%;"><h5><p>NIP</p></h5></th>
                                                   
                                                     <th style="width: 50%;"><h5><p>Nama</p></h5></th>
                                                     <th ><h5><p>Jabatan</p></h5></th>
                                                    

                                                     </tr>   
                                                    </thead>
                                        <tbody>
                                        @if (count($analisiskerjasamas))
                                      
                                         @foreach($analisiskerjasamas as $analisiskerjasama)
                                                    
                                        <tr>
                                           
                                          <td><p><h5>{{ $analisiskerjasama->nip }} </h5></p></td>
                                       
                                           <td><p><h5>{{ strtoupper($analisiskerjasama->nama) }} 
                                           </h5></p></td>
                                       	<td><font color="red"><h5>{{ $analisiskerjasama->jabatan }}</h5></font></td>
                                       
                                        
                                        </tr>
                                         @endforeach
                                          
                                      </tbody>
                                      @else
                                         
                                            --- Belum ada Data ---
                                    
                                      @endif
                                      </table>	
                                      <table  class="table table-striped">
                                                    <thead">
                                                     <tr>
                                                     <th style="width: 25%;"></th>
                                                     <th style="width: 50%;"></th>
                                                     <th ></th>
                                                   
                                                     </tr>   
                                                    </thead>
                                        <tbody>
                                     
                                      
                                         @foreach($administrasikerjasamas as $administrasikerjasama)
                                                    
                                        <tr>
                                           
                                          <td><p><h5>{{ $administrasikerjasama->nip }} </h5></p></td>
                                       
                                           <td><p><h5>{{ strtoupper($administrasikerjasama->nama) }} 
                                           </h5></p></td>
                                       	<td><font color="red"><h5>{{ $administrasikerjasama->jabatan }}</h5></font></td>
                                       
                                        
                                        </tr>
                                         @endforeach
                                          
                                      </tbody>
                                  
                                      </table>

                                      <blockquote>Tenaga Teknis Non PNS</blockquote>
									<table  class="table table-striped">
                                                    <thead style="background-color: white; color: white;">
                                                     <tr>

                                                     <th style="width: 25%;"><h5><p>NIP</p></h5></th>
                                                   
                                                     <th style="width: 50%;"><h5><p>Nama</p></h5></th>
                                                     <th ><h5><p>Jabatan</p></h5></th>
                                                    

                                                     </tr>   
                                                    </thead>
                                        <tbody>
                                        @if (count($ahlis))
                                      
                                         @foreach($ahlis as $ahli)
                                                    
                                        <tr>
                                           
                                          <td><p><h5>{{ $ahli->nip }} </h5></p></td>
                                       
                                           <td><p><h5>{{ strtoupper($ahli->nama) }} 
                                           </h5></p></td>
                                       	<td><font color="red"><h5>{{ $ahli->jabatan }}</h5></font></td>
                                       
                                        
                                        </tr>
                                         @endforeach
                                          
                                      </tbody>
                                      @else
                                         
                                            --- Belum ada Data ---
                                    
                                      @endif
                                      </table>	
                                     

									 </div>
								</div>
									
			  </div>
			  
	  	</div>    
 </div>    
@endsection
