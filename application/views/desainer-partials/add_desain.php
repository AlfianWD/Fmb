        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Upload Desain</h1>
            </div>

            <!-- List detail untuk desain -->
            <div class="row">
                <div class="col">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="text-primary text-center">Detail Pesanan</h5>
                        </div>
                        <div class="card-body">
                            <?php foreach ($pesanan as $data) { ?>
                            <form action="<?php echo base_url('desainer/simpan_desain'); ?>"
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
                                    <label for="kodePesanan" class="col-md-3 col-form-label">Pilih Gambar :</label>
                                    <div class="col-md-8">
                                        <input type="file" name="DESAIN" value="<?php echo $data->DESAIN ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-3">Checkbox :</div>
                                    <div class="col-md-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="DESAIN_STATUS">
                                        <label class="form-check-label" for="DESAIN_STATUS" >
                                        Apakah Sudah Selesai?
                                        </label>
                                    </div>
                                    </div>
                                </div>

                                <div class="col-auto my-2">
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                    <a href="<?php echo base_url('desainer/desain'); ?>" type="submit" class="btn btn-md btn-success">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="text-primary text-center">QR Code</h5>
                        </div>
                        <div class="card-body">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" alt="Card image cap"
                                    src="<?php echo base_url(); ?><?php echo $data->QR_CODE; ?>">
                            </div>
                            <div class="col-auto my-2">
                                <a href="" type="button" class="btn btn-sm btn-success">Copy</a>
                            </div>
                            <?php } ?>
                            </br>

                        </div>
                        <div class="card-footer text-muted">
                        </div>
                    </div>


                </div>
            </div>
        </div>