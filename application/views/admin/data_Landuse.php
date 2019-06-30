<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('admin/__partials/head'); ?>
</head>

<body class="fix-header fix-sidebar card-no-border">

  <?php $this->load->view('admin/__partials/topbar'); ?>
  
  <?php $this->load->view('admin/__partials/sidebar'); ?>
  
  <div class="page-wrapper">

    <?php $this->load->view('admin/__partials/breadcrumb'); ?>
    <div class="container-fluid">

      <!-- Row -->
      <!-- ============================================================== -->
      <!-- Start Page Content -->
      <!-- ============================================================== -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title"><?php echo $judul; ?></h4>
              <?php 
              $session = $this->session->userdata('cek_login');
              if ($session == '1') { ?>
              <div class="btn-group">
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="ti ti-settings"></i> Opsi
                </button>
                <div class="dropdown-menu animated slideInUp">
                  <a class="dropdown-item" data-toggle="modal" data-target="#TambahData" href="#"><i class="ti ti-plus"></i> Tambah Data</a>
                  
                </div>
              </div><?php } ?>
              <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Kecamatan</th>
                      <th>Penggunaan Lahan</th>
                      <th>Bobot</th>
                      <?php $session = $this->session->userdata('cek_login');
                      if ($session == '1') { ?>
                      <th>Aksi</th><?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($landuse as $j): ?>

                      <tr>
                        <td><?php echo $j->kecamatan; ?></td>
                        <td><?php echo $j->penggunaan_lahan; ?></td>
                        <td><?php echo $j->bobot; ?></td>
                        <?php $session = $this->session->userdata('cek_login');
                        if ($session == '1') { ?>
                        <td class="text-nowrap">
                          <span>
                            <a href="<?php echo base_url('admin/atribut_landuse/ambilAtribut?kecamatan='.$j->kecamatan.'&landuse='.$j->penggunaan_lahan); ?>" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                          </span>
                          <a href="<?php echo base_url('admin/atribut_landuse/delete?kecamatan='.$j->kecamatan.'&landuse='.$j->penggunaan_lahan); ?>" data-toggle="tooltip" data-original-title="Hapus"> <i class="fa fa-close text-danger"></i> </a>
                        </td><?php } ?>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- ======================================================= -->
      <!-- ======================================================= -->
      <!-- ================ modal tambah data ==================== -->
      <!-- ======================================================= -->
      <!-- ======================================================= -->
      <div class="modal fade" id="TambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Data Atribut</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="card card-register mx-auto mt-1">
                  <!-- <div class="card-header">Register an Account</div> -->
                  <div class="card-body">
                    <form class="form-material" action="<?php echo base_url('admin/atribut_landuse/add') ?>" method="post">
                      <div class="form-group">
                        <div class="form-label-group">
                          <label>Input Kecamatan</label>
                          <select class="form-control" name="kecamatan">
                            <?php $kecamatan = $this->db->query('select * from data_jenis_tanah group by kecamatan')->result(); ?>
                            <?php foreach ($kecamatan as $n): ?>
                              <option value="<?php echo $n->kecamatan ?>"><?php echo $n->kecamatan ?></option>
                            <?php endforeach ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-label-group">
                          <label>Input Penggunaan Lahan</label>
                          <select class="form-control" name="landuse">
                            <?php
                            $landuse = $this->db->query('select * FROM `data_penggunaan_lahan` GROUP by penggunaan_lahan
                              ')->result();						
                            foreach ($landuse as $l){
                              ?>
                              
                              <option value="<?php echo $l->penggunaan_lahan ?>"><?php echo $l->penggunaan_lahan ?></option>
                              <?php }?>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <?php $this->load->view('admin/__partials/footer'); ?>
      </div>
    </div>
    <script>
      $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
          var table = $('#example').DataTable({
            "columnDefs": [{
              "visible": false,
              "targets": 2
            }],
            "order": [
            [2, 'asc']
            ],
            "displayLength": 25,
            "drawCallback": function(settings) {
              var api = this.api();
              var rows = api.rows({
                page: 'current'
              }).nodes();
              var last = null;
              api.column(2, {
                page: 'current'
              }).data().each(function(group, i) {
                if (last !== group) {
                  $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                  last = group;
                }
              });
            }
          });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
              var currentOrder = table.order()[0];
              if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                table.order([2, 'desc']).draw();
              } else {
                table.order([2, 'asc']).draw();
              }
            });
          });
      });
      $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      });
    </script>
    <?php $this->load->view('admin/__partials/js'); ?>
  </body>

  </html>