        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Data Pesanan</h1>
            </div>

            <!-- List detail untuk desain -->
            <div class="row">
                <div class="col">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="text-primary text-center">Detail Pesanan</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table text-center" width="100%" cellspacing="0">
                                    <?php
                                    foreach ($pesanan as $data) {
                                    ?>
                                    <form action="<?php echo base_url('produksi/qc'); ?>" method="post">
                                        <div class="form-row">
                                            <label for="kodePesanan" class="col-lg-3 col-form-label">Catatan :
                                            </label>
                                            <div class="col-lg-8">
                                            </div>
                                        </div>
                                        <b-form-textarea style="width:525px; height:100px" size="20"
                                            class="form-control form-control-lg text-danger text-bolt" id="Note"
                                            readonly>
                                            <?php echo $data->NOTE; ?></b-form-textarea>
                                        </br>
                                        <div class="form-row">
                                            <label for="kodePesanan" class="col-md-3 col-form-label">Kode Pesanan
                                                :</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" id="kodePesanan" name="ID_PESAN"
                                                    readonly value="<?php echo $data->ID_PESAN; ?>">
                                            </div>
                                        </div>
                                        </br>
                                        <div class="form-row">
                                            <label for="kodePesanan" class="col-md-3 col-form-label">Username :</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" id="kodePesanan" name="Username"
                                                    readonly value="<?php echo $data->USERNAME; ?>">
                                            </div>
                                        </div>
                                        </br>
                                        <div class="form-row">
                                            <label for="kodePesanan" class="col-md-3 col-form-label">Marketplace
                                                :</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" id="kodePesanan"
                                                    name="NM_Market" readonly value="<?php echo $data->NM_MARKET; ?>">
                                            </div>
                                        </div>
                                        </br>
                                        <div class="form-row">
                                            <label for="kodePesanan" class="col-md-3 col-form-label">Nama Barang
                                                :</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" id="kodePesanan" readonly
                                                    value="<?php echo $data->NM_BARANG; ?>">
                                            </div>
                                        </div>
                                        </br>
                                        <div class="form-row">
                                            <label for="kodePesanan" class="col-md-3 col-form-label">Pilihan Varian
                                                :</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" id="kodePesanan" readonly
                                                    value="<?php echo $data->VARIAN; ?>">
                                            </div>
                                        </div>
                                        </br>
                                        <div class="form-row">
                                            <label for="kodePesanan" class="col-md-3 col-form-label">Pilihan Warna
                                                :</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" id="kodePesanan" readonly
                                                    value="<?php echo $data->WARNA; ?>">
                                            </div>
                                        </div>
                                        </br>
                                        <div class="form-row">
                                            <label for="kodePesanan" class="col-md-3 col-form-label">Custom Nama
                                                :</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" id="kodePesanan" readonly
                                                    value="<?php echo $data->CUSTOM_NM; ?>">
                                            </div>
                                        </div>
                                        </br>
                                        <div class="form-row">
                                            <label for="kodePesanan" class="col-md-3 col-form-label">Custom Quote
                                                :</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" id="kodePesanan" readonly
                                                    value="<?php echo $data->QUOTE; ?>">
                                            </div>
                                        </div>
                                        </br>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="PRODUKSI_STATUS"
                                                id="PRODUKSI_STATUS">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Apakah Produk Sesuai Telah Dengan Orderan?
                                            </label>
                                        </div>
                                        </br>
                                        <div class="col-auto my-2">
                                            <input type="submit" class="btn btn-primary" value="Next">
                                            <a href="<?php echo base_url('admin/detail_pesanann'); ?>" type="submit"
                                                class="btn btn-md btn-success">Kembali</a>
                                        </div>
                                        </br>
                                        <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="text-primary text-center">DESAIN</h5>
                        </div>
                        <div class="card-body">
                            <img src="<?php echo base_url() . '/uploads/desain/' . $data->DESAIN; ?>" width='100%' ;>
                        </div>
                    </div>
                </div>


            </div>
        </div>