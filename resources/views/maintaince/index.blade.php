@extends('layouts.base')


@section('content')
<div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h4>Daftar Laporan Maintance</h4></div>
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
                        <a href="{{ route('maintaince.ketidaksesuian.add') }}" class="btn btn-block btn-primary">{{ __('Buat Laporan (Ketidaksesuian)') }}</a>
                    </div>
                    <div class="col-2">
                        <a href="{{ route('maintaince.kecelakaan.add') }}" class="btn btn-block btn-primary">{{ __('Buat Laporan (Kecelakaan)') }}</a>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <div id="example-table"></div>
                    </div>
                </div>
            </div>
          </div>
        </div>∑
      </div>
    </div>
  </div>
</div>

@endsection

@section('javascript')
<script>
    var table = new Tabulator("#example-table", {
        height:460,
        layout:"fitColumns",
        placeholder: "Tidak ada data inspeksi ketidaksesuaian",
        columns:[
            {title:"Jenis", field:"jenis"},
            {title:"Tanggal", field:"tanggal"},
        ],
        rowClick:function(e, row){
            window.location = "/maintaince/" + row.getData().id;
        },
    });
    {{--table.setData("{{route('ketidaksesuaian.fetch')}}");--}}
</script>

@endsection
