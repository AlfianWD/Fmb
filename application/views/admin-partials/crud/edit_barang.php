<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Table pesanan -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bolt text-primary float-left">Input Data Barang</h5>
    </div>
    <div class="card-body">
    <form action="<?php echo base_url('admin/simpan_barang'); ?>" method="post">
        <div class="form-group row">
            <label for="ID_BARANG" class="col-sm-2 col-form-label">ID Produk</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="ID_BARANG" name="ID_BARANG" placeholder="ID">
            </div>
        </div>
        
        <div class="form-group row">
            <label for="NM_Barang" class="col-sm-2 col-form-label">Nama Barang</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="NM_BARANG" name="NM_BARANG" placeholder="Nama Barang">
            </div>
        </div>

        <div class="col-auto my-1">
            <input type="submit" class="btn btn-primary" value="Submit">
            <a class="btn btn-danger" href="<?= base_url(); ?>admin/produk">exit</a>
        </div>
    </form>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->