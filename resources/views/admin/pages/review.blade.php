@extends('admin.layouts.admin')

@section('content')

        <div class="content-wrapper">
          <div class="row">
            <!-- <div class="col-lg-6 grid-margin stretch-card">-->
            <div class="col-lg-12 grid-margin2 stretch-card">
              <div class="card">
                <div class = "card-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                  Tambah Tipe Pickup
                </button>


                <div class="modal" id="myModal">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Data Tipe Pickup Form</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                    <Form action="{{route('TambahPickup')}}" method="POST"  enctype="multipart/form-data"  >
                    @csrf   
                    <div class = "form-group">
                          <label>Tipe/Model</label>
                          <input type = "text" name = "tipe_pickup" class = "form-control" placeholder="Example : MPV" required>
                        </div>

                       
                      
                          <div class="form-group">
                            <label for="exampleFormControlFile1"  >Gambar Model Pickup</label>
                            <input type="file" name="gambarpi" class="form-control-file" id="exampleFormControlFile1" placeholder="Example : 1" required>
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
                            <th>Tipe Pickup</th>
                      
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                @php
                   $i = 0
                  @endphp
                  @foreach($pickup as $key => $pickup)
                       <tr >
                    
                        <td>{{$key+1}}</td>
                        <td>{{$pickup->tipe_pickup}}</td>
                     
                        <td><img class="gambarkat" src="{{asset('inputan/img/pickup')}}/{{$pickup->gambarpi}}" alt=""></td>
                      
                        <td>
                        <a type="button" class="btn btn-warning btn-sm"  data-toggle="modal" data-target="#Editpickup-{{$pickup->id}}">Edit</a>
                  <!-- modal edit -->
                  <div class="modal fade" id="Editpickup-{{$pickup->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Daerah Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="{{route('EditPickup',$pickup->id)}}" method="POST" enctype="multipart/form-data" >
                          @csrf 
                          <div class = "form-group">
                          <label>Tipe/Model</label>
                          <input type = "text" name="tipe_pickup" value="{{$pickup->tipe_pickup}}"  class = "form-control" placeholder="Example : MPV" required>
                        </div>

                     
                      
                          <div class="form-group">
                            <label for="exampleFormControlFile1"  >Input Gambar</label>
                            <input type="file" name="gambarpi" value="{{$pickup->gambarpi}}" class="form-control-file" id="exampleFormControlFile1" placeholder="Example : 1" >
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
                  <a type="button" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#Hapuspickup-{{$pickup->id}}">Hapus</a>
                       <!-- modal hapusregion -->
                       <div class="modal fade" id="Hapuspickup-{{$pickup->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      <form action="{{route('Pickup.destroy',$pickup->id)}}" method="POST" enctype="multipart/form-data" >
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