@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header"><h4>Daftar Inspeksi Kecelakaan</h4></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-10">
                                </div>
                                @hasanyrole('admin|PJA')
                                <div class="col-2">
                                    <a href="{{ route('kecelakaan.add') }}"
                                       class="btn btn-block btn-primary">{{ __('Buat Inspeksi') }}</a>
                                </div>
                                @endhasrole
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div id="example-table"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        var table = new Tabulator("#example-table", {
            height: 460,
            layout: "fitColumns",
            placeholder: "Tidak ada data kecelakaan",
            columns: [
                {title: "Kejadian", field: "kejadian", width: 150},
                {title: "Lokasi", field: "lokasi"},
                {title: "Tanggal", field: "tanggal"},
                {title: "Jumlah Korban", field: "korban", width: 150},
                {title: "Penanggung Jawab", field: "pj"},
                {title: "Status", field: "status"},
            ],
            rowClick: function (e, row) {
                window.location = "/inspeksi-kecelakaan/" + row.getData().id;
            },
        });
        table.setData("{{route('kecelakaan.fetch')}}");
    </script>
@endsection
