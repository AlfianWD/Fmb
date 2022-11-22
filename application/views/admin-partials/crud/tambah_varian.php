<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Table pesanan -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bolt text-primary float-left">Input Data Varian</h5>
    </div>
    <div class="card-body">
    <form action="<?php echo base_url('admin/simpan_varian'); ?>" method="post">
        <div class="form-group row">
            <label for="ID_VARIAN" class="col-sm-2 col-form-label">ID Varian</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="ID_VARIAN" name="ID_VARIAN" placeholder="ID">
            </div>
        </div>
        
        <div class="form-group row">
            <label for="VARIAN" class="col-sm-2 col-form-label">Varian</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="VARIAN" name="VARIAN" placeholder="Varian">
            </div>
        </div>

        <div class="col-auto my-1">
            <input type="submit" class="btn btn-primary" value="Submit">
            <a class="btn btn-danger" href="<?= base_url(); ?>admin/Varian">exit</a>
        </div>
    </form>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->