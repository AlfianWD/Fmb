         <!-- Begin Page Content -->
         <div class="container-fluid">
             <div class="card shadow mb-4">
                 <div class="card-header py-4">
                     <h5 class="m-0 font-weight-bolt text-primary float-left">Varian Produk</h5>
                     <a class="btn btn-primary btn-sm float-right" href="<?= base_url(); ?>admin/tambah_varian">Tambah Varian</a>
                 </div>
                 <div class="card-body">
                    <?php
                        if(isset($_SESSION['eksekusi'])):
                    ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Data Berhasil Tersimpan!
                        </div>
                    <?php
                     session_destroy();
                    ?>
                    <?php                        
                        elseif(isset($_SESSION['delete'])):
                    ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Data Berhasil dihapus!
                        </div>
                    <?php
                        session_destroy();
                        endif;
                    ?>
                     <div class="table-responsive">
                         <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                             <thead class="table-light">
                                 <th>No</th>
                                 <th>ID Varian</th>
                                 <th>Varian</th>
                                 <th>Action</th>
                             </thead>
                             <?php
                                $no = 1;
                                foreach ($varian as $data) {
                                ?>
                             <tbody>
                                 <td><?php echo $no++ ?></td>
                                 <td><?php echo $data->ID_VARIAN; ?></td>
                                 <td><?php echo $data->VARIAN; ?></td>
                                 <td>
                                     <a href="<?php echo base_url(); ?>purchasing/edit/"
                                         class="btn btn-success">Edit</a>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus<?php echo $data->ID_VARIAN ?>">
                                        Hapus
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="hapus<?php echo $data->ID_VARIAN ?>" tabindex="-1" aria-labelledby="hapus<?php echo $data->ID_VARIAN ?>Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="hapus<?php echo $data->ID_VARIAN ?>Label">Peringatan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda Yakin Ingin Menghapus Data Dari <?php echo $data->ID_VARIAN ?> Ini ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">tidak</button>
                                            <a href="<?php echo base_url("admin/hapus_varian/"). $data->ID_VARIAN ?>" 
                                               class="btn btn-danger">Hapus</a>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
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