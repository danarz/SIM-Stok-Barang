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
        Daftar Harga
        <a href="<?php echo base_url('harga/tambah') ?>" type="button" class="btn btn-success text-right" style="float: right;">
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
                        <th>Nama Barang</th>
                        <th>Harga Awal</th>
                        <th>Diskon</th>
                        <th>Harga Akhir</th>
                        <th>Keterangan</th>
                        <th style="width:10%">Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Barcode</th>
                        <th>Nama Barang</th>
                        <th>Harga Awal</th>
                        <th>Diskon</th>
                        <th>Harga Akhir</th>
                        <th>Keterangan</th>
                        <th style="width:10%">Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($harga as $data) : ?>
                        <tr>
                            <td><?php echo $data->kode_barang; ?></td>
                            <td><?php echo $data->barcode_barang; ?></td>
                            <td><?php echo $data->nama_barang; ?></td>
                            <td><?php echo $data->satuan; ?></td>
                            <td><?php echo $data->harga_awal; ?></td>
                            <td><?php echo $data->potongan; ?></td>
                            <td><?php echo $data->harga_akhir; ?></td>
                            <td>
                                <a href="<?php echo site_url('harga/edit/' . $data->id); ?>" class="btn btn-outline-primary btn-sm">
                                    <i class="edit fas fa-edit"></i>
                                </a>
                                <a href="<?php echo site_url('harga/hapus/' . $data->id); ?>" id="deletebtn" class=" btn btn-outline-danger btn-sm">
                                    <i class="delete fas fa-trash"></i>
                                </a>
                            </td>
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