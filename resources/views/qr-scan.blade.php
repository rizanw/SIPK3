@extends('layouts.base')

@section('content')
    <video muted="" playsinline="" id="qr-video" width="100%" height="100%"></video>
@endsection

@section('javascript')
    <script type="text/javascript" src="{{asset('js/instascan.min.js')}}"></script>
    <script type="text/javascript">
        let scanner = new Instascan.Scanner({ video: document.getElementById('qr-video') });
        scanner.addListener('scan', function (content) {
            console.log(content);
            window.open(content, '_blank');
        });
        Instascan.Camera.getCameras().then(function (cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                alert('No cameras found.');
            }
        }).catch(function (e) {
            console.error(e);
        });
    </script>
@endsection
