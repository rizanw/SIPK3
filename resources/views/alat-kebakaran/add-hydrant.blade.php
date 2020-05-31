@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header"><strong>Tambah</strong> <small>Data Hydrant</small></div>
                        <div class="card-body">
                            <form action="{{route('kebakaran.alat.hydrant.create')}}" method="post">
                                @csrf
                                <h4 class="mb-3">Data Hydrant</h4>
                                <hr/>
                                <div class="form-group">
                                    <label for="kode">Kode ID Hydrant</label>
                                    <input name="kode" class="form-control" id="kode" type="text"
                                           placeholder="ID Hydrant">
                                </div>
                                <div class="form-group">
                                    <label for="lokasi">Lokasi Hydrant</label>
                                    <input name="lokasi" class="form-control" id="lokasi" type="text"
                                           placeholder="Lokasi letak Hydrant">
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
