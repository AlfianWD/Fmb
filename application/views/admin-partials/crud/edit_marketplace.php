<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Table pesanan -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bolt text-primary float-left">Input Data Marketplace</h5>
    </div>
    <div class="card-body">
    <?php foreach ($marketplace as $data) { ?>
    <form action="<?php echo base_url('admin/update_marketplace'); ?>" method="post">
        <div class="form-group row">
            <label for="ID_MARKET" class="col-sm-2 col-form-label">ID Market</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="ID_MARKET" name="ID_MARKET" placeholder="ID"
                value="<?php echo $data->ID_MARKET?>">
            </div>
        </div>
        
        <div class="form-group row">
            <label for="NM_MARKET" class="col-sm-2 col-form-label">Nama Market</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="NM_MARKET" name="NM_MARKET" placeholder="Nama Market" 
                value="<?php echo $data->NM_MARKET?>">
            </div>
        </div>
        <?php } ?>
        <div class="form-group row">
            <label for="ADMIN" class="col-sm-2 col-form-label">Biaya admin</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="ADMIN" name="ADMIN" placeholder="Biaya admin"
                value="<?php echo $data->ADMIN?>">
            </div>
        </div>

        <div class="col-auto my-1">
            <input type="submit" class="btn btn-primary" value="Submit">
            <a class="btn btn-danger" href="<?= base_url(); ?>admin/marketplace">exit</a>
        </div>
    </form>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->