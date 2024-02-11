@extends('admin.layouts.admin')

@section('content')

<div class="content-wrapper">
  <div class="row mb-5">
    <div class="col-6">
    
  
    </div>
  </div>
        <div class="row">
                        <div class = "col-lg-4">
                    <div class="card">
                      <div class = "card-header bg-primary text-white"><h6><b>Identitas Driver</b></h6></div>
                      <div class = "card-body align-center  " style="margin-top:-15px ;margin-bottom:-15px;">
                      <div class="mx-auto d-block">
                      <img src="{{asset('inputan/img/profild/foto_profil')}}/{{$akun->profildriver->foto_profil}}" class="gambarprof rounded-circle" alt="">
                                    <h5 class="text-sm-center mt-2 mb-1">{{$akun->name}}</h5>
                                    <div class="location text-sm-center">
                                    <div class="row justify-content-center">
                                        <div class="col-1"> 
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                        <div class="col-9">
                                            <p>{{$akun->email}}</p>
                                        </div>
                                      
                                    </div>
                                    </div>
                                    <div class="location text-sm-center">
                                    <div class="row justify-content-center">
                                        <div class="col-1"> 
                                        <i class="fa fa-whatsapp"></i> 
                                        </div>
                                    <div class="col-9">
                                    <p>{{$akun->no_hp}}</p>
                                    </div>
                                      
                                        </div>
                                      
                                    </div>
                                    
                                </div>
                                <hr>
                                <div class="card-text text-sm-center">
                               @if ($akun->status == NULL) 
                                <span
                                        class="text-danger">Pengguna belum diverifikasi</span>
                                  @elseif ($akun->status == "Biodata Belum dikonfirmasi")
                                  <span
                                        class="text-danger">Pengguna belum diverifikasi</span>
                                        <button class="btn btn-primarry">Konfirmasi Data</button>
                                  @elseif($akun->status == "Aktif")

                                  <span
                                        class="text-success">Pengguna Telah Diverifikasi</span>
                                        @elseif($akun->status == "Tidak Aktif")

                                    <span
                                    class="text-danger">Akun Tidak Aktif</span>
                                  @endif
                                  <div class="row justify-content-center">
                                    <a href="#"><i class="fa fa-facebook pr-1"></i></a>
                                    <a href="#"><i class="fa fa-twitter pr-1"></i></a>
                                    <a href="#"><i class="fa fa-linkedin pr-1"></i></a>
                                    <a href="#"><i class="fa fa-pinterest pr-1"></i></a> 
                                    </div>
                                </div>
                    </div>
                    </div>
                  </div>
                

                  <div class = "col-lg-4">
                  <div class="card">
                      <div class = "card-header bg-danger text-white"><h6><b>Foto Identitas</b></h6></div>
                      <div class = "card-body" style="margin-top:-15px ;margin-bottom:-15px;">
                      <h4 class="fw-bold ">KTP</h4>
                          <img src="{{asset('inputan/img/profild/fotoktp')}}/{{$akun->profildriver->ktp}}" class="gambarkartu " alt="">
                          <h4 class="fw-bold mt-5">SIM</h4>
                          <img src="{{asset('inputan/img/profild/fotosim')}}/{{$akun->profildriver->sim}}" class="gambarkartu " alt="">
                          <h4 class="fw-bold mt-5">STNK</h4>
                          <img src="{{asset('inputan/img/profild/fotostnk')}}/{{$akun->profildriver->stnk}}" class="gambarkartu " alt="">
                    </div>
                      <div class = "card-footer">
                    
                      </div>
                    </div>
                  </div>
                  <div class = "col-lg-4">
                  <div class="card">
                      <div class = "card-header bg-warning text-white">
                        <div class="row">
                        
              <div class="col-6">
      <h6 class="mt-2"><b>Saldo Driver</b></h6>
      </div>
      <div class="col-4">
              <h6 class="mt-2">Rp.<span>{{$totalsaldo->jumlah_saldo_sekarang}}</span></h6>
          </div>
          </div>
              
          </div>
        <div class = "card-body" style="margin-top:-15px ;margin-bottom:-15px;">
        <div class="row">
        <table  id="table_id" class="display">
          <thead>
            <tr>
              <td>
              Tanggal
              </td>
              <td>
                Nominal  
              </td>
              <td>
                Aksi
              </td>
            </tr>
          </thead>
          <tbody>
            @foreach($konfirmasitopup as $konfirm)
            @if ($konfirm->status_top_up != "Konfirmasi")
              <tr>
                <td>
               {{$konfirm->tanggal_topup}}
                </td>
                <td>  
                 Rp. {{$konfirm->jumlah_saldo_inputan}}
                </td>
                <td>
         <button
    type="button"
    class="btn btn-success btn-sm"
    data-toggle="modal"
    data-target="#konfirmasitopup-{{$konfirm->id}}">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                fill="currentColor"
                class="bi bi-eye-fill"
                viewBox="0 0 16 16">
                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                <path
                    d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
            </svg>
        </button>

        <!-- modal topup -->
        <div class="modal fade" id="konfirmasitopup-{{$konfirm->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('KonfirmasiTopUp',$akun->id)}}" method="POST">
          @csrf
      <h5>Bukti Pembayaran
            </h5>
            <img class="gambarprof" src="{{asset('inputan/img/profild/DataTopUp')}}/{{$akun->topupsaldo->bukti}}" alt="">
        <input type="hidden" name="status_top_up" >

        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Konfirmasi</button>
      </div>
      </form>
    </div> 
     
    </div>
  </div>
