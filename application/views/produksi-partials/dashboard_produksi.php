        <!-- Begin Page Content -->
         <div class="container-fluid">

             <!-- Page Heading -->
             <div class="d-sm-flex align-items-center justify-content-between mb-4">
                 <h1 class="h3 mb-0 text-gray-800">Dashboard Produksi</h1>
             </div>

             <!-- Table pesanan -->
             <div class="card shadow mb-4">
                 <div class="card-header py-3">
                     <h6 class="font-weight-bolt text-primary float-left">Data Pesanan</h6>
                     <a href="" class="btn btn-primary btn-sm float-right">Scan</a>
                 </div>
                 <div class="card-body">
                     <div class="table-responsive">
                         <table class="table table-bordered text-center" id="dataTable">
                             <thead class="table-light">
                                 <th>No</th>
                                 <th>ID Pesan</th>
                                 <th>Username</th>
                                 <th>Barang</th>
                                 <th>Total</th>
                                 <th>Status Cetak</th>
                                 <th>Status Produksi</th>
                                 <th>Status Packing</th>
                             </thead>
                             <?php
                                $no = 1;
                                foreach ($data_dash as $data) {
                                ?>
                             <tbody class="table-light table-bordered text-center">
                                 <td><?php echo $no++ ?></td>
                                 <td><?php echo $data->ID_PESAN; ?></td>
                                 <td><?php echo $data->USERNAME; ?></td>
                                 <td><?php echo $data->NM_BARANG; ?></td>
                                 <td><?php echo $data->TOTAL_BAYAR; ?></td>
                                 <td><?php echo $data->ADMIN_STATUS; ?></td>
                                 <td><?php echo $data->PRODUKSI_STATUS; ?></td>
                                 <td><?php echo $data->PACKING_STATUS; ?></td>
                             </tbody>
                             <?php } ?>
                         </table>
                     </div>
                 </div>
             </div>
             <!-- /.container-fluid -->


         </div>
         <!-- End of Main Content -->