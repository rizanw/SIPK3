@extends('layouts.base')

@section('content')

    <div class="container-fluid">
        <div class="fade-in">
            @hasanyrole('PMK|TimInspeksi')
            @include('home.table-jadwal')
            @endrole
            @hasanyrole('admin|PMK')
            <div class="row">
                @include('home.qr')
            </div>
            @endrole
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/coreui-chartjs.bundle.js') }}"></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    <script>
        var tableJadwal = new Tabulator("#table-jadwal", {
            height: 460,
            layout: "fitColumns",
            placeholder: "Tidak ada Jadwal Inspeksi",
            columns: [
                {title: "Tanggal", field: "tanggal"}
            ],
            rowClick: function (e, row) {
                window.location = "/jadwal/" + row.getData().id;
            },
        });
    </script>
    @hasanyrole('PMK')
    <script>
        tableJadwal.setData("{{route('jadwal.fetch.tim', 'PMK')}}");
    </script>
    @endrole
    @hasanyrole('TimInspeksi')
    <script>
        tableJadwal.setData("{{route('jadwal.fetch.tim', 'TimInspeksi')}}");
    </script>
    @endrole
@endsection
