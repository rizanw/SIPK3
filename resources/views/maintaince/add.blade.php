@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Buat</strong> <small>Laporan Maintaince</small> ({{$data->title}})
                        </div>
                        <div class="card-body">
                            <form action="{{$data->route}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="jenis" value="{{$data->title}}">
                                <h4 class="mb-3">Pilih Kasus Inspeksi {{$data->title}}</h4>
                                <hr/>
                                <div class="form-group">
                                    <label for="kasus">Pilih Kasus</label>
                                    <select name="id_kasus" class="form-control" id="kasus">
                                        @foreach($cases as $case)
                                            <option value="{{$case->id}}">
                                                {{$data->title == "Kecelakaan"?$case->kejadian:$case->temuan}} ({{$case->tanggal}})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tanggal Maintaince</label>
                                    <input name="tanggal" class="form-control" id="tanggal" type="date">
                                </div>
                                <h4 class="mb-3 mt-4">Foto</h4>
                                <hr/>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="foto">Upload foto maintaince</label>
                                    <div class="col-md-9">
                                        <input name="foto" id="foto" type="file">
                                    </div>
                                </div>
                                <h4 class="mb-3 mt-4">Deskripsi Maintaince</h4>
                                <hr/>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" id="deskripsi" rows="6"
                                              placeholder="Deskripsikan maintaince yang telah dilakukan.."></textarea>
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
@endsection
