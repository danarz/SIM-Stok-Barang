<!-- Template -->

<?php $this->load->view('_partials/templateatas.php'); ?>
<!-- End Template -->

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Data Penjualan
        <a href="<?php echo base_url('penjualan/tambah') ?>" type="button" class="btn btn-outline-success text-right" style="float: right;">
            <i class="fas fa-plus mr-2"></i>
            <b>Tambah</b>
        </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Invoice</th>
                        <th>Subtotal</th>
                        <th>Diskon</th>
                        <th>Grandtotal</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Tanggal</th>
                        <th>Invoice</th>
                        <th>Subtotal</th>
                        <th>Diskon</th>
                        <th>Grandtotal</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($penjualan as $data) : ?>
                        <tr>
                            <td><?php $tanggal = substr($data->tgl, 0, 10);
                                echo $tanggal; ?></td>
                            <td><?php echo $data->invoice; ?></td>
                            <td><?php echo $data->subtotal; ?></td>
                            <td><?php echo $data->diskon; ?></td>
                            <td><?php echo $data->grandtotal; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Template -->
<?php $this->load->view('_partials/templatebawah.php'); ?>
<!-- End Template -->