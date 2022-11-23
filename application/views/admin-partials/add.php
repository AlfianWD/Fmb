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
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="kodePesan">Kode Pesanan</label>
                                    <input type="text" class="form-control" id="kodePesan" placeholder="" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="markteplace">Marketplace</label>
                                    <select class="custom-select">
                                        <option selected>Pilih Marketplace</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="ekspedisi">Ekspedisi</label>
                                    <input type="text" class="form-control" id="ekspedisi" placeholder="" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" placeholder="" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="ttlHarga">Total Harga</label>
                                    <input type="number" class="form-control" id="ttHarga" placeholder="" required>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="diskon">Diskon</label>
                                    <input type="number" class="form-control" id="diskon" placeholder="" required>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="biayaAdmin">Biaya Admin</label>
                                    <input type="number" class="form-control" id="biayaAdmin">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="jml">Jumlah</label>
                                    <input type="number" class="form-control" id="jml" placeholder="" required>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Nama Produk</label>
                                    <select class="custom-select">
                                        <option selected>Pilih Produk</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Varian</label>
                                    <select class="custom-select">
                                        <option selected>Pilih Varian</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Warna</label>
                                    <select class="custom-select">
                                        <option selected>Pilih Warna</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="namaCust">Custom Nama</label>
                                    <input type="text" class="form-control" id="namaCust" placeholder="">
                                </div>

                                <div class="form-group col-md-5">
                                    <label for="quote">Quote</label>
                                    <input type="text" class="form-control" id="quote" placeholder="">
                                </div>
                                <div class="form-group col-md-1">
                                    <label for="inputJuml">Qty</label>
                                    <input type="text" class="form-control" id="qty" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="note">Catatan</label>
                                    <input type="text" class="form-control" id="note" placeholder="">
                                </div>

                                <div class="form-group col-md-5">
                                    <label for="resi">Upload Resi</label>
                                    <input type="file" class="form-control-file" id="resi" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                                </div>
                                <div class="col-md-1">
                                    <button type="submit" class="btn btn-sm btn-success">Preview</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card mb-3">
                    <div class="card-header">
                        <h6 class="text-primary text-center">QR Code</h6>
                    </div>
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->