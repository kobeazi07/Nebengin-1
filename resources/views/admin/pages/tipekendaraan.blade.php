@extends('admin.layouts.admin')

@section('content')

        <div class="content-wrapper">
          <div class="row">
            <!-- <div class="col-lg-6 grid-margin stretch-card">-->
            <div class="col-lg-12 grid-margin2 stretch-card">
              <div class="card">
                <div class = "card-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                  Tambah Tipe Kendaraan
                </button>


                <div class="modal" id="myModal">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Data Tipe Kendaraan Form</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                    <Form action="{{route('TambahKendaraan')}}" method="POST"  enctype="multipart/form-data"  >
                    @csrf   
                    <div class = "form-group">
                          <label>Tipe/Model</label>
                          <input type = "text" name = "nama_tipe" class = "form-control" placeholder="Example : MPV" required>
                        </div>

                        <div class = "form-group">
                          <label>Jumlah Kursi</label>
                          <input class = "form-control" type="number" name="jumlah_kursi" ondrop="return false;" onpaste="return false;" required />
                        </div>
                        <!-- <div class = "form-group">
                          <label>=Tipe Layanan</label>
                          <select class="custom-select" name="tipe_layanan" id="inputGroupSelect01">
                            <option selected disbaled>Pilih...</option>
                            <option value="Mobil">Mobil</option>
                            <option value="Pickup">Pickup</option>
                           
                          </select>
                        </div> -->
                      
                          <div class="form-group">
                            <label for="exampleFormControlFile1"  >Example file input</label>
                            <input type="file" name="gambardenah" class="form-control-file" id="exampleFormControlFile1" placeholder="Example : 1" required>
                          </div>
                          <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" >Submit</button>
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
                            <th>Tipe Kendaraan</th>
                            <th>Jumlah Kursi</th>
                            <!-- <th>Tipe Layanan</th> -->
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                @php
                   $i = 0
                  @endphp
                  @foreach($kendaraan as $key => $kendaraan)
                       <tr>
                    
                        <td>{{$key+1}}</td>
                        <td>{{$kendaraan->nama_tipe}}</td>
                        <td>{{$kendaraan->jumlah_kursi}}</td>
                        <!-- <td>{{$kendaraan->tipe_layanan}}</td> -->
                        <td><img class="gambarkat" src="{{asset('inputan/img/kendaraan')}}/{{$kendaraan->gambardenah}}" alt=""></td>
                      
                        <td>
                        <a type="button" class="btn btn-warning btn-sm"  data-toggle="modal" data-target="#Editkendaraan-{{$kendaraan->id}}">Edit</a>
                  <!-- modal edit -->
                  <div class="modal fade" id="Editkendaraan-{{$kendaraan->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Daerah Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="{{route('EditKendaraan',$kendaraan->id)}}" method="POST" enctype="multipart/form-data" >
                          @csrf 
                          <div class = "form-group">
                          <label>Tipe/Model</label>
                          <input type = "text" name = "nama_tipe" value="{{$kendaraan->nama_tipe}}"  class = "form-control" placeholder="Example : MPV" required>
                        </div>
                        <div class = "form-group">
                          <label>Jumlah Kursi</label>
                          <input class = "form-control" type="number" name="jumlah_kursi" value="{{$kendaraan->jumlah_kursi}}" ondrop="return false;" onpaste="return false;" required />
                        </div>
                        <!-- <div class = "form-group">
                          <label>=Tipe Layanan</label>
                          <select class="custom-select" name="tipe_layanan"  value="{{$kendaraan->tipe_layanan}}"  id="inputGroupSelect01">
                            <option selected disbaled>Pilih...</option>
                            <option value="Mobil">Mobil</option>
                            <option value="Pickup">Pickup</option>
                           
                          </select>
                        </div> -->
                      
                          <div class="form-group">
                            <label for="exampleFormControlFile1"  >Input Gambar</label>
                            <input type="file" name="gambardenah" value="{{$kendaraan->gambardenah}}" class="form-control-file" id="exampleFormControlFile1" placeholder="Example : 1" >
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
                  <a type="button" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#Hapuskendaraan-{{$kendaraan->id}}">Hapus</a>
                       <!-- modal hapusregion -->
                       <div class="modal fade" id="Hapuskendaraan-{{$kendaraan->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      <form action="{{route('Kendaraan.destroy',$kendaraan->id)}}" method="POST" enctype="multipart/form-data" >
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