<!DOCTYPE html>
<html lang="en">
<?php
if ($this->session->userdata('status') == 'login') {
    $email = ($this->session->userdata('email'));
} else {
    header("location: auth");
}
?>

<head>
    <!--- Head -->
    <?php $this->load->view("_partials/head.php") ?>
</head>

<body class="sb-nav-fixed">
    <!--- Nav Bar -->
    <?php $this->load->view("_partials/navbar.php") ?>
    <div id="layoutSidenav">
        <!--- Side Bar -->
        <?php $this->load->view("_partials/sidebar.php") ?>
        <div id="layoutSidenav_content">
            <main class="">
                <div class="container-fluid" style="box-sizing:border-box">

                    <!-- Breadcrumbs-->
                    <?php
                    $page = $this->uri->segment(1);
                    if ($page == 'home' || $page == '') {
                    } else {
                        $this->load->view("_partials/breadcrumb.php");
                    }

                    ?>