<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="" />
<meta name="author" content="" />
<title><?php
        if (ucfirst($this->uri->segment(1)) == '') :
            echo SITE_NAME . " - Dashboard";
        elseif (ucfirst($this->uri->segment(1)) != '') :
            echo SITE_NAME . " - " . ucfirst($this->uri->segment(1));
        endif;
        ?>
</title>
<link href="<?php echo base_url(); ?>css/styles.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>css/addstyle.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/ajax.js"></script>