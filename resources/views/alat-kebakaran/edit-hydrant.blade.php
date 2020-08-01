@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header"><strong>Detail</strong> <small>Data Hydrant</small></div>
                        <div class="card-body">
                            <form action="{{route('kebakaran.alat.hydrant.create')}}" method="post">
                                @csrf
                                <h4 class="mb-3">Data Hydrant</h4>
                                <hr/>
                                <div class="form-group">
                                    <label for="kode">QR Code APAR  </label>
                                    <div class="row mb-2">
                                        <div class="col">
                                            {!! QrCode::size(240)->generate(route('kebakaran.hydrant.add.byId', $data->id)); !!}
                                        </div>
                                    </div>
                                    <a class="btn btn-sm btn-info" href="{{route('kebakaran.hydrant.qr', $data->id)}}"> <i class="cil-data-transfer-down"></i>Download QR</a>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="kode">Kode ID Hydrant</label>
                                    <input name="kode" class="form-control" id="kode" type="text"
                                           placeholder="ID Hydrant" value="{{$data->kode}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="lokasi">Lokasi Hydrant</label>
                                    <input name="lokasi" class="form-control" id="lokasi" type="text"
                                           placeholder="Lokasi letak Hydrant" value="{{$data->lokasi}}" disabled>
                                </div>
                                <hr/>
                                <div>
                                    <input type="submit" value="Simpan" class="btn btn-primary" disabled>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
