@extends('layouts.base')


@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header"><h4>Daftar Alat Kebakaran</h4></div>
                        <div class="card-body">
                            @if(Session::has('message'))
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                    </div>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-8">
                                </div>
                                <div class="col-2">
                                    <a href="{{ route('kebakaran.alat.apar') }}" class="btn btn-block btn-primary">{{ __('Tambah APAR') }}</a>
                                </div>
                                <div class="col-2">
                                    <a href="{{ route('kebakaran.alat.hydrant') }}" class="btn btn-block btn-primary">{{ __('Tambah Hydrant') }}</a>
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
    </div>

@endsection

@section('javascript')
    <script>
        var deleteIcon = function(cell, formatterParams) {
            return '<i style="color: #C82333" class="fas fa-trash-alt"></i>';
        };
        var editIcon = function(cell, formatterParams) {
            return '<i style="color: #4E7AE4" class="far fa-edit"></i>';
        };

        var table = new Tabulator("#example-table", {
            height:460, // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)
            layout:"fitColumns", //fit columns to width of table (optional)
            columns:[ //Define Table Columns
                {title:"Jenis", field:"jenis", width: 150},
                {title:"Kode ID", field:"kode",},
                {title:"Lokasi", field:"lokasi"},
            ],
            rowClick:function(e, row){
                window.location = "/alat-kebakaran/" + row.getData().jenis.toLowerCase() + "/" + row.getData().id;
            },
        });
        table.setData("{{route('kebakaran.alat.fetch')}}");

    </script>

@endsection
