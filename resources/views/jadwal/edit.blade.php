@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Detail</strong> <small>Jadwal Inspeksi</small>
                            <div class="card-header-actions">
                                @hasanyrole('PMK')
                                <input type="button" class="btn btn-sm btn-success" value="Buat Inspeksi"
                                       onclick="location.href = '{{route("kebakaran")}}'">
                                @endhasrole
                                @hasanyrole('TimInspeksi')
                                <input type="button" class="btn btn-sm btn-success" value="Buat Inspeksi"
                                       onclick="location.href = '{{route("ketidaksesuaian")}}'">
                                @endhasrole
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                @csrf
                                <h4 class="mb-3">Informasi Penjadwalan</h4>
                                <hr/>
                                <div class="form-group">
                                    <label for="tim">Pilih Tim</label>
                                    <select name="tim" class="form-control" id="tim" disabled>
                                        <option @if($data->tim == "TimInspeksi") selected @endif value="TimInspeksi">Tim
                                            Inspeksi
                                        </option>
                                        <option @if($data->tim == "PMK") selected @endif value="PMK">Pemadam Kebakaran
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tanggal Inspeksi</label>
                                    <input name="tanggal" class="form-control" id="tanggal" type="date"
                                           value="{{$data->tanggal}}" disabled>
                                </div>
                                <h4 class="mb-3">Deskripsi Tugas</h4>
                                <hr/>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" id="deskripsi" rows="6"
                                              placeholder="Deskripsikan tugas penjadwalan.."
                                              disabled>{{$data->deskripsi}}</textarea>
                                </div>
                                <hr/>
                                <div>
                                    @hasanyrole('Admin')
                                    <input type="submit" value="Simpan" class="btn btn-primary" disabled>
                                    @endhasrole
                                    @hasanyrole('PMK')
                                    <input type="button" class="btn btn-success" value="Buat Inspeksi"
                                           onclick="location.href = '{{route("kebakaran")}}'">
                                    @endhasrole
                                    @hasanyrole('TimInspeksi')
                                    <input type="button" class="btn btn-success" value="Buat Inspeksi"
                                           onclick="location.href = '{{route("ketidaksesuaian")}}'">
                                    @endhasrole
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
