@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header"><strong>Buat</strong> <small>Inspeksi Kebakaran Aktif</small> (Hydrant)
                        </div>
                        <div class="card-body">
                            <form action="{{route('kebakaran.hydrant.create')}}" method="post">
                                @csrf
                                <h4 class="mb-3">Informasi Inspeksi</h4>
                                <hr/>
                                <div class="form-group">
                                    <label for="hydrant">Pilih Hydrant</label>
                                    <select name="hydrant" class="form-control" id="hydrant" @if(count($hydrants) == 1) disabled @endif>
                                        @foreach($hydrants as $hydrant)
                                            <option @if(count($hydrants) == 1) selected @endif value="{{$hydrant->id}}">{{$hydrant->kode}} ({{$hydrant->lokasi}})
                                            </option>
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
                                    <label class="col-md-5 col-form-label">a. Kabinet tidak terhalang oleh benda
                                        sekitar?</label>
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
                                    <label class="col-md-5 col-form-label">b. Kondisi kabinet tidak korosi atau
                                        rusak?</label>
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
                                    <label class="col-md-5 col-form-label">c. Pintu kabinet mudah dibuka?</label>
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
                                    <label class="col-md-5 col-form-label">d. Pintu kabinet dapat terbuka penuh?</label>
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
                                    <label class="col-md-5 col-form-label">e. Pintu kabinet kaca terkunci?</label>
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
                                    <label class="col-md-5 col-form-label">f. Kaca pada pintu tidak pecah atau
                                        retak?</label>
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
                                    <label class="col-md-5 col-form-label">g. Semua perlengkapan isi kabinet mudah
                                        diakses?</label>
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
                                    <label class="col-md-5 col-form-label">h. Terdapat kunci pas pilar hidran dan
                                        control valve yang sesuai?</label>
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
                                    <label class="col-md-5 col-form-label">i. Pilar hidran mudah diakses?</label>
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
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label">j. Pilar hidran dalam kondisi tidak
                                        korosi?</label>
                                    <div class="col-md-7 col-form-label">
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio1-j" type="radio" value="1"
                                                   name="j">
                                            <label class="form-check-label" for="inline-radio1-j">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio2-j" type="radio" value="0"
                                                   name="j">
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
                                                   name="k">
                                            <label class="form-check-label" for="inline-radio1-k">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio2-k" type="radio" value="0"
                                                   name="k">
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
                                                   name="l">
                                            <label class="form-check-label" for="inline-radio1-l">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio2-l" type="radio" value="0"
                                                   name="l">
                                            <label class="form-check-label" for="inline-radio2-l">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label">m. Tidak ada kebocoran pada slang?</label>
                                    <div class="col-md-7 col-form-label">
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio1-m" type="radio" value="1"
                                                   name="m">
                                            <label class="form-check-label" for="inline-radio1-m">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio2-m" type="radio" value="0"
                                                   name="m">
                                            <label class="form-check-label" for="inline-radio2-m">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label">n. Control valve mudah diakses?</label>
                                    <div class="col-md-7 col-form-label">
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio1-n" type="radio" value="1"
                                                   name="n">
                                            <label class="form-check-label" for="inline-radio1-n">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio2-n" type="radio" value="0"
                                                   name="n">
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
                                                   name="o">
                                            <label class="form-check-label" for="inline-radio1-o">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio2-o" type="radio" value="0"
                                                   name="o">
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
                                                   name="p">
                                            <label class="form-check-label" for="inline-radio1-p">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio2-p" type="radio" value="0"
                                                   name="p">
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
                                                   name="q">
                                            <label class="form-check-label" for="inline-radio1-q">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio2-q" type="radio" value="0"
                                                   name="q">
                                            <label class="form-check-label" for="inline-radio2-q">Tidak</label>
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
    </div>
@endsection
