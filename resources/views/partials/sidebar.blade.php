<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{ url('/') }}">{{ config('app.name') }}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="#">{{ strtoupper(substr(config('app.name'), 0, 2)) }}</a>
    </div>
    <ul class="sidebar-menu">
        <li class="{{ request()->is('dashboard') ? 'active' : '' }}"><a class="nav-link"
                href="{{ route('dashboard') }}"><i class="fas fa-chart-line"></i> <span>Dashboard</span></a></li>
        <li class="menu-header">Aplikasi</li>
        <li class="{{ request()->is('aplikasi/input') ? 'active' : '' }}"><a class="nav-link"
                href="{{ route('aplikasi.input') }}"><i class="fas fa-plus-square"></i> <span>Input</span></a></li>
        <li class="{{ request()->is('aplikasi') ? 'active' : '' }}"><a href="{{ route('aplikasi') }}"><i
                    class="fas fa-list-ol"></i> <span>Daftar</span></a></li>
        <li class="{{ request()->is('aplikasi.report') ? 'active' : '' }}"><a
                href="{{ route('aplikasi.report') }}"><i class="fas fa-list-ol"></i> <span>Laporan</span></a></li>
        <li class="menu-header">Master</li>
        <li class="{{ request()->is('jabatan') ? 'active' : '' }}"><a class="nav-link"
                href="{{ route('master.jabatan') }}"><i class="fas fa-user-shield"></i> <span>Jabatan</span></a></li>
        <li class="{{ request()->is('pekerjaan') ? 'active' : '' }}"><a class="nav-link"
                href="{{ route('master.pekerjaan') }}"><i class="fas fa-user-md"></i> <span>Pekerjaan</span></a></li>
        <li class="{{ request()->is('penduduk') ? 'active' : '' }}"><a class="nav-link"
                href="{{ route('master.penduduk') }}"><i class="fas fa-users"></i> <span>Penduduk</span></a></li>
        @if (auth()->user()->role_id == 1)
            <li class="{{ request()->is('pengguna') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('master.users') }}"><i class="fas fa-user"></i> <span>Pengguna</span></a></li>
        @endif
    </ul>
</aside>
