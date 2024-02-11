@extends('admin.layouts.admin') @section('content')

<div class="content-wrapper">
    <div class="row mb-5">
        <div class="col-lg-2 col-6">
            <h2 class="fw-bold">Driver :</h2>
            <h3>Rute:
            </h3>
        </div>
        <div class="col-lg-6 col-6">

            <h2>{{$trip->users->name}}</h2>
            <h3>{{$trip->tarif->rutes->daerahs->nama}}
                -
                {{$trip->tarif->rutes->daerahss->nama}}
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
                                <th>Rute</th>
                                <th>Posisi Kursi</th>
                                <th>Tagihan</th>
                                <th>Review</th>
                                <th>Rating</th>
                          
                            </tr>
                        </thead>
                        @foreach($detail_trip as $detail_trips)
                        @if ($detail_trips->status == NULL)
                        <tr>
                        
                            <td>{{$detail_trips->users->name}}</td>
                            <td>{{$detail_trips->trip->tarif->rutes->daerahs->nama}}
                                -
                                {{$detail_trips->trip->tarif->rutes->daerahss->nama}}</td>
                            <td>{{$detail_trips->posisi_kursi}}</td>
                            <td>Rp.{{$detail_trips->trip->tarif->tarif_per_orang}}</td>
                            <td>{{$detail_trips->review}}</td>
                            <td>{{$detail_trips->rating}}</td>
                         
                          
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