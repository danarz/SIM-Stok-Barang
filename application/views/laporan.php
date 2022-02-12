<!DOCTYPE html>
<html lang="en">

<head>
    <!--- Head -->
    <?php $this->load->view("_partials/head.php") ?>
</head>

<body class="sb-nav-fixed">
    <!--- Nav Bar -->
    <?php $this->load->view("_partials/navbar.php") ?>
    <div id="layoutSidenav">
        <!--- Side Bar -->
        <?php $this->load->view("_partials/sidebar.php") ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">

                    <!-- Breadcrumbs-->
                    <?php $this->load->view("_partials/breadcrumb.php") ?>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            DataTable Contoh
                            <button type="button" class="btn btn-outline-success text-right" style="float: right;">
                                <i class="fas fa-plus mr-2"></i>
                                <b>Tambah</b>
                            </button>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Kode Barang</th>
                                            <th>Barcode</th>
                                            <th>Nama Barang</th>
                                            <th>Lokasi</th>
                                            <th>Stok</th>
                                            <th>Harga</th>
                                            <th>Diskon</th>
                                            <th>Keterangan</th>
                                            <th style="width:10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Kode Barang</th>
                                            <th>Barcode</th>
                                            <th>Nama Barang</th>
                                            <th>Lokasi</th>
                                            <th>Stok</th>
                                            <th>Harga</th>
                                            <th>Diskon</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>99847823473</td>
                                            <td>99847823473</td>
                                            <td>Edinburgh Tiger Nixon</td>
                                            <td>A32</td>
                                            <td>241</td>
                                            <td>$320,800</td>
                                            <td>61</td>
                                            <td>Edinburgh Tiger Nixon 500gr</td>
                                            <td>
                                                <a href="#" class="btn btn-outline-primary btn-sm">
                                                    <i class="edit fas fa-edit"></i>
                                                </a>
                                                <a href="#" class="btn btn-outline-danger btn-sm">
                                                    <i class="edit fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>99847823473</td>
                                            <td>99847823473</td>
                                            <td>Air Mineral 500ml</td>
                                            <td>A32</td>
                                            <td>241</td>
                                            <td>$320,800</td>
                                            <td>61</td>
                                            <td>Edinburgh Tiger Nixon 500gr</td>
                                            <td>
                                                <a href="#" class="btn btn-outline-primary btn-sm">
                                                    <i class="edit fas fa-edit"></i>
                                                </a>
                                                <a href="#" class="btn btn-outline-danger btn-sm">
                                                    <i class="edit fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>99847823473</td>
                                            <td>99847823473</td>
                                            <td>Sirup ABC</td>
                                            <td>B11</td>
                                            <td>241</td>
                                            <td>$320,800</td>
                                            <td>61</td>
                                            <td>Edinburgh Tiger Nixon 500gr</td>
                                            <td>
                                                <a href="#" class="btn btn-outline-primary btn-sm">
                                                    <i class="edit fas fa-edit"></i>
                                                </a>
                                                <a href="#" class="btn btn-outline-danger btn-sm">
                                                    <i class="edit fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>89007823473</td>
                                            <td>99847823473</td>
                                            <td>Mie Instan Jumbo</td>
                                            <td>M80</td>
                                            <td>241</td>
                                            <td>$320,800</td>
                                            <td>61</td>
                                            <td>Edinburgh Tiger Nixon 500gr</td>
                                            <td>
                                                <a href="#" class="btn btn-outline-primary btn-sm">
                                                    <i class="edit fas fa-edit"></i>
                                                </a>
                                                <a href="#" class="btn btn-outline-danger btn-sm">
                                                    <i class="edit fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>99847823473</td>
                                            <td>99847823473</td>
                                            <td>Gula Pasir</td>
                                            <td>C40</td>
                                            <td>241</td>
                                            <td>$320,800</td>
                                            <td>61</td>
                                            <td>Edinburgh Tiger Nixon 500gr</td>
                                            <td>
                                                <a href="#" class="btn btn-outline-primary btn-sm">
                                                    <i class="edit fas fa-edit"></i>
                                                </a>
                                                <a href="#" class="btn btn-outline-danger btn-sm">
                                                    <i class="edit fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>09847823473</td>
                                            <td>99847823473</td>
                                            <td>Beras Tiger Nixon</td>
                                            <td>B12</td>
                                            <td>241</td>
                                            <td>$320,800</td>
                                            <td>61</td>
                                            <td>Edinburgh Tiger Nixon 500gr</td>
                                            <td>
                                                <a href="#" class="btn btn-outline-primary btn-sm">
                                                    <i class="edit fas fa-edit"></i>
                                                </a>
                                                <a href="#" class="btn btn-outline-danger btn-sm">
                                                    <i class="edit fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <!-- footer -->
            <?php $this->load->view("_partials/footer.php") ?>
        </div>
    </div>
    <!-- js -->
    <?php $this->load->view("_partials/js.php") ?>
</body>

</html>