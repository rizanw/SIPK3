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
                            <form action="{{$data->route}}" method="post">
                                @csrf
                                <h4 class="mb-3">Pilih Kasus Inspeksi {{$data->title}}</h4>
                                <hr/>
                                <div class="form-group">
                                    <label for="apar">Pilih Kasus</label>
                                    <select name="apar" class="form-control" id="apar">
                                        @foreach($cases as $case)
                                            <option value="{{$case->id}}">{{$case->temuan}} ({{$case->tanggal}})</option>
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
                                    <label for="tindakan-korektif">Deskripsi</label>
                                    <textarea name="deksripsi" class="form-control" id="deksripsi" rows="6"
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
