@extends('admin.layouts.admin')

@section('content')

        <div class="content-wrapper">
          <div class="row">
            <!-- <div class="col-lg-6 grid-margin stretch-card">-->
            <div class="col-lg-12 grid-margin2 stretch-card">
              <div class="card">
                <div class = "card-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                  Tambah Alasan
                </button>
                <div class="modal" id="myModal">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Alasan Form</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                      <form action="{{route('TambahAlasan')}}" method="POST" class="forms-sample"  enctype="multipart/form-data" >
                    @csrf
                        <div class="form-group">
                          <label>Nama Alasan</label>
                          <input type="text" class="form-control" placeholder="Nama Alasan" name="alasan">
                        </div>
                        
                     
                        <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      </div>
                    </form>
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
                            <th>Alasan</th>
                          
                            <th>Aksi</th>
                        </tr> 
                    </thead>
                    <tbody>
                  @php
                   $i = 0
                  @endphp
                @foreach ($alasan as $key => $alasan)
                        <tr>
                
                            <td>{{$key + 1}}</td>
                            <td>{{$alasan->alasan}}</td>
                       
                            <td>
                              <a type="button" class="btn btn-warning btn-sm"  data-toggle="modal" data-target="#Editalasan-{{$alasan->id}}">Edit</a>
                  <!-- modal edit -->
                  <div class="modal fade" id="Editalasan-{{$alasan->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Alasan Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="{{route('EditAlasan',$alasan->id)}}" method="POST" enctype="multipart/form-data" >
                          @csrf 
                                <div class = "form-group">
                                    <label>Nama Alasan</label>
                                    <input type = "text" name='alasan' value='{{$alasan->alasan}}' class="form-control">
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
                              <a type="button" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#Hapusalasan-{{$alasan->id}}">Hapus</a>
                       <!-- modal hapusalasan -->
                       <div class="modal fade" id="Hapusalasan-{{$alasan->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      <form action="{{route('Alasan.destroy',$alasan->id)}}" method="POST" enctype="multipart/form-data" >
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
                       <!-- akhir modal hapus alasan -->
                  
                           
                            </td>
                        
                        </tr> 
                        @endforeach
                    </tbody>
                </table>
                
              
                </div>
            </div>
          </div>
        </div>
</div>
</div>
        <!-- content-wrapper ends -->
    
@endsection