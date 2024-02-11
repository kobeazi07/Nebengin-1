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
                        <Form action="{{route('TambahPickupTarif')}}" method="POST"  enctype="multipart/form-data" >
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
                          <label>Tarif Per muatan</label>
                          <input type = "number" name="tarif_per_barang" class="form-control" placeholder="Rp.">
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
                            <th>Tarif Per Orang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                @php
                   $i = 0
                  @endphp
                @foreach($tarifpickup as $key => $tarifpickup)
                        <tr>
                
                            <td>{{$key+1}}</td>
                            <td>{{$tarifpickup->rutes->daerahs->nama}} - {{$tarifpickup->rutes->daerahss->nama}} </td>
                            <td>Rp.{{$tarifpickup->tarif_per_barang}}</td>
                            <td>
                            <a type="button" class="btn btn-warning btn-sm"  data-toggle="modal" data-target="#Edittarifpickup-{{$tarifpickup->id}}">Edit</a>
                  <!-- modal edit -->
                
                      
                  <!-- akhir modal edit -->
                  <a type="button" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#Hapustarifpickup-{{$tarifpickup->id}}">Hapus</a>
                       <!-- modal hapusregion -->
                       <div class="modal fade" id="Hapustarifpickup-{{$tarifpickup->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <form action="{{route('PickupTarif.destroy',$tarifpickup->id)}}" method="POST" enctype="multipart/form-data" >
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
                            <div class="modal" id="Edittarifpickup-{{$tarifpickup->id}}">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Tarif Rute Form</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                        <Form action="{{route('EditPickupTarif',$tarifpickup->id)}}" method="POST"  enctype="multipart/form-data" >
                        @csrf
                        <div class = "form-group">
                          <label>Pilih Rute</label>
                          <select class = "form-control" name="rutes_id">
                            @foreach($datarute as $rutens)
                            <option value="{{$rute->id}}" >{{$rute->daerahs->nama}} - {{$rute->daerahss->nama}} </option>
                            @endforeach
                          </select>
                        </div>
                        <div class = "form-group">
                          <label>Tarif Per muatan</label>
                          <input type = "number" value="{{$tarifpickup->tarif_per_barang}}"  name="tarif_per_barang" class="form-control" placeholder="Rp.">
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