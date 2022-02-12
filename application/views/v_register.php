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
                <div class="card o-hidden border-0 shadow-lg my-5" id="registercard">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Create Account!</h1>
                                    </div>
                                    <?php if ($this->session->flashdata('error')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <?php echo $this->session->flashdata('error'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <form class="userregister" method="post" action="<?= base_url('auth/register') ?>">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" id="emailreg" aria-describedby="emailHelp" placeholder="Enter Email Address..." value="<?php if (isset($_POST['email'])) {
                                                                                                                                                                                                echo $_POST['email'];
                                                                                                                                                                                            } ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="username" value="<?php if (isset($_POST['username'])) {
                                                                                                                echo $_POST['username'];
                                                                                                            } ?>" placeholder="Username" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="pass" id="passreg" placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="passconfirm" id="passconfirmreg" placeholder="Confirm Password" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Register
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('auth'); ?>">Login Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
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