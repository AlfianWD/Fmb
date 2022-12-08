        <!-- Begin Page Content -->
         <div class="container-fluid">

             <!-- Page Heading -->
             <div class="d-sm-flex align-items-center justify-content-between mb-4">
                 <h1 class="h3 mb-0 text-gray-800">Dashboard Packing</h1>
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
                                        Total yang belom dipacking</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $packing_not_ready; ?></div>
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
                                        Total yang sudah dipacking</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $packing_status; ?></div>
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
                     <h6 class="font-weight-bolt text-primary float-left">Data Pesanan</h6>
                     <a href="" class="btn btn-primary btn-sm float-right">Scan</a>
                 </div>
                 <div class="card-body">
                     <div class="table-responsive">
                         <table id="DataTables" class="table table-striped table-bordered ">
                             <thead>
                                <tr>
                                 <th>No</th>
                                 <th>ID Pesan</th>
                                 <th>Username</th>
                                 <th>Barang</th>
                                 <th>Total</th>
                                 <th>Status Cetak</th>
                                 <th>Status Produksi</th>
                                 <th>Status Packing</th>
                                </tr>
                             </thead>
                             <?php
                                $no = 1;
                                foreach ($data_dash as $data)
                                {
                                    echo "<tr>
                                    <td>".$no++."</td>
                                    <td>".$row[] = $data->ID_PESAN."</td>
                                    <td>".$row[] = $data->USERNAME."</td>
                                    <td>".$row[] = $data->NM_BARANG."</td>
                                    <td>".$row[] = 'Rp.'. number_format($data->TOTAL_BAYAR, 0, ",", ".")."</td>
                                    <td>".$row[] = $data->DESAIN_STATUS."</td>
                                    <td>".$row[] = $data->PRODUKSI_STATUS."</td>
                                    <td>".$row[] = $data->PACKING_STATUS."</td>
                                    </tr>";
                                }

                                ?>
                         </table>
                     </div>
                 </div>
             </div>
             <!-- /.container-fluid -->


         </div>
         <!-- End of Main Content -->