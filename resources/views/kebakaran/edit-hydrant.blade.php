@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Detail</strong>
                            <small>Inspeksi Kebakaran Aktif</small>
                            (Hydrant)
                        </div>
                        <div class="card-body">
                            <form action="{{route('kebakaran.hydrant.create')}}" method="post">
                                @csrf
                                <h4 class="mb-3">Informasi Inspeksi</h4>
                                <hr/>
                                <div class="form-group">
                                    <label for="hydrant">Pilih Hydrant</label>
                                    <select name="hydrant" class="form-control" id="hydrant" disabled>
                                        @foreach($hydrants as $hydrant)
                                            <option @if($data->id_hydrant == $hydrant->id) selected
                                                    @endif value="{{$hydrant->id}}">
                                                {{$hydrant->kode}} ({{$hydrant->lokasi}})
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
                                    <label class="col-md-5 col-form-label">a. Kabinet tidak terhalang oleh benda
                                        sekitar?</label>
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
                                    <label class="col-md-5 col-form-label">b. Kondisi kabinet tidak korosi atau
                                        rusak?</label>
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
                                    <label class="col-md-5 col-form-label">c. Pintu kabinet mudah dibuka?</label>
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
                                    <label class="col-md-5 col-form-label">d. Pintu kabinet dapat terbuka penuh?</label>
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
                                    <label class="col-md-5 col-form-label">e. Pintu kabinet kaca terkunci?</label>
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
                                    <label class="col-md-5 col-form-label">f. Kaca pada pintu tidak pecah atau
                                        retak?</label>
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
                                    <label class="col-md-5 col-form-label">g. Semua perlengkapan isi kabinet mudah
                                        diakses?</label>
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
                                    <label class="col-md-5 col-form-label">h. Terdapat kunci pas pilar hidran dan
                                        control valve yang sesuai?</label>
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
                                    <label class="col-md-5 col-form-label">i. Pilar hidran mudah diakses?</label>
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
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label">j. Pilar hidran dalam kondisi tidak
                                        korosi?</label>
                                    <div class="col-md-7 col-form-label">
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio1-j" type="radio" value="1"
                                                   name="j" @if($data->j == 1) checked @endif disabled>
                                            <label class="form-check-label" for="inline-radio1-j">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio2-j" type="radio" value="0"
                                                   name="j" @if($data->j == 0) checked @endif disabled>
                                            <label class="form-check-label" for="inline-radio2-j">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label">k. Pilar hidran dalam kondisi tidak
                                        bocor?</label>
                                    <div class="col-md-7 col-form-label">
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio1-k" type="radio" value="1"
                                                   name="k" @if($data->k == 1) checked @endif disabled>
                                            <label class="form-check-label" for="inline-radio1-k">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio2-k" type="radio" value="0"
                                                   name="k" @if($data->k == 0) checked @endif disabled>
                                            <label class="form-check-label" for="inline-radio2-k">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label">l. Serat dari benang pada slang tidak
                                        rusak?</label>
                                    <div class="col-md-7 col-form-label">
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio1-l" type="radio" value="1"
                                                   name="l" @if($data->l == 1) checked @endif disabled>
                                            <label class="form-check-label" for="inline-radio1-l">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio2-l" type="radio" value="0"
                                                   name="l" @if($data->l == 0) checked @endif disabled>
                                            <label class="form-check-label" for="inline-radio2-l">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label">m. Tidak ada kebocoran pada slang?</label>
                                    <div class="col-md-7 col-form-label">
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio1-m" type="radio" value="1"
                                                   name="m" @if($data->m == 1) checked @endif disabled>
                                            <label class="form-check-label" for="inline-radio1-m">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio2-m" type="radio" value="0"
                                                   name="m" @if($data->m == 0) checked @endif disabled>
                                            <label class="form-check-label" for="inline-radio2-m">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label">n. Control valve mudah diakses?</label>
                                    <div class="col-md-7 col-form-label">
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio1-n" type="radio" value="1"
                                                   name="n" @if($data->n == 1) checked @endif disabled>
                                            <label class="form-check-label" for="inline-radio1-n">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio2-n" type="radio" value="0"
                                                   name="n" @if($data->n == 0) checked @endif disabled>
                                            <label class="form-check-label" for="inline-radio2-n">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label">o. Control valve dalam posisi normal
                                        (terbuka)?</label>
                                    <div class="col-md-7 col-form-label">
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio1-o" type="radio" value="1"
                                                   name="o" @if($data->o == 1) checked @endif disabled>
                                            <label class="form-check-label" for="inline-radio1-o">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio2-o" type="radio" value="0"
                                                   name="o" @if($data->o == 0) checked @endif disabled>
                                            <label class="form-check-label" for="inline-radio2-o">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label">p. Tidak ada kebocoran pada control
                                        valve?</label>
                                    <div class="col-md-7 col-form-label">
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio1-p" type="radio" value="1"
                                                   name="p" @if($data->p == 1) checked @endif disabled>
                                            <label class="form-check-label" for="inline-radio1-p">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio2-p" type="radio" value="0"
                                                   name="p" @if($data->p == 0) checked @endif disabled>
                                            <label class="form-check-label" for="inline-radio2-p">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label">q. Control valve dilengkapi dengan
                                        identifikasi yang berlaku?</label>
                                    <div class="col-md-7 col-form-label">
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio1-q" type="radio" value="1"
                                                   name="q" @if($data->q == 1) checked @endif disabled>
                                            <label class="form-check-label" for="inline-radio1-q">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio2-q" type="radio" value="0"
                                                   name="q" @if($data->q == 0) checked @endif disabled>
                                            <label class="form-check-label" for="inline-radio2-q">Tidak</label>
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
    </div>
@endsection
