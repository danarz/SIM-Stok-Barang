<!-- Template -->

<?php $this->load->view('_partials/templateatas.php'); ?>
<!-- End Template -->

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Edit Pembelian
    </div>

    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <input type="text" name="idPembelian" id="idPembelian" class="<?php echo form_error('idPembelian') ? 'is-invalid' : '' ?>" value="<?= $pembelian->id_pembelian ?>" hidden>
                <div class="invalid-feedback col-xl-3 offset-xl-1 col-md-6">
                    <?php echo form_error('idPembelian') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-xl-2 col-md-6">Tanggal</label>
                <input name="tanggal" id="tanggal" type="date" class="form-control col-xl-3 col-md-6 <?php echo form_error('tanggal') ? 'is-invalid' : '' ?>" value="<?= $pembelian->tanggal; ?>">
                <div class="invalid-feedback col-xl-3 offset-xl-1 col-md-6">
                    <?php echo form_error('tanggal') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-xl-2 col-md-6">Nama Supplier</label>
                <input type="text" name="supplier" id="supplier" class="form-control col-xl-3 col-md-5 <?php echo form_error('supplier') ? 'is-invalid' : '' ?>" value="<?= $pembelian->supplier ?>">
                <div class="invalid-feedback col-xl-3 offset-xl-1 col-md-6">
                    <?php echo form_error('supplier') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-xl-2 col-md-6">Kode Barang</label>
                <input name="kodeBarang" id="kodeBarang" type="text" class="form-control col-xl-3 col-md-6 <?php echo form_error('kodeBarang') ? 'is-invalid' : '' ?>" value="<?= $pembelian->kode_barang ?>" readonly>
                <div class="invalid-feedback col-xl-3 offset-xl-1 col-md-6">
                    <?php echo form_error('kodeBarang') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-xl-2 col-md-6">Barcode</label>
                <div class="input-group col-xl-3 col-md-5 p-0">
                    <input type="text" name="barcodeBarang" id="barcode" class="form-control <?php echo form_error('barcodeBarang') ? 'is-invalid' : '' ?>" value="<?= $pembelian->barcode_barang ?>" readonly>
                    <div class="input-group-append">
                        <button class="btn btn-secondary" id="btnbarcode" type="button" data-toggle="barcodeAlert" data-target="#barcodeAlert"><i class="fas fa-search"></i></button>
                    </div>
                </div>
                <div class=" col-xl-1 col-md-1"><i class="fa fa-barcode mt-2"></i></div>
                <div class="barcodeAlert" id="barcodeAlert" aria-hidden="true">
                    <span>Data Barang tidak bisa dirubah</span>
                </div>
                <div class="invalid-feedback col-xl-3 offset-xl-1 col-md-6">
                    <?php echo form_error('barcodeBarang') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-xl-2 col-md-6">Nama Barang</label>
                <input name="namaBarang" id="namaBarang" type="text" class="form-control col-xl-3 col-md-6 <?php echo form_error('namaBarang') ? 'is-invalid' : '' ?>" value="<?= $pembelian->nama_barang ?>" readonly>
                <div class="invalid-feedback col-xl-3 offset-xl-1 col-md-6">
                    <?php echo form_error('namaBarang') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-xl-2 col-md-6">Stok Gudang</label>
                <input name="stokGudang" id="stokGudang" type="number" class="form-control col-xl-3 col-md-6 <?php echo form_error('stokGudang') ? 'is-invalid' : '' ?>" value="<?= $pembelian->stok - $pembelian->stok_in; ?>" readonly>
                <div class="invalid-feedback col-xl-3 offset-xl-1 col-md-6">
                    <?php echo form_error('stokGudang') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleFormControlInput1" class="col-xl-2 col-md-6">Qty</label>
                <input type="number" class="form-control col-xl-2 col-md-5 <?php echo form_error('stokIn') ? 'is-invalid' : '' ?>" value="<?= $pembelian->stok_in ?>" id="stokIn" name="stokIn" placeholder="ex: 50">
                <div class="invalid-feedback col-xl-3 offset-xl-1 col-md-6">
                    <?php echo form_error('stokIn') ?>
                </div>
            </div>
            <div class="form-group row mt-4">
                <label for="exampleFormControlTextarea1" class="col-xl-2 col-md-3"></label>
                <button type="submit" class="btn btn-primary col-xl-2 col-md-3 mr-4"><i class="fa fa-save mr-2"></i>Simpan</button>
                <a href="<?php echo base_url('pembelian') ?>" class="btn btn-danger col-xl-2 col-md-3"><i class="fa fa-save mr-2"></i>Batal</a>
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
                                        <a href="#" id="select" class="btn btn-primary btn-sm" \ data-id="<?php echo $brg->kode_barang; ?>" data-barcode="<?php echo $brg->barcode_barang; ?>" data-nama="<?php echo $brg->nama_barang; ?>" data-stok="<?php echo $brg->stok; ?>">
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

<!-- Template -->
<?php $this->load->view('_partials/templatebawah.php'); ?>
<!-- End Template -->
<script>
    $(document).ready(function() {
        $(document).on('click', '#select', function() {
            var kode = $(this).data('id');
            var barcode = $(this).data('barcode');
            var nama = $(this).data('nama');
            var stok = $(this).data('stok');
            $('#kodeBarang').val(kode);
            $('#barcode').val(barcode);
            $('#namaBarang').val(nama);
            $('#stokGudang').val(stok);
            $('#dataBarang').modal('hide');
        })

        $('#barcodeAlert').hide();
        $(document).on('click', '#btnbarcode', function() {
            $('#barcodeAlert').show();
        });

        var tempDate = $('#tanggal').val();
        if (!tempDate) {
            var newdate = new Date();
            var date = ("0" + newdate.getDate()).slice(-2);
            var month = ("0" + (newdate.getMonth() + 1)).slice(-2);
            // var today = date + '/' + month + '/' + newdate.getFullYear(); // Format 12/01/2021
            var today = newdate.getFullYear() + '-' + month + '-' + date; // Format 2021-01-23
            $('#tanggal').val(today);
        }


    })
</script>