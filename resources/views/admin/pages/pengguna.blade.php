@extends('admin.layouts.admin')

@section('content')

<div class="content-wrapper">
          <div class="row">
            <!-- <div class="col-lg-6 grid-margin stretch-card">-->
            <div class="col-lg-12 grid-margin2 stretch-card">
              <div class="card">
                <div class = "card-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                  Tambah Pengguna
                </button>


                <div class="modal " id="myModal">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Pengguna Form</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                    
                      <!-- Modal body -->
                      <div class="modal-body">
                      
                    <form  class="forms-sample" action="{{route('TambahAkun')}}" method="POST"  enctype="multipart/form-data"  >
                    @csrf 
                    <div class = "row">
                       
                         <div class = "col-lg-6">
                              <div class = "form-group">
                                <label>Peran</label>
                                <select class = "form-control" name="role">
                                  <option value="Driver">Driver</option>
                                  <option value="Pengguna">Pengguna</option>
                                </select>
                              </div>
                              
                              <div class = "form-group">
                                <label>Nama Lengkap</label>
                                <input type ="text" name="name" class ="form-control" placeholder="Example : Willy Handoyo">
                              </div>
                          </div>
                              <div class = "col-lg-6">
                              <div class = "form-group">
                                <label>Email</label>
                                <input type = "email" name="email" class = "form-control" placeholder="Example : Limwilly0@gmail.com">
                              </div>
                              <div class="form-group">
                              <label>Password</label>
                  <input type="password" class="form-control form-control-lg" name="password" id="exampleInputPassword1" placeholder="Password">
                </div>

                                <div class = "form-group">
                                  <label>Nomor Hp</label>
                                  <input type ="text" name="no_hp" class = "form-control" placeholder="Example : 087734581234">
                                </div>

                              </div>
                             
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
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
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>No Handphone</th>
                            <th>Peran</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                @php
                   $i = 0
                  @endphp
                    @foreach($akun as $key=>$akun)
             
                        <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$akun->name}}</td>
                          <td>{{$akun->email}}</td>
                          <th>{{$akun->no_hp}}</th>
                          <th>{{$akun->role}}</th>
                          <th>
                          @if ($akun->status == NULL) 
                          Aktif
                          @else

                          <p class="text-danger"> {{$akun->status}}</p>
                          @endif
                        </th>
                          <td>
                 
                    @if ($akun->role == "Driver")

                          <a href="{{route('DetailUser', $akun->id)}}"> <button  class="btn btn-info btn-sm" >   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
</svg></button></a> 
<a type="button" class="btn btn-warning btn-sm"  data-toggle="modal" data-target="#Editakun-{{$akun->id}}">

<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
<path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
</svg>
</a>
<!-- modal edit -->
<div class="modal fade" id="Editakun-{{$akun->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Edit Data Daerah Form</h5>  
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form  class="forms-sample" action="{{route('EditAkun',$akun->id)}}" method="POST"  enctype="multipart/form-data"  >
@csrf 
<div class = "row">

<div class = "col-lg-6">
    <div class = "form-group">
      <label>Peran</label>
      <select class = "form-control" name="role">
        <option value="Driver">Driver</option>
        <option value="Pengguna">Pengguna</option>
      </select>
    </div>
    
    <div class = "form-group">
      <label>Nama Lengkap</label>
      <input type ="text" name="name" value="{{$akun->name}}" class ="form-control" placeholder="Example : Willy Handoyo">
    </div>
</div>
    <div class = "col-lg-6">
    <div class = "form-group">
      <label>Email</label>
      <input type = "email" name="email" value="{{$akun->email}}" class = "form-control" placeholder="Example : Limwilly0@gmail.com">
    </div>
    <div class="form-group">
    <label>Password</label>
    <input type="password" value="{{$akun->password}}" class="form-control form-control-lg" name="password" id="exampleInputPassword1" placeholder="Password">
     </div>

      <div class = "form-group">
        <label>Nomor Hp</label>
        <input type ="text" name="no_hp" value="{{$akun->no_hp}}" class = "form-control" placeholder="Example : 087734581234">
      </div>

    </div>
   
</div>
<div class="modal-footer">
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
<button type = "submit" class = "btn btn-primary">Submit</button>
</div>
</form>
</div>


</div>
</div>
</div>

</div>


<!-- akhir modal edit -->
<a type="button" class="btn btn-success btn-sm"  data-toggle="modal" data-target="#Verifikasiakun-{{$akun->id}}">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
  <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
</svg>
</a>
<!-- modal verifikasi -->

