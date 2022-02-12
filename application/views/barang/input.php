<!-- Template -->
<?php $this->load->view('_partials/templateatas.php'); ?>
<!-- End Template -->

<?php if ($this->session->flashdata('success')) : ?>
    <div class="alert alert-success" role="alert">
        <?php echo $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Daftar Item
        <a href="<?php echo base_url('input/tambah') ?>" type="button" class="btn btn-success text-right" style="float: right;">
            <i class="fas fa-plus mr-2"></i>
            <b>Tambah</b>
        </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Barcode</th>
                        <th>Kategori</th>
                        <th>Nama Barang</th>
                        <th>Lokasi</th>
                        <th>Stok</th>
                        <th>Supplier</th>
                        <th>Keterangan</th>
                        <th style="width:10%">Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Barcode</th>
                        <th>Kategori</th>
                        <th>Nama Barang</th>
                        <th>Lokasi</th>
                        <th>Stok</th>
                        <th>Supplier</th>
                        <th>Keterangan</th>
                        <th style="width:10%">Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    foreach ($barang as $item) :
                    ?>
                        <tr>
                            <td><?php echo $item->kode_barang; ?></td>
                            <td><?php echo $item->barcode_barang; ?></td>
                            <td><?php echo $item->kategori; ?></td>
                            <td><?php echo $item->nama_barang; ?></td>
                            <td><?php echo $item->lokasi; ?></td>
                            <td><?php echo $item->stok; ?></td>
                            <td><?php echo $item->supplier; ?></td>
                            <td><?php echo $item->ket_barang; ?></td>
                            <td>
                                <a href="<?php echo site_url('input/edit/' . $item->kode_barang); ?>" class="btn btn-outline-primary btn-sm">
                                    <i class="edit fas fa-edit"></i>
                                </a>
                                <a href="<?php echo site_url('input/hapus/' . $item->kode_barang); ?>" class="btn btn-outline-danger btn-sm">
                                    <i class="edit fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Template -->
<?php $this->load->view('_partials/templatebawah.php'); ?>
<!-- End Template -->