<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Table pesanan -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bolt text-primary float-left">Input Data User</h5>
    </div>
    <div class="card-body">
    <?php foreach ($user as $data) { ?>
    <form action="<?php echo base_url('admin/update_user'); ?>" method="post">
        <div class="form-group row">
            <label for="USERNAME" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="USERNAME" name="USERNAME" placeholder="Username"
                value="<?php echo $data->USERNAME?>">
            </div>
        </div>
        
        <div class="form-group row">
            <label for="PASSWORD" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="PASSWORD" name="PASSWORD" placeholder="Password"
                value="<?php echo $data->PASSWORD?>">
            </div>
        </div>
        <?php } ?>
        <div class="form-group row">
            <label for="NM_USER" class="col-sm-2 col-form-label">Nama User</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="NM_USER" name="NM_USER" placeholder="Nama User"
                value="<?php echo $data->NM_USER?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="AKSES" class="col-sm-2 col-form-label">Akses</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="AKSES" name="AKSES" placeholder="Akses"
                value="<?php echo $data->AKSES?>">
            </div>
        </div>

        <div class="col-auto my-1">
            <input type="submit" class="btn btn-primary" value="Submit">
            <a class="btn btn-danger" href="<?= base_url(); ?>admin/kelola_user">exit</a>
        </div>
    </form>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->