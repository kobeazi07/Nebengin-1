@extends('admin.layouts.admin')

@section('content')

        <div class="content-wrapper">
          <div class="row">
            <!-- <div class="col-lg-6 grid-margin stretch-card">-->
            <div class="col-lg-12 grid-margin2 stretch-card">
              <div class="card">
                <div class = "card-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                  Tambah Rute
                </button>


                <div class="modal" id="myModal">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Rute Form</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->

                      <div class="modal-body">
                    <Form action="{{route('TambahRute')}}" method="POST"  enctype="multipart/form-data">
                    @csrf   
                    <div class = "form-group gambarkat">
                          <label>Daerah Asal</label>
                          <select class="js-example-basic-single w-100 " name="daerah_asal">
                          @foreach($region as $regions)
                      <option value="{{$regions->id}}">{{$regions->nama}}</option>
                     
                      @endforeach
                    </select>
                        </div>

                        <div class ="form-group gambarkat">
                          <label>Daerah Tujuan</label>  
                          <select class="js-example-basic-single w-100 " name="daerah_tujuan">
                          @foreach($region as $regionss)
                      <option value="{{$regionss->id}}">{{$regionss->nama}} </option>
                     
                      @endforeach
                    </select>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type = "submit" class = "btn btn-primary">Submit</button>
                      </div>
                    </Form>
                      </div>

                      <!-- Modal footer -->
                      

                    </div>
                  </div>
                </div>
                </div>
            
                <div class="card-body table-container">
                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Daerah Asal</th>
                            <th>Daerah Tujuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                @php
                   $i = 0
                @endphp
                  @foreach($rutes as $key => $rutes)
                     <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$rutes->daerahs->nama}}</td>
                        <td>{{$rutes->daerahss->nama}}</td>
                        <td>
                         
                        <a type="button" class="btn btn-warning btn-sm"  data-toggle="modal" data-target="#Editrute-{{$rutes->id}}">Edit</a>
                  <!-- modal edit -->
                  <div class="modal fade" id="Editrute-{{$rutes->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div cl fv b  ass="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Daerah Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="{{route('EditRute',$rutes->id)}}" method="POST" enctype="multipart/form-data" >
                          @csrf 
                          <div class x`= "form-group gambarkat">
                          <label>Daerah Asal</label>
                          <select class="js-example-basic-single w-100 " name="daerah_asal">
                          @foreach($region as $regiom)
                      <option value="{{$regiom->id}}">{{$regiom->nama}}</option>
                     
                      @endforeach
                    </select>
                        </div>

                        <div class ="form-group gambarkat">
                          <label>Daerah Tujuan</label>  
                          <select class="js-example-basic-single w-100 " name="daerah_tujuan">
                          @foreach($region as $regiomss)
                      <option value="{{$regiomss->id}}">{{$regiomss->nama}} </option>
                     
                      @endforeach
                    </select>
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

                  <a type="button" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#Hapusrute-{{$rutes->id}}">Hapus</a>
                       <!-- modal hapusregion -->
                       <div class="modal fade" id="Hapusrute-{{$rutes->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      <form action="{{route('Rute.destroy',$rutes->id)}}" method="POST" enctype="multipart/form-data" >
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