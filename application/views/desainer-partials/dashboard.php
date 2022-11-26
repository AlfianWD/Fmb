        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard Desainer</h1>
            </div>

            <!-- Table pesanan -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="font-weight-bolt text-primary float-left">Desain Pesanan</h6>
                    <!-- <a href="" class="btn btn-primary btn-sm float-right">Scan</a> -->
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="dataTable">
                            <thead class="table-light">
                                <th>No</th>
                                <th>ID Pesan</th>
                                <th>Barang</th>
                                <th>Warna</th>
                                <th>Varian</th>
                                <th>Custom Nama</th>
                                <th>Quote</th>
                                <th>Action</th>
                            </thead>
                            <?php
                            $no = 1;
                            foreach ($data_dash as $data) {
                            ?>
                            <tbody class="table-light table-bordered text-center">
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $data->ID_PESAN; ?></td>
                                <td><?php echo $data->NM_BARANG; ?></td>
                                <td><?php echo $data->WARNA; ?></td>
                                <td><?php echo $data->VARIAN; ?></td>
                                <td><?php echo $data->CUSTOM_NM; ?></td>
                                <td><?php echo $data->QUOTE; ?></td>
                                <td>
                                    <a href="<?php echo site_url('desainer/add_design/') ?>" type="button"
                                        class="btn btn-sm btn-success">Desain</a>
                                </td>
                            </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->


        </div>
        <!-- End of Main Content -->