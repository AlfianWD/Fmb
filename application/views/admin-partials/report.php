  <!-- Begin Page Content -->
  <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Report</h1>
          <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
      </div>

      <!-- Table pesanan -->
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="font-weight-bolt text-primary float-left">Table Pesanan</h6>
              <a href="<?= base_url(); ?>admin/export"
                  class="float-right d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                      class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>
          <div class="card-body">
              <div class="table-responsive">

                  <table id="DataTables" class="table table-striped table-bordered ">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>ID Pesan</th>
                              <th>Username</th>
                              <th>Tangal</th>
                              <th>Total</th>
                              <th>Nama Barang</th>
                              <th>Varian</th>
                              <th>Warna</th>
                          </tr>
                      </thead>
                      <?php
                        $no = 1;
                        foreach ($data as $data) {
                            echo "<tr>
                                        <td>" . $no++ . "</td>
                                        <td>" . $row[] = $data->ID_PESAN . "</td>
                                        <td>" . $row[] = $data->USERNAME . "</td>
                                        <td>" . $row[] = $data->TGL_PESAN . "</td>
                                        <td>" . $row[] = 'Rp.' . number_format($data->TOTAL_BAYAR, 0, ",", ".") . "</td>
                                        <td>" . $row[] = $data->NM_BARANG . "</td>
                                        <td>" . $row[] = $data->VARIAN . "</td>
                                        <td>" . $row[] = $data->WARNA . "</td>
                                        </tr>";
                        }
                        ?>
                  </table>


              </div>
          </div>
      </div>
      <!-- /.container-fluid -->


  </div>
  <!-- End of Main Content 