</div>
        <!-- akhirmodal topup -->
                </td>
                
              </tr>  
              @else
              @endif
              @endforeach
          </tbody>
        </table>
        </div>
      </div>
        <div class = "card-footer">
      
        </div>
      </div>
    </div>

        </div>
        
        <div class="card mt-5">
          
        <div class = "card-header bg-primary text-white"><h6><b>Foto Kendaraan</b></h6>
                </div>
        <div class = "card-body align-center" style="margin-top:-15px ;margin-bottom:-15px;">
                <div class="row ">
                    <div class="col-sm-4 mb-3">
                      <h6 class="text-left bold" >Foto Tampak Depan</h6>
                    <img src="{{asset('inputan/img/profild/fotokendaraan')}}/{{$akun->profildriver->fotokendaraan1}}" class="mt-3 gambarkartu " alt="">
                    </div>
                    <div class="col-sm-4 mb-3">
                    <h6 class="text-left bold" >Foto Tampak Depan</h6>
                    <img src="{{asset('inputan/img/profild/fotokendaraan')}}/{{$akun->profildriver->fotokendaraan2}}" class="mt-3 gambarkartu " alt="">
                    </div>
                    <div class="col-sm-4 mb-3">
                    <h6 class="text-left bold" >Foto Tampak Depan</h6>
                    <img src="{{asset('inputan/img/profild/fotokendaraan')}}/{{$akun->profildriver->fotokendaraan3}}" class="gambarkartu mt-3 " alt="">
                    </div>
                    <div class="col-sm-4 mb-3">
                    <h6 class="text-left bold" >Foto Tampak Depan</h6>
                    <img src="{{asset('inputan/img/profild/fotokendaraan')}}/{{$akun->profildriver->fotokendaraan4}}" class="gambarkartu mt-3 " alt="">
                    </div>
                    <div class="col-sm-4 mb-3">
                    <h6 class="text-left bold" >Foto Tampak Depan</h6>
                    <img src="{{asset('inputan/img/profild/fotokendaraan')}}/{{$akun->profildriver->fotokendaraan5}}" class="gambarkartu mt-3 " alt="">
                    </div>
                
                </div>
                     
          </div>
      
        </div>


        <div class="row mt-2">
  <!-- <div class="col-lg-6 grid-margin stretch-card">-->
  <div class="col-lg-12 grid-margin2 stretch-card">
    
  </div>

</div>

</div>

@endsection