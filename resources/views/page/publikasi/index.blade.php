@extends('frame_depan.frame')


@section('content')
    <div class="banner two">
        <div class="container"> 
            <h2 class="inner-tittle">{{ strtoupper($katfile ? $katfile->name : 'PUBLIKASI') }}</h2>
        </div>
    </div>
    
    <div class="main-content">
        <div class="container">
            <div class="col-md-8 mag-innert-left">
                <div class="banner-bottom-left-grids">
                    <br/>
                    <form class="form" action="{{ route('Publikasi', $katfile ? [$katfile->slug, 'pencarian'] : ['pencarian']) }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="pencarian">Pencarian {{ $katfile ? $katfile->name : 'Publikasi' }}:</label>
                            <div class="input-group btn-katberita">
                                <input type="hidden" name="katslug" value="{{ $katfile ? $katfile->slug : '' }}">
                                <input type="text" name="pencarian" id="pencarian" class="form-control" placeholder="Masukan kata kunci..." value="{{ @$data['pencarian'] }}">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <hr/>

                    <!--/Show dari Publikasi-->
                    <div class="technology">
                        @if($pencarian)
                            <h3>Hasil Pencarian {{ $publikasis->count() > 0 ? '' : 'Tidak Ditemukan' }}</h3>
                            <br/>
                        @endif
                        
                         <table  class="table  table-striped">
                            <thead>
                             <tr>
                             <th>No</th>
                             <th>Nama File</th>
                             <th>Download</th>
                             </tr>   
                            </thead>
                            <tbody>
                            <?php $no = 0;?>
                             @foreach($publikasis as $publikasi)
                            <?php $no++ ;?>               
                            <tr>
                            
                              <td style="width: 10px;">{{ $no }} </td>
                               <td>{{ strtoupper($publikasi->judul) }} 
                                <div class="clearfix"></div>
                                <h6><i>diunduh :<b> {{ $publikasi->diunduh }} kali</b> | tanggal upload :  <b>{{ date('d M Y', strtotime($publikasi->tanggal)) }}</b></i></h6> </td>
                              <td style="width: 100px;">  <a href="{{ route('Publikasi.unduh', [$publikasi->katfile->slug, $publikasi->slug]) }}" class="btn btn-info">
                                     
                                    <span>Download</span></a> </td>
                   
                            </tr>
                               @endforeach
                            </tbody>
                            </table>


                        
                        @if($pencarian)
                            {{ $publikasis->appends(['pencarian' => $data['pencarian']])->links() }}
                        @else
                            {{ $publikasis->links() }}
                        @endif
                        <div class="clearfix"></div>
                    </div>
                </div>

                <!--Komentar-->
               
            </div>
            @include('frame_depan.kanan', @$kanan ? $kanan : [])
        </div>
    </div>   
@endsection
