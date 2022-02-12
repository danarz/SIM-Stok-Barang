<!-- Breadcrumbs-->
<!-- <h1 class="mt-4">
    <?php //echo $this->uri->segment(1) == '' ? 'Dasboard' : ucfirst($this->uri->segment(1)) 
    ?>
</h1> -->
<div class="mt-4">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">
            <?php
            if ($this->uri->segment(1) == '') {
                echo 'Dasboard';
            } else if ($this->uri->segment(1) == 'stokbarang') {
                echo 'Stok Barang';
            } else {
                echo ucfirst($this->uri->segment(1));
            }
            ?>
        </li>
    </ol>
</div>