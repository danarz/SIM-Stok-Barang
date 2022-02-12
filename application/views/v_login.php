<!-- Template -->
<!DOCTYPE html>
<html lang="en">

<head>
    <!--- Head -->
    <?php $this->load->view("_partials/head.php") ?>
</head>

<body class="bg-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-6 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5" id="logincard">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Selamat datang!</h1>
                                        <h1 class="h6 text-gray-400 mb-4">Sistem Informasi Stok Barang</h1>

                                    </div>
                                    <div class="text-center">
                                        <p class="mb-1">Email : admin@admin.com</p>
                                        <p class="mb-4">Pass : admin</p>
                                    </div>
                                    <?php if ($this->session->flashdata('message_login_error')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <?php echo $this->session->flashdata('message_login_error'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($this->session->flashdata('success')) : ?>
                                        <div class="alert alert-success" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <?php echo $this->session->flashdata('success'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <form class="user" method="post" action="<?= base_url('auth') ?>">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." value="<?php if (isset($_POST['email'])) {
                                                                                                                                                                                                        echo $_POST['email'];
                                                                                                                                                                                                    } ?>" required>
                                        </div>
                                        <div class=" form-group">
                                            <input type="password" class="form-control" name="pass" id="exampleInputPassword" placeholder="Password" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('auth/registeruser'); ?>">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card o-hidden border-0 shadow-lg my-5" id="">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <ul>
                            <li>auto logout if forget to log out</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- js -->
    <?php $this->load->view("_partials/js.php") ?>
    <script>
    </script>
</body>

</html>
<!-- End Template -->