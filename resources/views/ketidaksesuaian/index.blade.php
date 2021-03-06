@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header"><h4>Daftar Inspeksi Ketidaksesuaian</h4></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                </div>
                                @hasanyrole('admin|TimInspeksi|PJA')
                                <div class="col-2">
                                    <a href="{{ route('ketidaksesuaian.add') }}"
                                       class="btn btn-block btn-primary">{{ __('Buat Inspeksi') }}</a>
                                </div>
                                <div class="col-2">
                                    <a href="{{ route('ketidaksesuaian.export') }}"
                                       class="btn btn-block btn-success">{{ __('Unduh Excel') }}</a>
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
            placeholder: "Tidak ada data inspeksi ketidaksesuaian",
            columns: [
                {title: "Temuan", field: "temuan", width: 150},
                {title: "Kategori", field: "kategori"},
                {title: "Lokasi", field: "lokasi"},
                {title: "PIC", field: "pic"},
                {title: "Tanggal", field: "tanggal"},
                {title: "Status", field: "status"},
            ],
            rowClick: function (e, row) {
                window.location = "/inspeksi-ketidaksesuaian/" + row.getData().id;
            },
        });
        table.setData("{{route('ketidaksesuaian.fetch')}}");
    </script>
@endsection
