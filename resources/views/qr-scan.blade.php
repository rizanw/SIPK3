@extends('layouts.base')

@section('content')
    <div class="container show_qrscan">
        <video muted="" playsinline="" id="qr-video" width="100%" height="100%"></video>
    </div>
    <div class="no_qrscan">
        <h2 style="text-align: center">Tidak ada kamera terdeteksi.</h2>
    </div>
@endsection

@section('javascript')
    <script type="module">
        import QrScanner from '{{asset('js/qr-scanner.min.js')}}';
        QrScanner.WORKER_PATH = "{{asset('js/qr-scanner-worker.min.js')}}";

        const video = document.getElementById("qr-video");
        const qrScanArea = $(".show_qrscan");
        const noCameraAlert = $(".no_qrscan");

        function scan() {
            const scanner = new QrScanner(video, result => {
                scanner.destroy();
                alert(result);
                window.location(result, '_blank');
            });
            scanner.start();
        }

        QrScanner.hasCamera().then(response => {
            if (!response) {
                noCameraAlert.show();
            } else {
                qrScanArea.show();
            }
        });

        scan();
    </script>
@endsection
