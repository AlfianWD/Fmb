<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Table pesanan -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bolt text-primary float-left">Input Data Warna</h5>
    </div>
    <div class="card-body">
    <?php foreach ($warna as $data) { ?>
    <form action="<?php echo base_url('admin/update_warna'); ?>" method="post">
        <div class="form-group row">
            <label for="ID_WARNA" class="col-sm-2 col-form-label">ID Warna</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="ID_WARNA" name="ID_WARNA" readonly placeholder="ID"
                value="<?php echo $data->ID_WARNA?>">
            </div>
        </div>
        
        <div class="form-group row">
            <label for="WARNA" class="col-sm-2 col-form-label">Warna</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="WARNA" name="WARNA" placeholder="Warna"
                value="<?php echo $data->WARNA?>">
            </div>
        </div>
        <?php } ?>
        <div class="col-auto my-1">
            <input type="submit" class="btn btn-primary" value="Submit">
            <a class="btn btn-danger" href="<?= base_url(); ?>admin/warna">exit</a>
        </div>
    </form>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->