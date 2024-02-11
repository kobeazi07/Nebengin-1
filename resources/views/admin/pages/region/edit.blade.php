@extends('admin.layouts.admin')

@section('content')

<div class = "row">
    <div class = "col-lg-3"></div>
    <div class = "col-lg-6">
        <div class = "card">
            <div class = "card-header bg-warning text-white">Edit Data Daerah Form</div>
            <div class = "card-body">

                <div class = "form-group">
                    <label>Nama Daerah</label>
                    <input type = "text" name='nama' value='{{$region->nama}}' class="form-control">
                </div>
                <div class = "form-group">
                    <label>Keterangan</label>
                    <textarea class="form-control" nama='keterangan' value='{!!$region->keterangan!!}' style="height: 100px;"></textarea>
                </div>
            </div>
            <div class ="card-footer">
                <a href="#" class = "btn btn-secondary">Kembali</a>
                <button type = "submit" class = "btn btn-warning">Update</button>
            </div>
        </div>
    </div>
    <div class = "col-lg-3"></div>
</div>

@endsection
