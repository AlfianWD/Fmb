         <!-- Begin Page Content -->
         <div class="container-fluid">

             <!-- Table pesanan -->
             <div class="card shadow mb-4">
                 <div class="card-header py-3">
                     <h5 class="m-0 font-weight-bolt text-primary float-left">Data Pesanan</h5>
                     <a class="btn btn-primary btn-sm float-right" href="<?= base_url(); ?>admin/tambah_pesanan">Tambah Pesanan</a>
                 </div>
                 <div class="card-body">
                     <div class="table-responsive">
                         <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                             <thead class="table-light">
                                 <th>No</th>
                                 <th>ID Pesan</th>
                                 <th>Tanggal</th>
                                 <th>Marketplace</th>
                                 <th>Username</th>
                                 <th>Barang</th>
                                 <th>Varian</th>
                                 <th>Warna</th>
                                 <th>Nama</th>
                                 <th>Quote</th>
                             </thead>
                             <?php
                                $no = 1;
                                foreach ($data_pesan as $data) {
                                ?>
                             <tbody class="table-light">
                                 <td><?php echo $no++ ?></td>
                                 <td><?php echo $data->ID_PESAN; ?></td>
                                 <td><?php echo $data->TGL_PESAN; ?></td>
                                 <td><?php echo $data->NM_MARKET; ?></td>
                                 <td><?php echo $data->USERNAME; ?></td>
                                 <td><?php echo $data->NM_BARANG; ?></td>
                                 <td><?php echo $data->VARIAN; ?></td>
                                 <td><?php echo $data->WARNA; ?></td>
                                 <td><?php echo $data->CUSTOM_NM; ?></td>
                                 <td><?php echo $data->QUOTE; ?></td>
                             </tbody>
                             <?php } ?>
                         </table>
                     </div>
                 </div>
             </div>
             <!-- /.container-fluid -->

         </div>
         <!-- End of Main Content -->