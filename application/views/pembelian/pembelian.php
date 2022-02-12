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
        Data Pembelian
        <a href="<?php echo base_url('pembelian/tambah') ?>" type="button" class="btn btn-outline-success text-right" style="float: right;">
            <i class="fas fa-plus mr-2"></i>
            <b>Tambah</b>
        </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tanggal Masuk</th>
                        <th>Supplier</th>
                        <th>Kode Barang</th>
                        <th>Kuantiti</th>
                        <th style="width:10%">Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Tanggal Masuk</th>
                        <th>Supplier</th>
                        <th>Kode Barang</th>
                        <th>Kuantiti</th>
                        <th style="width:10%">Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($pembelian as $data) : ?>
                        <tr>
                            <td><?php echo $data->tanggal; ?></td>
                            <td><?php echo $data->supplier; ?></td>
                            <td><?php echo $data->kode_barang; ?></td>
                            <td class="text-right"><?php echo $data->stok_in; ?></td>
                            <td>
                                <a href="<?php echo site_url('pembelian/edit/' . $data->id_pembelian); ?>" class="btn btn-outline-primary btn-sm">
                                    <i class="edit fas fa-edit"></i>
                                </a>
                                <a href="<?php //echo site_url('pembelian/hapus/' . $data->id_pembelian); 
                                            ?>" class=" btn btn-outline-danger btn-sm " data-toggle="modal" data-target="#deleteModal" data-id="<?= $data->id_pembelian; ?>">
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

<!-- Modal HTML -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Anda Yakin?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Menghapus data ini akan mempengaruhi data stok barang saat ini!!!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="deletebtn" data-id="<?= $data->id_pembelian; ?>" type="button" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>
<!-- Template -->
<?php $this->load->view('_partials/templatebawah.php'); ?>
<!-- End Template -->
<script>
    $(document).ready(function() {
        $('#deletebtn').click(function() {
            var id = $(this).data('id');
            window.location.href = "<?php echo site_url('pembelian/hapus/'); ?>" + id;
        })
    })
</script>