<div class="modal fade" id="Verifikasiakun-{{$akun->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Verifikasi Akun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('VerifikasiAkun',$akun->id)}}" method="POST">
          @csrf
      <div class = "form-group">
      <label>Silahkan Pilih Status Akun</label>
      <select class = "form-control" name="status">
        <option value="Aktif">Aktif</option>
        <option value="Tidak Aktif">Tidak Aktif</option>
      </select>
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
<!-- akhir modal verifikasi -->


<a type="button" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#Hapusakun-{{$akun->id}}">

<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
</svg>
</a>
<!-- modal hapusakun -->
<div class="modal fade" id="Hapusakun-{{$akun->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<form action="{{route('Akun.destroy',$akun->id)}}" method="POST" enctype="multipart/form-data" >
@csrf 
@method('DELETE')
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
<button type="submit" class="btn btn-danger ">Hapus</button>
</div>

                    @else
                    
                          <a type="button" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#LihatIdentitas-{{$akun->id}}">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
</svg>
                          </a>
                          <!-- modal identitas -->
                          <div class="modal fade" id="LihatIdentitas-{{$akun->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
         
            <h5>Foto Profil
            </h5>
            @if ($akun->gambarprofil == NULL)
            <p class="text-danger">Foto Belum Diupload</p>
            @else
            <img class="gambarprof" src="data:image/jpeg;base64,{{asset('inputan/img/profilp/foto_profil')}}/{{$akun->fotoprofil}}" alt="">
            @endif
            <h5 class="mt-5">Identitas
            </h5>
            @if ($akun->identitas == NULL)
            <p class="text-danger">Identitas Belum Diupload</p>
            
            @else
            <img class="gambarprof" src="data:image/jpeg;base64,{{ $akun->identitas }}" alt="">
            @endif
        </div>
       
    </div>
  </div>
</div>
<!-- akhir modal identitas -->
                          <a type="button" class="btn btn-warning btn-sm"  data-toggle="modal" data-target="#Editakun-{{$akun->id}}">

                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
  <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
</svg>
                          </a>
                  <!-- modal edit -->
                  <div class="modal fade" id="Editakun-{{$akun->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Daerah Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      <form  class="forms-sample" action="{{route('EditAkun',$akun->id)}}" method="POST"  enctype="multipart/form-data"  >
                    @csrf 
                    <div class = "row">
                      
                         <div class = "col-lg-6">
                              <div class = "form-group">
                                <label>Peran</label>
                                <select class = "form-control" name="role">
                                  <option value="Driver">Driver</option>
                                  <option value="Pengguna">Pengguna</option>
                                </select>
                              </div>
                              
                              <div class = "form-group">
                                <label>Nama Lengkap</label>
                                <input type ="text" name="name" value="{{$akun->name}}" class ="form-control" placeholder="Example : Willy Handoyo">
                              </div>
                          </div>
                              <div class = "col-lg-6">
                              <div class = "form-group">
                                <label>Email</label>
                                <input type = "email" name="email" value="{{$akun->email}}" class = "form-control" placeholder="Example : Limwilly0@gmail.com">
                              </div>
                              <div class="form-group">
                              <label>Password</label>
                              <input type="password" value="{{$akun->password}}" class="form-control form-control-lg" name="password" id="exampleInputPassword1" placeholder="Password">
                               </div>

                                <div class = "form-group">
                                  <label>Nomor Hp</label>
                                  <input type ="text" name="no_hp" value="{{$akun->no_hp}}" class = "form-control" placeholder="Example : 087734581234">
                                </div>

                              </div>
                             
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type = "submit" class = "btn btn-primary">Submit</button>
                      </div>
                      </form>
                      </div>
                      
                      
                    </div>
                  </div>
                </div>

              </div>


                  <!-- akhir modal edit -->
                  <a type="button" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#Hapusakun-{{$akun->id}}">

                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
</svg>
                  </a>
                  
<!-- akhir modal edit -->
<a type="button" class="btn btn-success btn-sm"  data-toggle="modal" data-target="#Verifikasiakun-{{$akun->id}}">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
  <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
</svg>
</a>
<!-- modal verifikasi -->

<div class="modal fade" id="Verifikasiakun-{{$akun->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Verifikasi Akun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="{{route('VerifikasiAkun',$akun->id)}}" method="POST">
          @csrf
      <div class = "form-group">
      <label>Silahkan Pilih Status Akun</label>
      <select class = "form-control" name="status">
        <option value="Aktif">Aktif</option>
        <option value="Tidak Aktif">Tidak Aktif</option>
      </select>
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
<!-- akhir modal verifikasi -->

                       <!-- modal hapusakun -->
                       <div class="modal fade" id="Hapusakun-{{$akun->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      <form action="{{route('Akun.destroy',$akun->id)}}" method="POST" enctype="multipart/form-data" >
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
                       <!-- akhir modal hapus akun -->
                       @endif
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
@endsection