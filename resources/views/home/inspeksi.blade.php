@hasanyrole('admin|TimInspeksi|PJA')
<div class="col">
    <div class="card text-white bg-gradient-primary text-center">
        <a href="{{route('kecelakaan')}}" class="btn btn-primary card-body">
            <strong class="card-bodyquote">
                <i class="cil-drop"></i>
                <span> Inspeksi Kecelakaan</span>
            </strong>
        </a>
    </div>
</div>
@endrole
@hasanyrole('admin|TimInspeksi|PJA')
<div class="col">
    <div class="card text-white bg-gradient-info text-center">
        <a href="{{route('ketidaksesuaian')}}" class="btn btn-info card-body">
            <strong class="card-bodyquote">
                <i class="cil-fire"></i>
                <span> Inspeksi Ketidaksesuian</span>
            </strong>
        </a>
    </div>
</div>
@endrole
@hasanyrole('admin|PMK')
<div class="col">
    <div class="card text-white bg-gradient-danger text-center">
        <a href="{{route('kecelakaan')}}" class="btn btn-danger card-body">
            <strong class="card-bodyquote">
                <i class="cil-puzzle"></i>
                <span> Inspeksi Kebakaran Aktif</span>
            </strong>
        </a>
    </div>
</div>
@endrole
