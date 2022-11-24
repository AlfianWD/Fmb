         <!-- Begin Page Content -->
         <div class="container-fluid">
             <div class="card shadow mb-4">
                 <div class="card-header py-4">
                     <h5 class="m-0 font-weight-bolt text-primary float-left">Data User</h5>
                     <a class="btn btn-primary btn-sm float-right" href="<?= base_url(); ?>admin/tambah_user">Tambah User</a>
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
                        elseif(isset($_SESSION['delete'])) :
                    ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Data Berhasil Dihapus!
                        </div>
                    <?php
                     session_destroy();
                    ?>
                    <?php                        
                        elseif(isset($_SESSION['diubah'])):
                    ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Perubahan Data Berhasil Tersimpan!
                        </div>
                    <?php
                        session_destroy();
                        endif;
                    ?>
                     <div class="table-responsive">
                         <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                             <thead class="table-light">
                                 <th>No</th>
                                 <th>Nama</th>
                                 <th>Username</th>
                                 <th>Password</th>
                                 <th>Akses</th>
                                 <th>Action</th>
                             </thead>
                             <?php
                                $no = 1;
                                foreach ($user as $data) {
                                ?>
                             <tbody>
                                 <td><?php echo $no++ ?></td>
                                 <td><?php echo $data->NM_USER; ?></td>
                                 <td><?php echo $data->USERNAME; ?></td>
                                 <td><?php echo $data->PASSWORD; ?></td>
                                 <td><?php echo $data->AKSES; ?></td>
                                 <td>
                                    
                                    <a href="<?php echo base_url("admin/edit_user/"). $data->USERNAME ?>"
                                         class="btn btn-success">Edit</a>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus<?php echo $data->USERNAME ?>">
                                        Hapus
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="hapus<?php echo $data->USERNAME ?>" tabindex="-1" aria-labelledby="hapus<?php echo $data->USERNAME ?>Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="hapus<?php echo $data->USERNAME ?>Label">Peringatan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda Yakin Ingin Menghapus Data Dari <?php echo $data->USERNAME ?> Ini ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">tidak</button>
                                            <a href="<?php echo base_url("admin/hapus_user/"). $data->USERNAME ?>" 
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