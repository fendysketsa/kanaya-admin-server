<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('admin/dashboard'); ?>">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-shopping-bag"></i>
		</div>
		<div class="sidebar-brand-text mx-3">Kanaya <sup>Admin</sup></div>
	</a>

	<hr class="sidebar-divider my-0">

	<li class="nav-item active">
		<a class="nav-link" href="<?php echo site_url('admin/dashboard'); ?>">
			<i class="fas fa-fw fa-chart-line"></i>
			<span>Dashboard</span></a>
	</li>

	<?php if ($this->session->userdata('level') == 1) { ?>

		<hr class="sidebar-divider">

		<div class="sidebar-heading">
			Master
		</div>

		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#masterData" aria-expanded="true" aria-controls="collapseTwo">
				<i class="fas fa-fw fa-th-large"></i>
				<span>Data</span>
			</a>

			<div id="masterData" class="collapse" aria-labelledby="collapseTwo" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<h6 class="collapse-header">Data Produk:</h6>
					<a class="collapse-item" href="<?php echo site_url('admin/kategori'); ?>">
						<em class="fa fa-check"></em> Kategori
					</a>
					<a class="collapse-item" href="<?php echo site_url('admin/produk'); ?>">
						<em class="fa fa-check"></em> Produk
					</a>
					<a class="collapse-item" href="<?php echo site_url('admin/diskon'); ?>">
						<em class="fa fa-check"></em> Diskon
					</a>
					<a class="collapse-item" href="<?php echo site_url('admin/promo'); ?>">
						<em class="fa fa-check"></em> Promo
					</a>
				</div>

				<?php /* <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Role Akses:</h6>
                <a class="collapse-item" href="<?php echo site_url('admin/role'); ?>">
                    <em class="fa fa-check"></em> Role
                </a>
			</div>
			*/ ?>

				<div class="bg-white py-2 collapse-inner rounded">
					<h6 class="collapse-header">Data Wilayah:</h6>
					<a class="collapse-item" href="<?php echo site_url('admin/wilayah?area=provinsi'); ?>">
						<em class="fa fa-check"></em> Provinsi
					</a>
					<a class="collapse-item" href="<?php echo site_url('admin/wilayah?area=kota'); ?>">
						<em class="fa fa-check"></em> Kota
					</a>
					<a class="collapse-item" href="<?php echo site_url('admin/wilayah?area=kecamatan'); ?>">
						<em class="fa fa-check"></em> Kecamatan
					</a>
				</div>

				<div class="bg-white py-2 collapse-inner rounded">
					<h6 class="collapse-header">Data Akun:</h6>
					<a class="collapse-item" href="<?php echo site_url('admin/member'); ?>">
						<em class="fa fa-check"></em> Member
					</a>
					<a class="collapse-item" href="<?php echo site_url('admin/marketing'); ?>">
						<em class="fa fa-check"></em> Marketing
					</a>
				</div>

				<div class="bg-white py-2 collapse-inner rounded">
					<h6 class="collapse-header">Data Other:</h6>
					<a class="collapse-item" href="<?php echo site_url('admin/banner'); ?>">
						<em class="fa fa-check"></em> Banner
					</a>
					<a class="collapse-item" href="#">
						<em class="fa fa-check"></em> News / Artikel
					</a>
					<hr class="text-primary">
					<a class="collapse-item" href="<?php echo site_url('admin/misi'); ?>">
						<em class="fa fa-check"></em> Misi
					</a>
					<a class="collapse-item" href="#">
						<em class="fa fa-check"></em> Point
					</a>
					<a class="collapse-item" href="<?php echo site_url('admin/limit-kredit'); ?>">
						<em class="fa fa-check"></em> Limit Kredit
					</a>
				</div>
			</div>
		</li>

		<hr class="sidebar-divider">

		<div class="sidebar-heading">
			Setting
		</div>

		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#setting" aria-expanded="true" aria-controls="collapseTwo">
				<i class="fas fa-fw fa-th-large"></i>
				<span>Setting</span>
			</a>
			<div id="setting" class="collapse" aria-labelledby="collapseTwo" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<h6 class="collapse-header">Setting:</h6>
					<a class="collapse-item" href="<?php echo site_url('admin/notif'); ?>">
						<em class="fa fa-check"></em> Push Notification
					</a>
					<a class="collapse-item" href="<?php echo site_url('admin/produk_diskon'); ?>">
						<em class="fa fa-check"></em> Diskon
					</a>
				</div>
			</div>
		</li>

		<hr class="sidebar-divider">

		<div class="sidebar-heading">
			Data
		</div>

		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#data" aria-expanded="true" aria-controls="collapseTwo">
				<i class="fas fa-fw fa-th-large"></i>
				<span>Data</span>
			</a>
			<div id="data" class="collapse" aria-labelledby="collapseTwo" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<h6 class="collapse-header">Setting:</h6>
					<a class="collapse-item" href="<?php echo site_url('admin/member'); ?>">
						<em class="fa fa-check"></em> Member
					</a>
					<a class="collapse-item" href="<?php echo site_url('admin/marketing'); ?>">
						<em class="fa fa-check"></em> Marketing
					</a>
				</div>
			</div>
		</li>

	<?php } ?>

	<?php if ($this->session->userdata('level') == 1 or $this->session->userdata('level') == 7) { ?>

		<hr class="sidebar-divider">

		<div class="sidebar-heading">
			Monitoring
		</div>

		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#monitoring" aria-expanded="true" aria-controls="collapseTwo">
				<i class="fas fa-fw fa-th-large"></i>
				<span>Order</span>
			</a>
			<div id="monitoring" class="collapse" aria-labelledby="collapseTwo" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<h6 class="collapse-header">Monitoring Order:</h6>
					<a class="collapse-item" href="<?php echo site_url('admin/order'); ?>">
						<em class="fa fa-check"></em> List Data Order
					</a>
					<a class="collapse-item" href="<?php echo site_url('admin/setoran'); ?>">
						<em class="fa fa-check"></em> Setoran Marketing
					</a>
				</div>
			</div>
		</li>

		<hr class="sidebar-divider">

		<div class="sidebar-heading">
			Laporan
		</div>

		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#laporan" aria-expanded="true" aria-controls="collapseTwo">
				<i class="fas fa-fw fa-th-large"></i>
				<span>Laporan</span>
			</a>
			<div id="laporan" class="collapse" aria-labelledby="collapseTwo" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<h6 class="collapse-header">Laporan:</h6>
					<a class="collapse-item" href="<?php echo site_url('admin/admins-fee'); ?>">
						<em class="fa fa-check"></em> Biaya Admin
					</a>
					<a class="collapse-item" href="<?php echo site_url('admin/sales'); ?>">
						<em class="fa fa-check"></em> Penjualan
					</a>
					<a class="collapse-item" href="<?php echo site_url('admin/acc-receivable'); ?>">
						<em class="fa fa-check"></em> Piutang
					</a>
					<a class="collapse-item" href="<?php echo site_url('admin/salesman/report'); ?>">
						<em class="fa fa-check"></em> Salesman
					</a>
					<a class="collapse-item" href="<?php echo site_url('admin/member/report'); ?>">
						<em class="fa fa-check"></em> Member
					</a>
					<a class="collapse-item" href="<?php echo site_url('admin/produk/report'); ?>">
						<em class="fa fa-check"></em> Produk
					</a>
					<a class="collapse-item" href="<?php echo site_url('setoran/laba'); ?>">
						<em class="fa fa-check"></em> Laba / Rugi
					</a>

				</div>
			</div>
		</li>

	<?php } ?>

	<?php if ($this->session->userdata('level') == 1 or $this->session->userdata('level') == 2) { ?>
		<hr class="sidebar-divider">

		<div class="sidebar-heading">
			Warehouse
		</div>

		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#warehouse" aria-expanded="true" aria-controls="collapseTwo">
				<i class="fas fa-fw fa-th-large"></i>
				<span>Stok</span>
			</a>
			<div id="warehouse" class="collapse" aria-labelledby="collapseTwo" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<h6 class="collapse-header">Stok:</h6>
					<a class="collapse-item" href="<?php echo site_url('admin/produk/stock'); ?>">
						<em class="fa fa-check"></em> List Data Stok
					</a>
				</div>
			</div>
		</li>

	<?php } ?>

	<hr class="sidebar-divider d-none d-md-block">

	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
