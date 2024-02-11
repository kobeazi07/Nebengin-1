<div class="card">
                <div class="card-header bg-warning n text-white">Penumpang</div>
                <div class="card-body table-container">
            <table id="table_id2" class="display">
                <thead>
                    <tr>
                    <th>Nama</th>
                    <th>Rute</th>
                    <th>Posisi Kursi</th>
                    <th>Tagihan</th>
                    <th>Review</th>
                    <th>Rating</th>
                
                    <th>Aksi</th>
                    </tr>   
                </thead>
                <tbody>
                @foreach($request as $request)
                <td>{{$request->RelasiTripP->users->name}}</td>
                <td>{{$request->RelasiRequest->rutes->daerahs->nama}}
                    -
                    {{$request->RelasiRequest->rutes->daerahss->nama}}</td>
                <td>{{$request->RelasiTripP->posisi_kursi}}</td>
                <td>Rp.{{$request->RelasiRequest->tarif_per_orang}}</td>
                <td>{{$request->RelasiTripP->review}}</td>
                <td>{{$request->RelasiTripP->rating}}</td>
                <td></td>
                
                @endforeach
                </tbody>
            </table>
            </div>
            </div>
</div>