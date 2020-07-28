@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header"><h4>Daftar Inspeksi Kebakaran Aktif</h4></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                </div>
                                <div class="col-2">
                                    <a href="{{ route('kebakaran.apar.add') }}" class="btn btn-block btn-primary">{{ __('Buat Inspeksi APAR') }}</a>
                                </div>
                                <div class="col-2">
                                    <a href="{{ route('kebakaran.hydrant.add') }}" class="btn btn-block btn-primary">{{ __('Buat Inspeksi Hydrant') }}</a>
                                </div>
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
            height:460,
            placeholder: "Tidak Ada Data Inspeksi",
            layout:"fitColumns",
            columns:[
                {title:"Jenis", field:"jenis", width: 150},
                {title:"Kode ID", field:"kode",},
                {title:"Tanggal Inspeksi", field:"tanggal"},
            ],
            rowClick:function(e, row){
                window.location = "/inspeksi-kebakaran-aktif/" + row.getData().jenis.toLowerCase() + "/" + row.getData().id;
            },
        });
        table.setData('{{route('kebakaran.fetch')}}')
    </script>
@endsection
