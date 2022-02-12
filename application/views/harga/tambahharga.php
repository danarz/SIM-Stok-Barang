<!-- Template -->

<?php $this->load->view('_partials/templateatas.php'); ?>
<!-- End Template -->

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Tambah Harga
    </div>

    <div class="card-body">
        <form action="<?php echo site_url('harga/tambah') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="" class="col-xl-2 col-md-6">Kode Barang</label>
                <input name="kodeBarang" id="kodeBarang" type="text" class="form-control col-xl-3 col-md-6 <?php echo form_error('kodeBarang') ? 'is-invalid' : '' ?>" value="<?= set_value('kodeBarang') ?>" placeholder="ex: D94V">
                <div class="invalid-feedback col-xl-3 offset-xl-1 col-md-6">
                    <?php echo form_error('kodeBarang') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-xl-2 col-md-6">Barcode</label>
                <div class="input-group col-xl-3 col-md-5 p-0">
                    <input type="text" name="barcodeBarang" id="barcode" class="form-control <?php echo form_error('barcodeBarang') ? 'is-invalid' : '' ?>" value="<?= set_value('barcodeBarang') ?>" placeholder="ex: 854443822">
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
                <input type="text" name="namaBarang" id="namaBarang" class="form-control col-xl-3 col-md-5 <?php echo form_error('namaBarang') ? 'is-invalid' : '' ?>" value="<?= set_value('namaBarang') ?>">
                <div class="invalid-feedback col-xl-3 offset-xl-1 col-md-6">
                    <?php echo form_error('namaBarang') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleFormControlInput1" class="col-xl-2 col-md-6">Satuan</label>
                <select name="satuan" class="form-control col-xl-3 col-md-6<?php echo form_error('satuan') ? 'is-invalid' : '' ?>">
                    <option value="" <?php echo set_select('satuan', '', set_value('satuan') == '' ? TRUE : FALSE); ?>>--Pilih Satuan--</option>
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
                <input type="number" class="form-control col-xl-2 col-md-5 <?php echo form_error('hargaAwal') ? 'is-invalid' : '' ?>" value="<?= set_value('hargaAwal') ?>" id="hargaAwal" name="hargaAwal" placeholder="Rp.">
                <div class="invalid-feedback col-xl-3 offset-xl-1 col-md-6">
                    <?php echo form_error('hargaAwal') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleFormControlInput1" class="col-xl-2 col-md-6">Potongan</label>
                <input type="number" class="form-control col-xl-2 col-md-5 <?php echo form_error('potongan') ? 'is-invalid' : '' ?>" value="<?= set_value('potongan') ?>" id="potongan" name="potongan" placeholder="Rp.">
                <div class="invalid-feedback col-xl-3 offset-xl-1 col-md-6">
                    <?php echo form_error('potongan') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleFormControlInput1" class="col-xl-2 col-md-6">Harga Akhir</label>
                <input type="number" id="hargaAkhir" name="hargaAkhir" class="form-control col-xl-2 col-md-5 <?php echo form_error('hargaAkhir') ? 'is-invalid' : '' ?>" value="<?= set_value('hargaAkhir') ?>">
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

<!-- Modal cari barang -->
<div class="modal fade" id="dataBarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped " id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Kode Barang</th>
                                <th>Barcode</th>
                                <th>Kategori</th>
                                <th>Nama Barang</th>
                                <th>Stok</th>
                                <th style="width:15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($barang as $i => $brg) : ?>
                                <tr>
                                    <td><?php echo $brg->kode_barang; ?></td>
                                    <td><?php echo $brg->barcode_barang; ?></td>
                                    <td><?php echo $brg->kategori; ?></td>
                                    <td><?php echo $brg->nama_barang; ?></td>
                                    <td class="text-right"><?php echo $brg->stok; ?></td>
                                    <td style="width:15%">
                                        <a href="#" id="select" class="btn btn-primary btn-sm" \ data-id="<?php echo $brg->kode_barang; ?>" data-barcode="<?php echo $brg->barcode_barang; ?>" data-nama="<?php echo $brg->nama_barang; ?>">
                                            <i class="fas fa-check mr-2"></i>Pilih
                                        </a>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<datalist id="data_barang">
    <?php
    foreach ($barang as $b) {
        echo "<option value='$b->kode_barang'>$b->nama_barang</option>";
    }
    ?>
</datalist>
<!-- Template -->
<?php $this->load->view('_partials/templatebawah.php'); ?>
<!-- End Template -->
<script>
    $(document).ready(function() {
        $(document).on('click', '#select', function() {
            var kode = $(this).data('id');
            var barcode = $(this).data('barcode');
            var nama = $(this).data('nama');
            $('#kodeBarang').val(kode);
            $('#barcode').val(barcode);
            $('#namaBarang').val(nama);
            $('#dataBarang').modal('hide');

        })
        var hAwal = 0;
        var potongan = 0;
        var hasilAkhir = 0;
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

    function autofill() {
        var kodeBarang = document.getElementById('kodeBarang').value;
        $.ajax({
            url: "<?php echo base_url(); ?>input/cari",
            data: '&kode_barang=' + kodeBarang,
            success: function(data) {
                var hasil = JSON.parse(data);

                $.each(hasil, function(key, val) {

                    document.getElementById('kodeBarang').value = val.kode_barang;
                    document.getElementById('barcode').value = val.barcode_barang;
                    document.getElementById('namaBarang').value = val.nama_barang;


                });
            }
        });

    }
</script>