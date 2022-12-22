        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Upload Resi</h1>
            </div>

            <!-- List detail untuk desain -->
            <div class="row">
                <div class="col">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="text-primary text-center">Detail Pesanan</h5>
                        </div>
                        <div class="card-body">
                            <?php
                                if(isset($_SESSION['gagal'])):
                            ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    Data gagal Tersimpan, silakan masukan gambar terlebih dahulu!
                                </div>
                            <?php
                                session_destroy();
                                endif;
                            ?>  
                            <?php foreach ($pesanan as $data) { ?>
                            <form action="<?php echo base_url('Packing/simpan_resi'); ?>"
                                enctype="multipart/form-data" method="POST">
                                <div class="form-row">
                                    <label for="kodePesanan" class="col-md-3 col-form-label">Kode Pesanan :</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="kodePesanan" name="ID_PESAN" readonly
                                            value="<?php echo $data->ID_PESAN ?>">
                                    </div>
                                </div>
                                </br>
                                <div class="form-row">
                                    <label for="NM_MARKET" class="col-md-3 col-form-label">Marketplace :</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="NM_MARKET" name="NM_MARKET" readonly
                                            value="<?php echo $data->NM_MARKET ?>">
                                    </div>
                                </div>
                                </br>
                                <div class="form-row">
                                    <label for="kodePesanan" class="col-md-3 col-form-label">Nama Barang :</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="kodePesanan" readonly
                                            value="<?php echo $data->NM_BARANG ?>">
                                    </div>
                                </div>
                                </br>
                                <div class="form-row">
                                    <label for="kodePesanan" class="col-md-3 col-form-label">Pilihan Varian :</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="kodePesanan" readonly
                                            value="<?php echo $data->VARIAN ?>">
                                    </div>
                                </div>
                                </br>
                                <div class="form-row">
                                    <label for="kodePesanan" class="col-md-3 col-form-label">Pilihan Warna :</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="kodePesanan" readonly
                                            value="<?php echo $data->WARNA ?>">
                                    </div>
                                </div>
                                </br>
                                <div class="form-row">
                                    <label for="kodePesanan" class="col-md-3 col-form-label">Custom Nama :</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="kodePesanan" readonly
                                            value="<?php echo $data->CUSTOM_NM ?>">
                                    </div>
                                </div>
                                </br>
                                <div class="form-row">
                                    <label for="kodePesanan" class="col-md-3 col-form-label">Custom Quote :</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="kodePesanan" readonly
                                            value="<?php echo $data->QUOTE ?>">
                                    </div>
                                </div>
                                </br>
                                <div class="form-row">
                                    <label for="kodePesanan" class="col-md-3 col-form-label">Masukkan Resi :</label>
                                    <div class="col-md-8">
                                        <input type="file" name="RESI" value="<?php echo $data->RESI ?>">
                                    </div>
                                </div>
                                <div class="col-auto my-2">
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                    <a href="<?php echo base_url('Packing/pesanan_packing'); ?>" type="submit" class="btn btn-md btn-success">Kembali</a>
                                </div>
                            </form>
                            <?php } ?> 
                        </div>
                    </div>
                </div>
            </div>
        </div>