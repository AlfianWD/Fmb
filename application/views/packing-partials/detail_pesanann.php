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
                                    <th>ID Pesan</th>
                                    <?php
                                        if(isset($_SESSION['not_found'])) :
                                    ?>
                                        <td>
                                            <div class="alert alert-danger alert-dismissible fade" role="alert">
                                                Data Not Found!
                                            </div>
                                        </td>
                                    <?php
                                    session_destroy();
                                    ?>
                                    <?php
                                       elseif(!isset($_SESSION['not_found'])) :
                                         foreach ($pesanan as $data) {
                                    ?>
                                    <?php
                                       
                                    ?>
                                        <td><?= $data['ID_PESAN']; ?></td>
                                        <td> <a href="<?php echo site_url('packing/detail_pesanan/' . $data['ID_PESAN']) ?>"
                                            type="button" class="btn btn-sm btn-success">Tampilkan Data</a>
                                        </td>
                                    <?php } ?>
                                    <?php
                                        endif;
                                    ?>
                                </table>
                                </br>
                                <div class="col-auto my-2">
                                    <a href="<?php echo base_url('packing/dashboard'); ?>" type="submit" class="btn btn-md btn-primary">Kembali</a>
                                </div>
                            </div>
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
                                    document.getElementById("key").value=e;
                                });
                            </script>
                        <div>
                            </br>
                            <div class="col-12">
                            <div class="col-12">
                                <div class="col-12">
                                <form action="<?= base_url('packing/detail_pesanann')?>" method="POST">
                                    <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Search Keyword"
                                    name="id" id="key" autocomplete="off" autofocus>
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