<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
	<div class="navbar-header">
		<ul class="nav navbar-nav flex-row">
			<li class="nav-item mr-auto">
				<a class="navbar-brand">
					<div class="logo">
						<img src="{{asset('/admin/app-assets/images/ico/Lambang_POLIWANGI.png')}}" class="img-responsive" style="margin-left: auto;margin-right: auto; margin-top: auto;margin-bottom: 10px; width:35px; height:35px;" alt="#">
					</div>
					<h2 class="brand-text mb-0">SKKM</h2>
				</a>
			</li>
			<li class="nav-item nav-toggle">
				<a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a>
			</li>
		</ul>
	</div>
	<div class="shadow-bottom"></div>
	<div class="main-menu-content">
		<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
			<!-- <li class=" nav-item"><a href="index.html"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span><span class="badge badge badge-warning badge-pill float-right mr-2">2</span></a>
                    <ul class="menu-content">
                        <li class="active"><a href="dashboard-analytics.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Analytics</span></a>
                        </li>
                        <li><a href="dashboard-ecommerce.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="eCommerce">eCommerce</span></a>
                        </li>
                    </ul>
                </li> -->
			<li class="nav-item">
				<a href="{{route('dashboard')}}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">DASHBOARD</span></a>
			</li>
			<!-- <li class=" navigation-header"><span>Apps</span>
                </li> -->
			<!-- <li class=" nav-item"><a href="#"><i class="feather icon-user"></i><span class="menu-title" data-i18n="User">Managemen User</span></a>
                </li> -->
			@if(Auth::user()->roles === 'adminutama')
			<li class="nav-item">
				<a href="{{route('dataadmin.index')}}"><i class="feather icon-users"></i><span class="menu-title" data-i18n="book">DATA ADMIN</span></a>
			</li>
			<li class="nav-item">
				<a href="{{route('berkas.index')}}"><i class="fa fa-book"></i><span class="menu-title" data-i18n="book">PANDUAN SKKM</span></a>
			</li>
			@endif
			@if(Auth::user()->roles === 'mahasiswa')
			<li class="nav-item">
				<a href="{{route('skkm.index')}}"><i class="feather icon-info"></i><span class="menu-title" data-i18n="info">INFO POIN</span></a>
			</li>
			<!-- <li class=" nav-item"><a href="app-chat.html"><i class="feather icon-book-open"></i><span class="menu-title" data-i18n="book-open">Laporan Kegiatan</span></a>
                </li> -->
			<li class="nav-item">
				<a href="{{route('tatacara.index')}}"><i class="feather icon-book"></i><span class="menu-title" data-i18n="book">TATA CARA</span></a>
			</li>
			<li class="nav-item">
				<a href="{{route('poinku.index')}}"><i class="feather icon-award"></i><span class="menu-title" data-i18n="edit-3">POINKU</span></a>
			</li>
			@endif
			@if(Auth::user()->roles === 'bem')
			<li class="nav-item">
				<a href="{{route('verifikasi.index')}}"><i class="fa fa-check-square-o"></i><span class="menu-title" data-i18n="edit-3">VERIFIKASI POIN</span></a>
			</li>
			@endif
		</ul>
	</div>
</div>
<!-- END: Main Menu-->