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
        Edit Harga
    </div>

    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <input hidden name="id" id="idHarga" type="text" value="<?= $harga->id; ?>">
            <div class="form-group row">
                <label for="" class="col-xl-2 col-md-6">Kode Barang</label>
                <input name="kodeBarang" id="kodeBarang" type="text" class="form-control col-xl-3 col-md-6 <?php echo form_error('kodeBarang') ? 'is-invalid' : '' ?>" value="<?= $harga->kode_barang; ?>" placeholder="ex: D94V">
                <div class="invalid-feedback col-xl-3 offset-xl-1 col-md-6">
                    <?php echo form_error('kodeBarang') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-xl-2 col-md-6">Barcode</label>
                <div class="input-group col-xl-3 col-md-5 p-0">
                    <input type="text" name="barcodeBarang" id="barcode" class="form-control <?php echo form_error('barcodeBarang') ? 'is-invalid' : '' ?>" value="<?= $harga->barcode_barang; ?>" placeholder="ex: 854443822">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="button" data-toggle="modal" data-target="#dataBarang"><i class="fa fa-search"></i></button>
                    </div>
                </div>
                <div class=" col-xl-1 col-md-1"><i class="fa fa-barcode mt-2"></i></div>
                <div class="invalid-feedback col-xl-3 offset-xl-1 col-md-6">
                    <?php echo form_error('barcodeBarang') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-xl-2 col-md-6">Nama Barang</label>
                <input type="text" name="namaBarang" id="namaBarang" class="form-control col-xl-3 col-md-5 <?php echo form_error('namaBarang') ? 'is-invalid' : '' ?>" value="<?= $harga->nama_barang; ?>">
                <div class="invalid-feedback col-xl-3 offset-xl-1 col-md-6">
                    <?php echo form_error('namaBarang') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleFormControlInput1" class="col-xl-2 col-md-6">Satuan</label>
                <select name="satuan" class="form-control col-xl-3 col-md-6<?php echo form_error('satuan') ? 'is-invalid' : '' ?>">
                    <option value="<?= $harga->satuan; ?>" <?php echo set_select('satuan', $harga->satuan, set_value('satuan') == $harga->satuan ? TRUE : FALSE); ?>><?= $harga->satuan; ?></option>
                    <?php foreach ($satuan as $satu) : ?>
                        <option value="<?php echo $satu->kode_satuan ?>" <?php echo set_select('satuan', $satu->kode_satuan, set_value('satuan') == $satu->kode_satuan ? TRUE : FALSE); ?>><?= $satu->kode_satuan ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback col-xl-3 offset-xl-1 col-md-6">
                    <?php echo form_error('satuan') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleFormControlInput1" class="col-xl-2 col-md-6">Harga Awal</label>
                <input type="number" class="form-control col-xl-2 col-md-5 <?php echo form_error('hargaAwal') ? 'is-invalid' : '' ?>" value="<?= $harga->harga_awal; ?>" id="hargaAwal" name="hargaAwal" placeholder="Rp.">
                <div class="invalid-feedback col-xl-3 offset-xl-1 col-md-6">
                    <?php echo form_error('hargaAwal') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleFormControlInput1" class="col-xl-2 col-md-6">Potongan</label>
                <input type="number" class="form-control col-xl-2 col-md-5 <?php echo form_error('potongan') ? 'is-invalid' : '' ?>" value="<?= $harga->potongan; ?>" id="potongan" name="potongan" placeholder="Rp.">
                <div class="invalid-feedback col-xl-3 offset-xl-1 col-md-6">
                    <?php echo form_error('potongan') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleFormControlInput1" class="col-xl-2 col-md-6">Harga Akhir</label>
                <input type="number" id="hargaAkhir" name="hargaAkhir" class="form-control col-xl-2 col-md-5 <?php echo form_error('hargaAkhir') ? 'is-invalid' : '' ?>" value="<?= $harga->harga_akhir; ?>">
                <div class="invalid-feedback col-xl-3 offset-xl-1 col-md-6">
                    <?php echo form_error('hargaAkhir') ?>
                </div>
            </div>
            <div class="form-group row mt-4">
                <label for="exampleFormControlTextarea1" class="col-xl-2 col-md-3"></label>
                <button type="submit" class="btn btn-primary col-xl-2 col-md-3 mr-4"><i class="fa fa-save mr-2"></i>Simpan</button>
                <a href="<?php echo base_url('harga') ?>" class="btn btn-danger col-xl-2 col-md-3"><i class="fa fa-save mr-2"></i>Batal</a>
            </div>
        </form>
    </div>
</div>
<!-- Template -->
<?php $this->load->view('_partials/templatebawah.php'); ?>
<!-- End Template -->
<script>
    $(document).ready(function() {
        var hAwal = $('#hargaAwal').val();
        var potongan = $('#potongan').val();;
        var hasilAkhir = hAwal - potongan;
        $('#hargaAkhir').val(hasilAkhir);
        $(document).on('keyup', '#hargaAwal', function() {
            hAwal = $(this).val();
            hasilAkhir = hAwal - potongan;
            $('#hargaAkhir').val(hasilAkhir);
        })
        $(document).on('keyup', '#potongan', function() {
            potongan = $(this).val();
            hasilAkhir = hAwal - potongan;
            $('#hargaAkhir').val(hasilAkhir);
        })
    })
</script>