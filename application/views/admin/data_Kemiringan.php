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
              <!-- pengecekan admin -->
              <?php 
              $session = $this->session->userdata('cek_login');
              if ($session == '1') { ?>
              <div class="btn-group">
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="ti ti-settings"></i> Opsi
                </button>
                <div class="dropdown-menu animated slideInUp">
                  <a class="dropdown-item" data-toggle="modal" data-target="#TambahAtribut" href="#"><i class="ti ti-plus"></i> Tambah Data</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?php echo base_url('admin/UploadFile'); ?>"><i class="ti ti-upload"></i> Upload Data</a>                  
                </div>
              </div><?php } ?>
              <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Kecamatan</th>
                      <th>Kemiringan 0<sup>o</sup>-2<sup>o</sup></th>
                      <th>Bobot 1</th>
                      <th>Kemiringan 2<sup>o</sup>-15<sup>o</sup></th>
                      <th>Bobot 2</th>
                      <th>Kemiringan 15<sup>o</sup>-40<sup>o</sup></th>
                      <th>Bobot 3</th>
                      <th>Kemiringan Lebih dari 40<sup>o</sup></th>
                      <th>Bobot 4</th>
                      <?php $session = $this->session->userdata('cek_login');
                      if ($session == '1') { ?>
                      <th>Aksi</th><?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($kemiringan as $j): ?>

                      <tr>
                        <td><?php echo $j->kecamatan; ?></td>
                        <td><?php echo $j->Column_0_2; ?></td>
                        <td><?php echo $j->bobo1_1; ?></td>
                        <td><?php echo $j->Column_2_15; ?></td>
                        <td><?php echo $j->bobot_2; ?></td>
                        <td><?php echo $j->Column_15_40; ?></td>
                        <td><?php echo $j->bobot_3; ?></td>
                        <td><?php echo $j->Column_40; ?></td>
                        <td><?php echo $j->bobot_4; ?></td>
                        <?php $session = $this->session->userdata('cek_login');
                        if ($session == '1') { ?>
                        <td class="text-nowrap">
                          <span>
                            <a href="<?php echo base_url('admin/admin/ambilAtribut/'.$j->kecamatan); ?>" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                          </span>
                          <a href="<?php echo base_url('admin/admin/hapusAtribut/'.$j->kecamatan); ?>" data-toggle="tooltip" data-original-title="Hapus"> <i class="fa fa-close text-danger"></i> </a>
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
      <?php $this->load->view('admin/__partials/addAtributModal'); ?>
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