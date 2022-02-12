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
        Daftar Satuan
        <a href="<?php echo base_url('satuan/tambahsatuan') ?>" type="button" class="btn btn-success text-right" style="float: right;">
            <i class="fas fa-plus mr-2"></i>
            <b>Tambah</b>
        </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kode Satuan</th>
                        <th>Nama Satuan</th>
                        <th style="width:20%">Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Kode Satuan</th>
                        <th>Nama Satuan</th>
                        <th style="width:20%">Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    foreach ($satuan as $satu) :
                    ?>
                        <tr>
                            <td><?php echo $satu->kode_satuan; ?></td>
                            <td><?php echo $satu->nama_satuan; ?></td>
                            <td>
                                <a href="<?php echo site_url('satuan/edit/' . $satu->kode_satuan); ?>" class="btn btn-outline-primary btn-sm">
                                    <i class="edit fas fa-edit"></i>
                                </a>
                                <a href="<?php echo site_url('satuan/hapus/' . $satu->kode_satuan); ?>" id="deletebtn" class=" btn btn-outline-danger btn-sm">
                                    <i class="delete fas fa-trash"></i>
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

<!-- Modal -->
<div class="modal fade modalHapus" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="pesan">

                </div>
                Apakah anda yakin ingin menghapaus data ini ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="" id="hapusdata" type="button" class="btn btn-danger">Hapus data</a>
            </div>
        </div>
    </div>
</div>

<!-- Template -->
<?php $this->load->view('_partials/templatebawah.php'); ?>
<!-- End Template -->
<script>

</script>