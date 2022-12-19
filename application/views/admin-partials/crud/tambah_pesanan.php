<div id="content-wrapper">

    <div class="container-fluid">

        <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="col">
                <div class="card mb-3">
                    <div class="card-header">
                        <a href="<?php echo site_url('admin/pesanan/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_SESSION['gagal'])) :
                        ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Data gagal Tersimpan, silakan masukan file resi terlebih!
                        </div>
                        <?php
                            session_destroy();
                        endif;
                        ?>
                        <form action="<?php echo base_url('admin/simpan_pesanan'); ?>" enctype="multipart/form-data"
                            method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="inputEmail4">Kode Pesanan</label>
                                    <input type="text" class="form-control" name="ID_PESAN" id="ID_PESAN"
                                        autocomplete="off" placeholder="" required="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Marketplace</label>
                                    <select class="custom-select" name="MARKETPLACE">
                                        <option selected>Pilih Marketplace</option>
                                        <?php foreach ($market as $marketplace) { ?>
                                        <option value="<?php echo $marketplace->ID_MARKET; ?>">
                                            <?php echo $marketplace->NM_MARKET; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="inputAddress2">Ekspedisi</label>
                                    <input type="text" class="form-control" name="PENGIRIMAN" id="PENGIRIMAN"
                                        autocomplete="off" placeholder="">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" name="USERNAME" id="USERNAME" placeholder=""
                                        autocomplete="off" required="">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="totalHarga">Total Harga</label>
                                    <input type="number" class="form-control" name="TOTAL" id="TOTAL" autocomplete="off"
                                        placeholder="">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="diskon">Diskon</label>
                                    <input type="number" class="form-control" name="DISKON" id="DISKON"
                                        autocomplete="off" placeholder="">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="inputAddress2">Biaya Admin</label>
                                    <input type="number" class="form-control" name="ADMIN" id="ADMIN" autocomplete="off"
                                        placeholder="">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="inputAddress2">Jumlah</label>
                                    <input type="number" class="form-control" name="JUMLAH_PESAN" autocomplete="off"
                                        id="JUMLAH_PESAN" placeholder="">
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Nama Produk</label>
                                    <select class="custom-select" name="BARANG">
                                        <option selected>Pilih Produk</option>
                                        <?php foreach ($barang as $produk) { ?>
                                        <option value="<?php echo $produk->ID_BARANG; ?>">
                                            <?php echo $produk->NM_BARANG; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Varian</label>
                                    <select class="custom-select" name="VARIAN">
                                        <option selected>Pilih Varian</option>
                                        <?php foreach ($varian as $varian) { ?>
                                        <option value="<?php echo $varian->ID_VARIAN; ?>">
                                            <?php echo $varian->VARIAN; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Warna</label>
                                    <select class="custom-select" name="WARNA">
                                        <option selected>Pilih Warna</option>
                                        <?php foreach ($warna as $warna) { ?>
                                        <option value="<?php echo $warna->ID_WARNA; ?>">
                                            <?php echo $warna->WARNA; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="inputAddress2">Custom Nama</label>
                                    <input type="text" class="form-control" name="CUSTOM_NAMA" id="CUSTOM_NAMA"
                                        autocomplete="off" placeholder="">
                                </div>

                                <div class="form-group col-md-5">
                                    <label for="inputAddress2">Quote</label>
                                    <input type="text" class="form-control" name="QUOTE" id="QUOTE" autocomplete="off"
                                        placeholder="">
                                </div>
                                <div class="form-group col-md-1">
                                    <label for="inputJuml">Qty</label>
                                    <input type="text" class="form-control" name="QTY" id="QTY" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="inputAddress2">Catatan</label>
                                    <input type="text" class="form-control" name="NOTE" id="NOTE" autocomplete="off"
                                        placeholder="">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlFile1">Upload Resi</label>
                                    <input type="file" name="RESI">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-auto my-1">
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                    <a class="btn btn-danger" href="<?= base_url(); ?>admin/pesanan">exit</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->