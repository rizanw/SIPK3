@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header"><strong>Detail</strong> <small>Inspeksi Kebakaran Aktif</small> (APAR)
                        </div>
                        <div class="card-body">
                            <form action="{{route('kebakaran.apar.create')}}" method="post">
                                @csrf
                                <h4 class="mb-3">Pilih APAR</h4>
                                <hr/>
                                <div class="form-group">
                                    <label for="apar">Pilih APAR</label>
                                    <select name="apar" class="form-control" id="apar" disabled>
                                        @foreach($apars as $apar)
                                            <option @if($apar->id == $data->id) selected @endif value="{{$apar->id}}">
                                                {{$apar->kode}} ({{$apar->lokasi}})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tanggal Inspeksi</label>
                                    <input name="tanggal" class="form-control" id="tanggal" type="date"
                                           value="{{$data->tanggal_inspeksi}}" disabled>
                                </div>
                                <h4 class="mb-3">Item Pemeriksaan</h4>
                                <hr/>
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label">a. APAR berada tepat pada lokasi yang sudah
                                        ditentukan?</label>
                                    <div class="col-md-7 col-form-label">
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio1-a" type="radio" value="1"
                                                   name="a" @if($data->a == 1) checked @endif disabled>
                                            <label class="form-check-label" for="inline-radio1-a">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio2-a" type="radio" value="0"
                                                   name="a" @if($data->a == 0) checked @endif disabled>
                                            <label class="form-check-label" for="inline-radio2-a">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label">b. APAR mudah dilihat dan dijangkau?</label>
                                    <div class="col-md-7 col-form-label">
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio1-b" type="radio" value="1"
                                                   name="b" @if($data->b == 1) checked @endif disabled>
                                            <label class="form-check-label" for="inline-radio1-b">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio2-b" type="radio" value="0"
                                                   name="b" @if($data->b == 0) checked @endif disabled>
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
                                                   name="c" @if($data->c == 1) checked @endif disabled>
                                            <label class="form-check-label" for="inline-radio1-c">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio2-c" type="radio" value="0"
                                                   name="c" @if($data->c == 0) checked @endif disabled>
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
                                                   name="d" @if($data->d == 1) checked @endif disabled>
                                            <label class="form-check-label" for="inline-radio1-d">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio2-d" type="radio" value="0"
                                                   name="d" @if($data->d == 0) checked @endif disabled>
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
                                                   name="e" @if($data->e == 1) checked @endif disabled>
                                            <label class="form-check-label" for="inline-radio1-e">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio2-e" type="radio" value="0"
                                                   name="e" @if($data->e == 0) checked @endif disabled>
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
                                                   name="f" @if($data->f == 1) checked @endif disabled>
                                            <label class="form-check-label" for="inline-radio1-f">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio2-f" type="radio" value="0"
                                                   name="f" @if($data->f == 0) checked @endif disabled>
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
                                                   name="g" @if($data->g == 1) checked @endif disabled>
                                            <label class="form-check-label" for="inline-radio1-g">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio2-g" type="radio" value="0"
                                                   name="g" @if($data->g == 0) checked @endif disabled>
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
                                                   name="h" @if($data->h == 1) checked @endif disabled>
                                            <label class="form-check-label" for="inline-radio1-h">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio2-h" type="radio" value="0"
                                                   name="h" @if($data->h == 0) checked @endif disabled>
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
                                                   name="i" @if($data->i == 1) checked @endif disabled>
                                            <label class="form-check-label" for="inline-radio1-i">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio2-i" type="radio" value="0"
                                                   name="i" @if($data->i == 0) checked @endif disabled>
                                            <label class="form-check-label" for="inline-radio2-i">Tidak</label>
                                        </div>
                                    </div>
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
@endsection
