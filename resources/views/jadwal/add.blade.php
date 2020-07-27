@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Buat</strong> <small>Jadwal Inspeksi</small>
                        </div>
                        <div class="card-body">
                            <form action="{{route('jadwal.create')}}" method="post">
                                @csrf
                                <h4 class="mb-3">Informasi Penjadwalan</h4>
                                <hr/>
                                <div class="form-group">
                                    <label for="hydrant">Pilih Tim</label>
                                    <select name="hydrant" class="form-control" id="hydrant">
                                        <option value="TimInspeksi">Tim Inspeksi</option>
                                        <option value="PMK">Pemadam Kebakaran</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tanggal Inspeksi</label>
                                    <input name="tanggal" class="form-control" id="tanggal" type="date">
                                </div>
                                <h4 class="mb-3">Deskripsi Tugas</h4>
                                <hr/>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" id="deskripsi" rows="6"
                                              placeholder="Deskripsikan tugas penjadwalan.."></textarea>
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
