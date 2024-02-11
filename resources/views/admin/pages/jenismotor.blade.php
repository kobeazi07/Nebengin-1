@extends('admin.layouts.admin')

@section('content')

        <div class="content-wrapper">
          <div class="row">
            <!-- <div class="col-lg-6 grid-margin stretch-card">-->
            <div class="col-lg-12 grid-margin2 stretch-card">
              <div class="card">
                <div class = "card-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                  Tambah Tipe JenisMotor
                </button>


                <div class="modal" id="myModal">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Data Tipe JenisMotor Form</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                    <form action="{{route('TambahJenisMotor')}}" method="POST"  enctype="multipart/form-data"  >
                    @csrf   
                    <div class = "form-group">
                          <label>Nama Jenis</label>
                          <input type = "text" name = "jenis_motor" class = "form-control" placeholder="Example : MPV" required>
                        </div>

                        <div class = "form-group">
                          <label>Tarif Per Motor</label>
                          <input class = "form-control" type="number" name="tarif_per_motor" placeholder="Rp." required />
                        </div>
                     
                          <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" >Submit</button>
                      </div>
                      </form>

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
                            <th>Tipe JenisMotor</th>
                            <th>Jumlah Kursi</th>
                           
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                @php
                   $i = 0
                  @endphp
                  @foreach($jenismotor as $key => $jenismotor)
                       <tr>
                    
                        <td>{{$key+1}}</td>
                        <td>{{$jenismotor->jenis_motor}}</td>
                        <td>Rp.{{$jenismotor->tarif_per_motor}}</td>  
                        <td>
                        <a type="button" class="btn btn-warning btn-sm"  data-toggle="modal" data-target="#Editjenismotor-{{$jenismotor->id}}">Edit</a>
                  <!-- modal edit -->
                  <div class="modal fade" id="Editjenismotor-{{$jenismotor->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Daerah Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      <form action="{{route('EditJenisMotor',$jenismotor->id)}}" method="POST"  enctype="multipart/form-data"  >
                    @csrf   
                    <div class = "form-group">
                          <label>Nama Jenis</label>
                          <input type = "text" value="{{$jenismotor->jenis_motor}}" name = "jenis_motor" class = "form-control" placeholder="Example : MPV" required>
                        </div>

                        <div class = "form-group">
                          <label>Tarif Per Motor</label>
                          <input class = "form-control" value="{{$jenismotor->tarif_per_motor}}" type="number" name="tarif_per_motor" placeholder="Rp." required />
                        </div>
                     
                          <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" >Submit</button>
                      </div>
                      </form>
                      </div>
                      
                      
                    </div>
                  </div>
                </div>

              </div>

                  <!-- akhir modal edit -->
                  <a type="button" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#Hapusjenismotor-{{$jenismotor->id}}">Hapus</a>
                       <!-- modal hapusregion -->
                       <div class="modal fade" id="Hapusjenismotor-{{$jenismotor->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      <form action="{{route('JenisMotor.destroy',$jenismotor->id)}}" method="POST" enctype="multipart/form-data" >
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