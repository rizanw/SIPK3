<div class="modal fade" id="qr-apar-modal" tabindex="-1" role="dialog" aria-labelledby="qr-apar-modal-label"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">QR APAR</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="margin: 0 auto;">
                {!! QrCode::size(240)->generate(route('kebakaran.apar.add')); !!}
                <p style="text-align: center">scan untuk isi data apar.</p>
                <a class="btn btn-primary" href="{{route('kebakaran.apar.qr')}}"> <i class="cis-data-transfer-down"></i>  Download QR</a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="qr-hydrant-modal" tabindex="-1" role="dialog" aria-labelledby="qr-hydrant-modal-label"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">QR Hydrant</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="margin: 0 auto;">
                {!! QrCode::size(240)->generate(route('kebakaran.hydrant.add')); !!}
                <p style="text-align: center">scan untuk isi data hydrant.</p>
                <a class="btn btn-primary" href="{{route('kebakaran.hydrant.qr')}}"> <i class="cis-data-transfer-down"></i>  Download QR</a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
