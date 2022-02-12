<!-- Template -->
<?php $this->load->view('_partials/templateatas.php'); ?>
<!-- End Template -->

<?php if ($this->session->flashdata('success')) : ?>
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?php echo $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>
<?php if ($this->session->flashdata('error')) : ?>
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>
<div class="card mb-4 shadow p-3 mb-5 bg-white rounded">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        <b>Data User</b>
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
                        <th>Kode User</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th style="width:10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // echo "<pre>";
                    // print_r($user);
                    // echo "</pre>";
                    // var_dump($user);
                    // die();
                    foreach ($user as $row) :
                    ?>
                        <tr>
                            <td><?php echo $row->id_user; ?></td>
                            <td><?php echo $row->email; ?></td>
                            <td><?php echo $row->nama; ?></td>
                            <td><?php echo $row->role_name; ?></td>
                            <td>
                                <a href="javascript:;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?= $row->id_user; ?>" id="btn-edit" data-id="<?php echo $row->id_user; ?>" data-email="<?php echo $row->email; ?>" data-pass="<?php echo $row->pass; ?>">
                                    <i class="edit fas fa-edit"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-sm" data-toggle="modal" onclick="confirm_modal('<?php echo site_url('user/hapus/' . $row->id_user); ?>','Title');" data-target="#ModalHapus">
                                    <i class="edit fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <!-- Edit Modal -->
                        <div class="modal fade" id="edit<?= $row->id_user; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Ubah Akun User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="<?php echo base_url('user/update'); ?>" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <input type="hidden" class="iduser" name="id" value="<?= $row->id_user; ?>">
                                            <div class="row">
                                                <div class="col-3">
                                                    <p class="mt-1">Email</p>
                                                </div>
                                                <div class="form-group col-9">
                                                    <input class="form-control email" name="email" type="text" value="<?= $row->email; ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-3">
                                                    <p class="mt-1">Username</p>
                                                </div>
                                                <div class="form-group col-9">
                                                    <input class="form-control" name="username" type="text" value="<?= $row->nama; ?>" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-3">
                                                    <p class="mt-1">Password</p>
                                                </div>
                                                <div class="form-group col-9">
                                                    <input class="form-control pass" name="pass" type="password" value="<?= $row->pass; ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-3">
                                                    <p class="mt-1">Role</p>
                                                </div>
                                                <div class="form-group col-9">
                                                    <select name="role" id="role" class="form-control" required>
                                                        <option value="<?= $row->id_role; ?>" selected><?= $row->role_name; ?></option>
                                                        <?php foreach ($role as $row) : ?>
                                                            <option value="<?= $row->id_role ?>"><?= $row->role_name ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
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
                <h5 class="modal-title">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('user/simpan'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-3">
                            <p class="mt-1">Email User</p>
                        </div>
                        <div class="form-group col-9">
                            <input class="form-control" name="email" type="email" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <p class="mt-1">Username</p>
                        </div>
                        <div class="form-group col-9">
                            <input class="form-control" name="username" type="text" placeholder="Username" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <p class="mt-1">Password</p>
                        </div>
                        <div class="form-group col-9">
                            <input class="form-control" name="pass" type="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <p class="mt-1">Role</p>
                        </div>
                        <div class="form-group col-9">
                            <select name="role" id="role" class="form-control" required>
                                <option value="#">Pilih...</option>
                                <?php foreach ($role as $row) : ?>
                                    <option value="<?= $row->id_role ?>"><?= $row->role_name ?></option>
                                <?php endforeach; ?>
                            </select>
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