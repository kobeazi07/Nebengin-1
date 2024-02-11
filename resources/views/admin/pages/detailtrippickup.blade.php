@extends('admin.layouts.admin') @section('content')

<div class="content-wrapper">
    <div class="row mb-5">
        <div class="col-lg-2 col-6">
            <h2 class="fw-bold">Driver :</h2>
            <h3>Rute:
            </h3>
        </div>
        <div class="col-lg-6 col-6">

            <h2>{{$trippickup->users->name}}</h2>
            <h3>{{$trippickup->pickuptarif->rutes->daerahs->nama}}
                -
                {{$trippickup->pickuptarif->rutes->daerahss->nama}}
            </h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-success text-white">Penumpang</div>
                <div class="card-body table-container">
                    <table id="table_id" class="display">
                        <thead>
                            <tr>

                                <th>Nama</th>
                               
                                <th>JenisMotor</th>
                                <th>Tagihan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        @foreach($detail_trip as $detail_trips)
                        @if ($detail_trips->status != "Batal" )
                        <tr>

                            <td>{{$detail_trips->users->name}}</td>
 
                            <td>{{$detail_trips->jenismotor->jenis_motor}}</td>
                            <td>Rp.{{$detail_trips->pickuptrip->pickuptarif->tarif_per_barang}}</td>
                            <td>
                                <button
                                    type="button"
                                    class="btn btn-warning"
                                    data-toggle="modal"
                                    data-target="#TukarPenumpang-{{$detail_trips->id}}">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="16"
                                        height="16"
                                        fill="currentColor"
                                        class="bi bi-arrow-left-right"
                                        viewbox="0 0 16 16">
                                        <path
                                            fill-rule="evenodd"
                                            d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z"/>
                                    </svg>
                                </button>

                                <!-- modal pindahkan -->
                            <div
                                class="modal fade"
                                id="TukarPenumpang-{{$detail_trips->id}}"
                                tabindex="-1"
                                aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Pindahkan Penumpang</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                            <form action="{{route('PindahPickupTrip',$detail_trips->id)}}" method="POST">
                                @csrf
                           
                                <div class="form-group">
                                    <label>Trip</label>
                                    <select class="form-control js-example-basic-single w-100" name="pickup_trips_id">
                                        @foreach($tripu as $terip)
                                        <option value="{{$terip->id}}">{{$terip->pickuptarif->rutes->daerahs->nama}}
                                            -
                                            {{$terip->pickuptarif->rutes->daerahss->nama}} <span class="bold "> ({{$terip->users->name}})</span></option>
                                        @endforeach
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
                              <!-- akhir modal pindahkanb -->
                              <button
                                    type="button"
                                    class="btn btn-danger"
                                    data-toggle="modal"
                                    data-target="#CanclePenumpang-{{$detail_trips->id}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
</svg>
                                </button>
                               <!-- cancle penumpang -->
                               <div
                                class="modal fade"
                                id="CanclePenumpang-{{$detail_trips->id}}"
                                tabindex="-1"
                                aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Pindahkan Penumpang</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                            <form action="{{route('CanclePickupTrip',$detail_trips->id)}}" method="POST">
                                @csrf
                           
                                <div class="form-group">
                                    <h3>Ingin Mengcancle Trip?</h3>
                                    <input type="hidden" value="Batal" name="status">
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
                                <!-- akhir cancle penumpang -->

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



@endsection