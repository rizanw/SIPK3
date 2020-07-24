<div class="c-sidebar-brand">
    <!-- <img class="c-sidebar-brand-full" src="{{ env('APP_URL', '') }}/assets/brand/coreui-base-white.svg" width="118" height="46" alt="CoreUI Logo"> -->
    <!-- <img class="c-sidebar-brand-minimized" src="assets/brand/coreui-signet-white.svg" width="118" height="46" alt="CoreUI Logo"> -->
    <div class="c-sidebar-brand-full"><strong>SIPK3</strong></div>
    <div class="c-sidebar-brand-minimized">SIPK3</div>
</div>

<ul class="c-sidebar-nav">
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ route('home') }}">
            <i class="cil-speedometer c-sidebar-nav-icon"></i>
            Dashboard
        </a>
    </li>
    @hasanyrole('admin')
    <li class="c-sidebar-nav-title">
        Penjadwalan
    </li>
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ route('maintaince') }}">
            <i class="cil-calendar c-sidebar-nav-icon"></i>
            Jadwal Inspeksi
        </a>
    </li>
    @endhasrole
    <li class="c-sidebar-nav-title">
        Inspeksi
    </li>
    @hasanyrole('admin|PJA|Maintainer')
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ route('kecelakaan') }}">
            <i class="cil-drop1 c-sidebar-nav-icon"></i>
            Inspeksi Kecelakaan
        </a>
    </li>
    @endhasrole
    @hasanyrole('admin|PMK')
    <li class="c-sidebar-nav-dropdown">
        <a class="c-sidebar-nav-dropdown-toggle" href="#">
            <i class="cil-fire c-sidebar-nav-icon"></i>
            Inspeksi Kebakaran Aktif
        </a>
        <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('kebakaran') }}"> Inspeksi</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('kebakaran.alat') }}"> Daftar Alat</a></li>
        </ul>
    </li>
    @endhasrole
    @hasanyrole('admin|TimInspeksi|PJA|Maintainer')
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ route('ketidaksesuaian') }}">
            <i class="cil-puzzle c-sidebar-nav-icon"></i>
            Inspeksi Ketidaksesuaian
        </a>
    </li>
    @endhasrole
    <li class="c-sidebar-nav-title">
        Maintaince
    </li>
    @hasanyrole('admin|Maintainer')
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ route('maintaince') }}">
            <i class="cil-task c-sidebar-nav-icon"></i>
            Laporan Maintaince
        </a>
    </li>
    @endhasrole
</ul>
<button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
        data-class="c-sidebar-minimized"></button>
</div>
