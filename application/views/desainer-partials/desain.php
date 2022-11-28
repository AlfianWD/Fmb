        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Table pesanan -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="font-weight-bolt text-primary float-left">Desain Pesanan</h5>
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
                                <th>QR_CODE</th>
                                <th>DESAIN</th>
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
                                <td><img src= "<?php echo base_url('/uploads/qr/QR-' . $data->ID_PESAN.'.png')?>" width='100'></td>
                                <td><img src="<?php echo base_url() . '/uploads/desain/' . $data->DESAIN; ?>" width='165';></td>
                                <td>
                                    <a href="<?php echo site_url('desainer/edit_design/' . $data->ID_PESAN) ?>"
                                        type="button" class="btn btn-sm btn-success">Desain</a>
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