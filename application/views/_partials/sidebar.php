<!--- Side Bar -->
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">

        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="mt-4">
                    <img src="<?= base_url('assets/img/') . 'man.png' ?>" class="img-fluid mx-auto d-block" style="width:100px;" alt="...">
                    <h5 class="mt-2 mb-0 text-center text-light"><?php echo $this->session->userdata('username'); ?></h5>
                    <p class="mb-0 text-center text-warning"><small class="text-wheat"><?php echo $this->session->userdata('role_name'); ?></small></p>
                </div>
                <div class="mt-0 mb-0 pr-3 pl-3 color-grey">
                    <hr class="" style="border-color: #6c757d;">
                </div>
                <div class="sb-sidenav-menu-heading pt-0">Menu</div>
                <a class="nav-link <?php echo $this->uri->segment(1) == '' ? 'active' : '' ?>" href="<?php echo site_url('') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link <?php echo $this->uri->segment(1) == 'stokbarang' ? 'active' : '' ?>" href="<?php echo site_url('stokbarang') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                    Stok Barang
                </a>
                <a class="nav-link <?php echo $this->uri->segment(1) == 'masuk' ? 'active' : '' ?>" href="<?php echo site_url('masuk') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-folder-plus"></i></div>
                    Transaksi Masuk
                </a>
                <a class="nav-link <?php echo $this->uri->segment(1) == 'keluar' ? 'active' : '' ?>" href="<?php echo site_url('keluar') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-folder-minus"></i></div>
                    Transaksi Keluar
                </a>
                <?php if ($this->session->userdata('role') == '1') : ?>

                    <a class="nav-link <?php echo $this->uri->segment(1) == 'user' ? 'active' : '' ?>" href="<?php echo site_url('user') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                        Pengguna
                    </a>
                <?php endif; ?>
                <a class="nav-link <?php echo $this->uri->segment(1) == 'laporan' ? 'active' : '' ?>" href="<?php echo site_url('laporan') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    Laporan
                </a>
                <a class="nav-link <?php echo $this->uri->segment(1) == 'setting' ? 'active' : '' ?>" href="<?php echo site_url('setting') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-solid fa-wrench"></i></div>
                    Pengaturan
                </a>
            </div>
        </div>
    </nav>
</div>