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
        Edit Satuan
    </div>

    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <input type="text" name="kodeSatuanOld" class="form-control" value="<?= $satuan->kode_satuan; ?>" hidden>
            </div>
            <div class="form-group row">
                <label for="kode" class="col-xl-2 col-md-6">Kode Satuan</label>
                <input type="text" name="kodeSatuan" class="form-control col-xl-3 col-md-6 <?php echo form_error('kodeSatuan') ? 'is-invalid' : '' ?>" value="<?= $satuan->kode_satuan; ?>" id="" placeholder="ex: Pcs, Kg">
                <div class="invalid-feedback col-xl-3 offset-xl-1 col-md-6">
                    <?php echo form_error('kodeSatuan') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-xl-2 col-md-6">Nama Satuan</label>
                <input type="text" name="namaSatuan" class="form-control col-xl-3 col-md-5 <?php echo form_error('namaSatuan') ? 'is-invalid' : '' ?>" value="<?= $satuan->nama_satuan; ?>" id="" placeholder="ex: Picis, Lusin">
                <div class=" col-xl-1 col-md-1"><i class="fa fa-barcode mt-2"></i></div>
                <div class="invalid-feedback col-xl-3 col-md-6">
                    <?php echo form_error('namaSatuan') ?>
                </div>
            </div>
            <div class="form-group row mt-4">
                <label for="exampleFormControlTextarea1" class="col-xl-2 col-md-3"></label>
                <button class="btn btn-primary col-xl-2 col-md-3 mr-4" type="submit"><i class="fa fa-save mr-2"></i><b>Simpan</b></button>
                <a class="btn btn-danger col-xl-2 col-md-3" href="<?php echo site_url('satuan') ?>"><i class="fa fa-trash mr-2"></i><b>Batal</b></a>
            </div>
        </form>
    </div>
</div>


<!-- Template -->
<?php $this->load->view('_partials/templatebawah.php'); ?>
<!-- End Template -->