          <!-- Begin Page Content -->
         <div class="container-fluid">

             <!-- Table pesanan -->
             <div class="card shadow mb-4">
                 <div class="card-header py-3">
                     <h5 class="m-0 font-weight-bolt text-primary float-left">Data Pesanan</h5>
                 </div>
                 <div class="card-body">
                <?php
                    if(isset($_SESSION['edit'])):
                ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data Berhasil di edit dan tersimpan!
                    </div>
                <?php
                    session_destroy();
                    endif;
                ?>
                    <div class="row">
                        <div class="col-md-3">
                            <form action="<?= base_url('Packing/pesanan_packing')?>" method="post">
                                <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Search Keyword"
                                name="keyword"  autocomplete="off" autofocus>
                                <div class="input-group-append">
                                    <input class="btn btn-primary" type="submit" name="submit">
                                </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-3" style="float:right;">
                            <a href="<?= base_url('Packing/refresh_pesanan');?>" class="btn btn-success">
                                <i class="fa fa-refresh">refresh</i> 
                            </a> 
                        </div>
                    </div>

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
                                <?php if (empty($pesanan)) : ?>
                                    <tr>
                                        <td colspan="12">
                                            <div class="alert alert-danger" role="alert">
                                                data not found!
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                <?php
                                    foreach ($pesanan as $data) {
                                ?>
                               
                                <tr>
                                 <td><?php echo ++$start ?></td>
                                 <td><?php echo $data['ID_PESAN']; ?></td>
                                 <td><?php echo $data['TGL_PESAN']; ?></td>
                                 <td><?php echo $data['NM_MARKET']; ?></td>
                                 <td><?php echo $data['USERNAME']; ?></td>
                                 <td><?php echo $data['NM_BARANG']; ?></td>
                                 <td><?php echo $data['VARIAN']; ?></td>
                                 <td><?php echo $data['WARNA']; ?></td>
                                 <td><?php echo $data['CUSTOM_NM']; ?></td>
                                 <td><?php echo $data['QUOTE']; ?></td>
                                 <td>
                                    <!-- Button trigger modal -->
                                    <a href="<?php echo site_url('packing/edit_resi/' . $data['ID_PESAN']) ?>"
                                        type="button" class="btn btn-warning">Edit</a>
                                    </br>
                                 </td>
                                </tr>
                             </tbody>
                             <?php } ?>
                             
                         </table>
                         <?= $this->pagination->create_links(); ?>
                     </div>
                 </div>
             </div>
             <!-- /.container-fluid -->

         </div>
         <!-- End of Main Content -->