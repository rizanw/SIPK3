@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header"><h4>Jadwal Inspeksi</h4></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-10">
                                </div>
                                @hasanyrole('admin')
                                <div class="col-2">
                                    <a href="{{ route('ketidaksesuaian.add') }}" class="btn btn-block btn-primary">{{ __('Buat Jadwal') }}</a>
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
    </div>
@endsection

@section('javascript')
    <script>
        var table = new Tabulator("#example-table", {
            height: 460,
            layout: "fitColumns",
            placeholder: "Tidak ada Jadwal Inspeksi",
            columns: [
                {title: "Tanggal", field: "tanggal"},
                {title: "Tim Bertugas", field: "tim"},
            ],
            rowClick: function (e, row) {
                window.location = "/jadwal/" + row.getData().id;
            },
        });
        {{--table.setData("{{route('ketidaksesuaian.fetch')}}");--}}
    </script>
@endsection
