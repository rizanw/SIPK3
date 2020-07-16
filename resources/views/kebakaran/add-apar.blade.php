@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header"><strong>Buat</strong> <small>Inspeksi Kebakaran Aktif</small> (APAR)
                        </div>
                        <div class="card-body">
                            <form action="{{route('kebakaran.apar.create')}}" method="post">
                                @csrf
                                <h4 class="mb-3">Pilih APAR</h4>
                                <hr/>
                                <div class="form-group">
                                    <label for="apar">Pilih APAR</label>
                                    <select name="apar" class="form-control" id="apar">
                                        <option selected>-- Pilih APAR --</option>
                                        @foreach($apars as $apar)
                                            <option value="{{$apar->id}}">{{$apar->kode}} ({{$apar->lokasi}})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tanggal Inspeksi</label>
                                    <input name="tanggal" class="form-control" id="tanggal" type="date">
                                </div>
                                <h4 class="mb-3">Item Pemeriksaan</h4>
                                <hr/>
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label">a. APAR berada tepat pada lokasi yang sudah
                                        ditentukan?</label>
                                    <div class="col-md-7 col-form-label">
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio1-a" type="radio" value="1"
                                                   name="a">
                                            <label class="form-check-label" for="inline-radio1-a">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio2-a" type="radio" value="0"
                                                   name="a">
                                            <label class="form-check-label" for="inline-radio2-a">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label">b. APAR mudah dilihat dan dijangkau?</label>
                                    <div class="col-md-7 col-form-label">
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio1-b" type="radio" value="1"
                                                   name="b">
                                            <label class="form-check-label" for="inline-radio1-b">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio2-b" type="radio" value="0"
                                                   name="b">
                                            <label class="form-check-label" for="inline-radio2-b">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label">c. Tekanan ukur pada kondisi yang siap untuk
                                        digunakan?</label>
                                    <div class="col-md-7 col-form-label">
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio1-c" type="radio" value="1"
                                                   name="c">
                                            <label class="form-check-label" for="inline-radio1-c">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio2-c" type="radio" value="0"
                                                   name="c">
                                            <label class="form-check-label" for="inline-radio2-c">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label">d. Berat APAR pada kondisi berisi
                                        penuh?</label>
                                    <div class="col-md-7 col-form-label">
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio1-d" type="radio" value="1"
                                                   name="d">
                                            <label class="form-check-label" for="inline-radio1-d">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio2-d" type="radio" value="0"
                                                   name="d">
                                            <label class="form-check-label" for="inline-radio2-d">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label">e. Kondisi selang dan nozzle dalam keadaan
                                        baik?</label>
                                    <div class="col-md-7 col-form-label">
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio1-e" type="radio" value="1"
                                                   name="e">
                                            <label class="form-check-label" for="inline-radio1-e">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio2-e" type="radio" value="0"
                                                   name="e">
                                            <label class="form-check-label" for="inline-radio2-e">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label">f. Tempat peletakan APAR dan kondisi roda
                                        (jika terdapat roda) dalam keadaan baik?</label>
                                    <div class="col-md-7 col-form-label">
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio1-f" type="radio" value="1"
                                                   name="f">
                                            <label class="form-check-label" for="inline-radio1-f">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio2-f" type="radio" value="0"
                                                   name="f">
                                            <label class="form-check-label" for="inline-radio2-f">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label">g. Petunjuk penggunaan dapat dibaca dengan
                                        jelas serta menghadap ke luar?</label>
                                    <div class="col-md-7 col-form-label">
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio1-g" type="radio" value="1"
                                                   name="g">
                                            <label class="form-check-label" for="inline-radio1-g">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio2-g" type="radio" value="0"
                                                   name="g">
                                            <label class="form-check-label" for="inline-radio2-g">Tidak</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label">h. Kunci pengaman dan segel penyongkel tidak
                                        rusak pada APAR?</label>
                                    <div class="col-md-7 col-form-label">
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio1-h" type="radio" value="1"
                                                   name="h">
                                            <label class="form-check-label" for="inline-radio1-h">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio2-h" type="radio" value="0"
                                                   name="h">
                                            <label class="form-check-label" for="inline-radio2-h">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label">i. APAR dalam keadaan tidak ada kerusakan
                                        fisik, korosif, dan bocor?</label>
                                    <div class="col-md-7 col-form-label">
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio1-i" type="radio" value="1"
                                                   name="i">
                                            <label class="form-check-label" for="inline-radio1-i">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio2-i" type="radio" value="0"
                                                   name="i">
                                            <label class="form-check-label" for="inline-radio2-i">Tidak</label>
                                        </div>
                                    </div>
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
