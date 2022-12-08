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
                            <?php foreach($pesanan as $data) { ?>
                            <form action="<?php echo base_url('desainer/simpan_desain'); ?>"
                                enctype="multipart/form-data" method="POST">
                                <div class="form-row">
                                    <label for="kodePesanan" class="col-md-3 col-form-label">Kode Pesanan :</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="kodePesanan" name="ID_PESAN" readonly
                                            value="<?php echo $data['ID_PESAN']; ?>">
                                    </div>
                                </div>
                                </br>
                                <div class="form-row">
                                    <label for="kodePesanan" class="col-md-3 col-form-label">Nama Barang :</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="kodePesanan" readonly
                                            value="<?php echo $data['NM_BARANG']; ?>">
                                    </div>
                                </div>
                                </br>
                                <div class="form-row">
                                    <label for="kodePesanan" class="col-md-3 col-form-label">Pilihan Varian :</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="kodePesanan" readonly
                                            value="<?php echo $data['VARIAN']; ?>">
                                    </div>
                                </div>
                                </br>
                                <div class="form-row">
                                    <label for="kodePesanan" class="col-md-3 col-form-label">Pilihan Warna :</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="kodePesanan" readonly
                                            value="<?php echo $data['WARNA']; ?>">
                                    </div>
                                </div>
                                </br>
                                <div class="form-row">
                                    <label for="kodePesanan" class="col-md-3 col-form-label">Custom Nama :</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="kodePesanan" readonly
                                            value="<?php echo $data['CUSTOM_NM'] ?>">
                                    </div>
                                </div>
                                </br>
                                <div class="form-row">
                                    <label for="kodePesanan" class="col-md-3 col-form-label">Custom Quote :</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="kodePesanan" readonly
                                            value="<?php echo $data['QUOTE'] ?>">
                                    </div>
                                </div>
                                </br>
                                <div class="col-auto my-2">
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                    <a href="<?php echo base_url('produksi/dashboard'); ?>" type="submit" class="btn btn-md btn-success">Kembali</a>
                                </div>
                            </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="text-primary text-center">Scan Camera</h5>
                        </div>
                            <video id="preview" width="100%" class="col-auto"></video>
                            <script type="text/javascript">
                                let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
                                    scanner.addListener('scan', function (content) {
                                        console.log(content);
                                    });
                                Instascan.Camera.getCameras().then(function (cameras) {
                                    if (cameras.length < 0) {
                                        scanner.stop(cameras[0]);
                                    } else {
                                        scanner.start(cameras[0]);
                                    }
                                }).catch(function (e) {
                                    console.error(e);
                                });

                                scanner.addListener('scan',function(e){
                                    document.getElementById("id").value=e;
                                });
                            </script>
                        <div>
                            </br>
                            <div class="col-12">
                            <div class="col-12">
                                <div class="col-12">
                                    <form action="<?= base_url('produksi/detail_pesanan')?>" method="post">
                                        <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Search Keyword"
                                        name="keyword" id="id" autocomplete="off" readonly autofocus>
                                        <div class="input-group-append">
                                            <input class="btn btn-primary" type="submit" name="submit">
                                        </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            </div>
                            </br>
                        </div>
                    </div>
                </div>


        </div>
    </div>