          <!-- Begin Page Content -->
         <div class="container-fluid">

             <!-- Table pesanan -->
             <div class="card shadow mb-4">
                 <div class="card-header py-3">
                     <h5 class="m-0 font-weight-bolt text-primary float-left">Data Pesanan</h5>
                     <a class="btn btn-primary btn-sm float-right" href="<?= base_url(); ?>admin/tambah_pesanan">Tambah Pesanan</a>
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
                    endif;
                ?>
                <?php 
                    // if(isset($_POST['filter'])) {
                    //     $tgl_awal = strip_tags($_POST['tgl_awal']);
                    //     $tgl_akhir = strip_tags($_POST['tgl_akhir']);

                    //     $query =mysql_query($db,"SELECT TGL_PESAN FROM detail_pesanan BETWEEN 'tgl_awal' AND 'tgl_akhir' ORDER BY ID_PESAN");
                    //     var_dump($data_akhir);
                    // }
                ?>

                    <div class="row">
                        <div class="col-md-3">
                            <form action="<?= base_url('pesanan')?>">
                                <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Search Keyword" name="keyword">
                                <div class="input-group-append">
                                    <input class="btn btn-primary" type="submit" name="submit" autocomplete="off">
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Button Modal -->
                    <!-- <div class="col-auto py-3">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalFilter">
                            <i class="fas fa-search"> Filter Data </i>
                        </button>
                    </div> -->
                     <div class="table-responsive">
                         <table class="table text-center" width="100%" cellspacing="0">
                             <thead>
                                <tr>
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
                                 <th>Action</th>
                                </tr>
                             </thead>
                             <tbody>
                                <?php
                                    $no = 1;
                                    foreach ($data_pesan as $data) {
                                ?>
                               
                                <tr>
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
                                 <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus<?php echo $data->ID_PESAN ?>">
                                        Hapus
                                    </button>

                                    <!-- Modal filter -->
                                    <!-- <div class="modal" id="modalFilter" tabindex="-1" aria-labelledby="exampleModalLabel">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"> <i class="fas fa-search"> Filter Data </i> </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="post">
                                                <div class="form-group">
                                                    <label for="tgl_awal">Tanggal Awal</label>
                                                    <input type="date" id="tgl_awal" name="tgl_awal" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="tgl_akhir">Tanggal Akhir</label>
                                                    <input type="date" id="tgl_akhir" name="tgl_akhir" class="form-control">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-success btn-sm" name="filter">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                    </div> -->

                                    <!-- Modal Hapus-->
                                    <div class="modal fade" id="hapus<?php echo $data->ID_PESAN ?>" tabindex="-1" aria-labelledby="hapus<?php echo $data->ID_PESAN ?>Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="hapus<?php echo $data->ID_PESAN ?>Label">Peringatan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda Yakin Ingin Menghapus Data Dari <?php echo $data->ID_PESAN ?> Ini ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">tidak</button>
                                            <a href="<?php echo base_url("admin/hapus_pesanan/"). $data->ID_PESAN ?>" 
                                               class="btn btn-danger">Hapus</a>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                 </td>
                                </tr>
                             </tbody>
                             <?php } ?>
                         </table>
                     </div>
                 </div>
             </div>
             <!-- /.container-fluid -->

         </div>
         <!-- End of Main Content -->