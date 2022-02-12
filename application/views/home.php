<!-- Template -->
<!DOCTYPE html>
<html lang="en">
<?php
if ($this->session->userdata('status') == 'login') {
    $email = ($this->session->userdata('email'));
} else {
    header("location: auth");
}
?>

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
            <main class="">
                <div class="container-fluid" style="box-sizing:border-box">

                    <!-- Breadcrumbs-->
                    <?php
                    $page = $this->uri->segment(1);
                    if ($page == 'home' || $page == '') {
                    } else {
                        $this->load->view("_partials/breadcrumb.php");
                    }

                    ?>
                    <!-- End Template -->
                    <?php if ($stokhabis->num_rows() > 0) : ?>
                        <div class="row">
                            <div class="col">
                                <div class="alert alert-danger">
                                    <div class="row">
                                        <div class="col">
                                            <h6 style="float: left;">Daftar Stok Kosong</h6>
                                        </div>
                                        <div class="col"><button type="button" class="close" data-dismiss="alert" aria-label="Close" style="float: right;">
                                                <span aria-hidden="true">&times;</span>
                                            </button></div>
                                    </div>
                                    <ul>
                                        <?php foreach ($stokhabis->result() as $row) :
                                        ?>
                                            <li><span><?= $row->nama ?> / </span><b><?= $row->jumlah ?></b></li>
                                        <?php endforeach; ?>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($stoktipis->num_rows() > 0) : ?>
                        <div class="row">
                            <div class="col">
                                <div class="alert alert-warning">
                                    <div class="row">
                                        <div class="col">
                                            <h6 style="float: left;">Daftar Stok Menipis</h6>
                                        </div>
                                        <div class="col"><button type="button" class="close" data-dismiss="alert" aria-label="Close" style="float: right;">
                                                <span aria-hidden="true">&times;</span>
                                            </button></div>
                                    </div>
                                    <ul>
                                        <?php foreach ($stoktipis->result() as $row) :
                                        ?>
                                            <li><span><?= $row->nama ?> / </span><b><?= $row->jumlah ?></b></li>
                                        <?php endforeach; ?>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row mt-3">
                        <div class="col-xl-4 col-md-6 col-sm-12">
                            <div class="card shadow p-0 mb-5 bg-white rounded">
                                <div class="pt-4 pr-4 pl-4 pb-1">
                                    <div class="card-body p-0">
                                        <div class="row">
                                            <div class="col">
                                                <small style="float: left;" class="text-primary">Total Barang</small>
                                            </div>
                                            <div class="col">
                                                <i class="edit fas fa-box-open text-primary" style="float: right; color:#343a40"></i>
                                            </div>
                                        </div>
                                        <div class="mt-3 mb-3">
                                            <div class="row">
                                                <div class="col">
                                                    <h2 class="text-primary" style="display: inline-block;"><?php echo $totalbarang; ?></h2><small class="text-primary ml-2">/ total</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" pt-0 pr-4 pl-4 pb-1 bg-primary " onclick="seedetail('stokbarang');">
                                    <div class="card-foot pt-2">
                                        <div class="row">
                                            <div class="col">
                                                <h6 style="color: white;">See Details</h6>
                                            </div>
                                            <div class="col">
                                                <i class="edit fas fa-angle-right" style="float: right; color:white"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-sm-12">
                            <div class="card shadow p-0 mb-5 bg-white rounded">
                                <div class="pt-4 pr-4 pl-4 pb-1">
                                    <div class="card-body p-0">
                                        <div class="row">
                                            <div class="col">
                                                <small style="float: left;" class="text-success">Transaksi Masuk</small>
                                            </div>
                                            <div class="col">
                                                <i class="edit fas fa-boxes text-success" style="float: right; color:#343a40"></i>
                                            </div>
                                        </div>
                                        <div class="mt-3 mb-3">
                                            <h2 class="text-success" style="display: inline-block;"><?php echo $totalmasuk; ?></h2><small class="text-success ml-2">/ total</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-0 pr-4 pl-4 pb-1 bg-success" onclick="seedetail('masuk');">
                                    <div class="card-foot pt-2">
                                        <div class="row">
                                            <div class="col">
                                                <h6 style="color: white;">See Details</h6>
                                            </div>
                                            <div class="col">
                                                <i class="edit fas fa-angle-right" style="float: right; color:white"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-sm-12">
                            <div class="card shadow p-0 mb-5 bg-white rounded">
                                <div class="pt-4 pr-4 pl-4 pb-1">
                                    <div class="card-body p-0">
                                        <div class="row">
                                            <div class="col">
                                                <small style="float: left;" class="text-warning">Transaksi Keluar</small>
                                            </div>
                                            <div class="col">
                                                <i class="edit fas fa-truck text-warning" style="float: right; color:#343a40"></i>
                                            </div>
                                        </div>
                                        <div class="mt-3 mb-3">
                                            <h2 class="text-warning" style="display: inline-block;"><?php echo $totalkeluar; ?></h2><small class="text-warning ml-2">/ total</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-0 pr-4 pl-4 pb-1 bg-warning" onclick="seedetail('keluar');">
                                    <div class="card-foot pt-2">
                                        <div class="row">
                                            <div class="col">
                                                <h6 style="color: white;">See Details</h6>
                                            </div>
                                            <div class="col">
                                                <i class="edit fas fa-angle-right" style="float: right; color:white"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Overview</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="lineChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Product This Month</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="doughnutChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Template -->
                </div>
            </main>
            <!-- footer -->
            <?php $this->load->view("_partials/footer.php") ?>
        </div>
    </div>
    <!-- js -->
    <?php $this->load->view("_partials/js.php") ?>

    <script>
        function seedetail(path) {
            var url = "<?php echo base_url() ?>" + path;
            window.location.replace(url);
        }
        $(document).ready(function() {
            //doughnut
            var ctxD = document.getElementById("doughnutChart").getContext('2d');
            var myLineChart = new Chart(ctxD, {
                type: 'doughnut',
                data: {
                    labels: ["Jeruk", "Anggur", "Apel", "Pepaya", "Salak"],
                    datasets: [{
                        data: [500, 50, 100, 40, 120],
                        backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
                        hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
                    }]
                },
                options: {
                    responsive: true
                }
            });
            //line
            var ctxL = document.getElementById("lineChart").getContext('2d');
            var myLineChart = new Chart(ctxL, {
                type: 'line',
                data: {
                    labels: ["January", "February", "March", "April", "May", "June", "July"],
                    datasets: [{
                            label: "Barang Masuk",
                            data: [65, 59, 80, 81, 56, 55, 40],
                            backgroundColor: [
                                'rgba(105, 0, 132, .2)',
                            ],
                            borderColor: [
                                'rgba(200, 99, 132, .7)',
                            ],
                            borderWidth: 2
                        },
                        {
                            label: "Barang Keluar",
                            data: [28, 48, 40, 19, 86, 27, 90],
                            backgroundColor: [
                                'rgba(0, 137, 132, .2)',
                            ],
                            borderColor: [
                                'rgba(0, 10, 130, .7)',
                            ],
                            borderWidth: 2
                        }
                    ]
                },
                options: {
                    responsive: true
                }
            });
        });
    </script>
</body>


</html>
<!-- End Template -->