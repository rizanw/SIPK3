@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header"><strong>Detail</strong> <small>Data APAR</small></div>
                        <div class="card-body">
                            <form action="{{route('kebakaran.alat.apar.create')}}" method="post">
                                @csrf
                                <h4 class="mb-3">Data APAR</h4>
                                <hr/>
                                <div class="form-group">
                                    <label for="kode">Kode ID APAR</label>
                                    <input name="kode" class="form-control" id="kode" type="text"
                                           placeholder="ID APAR" value="{{$data->kode}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="lokasi">Lokasi APAR</label>
                                    <input name="lokasi" class="form-control" id="lokasi" type="text"
                                           placeholder="Lokasi letak APAR" value="{{$data->lokasi}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="jenis">Jenis APAR</label>
                                    <select name="jenis" class="form-control" id="jenis" disabled>
                                        <option value="karbondioksida" @if($data->tipe == "karbondioksida") selected @endif>Karbondioksida (CO2)</option>
                                        <option value="dry-powder" @if($data->tipe == "dry-powder") selected @endif>Dry Powder</option>
                                        <option value="foam" @if($data->tipe == "foam") selected @endif>Foam</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tipe">Tipe APAR</label>
                                    <select name="tipe" class="form-control" id="tipe" disabled>
                                        <option value="store-presure" @if($data->tipe == "store-presure") selected @endif>Store Pressure</option>
                                        <option value="catridge" @if($data->tipe == "catridge") selected @endif>Catridge</option>
                                        <option value="gas" @if($data->tipe == "gas") selected @endif>Gas</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="berat">Berat APAR</label>
                                    <input name="berat" class="form-control" id="berat" type="number" min="0"
                                           placeholder="Berat APAR (dalam KG)" value="{{$data->berat}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="merk">Merk APAR</label>
                                    <input name="merk" class="form-control" id="merk" type="text"
                                           placeholder="Merk APAR" value="{{$data->merk}}" disabled>
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
