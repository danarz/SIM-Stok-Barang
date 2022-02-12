<!-- Template -->
<?php $this->load->view('_partials/templateatas.php'); ?>
<!-- End Template -->

<?php if ($this->session->flashdata('success')) : ?>
    <div class="alert alert-success" role="alert">
        <?php echo $this->session->flashdata('success'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<?php if ($this->session->flashdata('error')) : ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $this->session->flashdata('error'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<div class="card mb-4 shadow p-3 mb-5 bg-white rounded">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        <b>Transaksi Barang Keluar</b>
        <button href="" type="button" class="btn btn-success text-right" data-toggle="modal" data-target="#ModalTambah" style="float: right;">
            <i class="fas fa-plus mr-2"></i>
            <b>Tambah</b>
        </button>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Tgl</th>
                        <th>Jumlah</th>
                        <th>Penerima</th>
                        <th style="width:10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($keluar as $item) :
                    ?>
                        <tr>
                            <td><?php echo $item->id_keluar; ?></td>
                            <td><?php echo $item->nama; ?></td>
                            <td><?php echo $item->tgl; ?></td>
                            <td><?php echo $item->stok_out; ?></td>
                            <td><?php echo $item->penerima; ?></td>
                            <td>
                                <a href="javascript:;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?= $item->id_keluar; ?>" id="btn-edit" data-id="<?php echo $item->id_keluar; ?>" title="Edit">
                                    <i class="edit fas fa-edit"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-sm" data-toggle="modal" onclick="confirm_modal('<?php echo site_url('keluar/hapus/' . $item->id_keluar); ?>','Title');" data-target="#ModalHapus" title="Hapus">
                                    <i class="edit fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <!-- Edit Modal -->
                        <div class="modal fade" id="edit<?= $item->id_keluar; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Ubah Stok Keluar</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="<?php echo base_url('keluar/update'); ?>" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <input type="hidden" name="idkeluar" value="<?= $item->id_keluar; ?>">
                                            <input type="hidden" name="idbarang" value="<?= $item->id_barang; ?>">
                                            <div class="row">
                                                <div class="col-3">
                                                    <p class="mt-1">Tanggal</p>
                                                </div>
                                                <div class="form-group col-9">
                                                    <input class="form-control" name="tgl" type="date" value="<?php $d = strtotime($item->tgl);
                                                                                                                echo date("Y-m-d", $d);  ?>" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-3">
                                                    <p class="mt-1">Nama Barang</p>
                                                </div>
                                                <div class="form-group col-9">
                                                    <input class="form-control" type="text" name="barang" value="<?= $item->nama ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-3">
                                                    <p class="mt-1">Stok Keluar</p>
                                                </div>
                                                <div class="form-group col-9">
                                                    <input class="form-control" name="stokOUT" type="number" value="<?= $item->stok_out; ?>" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-3">
                                                    <p class="mt-1">Penerima</p>
                                                </div>
                                                <div class="form-group col-9">
                                                    <input class="form-control" name="penerima" type="text" value="<?= $item->penerima; ?>" required>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Ubah</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Template -->
<?php $this->load->view('_partials/templatebawah.php'); ?>
<!-- End Template -->
<!-- Tambah Modal -->
<div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog" aria-labelledby="ModalTambahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Stok Keluar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('keluar/simpan'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-3">
                            <p class="mt-1">Tanggal</p>
                        </div>
                        <div class="form-group col-9">
                            <input class="form-control" name="tgl" type="date" value="<?php echo date('Y-m-d'); ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <p class="mt-1">Nama Barang</p>
                        </div>
                        <div class="form-group col-9">
                            <select id="barang" name="barang" class="form-control" required>
                                <option selected value="#">Pilih...</option>
                                <?php
                                foreach ($barang as $row) {
                                ?>
                                    <option value="<?= $row->id_barang; ?>"><?= $row->nama; ?></option>
                                <?php
                                }; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <p class="mt-1">Stok keluar</p>
                        </div>
                        <div class="form-group col-9">
                            <input class="form-control" name="stokOUT" type="number" placeholder="ex: 10" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <p class="mt-1">Penerima</p>
                        </div>
                        <div class="form-group col-9">
                            <input class="form-control" name="penerima" type="text" placeholder="ex: Rizki" required>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Hapus Modal -->
<div class="modal fade" id="ModalHapus" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top:100px;">

            <div class="modal-header">
                <h4 class="modal-title" style="text-align:center;">Are you sure to Delete this <span class="grt"></span> ?</h4>
                <a type="button" class="close m-0 p-0" style="float: left;" data-dismiss="modal" aria-hidden="true">&times;</a>

            </div>
            <div class="modal-body">
                <span>Peringatan!! Penghapusan data akan mempengaruhi jumlah stok</span>
            </div>

            <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                <span id="preloader-delete"></span>
                </br>
                <a class="btn btn-danger" id="delete_link_m_n" href="">Delete</a>
                <button type="button" class="btn btn-info" data-dismiss="modal" id="delete_cancel_link">Cancel</button>
            </div>
        </div>
    </div>
</div>
<script>
    function confirm_modal(delete_url, title) {
        jQuery('#ModalHapus').modal('show', {
            backdrop: 'static',
            keyboard: false
        });
        jQuery("#ModalHapus .grt").text(title);
        document.getElementById('delete_link_m_n').setAttribute("href", delete_url);
        document.getElementById('delete_link_m_n').focus();
    }
    $(document).ready(function() {

    });
</script>