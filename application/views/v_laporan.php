<!-- Template -->
<?php $this->load->view('_partials/templateatas.php'); ?>
<!-- End Template -->
<style>
    #table {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #table td,
    #table th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #table tr:hover {
        background-color: #ddd;
    }

    #table th {
        padding-top: 10px;
        padding-bottom: 10px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
</style>
<div class="row ">
    <div class="col-xl-6 col-sm-12">

        <div class="row mb-3">
            <div class="col-xl-8">
                <select name="laporan" id="inputlaporan" class="form-control">
                    <option value="#">Pilih. . .</option>
                    <option value="lstok">Laporan Stok Barang</option>
                    <option value="lmasuk">Laporan Transaksi Masuk</option>
                    <option value="lkeluar">Laporan Transaksi Keluar</option>
                </select>
            </div>
            <div class="col-xl-4">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-xl-4 tgl">
                <label for="tglmulai"><small>Tgl Awal</small></label>
                <input type="date" class="form-control" id="awal" name="tglmulai" value="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="col-xl-4 tgl">
                <label for="tglselesai"><small>Tgl Akhir</small></label>
                <input type="date" class="form-control" id="akhir" name="tglselesai" value="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="col-xl-3">
                <label for="lihat" class="text-white"><small>Lihat</small></label>
                <button type="button" name="lihat" id="btn-lihat" class="btn btn-success form-control"><i class="fas fa-eye mr-2"></i>Lihat</button>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-3">
                <a href="" type="button" class="btn btn-warning form-control"><i class="fas fa-print mr-2"></i>Cetak</a>
            </div>
        </div>
    </div>
</div>

<div class="card mb-4 shadow p-3 mb-5 bg-white rounded">
    <div class="card-body">
        <div class="mb-3">
            <h4 id="juduldata"></h4>
        </div>
        <table class="table table-bordered" id="" width="100%" cellspacing="0" id="tabelstok">
            <thead id="head">
            </thead>
            <tbody class="daftarstok">

            </tbody>
        </table>
    </div>
</div>


<!-- Template -->
</div>
</main>
<!-- footer -->
<?php $this->load->view("_partials/footer.php") ?>
</div>
</div>
<!-- js -->
<?php $this->load->view("_partials/js.php") ?>
<script>
    $(document).ready(function() {
        $('.tgl').hide();
        $('#btn-lihat').on('click', function() {
            const type = $('#inputlaporan').val();
            const awal = $('#awal').val();
            const akhir = $('#akhir').val();
            if (type == 'lstok') {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url('laporan/caridata'); ?>",
                    data: {
                        typelaporan: type,
                        tglawal: awal,
                        tglakhir: akhir
                    },
                    dataType: 'json',
                    cache: false,
                    success: function(data) {
                        var baris = '';
                        var j = 1;
                        for (let i = 0; i < data.length; i++) {
                            baris += "<tr>" +
                                "<td>" + j++ + "</td>" +
                                "<td>" + data[i].id_barang + "</td>" +
                                "<td>" + data[i].nama + "</td>" +
                                "<td>" + data[i].jumlah + "</td>" +
                                "</tr>";
                        }
                        $('h4#juduldata').text('Data Stok Barang');
                        $('tbody.daftarstok').html(baris);

                    }
                });
                var row = "<tr>" +
                    "<th>" + "No" + "</th>" +
                    "<th>" + "Kode Barang" + "</th>" +
                    "<th>" + "Nama Barang" + "</th>" +
                    "<th>" + "Stok" + "</th>" +
                    "</tr>";
                $('thead#head').html(row);
            } else if (type == 'lmasuk') {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url('laporan/caridata'); ?>",
                    data: {
                        typelaporan: type,
                        tglawal: awal,
                        tglakhir: akhir
                    },
                    dataType: 'json',
                    cache: false,
                    success: function(data) {
                        var baris = '';
                        var j = 1;
                        for (let i = 0; i < data.length; i++) {
                            baris += "<tr>" +
                                "<td>" + j++ + "</td>" +
                                "<td>" + data[i].id_barang + "</td>" +
                                "<td>" + data[i].nama + "</td>" +
                                "<td>" + data[i].tgl + "</td>" +
                                "<td>" + data[i].stok_in + "</td>" +
                                "</tr>";
                        }
                        $('h4#juduldata').text('Data Barang Masuk');
                        $('tbody.daftarstok').html(baris);

                    }
                });
                var row = "<tr>" +
                    "<th>" + "No" + "</th>" +
                    "<th>" + "Kode Barang" + "</th>" +
                    "<th>" + "Nama Barang" + "</th>" +
                    "<th>" + "Tanggal" + "</th>" +
                    "<th>" + "Stok Masuk" + "</th>" +
                    "</tr>";
                $('thead#head').html(row);
            } else if (type == 'lkeluar') {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url('laporan/caridata'); ?>",
                    data: {
                        typelaporan: type,
                        tglawal: awal,
                        tglakhir: akhir
                    },
                    dataType: 'json',
                    cache: false,
                    success: function(data) {
                        var baris = '';
                        var j = 1;
                        for (let i = 0; i < data.length; i++) {
                            baris += "<tr>" +
                                "<td>" + j++ + "</td>" +
                                "<td>" + data[i].id_barang + "</td>" +
                                "<td>" + data[i].nama + "</td>" +
                                "<td>" + data[i].tgl + "</td>" +
                                "<td>" + data[i].stok_out + "</td>" +
                                "</tr>";
                        }
                        $('h4#juduldata').text('Data Barang Keluar');
                        $('tbody.daftarstok').html(baris);

                    }
                });
                var row = "<tr>" +
                    "<th>" + "No" + "</th>" +
                    "<th>" + "Kode Barang" + "</th>" +
                    "<th>" + "Nama Barang" + "</th>" +
                    "<th>" + "Tanggal" + "</th>" +
                    "<th>" + "Stok Keluar" + "</th>" +
                    "</tr>";
                $('thead#head').html(row);
            }
        });
        $('#inputlaporan').change(function() {
            var inputselect = $(this).val();
            if (inputselect != '#' && inputselect != 'lstok') {
                $('.tgl').fadeIn();
            } else {
                $('.tgl').fadeOut();
            }
        });
    });
</script>

</body>


</html>
<!-- End Template -->