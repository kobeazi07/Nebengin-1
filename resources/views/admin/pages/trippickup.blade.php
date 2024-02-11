@extends('admin.layouts.admin')

@section('content')

 <div class="content-wrapper">
          <div class="row">
            <!-- <div class="col-lg-6 grid-margin stretch-card">-->
            <div class="col-lg-12 grid-margin2 stretch-card">
              <div class="card">
                <div class = "card-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                  Tambah Trip
                </button>


                <div class="modal" id="myModal">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Data Trip form</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                      <form action="{{route('TambahPickupTrip')}}" method="POST">
                          @csrf
                        <div class = "row">
                        
                          <div class = "col-lg-6">
                            
                        <div class = "form-group">
                          <label>Tanggal Keberangkatan</label>
                          <input type = "date" class="form-control" name="tanggal">
                        </div>

                        <div class = "form-group">
                          <label>waktu</label>
                          <select class = "form-control" name="waktu">
                            <option value="Pagi">Pagi</option>
                            <option value="Sore">Sore</option>

                          </select>
                        </div>
                        <div class ="form-group">
                        <label>Jam Keberangkatan</label>
                         <input type = "time" class="form-control" name="jam_keberangkatan">
                         </div>
                        <div class ="form-group">
                        <label>Maksimum Kapasitas</label>
                         
                          <input type = "number" class="form-control" name="kapasitas">
                        
                        </div>
                          </div>
                        
                          <div class = "col-lg-6"> 

                            <div class = "form-group gambarkat">
                            <label>Driver</label> 
                            <select class = "form-control js-example-basic-single w-100" name="users_id">
                              @foreach($akun as $user_driver)
                              @if($user_driver->role == "Driver")
                        
                              <option value="{{$user_driver->id}}">{{$user_driver->name}}</option>
                           
                              @endif
                              @endforeach
                            </select>
                            </div>

                            <div class = "form-group">
                              <label>Jenis Motor</label>
                          
                              <select class = "form-control js-example-basic-single w-100" name="jenis_motor_id">
                              @foreach($jenismotor as $jenismotor)
                                <option value="{{$jenismotor->id}}">{{$jenismotor->jenis_motor}}</option>
                                @endforeach
                              </select>
                           
                            </div>

                            <div class ="form-group">
                              <label>Status Trip</label>
                              <select class= "form-control" name="status_trip">
                              <option value="Tunggu">Menunggu</option>
                                <option value="Berangkat">Barangkat</option>
                                <option value="Istirahat">Istirahat</option>
                                <option value="Dialihkan">Dialihkan</option>
                                <option value="Selesai">Selesai</option>
                               
                              </select>
                            </div>

                            <div class ="form-group">
                              <label>Rute</label>
                              <select class= "form-control js-example-basic-single w-100" name="pickup_tarifs_id">
                                @foreach($tarifpickup as $tarifpickup)
                                <option value="{{$tarifpickup->id}}">{{$tarifpickup->rutes->daerahs->nama}} - {{$tarifpickup->rutes->daerahss->nama}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>

                        </div>
                        <div class = "form-group">
                            <label>Catatan</label>
                            <textarea class = "form-control" style = "height:100px;" placeholder="Catatan" name="note"></textarea>
                          </div>
                      </div>

                      <!-- Modal footer -->
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type = "submit" class = "btn btn-primary">Submit</button>
                          </div>
                      </div>
                  
                  </div>
                  </form>
                </div>
                </div>
             
                <div class="card-body table-container">
                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Tanggal</th>
                            <th>Driver</th>
                            <th>Rute</th>
                          
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
                @foreach( $trippickup as $key=>$trips )
                @if ($trips->status_trip != "Selesai")
                      <tr>
              
                        <td>{{$key+1}}</td>
                        <td>{{ Carbon\Carbon::parse($trips->tanggal)->isoFormat('dddd, D MMMM Y') }}</td>
                        <td>{{$trips->users->name}}</td>
                        <td>{{$trips->pickuptarif->rutes->daerahs->nama}} - {{$trips->pickuptarif->rutes->daerahss->nama}}</td>
                      
                        <td>{{$trips->waktu}}</td>
                        <td>{{$trips->kapasitas}}</td>
                        <td>{{$trips->status_trip}}</td>
                     
                        <td>Rp.{{$trips->pickuptarif->tarif_per_barang}} </td>
                        <td>
                        <a href="{{route('HalamanDetailPickupTrip', $trips->id)}}"> <button  class="btn btn-success btn-sm">   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                          <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                          <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                        </svg></button></a> 
                                                <a type="button" class = "btn btn-warning btn-sm" data-toggle="modal" data-target="#EditPickupTrip-{{$trips->id}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                          <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                        </svg>
                        </a>
                       <!--modal edit  -->
                       <!-- Modal -->
                    <div
                        class="modal fade"
                        id="EditPickupTrip-{{$trips->id}}"
                        tabindex="-1"
                        aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{route('EditPickupTrip',$trips->id)}}" method="POST">
                          @csrf
                        <div class = "row">
                        
                          <div class = "col-lg-6">
                            
                        <div class = "form-group">
                          <label>Tanggal Keberangkatan</label>
                          <input type = "date" class="form-control" name="tanggal" value="{{$trips->tanggal}}">
                        </div>

                        <div class = "form-group">
                          <label>waktu</label>
                          <select class = "form-control" name="waktu" value="{{$trips->waktu}}">
                            <option value="Pagi">Pagi</option>
                            <option value="Sore">Sore</option>

                          </select>
                        </div>
                        <div class ="form-group">
                        <label>Jam Keberangkatan</label>
                         <input type = "time" class="form-control" name="jam_keberangkatan" value="{{$trips->jam_keberangkatan}}" required>
                         </div>
                        <div class ="form-group">
                        <label>Maksimum Kapasitas</label>
                         
                          <input type = "number" class="form-control" name="kapasitas"  value="{{$trips->kapasitas}}">
                        
                        </div>
                          </div>
                        
                          <div class = "col-lg-6">

                            <div class = "form-group gambarkat">
                            <label>Driver</label> 
                            <select class = "form-control js-example-basic-single w-100" name="users_id"  value="{{$trips->users_id}}">
                              @foreach($akun as $user_driver)
                              @if($user_driver->role == "Driver")
                              <option value="{{$user_driver->id}}">{{$user_driver->name}}</option>
                              @endif
                              @endforeach
                            </select>
                            </div>

                            <div class = "form-group">
                              <label>Jenis Motor</label>
                          
                              <select class = "form-control js-example-basic-single w-100" name="jenis_motor_id"  value="{{$trips->jenis_motor_id}}">
                              @foreach( $datajenismotor as $jenismotoru)
                                <option value="{{$jenismotoru->id}}">{{$jenismotoru->jenis_motor}}</option>
                                @endforeach
                              </select>
                           
                            </div>

                            <div class ="form-group">
                              <label>Status Trip</label>
                              <select class= "form-control" name="status_trip"  value="{{$trips->status_trip}}">
                                <option value="Tunggu">Menunggu</option>
                                <option value="Berangkat">Barangkat</option>
                                <option value="Istirahat">Istirahat</option>
                                <option value="Dialihkan">Dialihkan</option>
                                <option value="Selesai">Selesai</option>
                               
                              </select>
                            </div>

                            <div class ="form-group">
                              <label>Rute</label>
                              <select class= "form-control js-example-basic-single w-100" name="pickup_tarifs_id"  value="{{$trips->pickup_tarifs_id}}">
                                @foreach($datatarif as $tarif)
                                <option value="{{$tarif->id}}">{{$tarif->rutes->daerahs->nama}} - {{$tarif->rutes->daerahss->nama}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>

                        </div>
                        <div class = "form-group">
                            <label>Catatan</label>
                            <textarea class = "form-control" style = "height:100px;" placeholder="Catatan" name="note"   value="{{$trips->catatan}}"></textarea>
                          </div>
                      </div>

                      <!-- Modal footer -->
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type = "submit" class = "btn btn-primary">Submit</button>
                          </div>
                      </div>
                  
                  </div>
                  </form>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                      <!-- akhir modal edit -->
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
      <form action="{{route('PickupTrip.destroy',$trips->id)}}" method="POST" enctype="multipart/form-data" >
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
            

              </div>
            </div>
</div>
        </div>
        <!-- content-wrapper ends -->
      </div>
</div>

@endsection