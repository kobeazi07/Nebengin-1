@extends('admin.layouts.admin')

@section('content')
<div class="content-wrapper">

<div class ="row">
  <div class = "col-lg-4">
    <div class="card">
      <div class = "card-header bg-primary text-white"><h6><b>Total Driver</b></h6></div>
        <div class = "card-body" style="margin-top:-15px ;margin-bottom:-15px;"><h3>{{$driver}} Driver</h3></div>
        <div class = "card-footer">
          <a href="{{route('HalamanUser')}}">
            
            <button class="btn btn-primary">Lihat Detail</button>
          </a>
      </div>
    </div>
  </div>
  <div class = "col-lg-4">
  <div class="card">
      <div class = "card-header bg-danger text-white"><h6><b>Total Trip</b></h6></div>
      <div class = "card-body" style="margin-top:-15px ;margin-bottom:-15px;"><h3>{{$trip->count()}} Trip</h3></div>
      <div class = "card-footer">
        <a href="{{route('HalamanTrip')}}">

          <button class="btn btn-danger">Lihat Detail</button>
        </a>
      </div>
    </div>
  </div>
  <div class = "col-lg-4">
  <div class="card">
      <div class = "card-header bg-warning text-white"><h6><b>Total pengguna</b></h6></div>
      <div class = "card-body" style="margin-top:-15px ;margin-bottom:-15px;"><h3>{{$akun}} Akun</h3></div>
      <div class = "card-footer">
        <a href="{{route('HalamanUser')}}">

          <button class="btn btn-warning">Lihat Detail</button>
        </a>
      </div>
    </div>
  </div>


  <div class = "col-lg-4 mt-5">
    <div class="card">
      <div class = "card-header bg-primary text-white"><h6><b>Minimal Saldo</b></h6></div>
      @php
                                        $duit_m_saldo = "Rp " . number_format($m_saldo->nominal, 0, ",", "."); // Formats the number to Rp 1.000.000
                                   @endphp
        <div class = "card-body" style="margin-top:-15px ;margin-bottom:-15px;"><h3>   {{$duit_m_saldo}}</h3></div>
        <div class = "card-footer">
        
            
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#m_saldo">Lihat Detail</button>
          
            <!-- modal tambah_saldo -->
            <div class="modal fade" id="m_saldo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Minimal Saldo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    {{$duit_m_saldo}}
                    <form action="{{route('EditMinimalSaldo')}}" method="POST">
                    @csrf
                      <div class="form-group mt-5">
                          <label class="fw-bold"> Ubah Nominal Saldo</label>
                          <input type="text" class="form-control" placeholder="Nominal Saldo" name="nominal">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </form>

                  
                  </div>
                </div>
              </div>
            </div>

            <!-- akhir modal tambah Saldo -->
      </div>
    </div>
  </div>

  <div class = "col-lg-4 mt-5">
    <div class="card">
      <div class = "card-header bg-primary text-white"><h6><b>Saldo Berkurang Setiap Trip</b></h6></div>
      @php
                                        $duit_k_saldo = "Rp " . number_format($k_saldo->nominal, 0, ",", "."); // Formats the number to Rp 1.000.000
                                   @endphp
        <div class = "card-body" style="margin-top:-15px ;margin-bottom:-15px;"><h3>   {{$duit_k_saldo}}</h3></div>
        <div class = "card-footer">
        
            
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#k_saldo">Lihat Detail</button>
          
            <!-- modal tambah_saldo -->
            <div class="modal fade" id="k_saldo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Saldo Berkurang Setiap Trip</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    {{$duit_k_saldo}}
                    <form action="{{route('EditKurangSaldo')}}" method="POST">
                    @csrf
                      <div class="form-group mt-5">
                          <label class="fw-bold"> Ubah Nominal Saldo</label>
                          <input type="text" class="form-control" placeholder="Nominal Saldo" name="nominal">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                    </form>

                  
                  </div>
                </div>
              </div>
            </div>

            <!-- akhir modal tambah Saldo -->
      </div>
    </div>
  </div>
</div>
<div class="row mt-2">
  <!-- <div class="col-lg-6 grid-margin stretch-card">-->
  <div class="col-lg-12 grid-margin2 stretch-card">
    <div class="card">
      <div class = "card-header bg-success text-white">Riwayat Trip</div>
      <div class="card-body table-container">
      <table id="table_id" class="display">
          <thead>
              <tr>
                  <th width="5%">No</th>
                            <th>Tanggal</th>
                            <th>Driver</th>
                            <th>Rute</th>
                            <th>Tipe Kendaraan</th>
                            <th>Waktu Keberangkatan</th>
                            <th>Kapasitas</th>
                            <th>Status Trip</th>
                            <th>Harga</th>
                            <th>Aksi</th>
              </tr>
          </thead>
            <tbody>
                @php
                   $i = 0
                  @endphp
                @foreach( $riwayattrip as $key=>$trips )
                @if ($trips->status_trip == "Selesai")
                      <tr>
              
                        <td>{{$key+1}}</td>
                        <td>{{ Carbon\Carbon::parse($trips->tanggal)->isoFormat('dddd, D MMMM Y') }}</td>
                        <td>{{$trips->users->name}}</td>
                        <td>{{$trips->tarif->rutes->daerahs->nama}} - {{$trips->tarif->rutes->daerahss->nama}}</td>
                        <td>{{$trips->kendaraang->nama_tipe}}</td>
                        <td>{{$trips->waktu}}</td>
                        <td>{{$trips->kapasitas}}</td>
                        <td>{{$trips->status_trip}}</td>
                     
                        <td>Rp.{{$trips->tarif->tarif_per_orang}}</td>
                        <td>

                        <a href="{{route('HalamanDetailRiwayatTrip', $trips->id)}}"> <button  class="btn btn-success btn-sm" >   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                          <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                          <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                        </svg></button></a> 
                      <a type="button" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#HapusTrip-{{$trips->id}}">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
</svg>
                      </a>
                      <!-- modal hapus -->
                      <div class="modal fade" id="HapusTrip-{{$trips->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  
      <div class="modal-body">
        <h2>Apakah Yakin Menghapus Data?</h2>
      </div>
      <form action="{{route('Trip.destroy',$trips->id)}}" method="POST" enctype="multipart/form-data" >
                          @csrf 
                          @method('DELETE')
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <button type="submit" class="btn btn-danger ">Hapus</button>
      </div>
      </form>
    </div>

  </div>
</div>
                      <!-- akhir modal hapus -->
                      </td>
                    
                      </tr>
                      @else
                      @endif
                      @endforeach
                    </tbody>
      </table>
      </div>
      <div class = "card-footer"></div>

    </div>
  </div>

</div>
</div>
@endsection