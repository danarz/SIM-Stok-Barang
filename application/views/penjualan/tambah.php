<!-- Template -->

<?php $this->load->view('_partials/templateatas.php'); ?>
<!-- End Template -->
<?php if ($this->session->flashdata('success')) : ?>
    <div class="alert alert-success" role="alert">
        <?php echo $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>
<form action="<?php  ?>" method="post" id="formtrasaksi" enctype="multipart/form-data">
    <div class="container p-0">
        <div class="row">
            <div class="col-xl-4 pl-2 pr-1 pt-2 pb-2 ">
                <div class="card h-100 w-100 d-inline-block">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <label for="tanggal" class="col-xl-3 col-md-12"><b>Tgl</b></label>
                                <input name="tanggal" id="tanggal" type="date" class="form-control col-xl-9 col-md-12<?php echo form_error('tanggal') ? 'is-invalid' : '' ?>" value="<?= set_value('tanggal'); ?> " readonly>
                                <div class="invalid-feedback">
                                    <?php echo form_error('tanggal') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 pl-1 pr-1 pt-2 pb-2">
                <div class="card h-100 w-100">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <input type="hidden" value="" id="namaBarang">
                                <input type="hidden" value="" id="kodeBarang">
                                <input type="hidden" value="" id="harga">
                                <input type="hidden" value="" id="diskonItem">
                                <label for="barcode" class="col-xl-4 col-md-12"><b>Barcode</b></label>
                                <div class="input-group col-xl-8 col-md-12">
                                    <input type="text" name="barcodeBarang" id="barcode" class="form-control" value="<?= set_value('barcodeBarang') ?>" placeholder="ex: 854422">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" type="button" data-toggle="modal" data-target="#dataBarang"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="qty" class="col-xl-4 col-md-12"><b>Qty</b></label>
                                <div class="input-group col-xl-8 col-md-12">
                                    <input type="number" class="form-control <?php echo form_error('qty') ? 'is-invalid' : '' ?>" value="<?= set_value('qty') ?>" id="qty" name="qty">
                                </div>
                                <div class="invalid-feedback col-xl-12 col-md-12">
                                    <?php echo form_error('qty') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="input-group col-xl-8 col-md-12">
                                    <button type="button" id="addcart" name="addcart" class="btn btn-primary btn-sm"><i class="fas fa-cart-plus"></i>Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 pl-1 pr-2 pt-2 pb-2 ">
                <div class="card h-100 w-100">
                    <div class="card-body text-right">
                        <input type="hidden" id="invoice" name="invoice" value="<?= $invoice ?>">
                        <h6>Invoice<b><?= $invoice; ?></b></h6>
                        <h1 class="pt-2 text-danger" id="grandtotal2"><b>0</b></h1>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row pl-2 pr-2">
        <div class="card col-xl-12">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Item</th>
                                <th>Produk Item</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>Diskon Item</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="nodata">
                                <td class="text-center"></td>
                                <td class="text-center"></td>
                                <td class="text-center"></td>
                                <td class="text-center"></td>
                                <td class="text-center"></td>
                                <td class="text-center"></td>
                                <td class="text-center"></td>
                                <td class="text-center"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="container p-0">
        <div class="row">
            <div class="col-xl-4 pl-2 pr-1 pt-2 pb-2 ">
                <div class="card h-100 w-100 d-inline-block">
                    <div class="card-body">
                        <div class="form-group">

                            <div class="row">
                                <label for="subtotal" class="col-xl-4 col-md-12"><b>Subtotal</b></label>
                                <div class="input-group col-xl-8 col-md-12">
                                    <input type="number" class="form-control <?php echo form_error('subtotal') ? 'is-invalid' : '' ?>" value="<?= set_value('subtotal') ?>" id="subtotal" name="subtotal" readonly>
                                </div>
                                <div class="invalid-feedback col-xl-12 col-md-12">
                                    <?php echo form_error('subtotal') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="diskon" class="col-xl-4 col-md-12"><b>Diskon</b></label>
                                <div class="input-group col-xl-8 col-md-12">
                                    <input type="number" class="form-control <?php echo form_error('diskon') ? 'is-invalid' : '' ?>" value="<?= set_value('diskon') ?>" id="diskon" name="diskon">
                                </div>
                                <div class="invalid-feedback col-xl-12 col-md-12">
                                    <?php echo form_error('diskon') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="grandtotal" class="col-xl-4 col-md-12"><b>Grand Total</b></label>
                                <div class="input-group col-xl-8 col-md-12">
                                    <input type="number" class="form-control <?php echo form_error('grandtotal') ? 'is-invalid' : '' ?>" value="<?= set_value('grandtotal') ?>" id="grandtotal" name="grandtotal" readonly>
                                </div>
                                <div class="invalid-feedback col-xl-12 col-md-12">
                                    <?php echo form_error('grandtotal') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 pl-1 pr-1 pt-2 pb-2 ">
                <div class="card h-100 w-100 d-inline-block">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <label for="cash" class="col-xl-4 col-md-12"><b>Cash</b></label>
                                <div class="input-group col-xl-8 col-md-12">
                                    <input type="number" class="form-control <?php echo form_error('cash') ? 'is-invalid' : '' ?>" value="<?= set_value('cash') ?>" id="cash" name="cash">
                                </div>
                                <div class="invalid-feedback col-xl-12 col-md-12">
                                    <?php echo form_error('cash') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="change" class="col-xl-4 col-md-12"><b>Change</b></label>
                                <div class="input-group col-xl-8 col-md-12">
                                    <input type="number" class="form-control <?php echo form_error('change') ? 'is-invalid' : '' ?>" value="<?= set_value('change') ?>" id="change" name="change" readonly>
                                </div>
                                <div class="invalid-feedback col-xl-12 col-md-12">
                                    <?php echo form_error('change') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 pl-1 pr-2 pt-2 pb-2 ">
                <div class="card h-100 w-100 d-inline-block">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="">
                                <button type="submit" class="btn btn-success btn-lg btn-block" id="btnbayar"><i class="fa fa-save mr-2"></i>Pembayaran</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xl-6 pr-1">
                                    <a href="<?php echo base_url('penjualan') ?>" class="btn btn-outline-secondary btn-block"><i class="fa fa-arrow-left mr-2"></i>Kembali</a>
                                </div>
                                <div class="col-xl-6 pl-1">
                                    <a href="<?php echo base_url('penjualan/tambah') ?>" class="btn btn-outline-danger btn-block"><i class="fa fa-sync-alt mr-2"></i>Reset</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

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
                    <table class="table table-striped " id="dataTablebarang" width="100%" cellspacing="0">
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
                                        <a href="#" id="select" class="btn btn-primary btn-sm" data-id="<?php echo $brg->kode_barang; ?>" data-barcode="<?php echo $brg->barcode_barang; ?>" data-nama="<?php echo $brg->nama_barang; ?>" data-stok="<?php echo $brg->stok; ?>" data-harga="<?php echo $brg->harga_jual; ?>" data-diskonitem="<?php echo $brg->diskonitem; ?>">
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
        $("body").css("background-color", "#84898C");
        $(".form-group").css("font-size", "12px");
        $(document).on('click', '#select', function() {
            var kode = $(this).data('id');
            var barcode = $(this).data('barcode');
            var nama = $(this).data('nama');
            var stok = $(this).data('stok');
            var harga = $(this).data('harga');
            var diskonitem = $(this).data('diskonitem');
            $('#kodeBarang').val(kode);
            $('#barcode').val(barcode);
            $('#namaBarang').val(nama);
            $('#stokGudang').val(stok);
            $('#harga').val(harga);
            $('#diskonItem').val(diskonitem);
            $('#dataBarang').modal('hide');

        })

        var tempDate = $('#tanggal').val();
        if (!tempDate) {
            var newdate = new Date();
            var date = ("0" + newdate.getDate()).slice(-2);
            var month = ("0" + (newdate.getMonth() + 1)).slice(-2);
            // var today = date + '/' + month + '/' + newdate.getFullYear(); // Format 12/01/2021
            var today = newdate.getFullYear() + '-' + month + '-' + date; // Format 2021-01-23
            $('#tanggal').val(today);
        }

        //$('#nobody:last-child').closest('td')
        var setnumber = function() {
            var table_len;
            table_len = $('#dataTable tbody tr').length + 1;
            return table_len;
        }
        var subtotal = 0;
        var diskon = 0;
        var grandtotal = subtotal - diskon;
        var cash = 0;
        var change = cash - grandtotal;
        $('#addcart').click(function() {
            let qty = $('#qty').val();
            if (qty == "") {

            } else {

                let kodebarang = $('#kodeBarang').val();
                let barcode = $('#barcode').val();
                let namabarang = $('#namaBarang').val();
                let stok = $('#stokGudang').val();
                let harga = $('#harga').val();
                let diskonitem = $('#diskonItem').val();
                let totalitem = (harga - diskonitem) * qty;

                subtotal += totalitem;
                grandtotal = subtotal - diskon;
                var nodata_len = $('#dataTable tbody #nodata').length;
                console.log(nodata_len);
                if ($('#dataTable tbody #nodata').length == 0) {
                    $('#dataTable tbody:last-child').append(
                        '<tr>' +
                        '<td>' + setnumber() + '</td>' +
                        '<td>' + kodebarang + '</td>' +
                        '<td>' + namabarang + '</td>' +
                        '<td>' + harga + '</td>' +
                        '<td>' + qty + '</td>' +
                        '<td>' + diskonitem + '</td>' +
                        '<td>' + totalitem + '</td>' +
                        '<td>' +
                        '<button class="btn btn-danger btn-sm" type="button" id="hps_item"><i class="fas fa-trash mr-1"></i>Hapus</button>' +
                        '</td>' +
                        '</tr>'
                    );
                } else {
                    $('#nodata').closest('tr').remove();
                    $('#dataTable tbody:last-child').append(
                        '<tr>' +
                        '<td>' + setnumber() + '</td>' +
                        '<td>' + kodebarang + '</td>' +
                        '<td>' + namabarang + '</td>' +
                        '<td>' + harga + '</td>' +
                        '<td>' + qty + '</td>' +
                        '<td>' + diskonitem + '</td>' +
                        '<td>' + totalitem + '</td>' +
                        '<td>' +
                        '<button class="btn btn-danger btn-sm" id="hps_item"><i class="fas fa-trash mr-1"></i>Hapus</button>' +
                        '</td>' +
                        '</tr>'
                    );
                }

                $('#barcode').val("");
                $('#qty').val("");
            }
            //getDataTable();
            $('#subtotal').val(subtotal);
            $('#grandtotal').val(grandtotal);
            $('#change').val(change);
            $('#grandtotal2 b').empty().append(grandtotal);
        })
        $('#diskon').keyup(function() {
            diskon = $('#diskon').val();
            grandtotal = subtotal - diskon;
            console.log(diskon, grandtotal);

            $('#grandtotal').val(grandtotal);
            $('#grandtotal2 b').empty().append(grandtotal);
        })
        $('#dataTable tbody').on('click', '#hps_item', function() {
            var datahps = $(tr).find('td:eq(6)').text();
            if (confirm("Are you sure you want to delete this?")) {
                subtotal = subtotal - parseInt(datahps);
                console.log(datahps);
                //$(this).closest('tr').remove();

            } else {
                return false;
            }
            die;
        })

        $('#change').val(change);
        $('#cash').keyup(function() {
            cash = $('#cash').val();
            change = cash - grandtotal;
            $('#change').val(change);
        })

        function getDataTable() {
            var table_data = [];
            $('#dataTable tbody tr').each(function(row, tr) {
                var sub = {
                    //'barcode': $(tr).find('td:eq(1)').text(),
                    'kodebarang': $(tr).find('td:eq(1)').text(),
                    'harga': $(tr).find('td:eq(3)').text(),
                    'kuantiti': $(tr).find('td:eq(4)').text(),
                    'diskon': $(tr).find('td:eq(5)').text(),
                    'total': $(tr).find('td:eq(6)').text(),
                };
                table_data.push(sub);
            });

            return table_data;
        }
        //Pembayaran
        $('#btnbayar').click(function() {
            //var data : {'data_table': ta}
            var valData = {
                dataTable: getDataTable(),
                valInvoice: $('#invoice').val(),
                valTgl: $('#tanggal').val(),
                valSubtotal: $('#subtotal').val(),
                valDiskon: $('#diskon').val(),
                valGrandtotal: $('#grandtotal').val(),
                valCash: $('#cash').val(),
                valChange: $('#change').val(),
            }
            $.ajax({
                url: "<?php echo site_url('penjualan/bayar') ?>",
                type: "POST",
                data: valData,
                dataType: "JSON",
                success: function(data) {
                    console.log(data);
                    // if (data.status) {
                    //     alert('data oke, penyimpanan berhasil');
                    // }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('data error, penyimpanan gagal');
                }
            })
            die();
        })

        function bayar() {
            var tgl = $('#tanggal').val(); //format 2021-01-22
            var invoice = $('#invoice').val();
            var subtotal = $('#subtotal').val();
            var diskon = $('#diskon').val();
            var grandtotal = $('#grandtotal').val();
            var cash = $('#cash').val();
            var change = $('#change').val();
            if (!tgl || !invoice || !subtotal || !grandtotal || !cash) {
                alert('Lengkapi data !!!');
            } else {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url('penjualan/simpanData') ?>",
                    dataType: 'JSON',
                    data: $('$formtrasaksi').serialize(),
                    // {
                    //     'tanggal': tgl,
                    //     'invoice': invoice,
                    //     'subtotal': subtotal,
                    //     'diskon': diskon,
                    //     'grandtotal': grandtotal,
                    //     'cash': cash,
                    //     'change': change
                    // },
                    success: function(res) {
                        if (res == 1) {
                            alert('Data Berhasil disimpan')
                        } else {
                            alert('Data Gagal disimpan')
                        }
                    },
                    error: function() {
                        alert('data gagal disimpan');
                    }
                })
            }
        }
    })
</script>