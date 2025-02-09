<div class="main-sidebar" tabindex="1" style="overflow: hidden; outline: none;">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand p-1 mb-4">
            <a href="/" style="font-family: Nunito; font-weight:bold; font-size: 1.7em"><img style="width: 3em;" src="{{url('/assets/img/portfolio/logo/logo3.png')}}"> BAZNAS</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <img style="width: 50%;" src="{{url('/assets/img/portfolio/logo/logo3.png')}}">
        </div>
        <ul class="sidebar-menu">
            <!-- //? SIDE BAR -->
            <li class="menu-header">CMS</li>
            <li>
                <a class="nav-link" href="{{url('/admin')}}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-newspaper"></i> <span>Kabar</span></a>
                <ul class="dropdown-menu">
                    <x-admin.sidebar.post />
                    <li><a href="{{url('/admin/category')}}" class="nav-item"><i class="fas fa-cog"></i><span>Kategori</span></a></li>
                </ul>
            </li>
            <li>
                <a class="nav-link" href="{{url('/admin/galeri')}}"><i class="fas fa-image"></i> <span>Galeri</span></a>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-holding-usd"></i> <span>Layanan</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{url('/admin/layanan/rekening')}}"> <span>Rekening</span></a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="nav-link" href="{{url('/admin/pesan')}}"> <i class="fas fa-envelope"></i> <span>Pesan</span></a>
            </li>
            <li>
                <a class="nav-link" href="{{url('/admin/file')}}"> <i class="fas fa-file"></i> <span>File</span></a>
            </li>

            <!-- //? SIDE BAR -->
            <li class="menu-header">Pembayaran dan Penyaluran</li>
            <li>
                <a class="nav-link" href="{{url('/admin/dashboard')}}"><i class="fas fa-th-large"></i> <span>Dashboard</span></a>
            </li>
            <li>
                <a class="nav-link" href="{{url('/admin/pembayaran')}}"><i class="fas fa-money-bill-wave"></i> <span>Pembayaran</span></a>
            </li>
            <li>
                <a class="nav-link" href="{{url('/admin/permohonan')}}"><i class="fas fa-hand-holding-usd"></i> <span>Permohonan</span></a>
            </li>
            <li>
                <a class="nav-link" href="{{url('/admin/peninjauan-permohonan')}}"><i class="fas fa-user-secret"></i> <span>Peninjauan Permohonan</span></a>
            </li>
            <li>
                <a class="nav-link" href="{{url('/admin/penyaluran')}}"><i class="fas fa-hand-holding-heart"></i> <span>Penyaluran</span></a>
            </li>
            <li>
                <a class="nav-link" href="{{url('/admin/program')}}"><i class="fas fa-th-large"></i>
                    <span>Program</span></a>
            </li>
            <li>
                <a class="nav-link" href="{{url('/admin/lembaga')}}"><i class="fas fa-th-large"></i>
                    <span>Lembaga</span></a>
            </li>
        </ul>

    </aside>
</div>