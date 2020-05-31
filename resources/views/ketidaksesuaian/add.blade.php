@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header"><strong>Buat</strong> <small>Inspeksi Ketidaksesuaian</small></div>
                        <div class="card-body">
                            <h4 class="mb-3">Informasi Temuan</h4>
                            <hr/>
                            <div class="form-group">
                                <label for="kejadian">Temuan</label>
                                <input name="temuan" class="form-control" id="temuan" type="text"
                                       placeholder="Deskripsi Temuan">
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Tanggal Temuan</label>
                                <input name="tanggal" class="form-control" id="tanggal" type="date">
                            </div>
                            <div class="form-group">
                                <label for="kategori-temuan">Kategori Temuan</label>
                                <select name="kategori-temuan" class="form-control" id="kategori-temuan">
                                    <option value="unsafe-action">Unsafe Action</option>
                                    <option value="unsafe-condition">Unsafe Condition</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="alk">Lokasi</label>
                                <input name="lokasi" class="form-control" id="lokasi" type="text"
                                       placeholder="Lokasi">
                            </div>
                            <h4 class="mb-3 mt-4">Foto</h4>
                            <hr/>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="foto">Upload foto kejadian</label>
                                <div class="col-md-9">
                                    <input name="foto" id="foto" type="file" >
                                </div>
                            </div>
                            <h4 class="mb-3 mt-4">Penilaian Resiko</h4>
                            <hr/>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="foto">Upload Penilaian Resiko</label>
                                <div class="col-md-9">
                                    <input name="foto" id="foto" type="file" >
                                </div>
                            </div>
                            <h4 class="mb-3 mt-4">Tindakan Korektif</h4>
                            <hr/>
                            <div class="form-group">
                                <label for="pic">PIC</label>
                                <input name="pic" class="form-control" id="pic" type="text"
                                       placeholder="PIC">
                            </div>
                            <div class="form-group">
                                <label for="pelapor">Pelapor</label>
                                <input name="pelapor" class="form-control" id="pelapor" type="text"
                                       placeholder="Pelapor">
                            </div>
                            <div class="form-group">
                                <label for="tindakan-korektif">Tindakan Korektif</label>
                                <textarea name="tindakan-korektif" class="form-control" id="tindakan-korektif" rows="6"
                                          placeholder="Tuliskan tindakan korektif.."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="open">Open</option>
                                    <option value="close">Close</option>
                                </select>
                            </div>
                            <div>
                                <input type="submit" value="Simpan" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
