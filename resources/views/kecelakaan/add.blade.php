@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header"><strong>Buat</strong> <small>Inspeksi Kecelakaan</small></div>
                        <div class="card-body">
                            <h4 class="mb-3">Informasi Kejadian</h4>
                            <hr/>
                            <div class="form-group">
                                <label for="kejadian">Kejadian</label>
                                <input name="kejadian" class="form-control" id="kejadian" type="text"
                                       placeholder="Kejadian">
                            </div>
                            <div class="form-group">
                                <label for="tempat">Tempat Kejadian</label>
                                <input name="tempat" class="form-control" id="tempat" type="text"
                                       placeholder="Tempat kejadian">
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Tanggal Kejadian</label>
                                <input name="tanggal" class="form-control" id="tanggal" type="date">
                            </div>
                            <div class="form-group">
                                <label for="jam">Jam Kejadian</label>
                                <input name="jam" class="form-control" id="jam" type="time">
                            </div>
                            <div class="form-group">
                                <label for="alk">Atasan Langsung Korban</label>
                                <input name="alk" class="form-control" id="alk" type="text"
                                       placeholder="Tempat kejadian">
                            </div>
                            <h4 class="mb-3 mt-4">Data Korban</h4>
                            <hr/>
                            <div class="list-data-korban">
                                <div class="row data-korban">
                                    <div class="form-group col-sm-5">
                                        <label for="nama-korban">Nama</label>
                                        <input name="nama-korban[]" class="form-control" id="nama-korban" type="text"
                                               placeholder="Nama korban">
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="jenis-kelamin">Jenis Kelamin</label>
                                        <select name="jenis-kelamin[]" class="form-control" id="jenis-kelamin">
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="usia-korban">Usia</label>
                                        <input name="usia-korban[]" class="form-control" id="usia-korban" type="number"
                                               min="0" placeholder="Usia korban">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="button" class="btn btn-secondary" id="add-korban"
                                       value="Tambah data korban" onclick="addKorban();">
                                <input type="button" class="btn btn-light" id="reduce-korban"
                                       value="Kurangi data korban" onclick="reduceKorban();">
                            </div>
                            <div class="form-group">
                                <label for="akibat">Akibat Yang Ditimbulkan</label>
                                <input name="akibat" class="form-control" id="akibat" type="text"
                                       placeholder="Akibat Yang Ditimbulkan">
                            </div>
                            <h4 class="mb-3 mt-4">Kronologi</h4>
                            <hr/>
                            <div class="form-group">
                                <label for="kronologi">Kronologi Terjadinya Kecelakaan</label>
                                <textarea name="kronologi-kecelakaan" class="form-control" id="kronologi" rows="6"
                                          placeholder="Tuliskan kronologi kecelakaan.."></textarea>
                            </div>
                            <h4 class="mb-3 mt-4">Penilaian Resiko</h4>
                            <hr/>
                            <h4 class="mb-3 mt-4">Foto</h4>
                            <hr/>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="foto">Upload foto kejadian</label>
                                <div class="col-md-9">
                                    <input name="foto" id="foto" type="file" >
                                </div>
                            </div>
                            <h4 class="mb-3 mt-4">Tindakan Perbaikan dan Pencegahan</h4>
                            <hr/>
                            <div class="form-group">
                                <label for="tindakan">Tindakan</label>
                                <textarea name="tindakan" class="form-control" id="tindakan" rows="6"
                                          placeholder="Tuliskan Tindakan.."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="penanggung-jawab">Penanggung Jawab</label>
                                <input name="penanggung-jawab" class="form-control" id="penanggung-jawab" type="text" placeholder="Penanggung Jawab">
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

@section('javascript')
    <script type="text/javascript">
        function addKorban() {
            $(".data-korban:last").clone().appendTo(".list-data-korban");
            if ($('.data-korban').length > 1) {
                $("#reduce-korban").removeClass('btn-light');
                $("#reduce-korban").addClass('btn-danger');
            }
        }

        function reduceKorban() {
            if ($('.data-korban').length > 1) {
                $('.data-korban:last').remove();
            }
            if ($('.data-korban').length <= 1) {
                $("#reduce-korban").removeClass('btn-danger');
                $("#reduce-korban").addClass('btn-light');
            }
        }
    </script>
@endsection
