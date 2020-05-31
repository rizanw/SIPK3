@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header"><strong>Tambah</strong> <small>Data APAR</small></div>
                        <div class="card-body">
                            <form action="{{route('kebakaran.alat.apar.create')}}" method="post">
                                @csrf
                                <h4 class="mb-3">Data APAR</h4>
                                <hr/>
                                <div class="form-group">
                                    <label for="kode">Kode ID APAR</label>
                                    <input name="kode" class="form-control" id="kode" type="text"
                                           placeholder="ID APAR">
                                </div>
                                <div class="form-group">
                                    <label for="jenis">Jenis APAR</label>
                                    <select name="jenis" class="form-control" id="jenis">
                                        <option>Karbondioksida (CO2)</option>
                                        <option>Dry Chemical Powder</option>
                                        <option>Foam</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="berat">Berat APAR</label>
                                    <input name="berat" class="form-control" id="berat" type="number" min="0"
                                           placeholder="Berat APAR (dalam KG)">
                                </div>
                                <div class="form-group">
                                    <label for="lokasi">Lokasi APAR</label>
                                    <input name="lokasi" class="form-control" id="lokasi" type="text"
                                           placeholder="Lokasi letak APAR">
                                </div>
                                <hr/>
                                <div>
                                    <input type="submit" value="Simpan" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
