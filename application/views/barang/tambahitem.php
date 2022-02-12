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
        Tambah Barang
    </div>

    <div class="card-body">
        <form action="<?php echo site_url('input/tambah') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="exampleFormControlSelect1" class="col-xl-2 col-md-6">Kategori Barang</label>
                <select name="kategoriBarang" class="form-control col-xl-3 col-md-6<?php echo form_error('kategoriBarang') ? 'is-invalid' : '' ?>">

                    <option value="" <?php echo set_select('kategoriBarang', '', set_value('kodeBarang') == '' ? TRUE : FALSE); ?>>--Pilih Kategori--</option>
                    <option value="Frozen Food" <?php echo set_select('kategoriBarang', 'Frozen Food', set_value('kodeBarang') == 'Frozen Food' ? TRUE : FALSE); ?>>Frozen Food</option>
                    <option value="Bumbu Dapur" <?php echo set_select('kategoriBarang', 'Bumbu Dapur', set_value('kodeBarang') == 'Bumbu Dapur' ? TRUE : FALSE); ?>>Bumbu Dapur</option>
                    <option value="Kemasan" <?php echo set_select('kategoriBarang', 'Kemasan', set_value('kodeBarang') == 'Kemasan' ? TRUE : FALSE); ?>>Kemasan</option>
                    <option value="Lain-lain" <?php echo set_select('kategoriBarang', 'Lain-lain', set_value('kodeBarang') == 'Lain-lain' ? TRUE : FALSE); ?>>Lain-lain</option>
                </select>

                <div class="invalid-feedback col-xl-3 offset-xl-1 col-md-6">
                    <?php echo form_error('kategoriBarang') ?>
                </div>
                <?php
                $isselected
                //echo $isselected;
                ?>
            </div>
            <div class="form-group row">
                <label for="kodeBarang" class="col-xl-2 col-md-6">Kode Barang</label>
                <input name="kodeBarang" type="text" class="form-control col-xl-3 col-md-6 <?php echo form_error('kodeBarang') ? 'is-invalid' : '' ?>" value="<?= set_value('kodeBarang') ?>" placeholder="ex: 95JA4">
                <div class="invalid-feedback col-xl-3 offset-xl-1 col-md-6">
                    <?php echo form_error('kodeBarang') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="barcodeBarang" class="col-xl-2 col-md-6">Barcode Barang</label>
                <input name="barcodeBarang" type="text" class="form-control col-xl-3 col-md-5 <?php echo form_error('barcodeBarang') ? 'is-invalid' : '' ?>" value="<?= set_value('barcodeBarang') ?>" placeholder="ex: 99872532">
                <div class=" col-xl-1 col-md-1"><i class="fa fa-barcode mt-2"></i></div>
                <div class="invalid-feedback col-xl-3 col-md-6">
                    <?php echo form_error('barcodeBarang') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleFormControlInput1" class="col-xl-2 col-md-6">Nama Barang</label>
                <input name="namaBarang" type="text" class="form-control col-xl-3 col-md-6 <?php echo form_error('namaBarang') ? 'is-invalid' : '' ?>" value="<?= set_value('namaBarang') ?>" placeholder="ex: notebook">
                <div class="invalid-feedback col-xl-3 offset-xl-1 col-md-6">
                    <?php echo form_error('namaBarang') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleFormControlInput1" class="col-xl-2 col-md-6">Lokasi</label>
                <input name="lokasi" type="text" class="form-control col-xl-3 col-md-6 <?php echo form_error('lokasi') ? 'is-invalid' : '' ?>" value="<?= set_value('lokasi') ?>" placeholder="">
                <div class="invalid-feedback col-xl-3 offset-xl-1 col-md-6">
                    <?php echo form_error('lokasi') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleFormControlInput1" class="col-xl-2 col-md-6">Stok</label>
                <input name="stok" type="text" class="form-control col-xl-2 col-md-6 <?php echo form_error('stok') ? 'is-invalid' : '' ?>" value="<?= set_value('stok') ?>" placeholder="ex: 123">
                <div class="invalid-feedback col-xl-3 offset-xl-2 col-md-6">
                    <?php echo form_error('stok') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleFormControlInput1" class="col-xl-2 col-md-6">Supplier</label>
                <input name="supplier" type="text" class="form-control col-xl-3 col-md-6 <?php echo form_error('supplier') ? 'is-invalid' : '' ?>" value="<?= set_value('supplier') ?>" placeholder="ex: PT.Saratoga">
                <div class="invalid-feedback col-xl-3 offset-xl-1 col-md-6">
                    <?php echo form_error('supplier') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleFormControlTextarea1" class="col-xl-2 col-md-6">Keterangan</label>
                <textarea name="ketBarang" class="form-control col-xl-5 col-md-6 <?php echo form_error('ketBarang') ? 'is-invalid' : '' ?>" rows="3"><?php echo set_value('ketBarang'); ?></textarea>
                <div class="invalid-feedback col-xl-3 col-md-6">
                    <?php echo form_error('ketBarang') ?>
                </div>
            </div>
            <div class="form-group row mt-4">
                <label for="exampleFormControlTextarea1" class="col-xl-2 col-md-3"></label>
                <button type="submit" class="btn btn-primary col-xl-2 col-md-3 mr-4"><i class="fa fa-save mr-2"></i>Simpan</button>
                <a class="btn btn-danger col-xl-2 col-md-3" href="<?php echo site_url('input') ?>"><i class="fa fa-save mr-2"></i>Batal</a>
            </div>
        </form>
    </div>
</div>

<!-- Template -->
<?php $this->load->view('_partials/templatebawah.php'); ?>
<!-- End Template -->