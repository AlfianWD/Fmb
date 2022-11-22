         <!-- Begin Page Content -->
         <div class="container-fluid">
             <div class="card shadow mb-4">
                 <div class="card-header py-4">
                     <h5 class="m-0 font-weight-bolt text-primary float-left">Warna Produk</h5>
                     <a class="btn btn-primary btn-sm float-right"  href="<?= base_url(); ?>admin/tambah_warna">Tambah Warna</a>
                 </div>
                 <div class="card-body">
                    <?php
                        if(isset($_SESSION['simpan'])) :
                    ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Data berhasil ditambahkan
                        </div>
                    <?php
                        session_destroy();
                        endif;
                    ?>
                     <div class="table-responsive">
                         <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                             <thead class="table-light">
                                 <th>No</th>
                                 <th>ID Warna</th>
                                 <th>Warna</th>
                                 <th>Action</th>
                             </thead>
                             <?php
                                $no = 1;
                                foreach ($warna as $data) {
                                ?>
                             <tbody>
                                 <td><?php echo $no++ ?></td>
                                 <td><?php echo $data->ID_WARNA; ?></td>
                                 <td><?php echo $data->WARNA; ?></td>
                                 <td>
                                     <a href="<?php echo base_url(); ?>purchasing/edit/"
                                         class="btn btn-success">Edit</a>
                                     <a href="<?php echo base_url(); ?>purchasing/delete/"
                                         class="btn btn-danger">Hapus</a>
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