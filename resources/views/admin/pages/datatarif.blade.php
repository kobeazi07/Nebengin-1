@extends('admin.layouts.admin')

@section('content')

        <div class="content-wrapper">
          <div class="row">
            <!-- <div class="col-lg-6 grid-margin stretch-card">-->
            <div class="col-lg-12 grid-margin2 stretch-card">
              <div class="card">
                <div class = "card-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                  Tambah Tarif Rute
                </button>


                <div class="modal" id="myModal">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Tarif Rute Form</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                        <Form action="{{route('TambahTarif')}}" method="POST"  enctype="multipart/form-data" >
                        @csrf
                        <div class = "form-group">
                          <label>Pilih Rute</label>
                          <select class = "form-control" name="rutes_id">
                            @foreach($rute as $rute)
                            <option value="{{$rute->id}}" >{{$rute->daerahs->nama}} - {{$rute->daerahss->nama}} </option>
                            @endforeach
                          </select>
                        </div>

                        <div class = "form-group">
                          <label>type Kendaraan</label>
                          <select class = "form-control" name="kendaraans_id">
                            @foreach($kendaraan as $kendaraan)
                              <option value="{{$kendaraan->id}}">{{$kendaraan->nama_tipe}}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class = "form-group">
                          <label>Tarif Per muatan</label>
                          <input type = "number" name="tarif_per_orang" class="form-control" placeholder="Rp.">
                        </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary" >Submit</button>
                            </div>
                      </From>
                      </div>

                    

                    </div>
                  </div>
                </div>
                </div>
            
                <div class="card-body table-container">
                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Rute</th>
                            <th>Tipe Kendaraan</th>
                            <th>Tarif Per Orang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                @php
                   $i = 0
                  @endphp
                @foreach($tarif as $key => $tarif)
                        <tr>
                
                            <td>{{$key+1}}</td>
                            <td>{{$tarif->rutes->daerahs->nama}} - {{$tarif->rutes->daerahss->nama}} </td>
                            <td>{{$tarif->kendaraang->nama_tipe}}</td>
                            <td>Rp.{{$tarif->tarif_per_orang}}</td>
                            <td>
                            <a type="button" class="btn btn-warning btn-sm"  data-toggle="modal" data-target="#Edittarif-{{$tarif->id}}">Edit</a>
                  <!-- modal edit -->
                  <div class="modal fade" id="Edittarif-{{$tarif->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Daerah Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="{{route('EditTarif',$tarif->id)}}" method="POST" enctype="multipart/form-data" >
                          @csrf
                          <div class = "form-group">
                          <label>Pilih Rute</label>
                          <select class = "form-control" name="rutes_id">
                            @foreach($datarute as $rutens)
                            <option value="{{$rutens->id}}">{{$rutens->daerahs->nama}}-{{$rutens->daerahs->nama}} </option>
                            @endforeach
                          </select>
                        </div>

                        <div class = "form-group">
                          <label>type Kendaraan</label>
                          <select class = "form-control" name="kendaraans_id">
                            @foreach($datakendaraan as $kendaraans)
                              <option value="{{$kendaraans->id}}">{{$kendaraans->nama_tipe}}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class = "form-group">
                          <label>Tarif Per muatan</label>
                          <input type = "number" name="tarif_per_orang" value="{{$tarif->tarif_per_orang}}" class="form-control" placeholder="Rp.">
                        </div>
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

              </div>

                  <!-- akhir modal edit -->
                  <a type="button" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#Hapustarif-{{$tarif->id}}">Hapus</a>
                       <!-- modal hapusregion -->
                       <div class="modal fade" id="Hapustarif-{{$tarif->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <form action="{{route('Tarif.destroy',$tarif->id)}}" method="POST" enctype="multipart/form-data" >
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
                       <!-- akhir modal hapus region -->
                  
                            </td>
                        </tr>
                   @endforeach     
                    </tbody>
                </table>
                </div>
               

              </div>
            </div>
        
        </div>
        <!-- content-wrapper ends -->
      </div>


@endsection