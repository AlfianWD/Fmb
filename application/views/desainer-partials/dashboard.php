        <!-- Begin Page Content -->
         <div class="container-fluid">

             <!-- Page Heading -->
             <div class="d-sm-flex align-items-center justify-content-between mb-4">
                 <h1 class="h3 mb-0 text-gray-800">Dashboard Desainer</h1>
             </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total design belom dicetak</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $desain_not_ready; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Total Design dicetak</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $desain_status ?></div>
                                </div>
                                <div class="col-auto">
                                    <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                        

             <!-- Table pesanan -->
             <div class="card shadow mb-4">
                 <div class="card-header py-3">
                     <h6 class="m-0 font-weight-bolt text-primary float-left">Data Pesanan</h6>
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
                                 <th>Status Desain</th>
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
                                 <td><?php echo $data->DESAIN_STATUS; ?></td>
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