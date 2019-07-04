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
              <h4 class="card-title">Data Pusat Centroid</h4>
              <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                     <th>Sampel Cluster</th>
                     <th>nJenis Tanah</th>
                     <th>nKemiringan</th>
                     <th>nLahan</th>
                     <th>nOrde Sungai</th>
                     <th>nCurah Hujan</th>
                     <th>Opsi</th>
                   </tr>
                 </thead>
                 <tbody>
                 <?php foreach ($centroid as $k): ?>

                    <tr>
                     <td><?php echo $k->sample_cluster; ?></td>
                    <td><?php echo $k->njenis_tanah; ?></td>
                    <td><?php echo $k->nkemiringan; ?></td>
                    <td><?php echo $k->nlahan; ?></td>
                    <td><?php echo $k->norde_sungai; ?></td>
                    <td><?php echo $k->nCH; ?></td>
                      <td class="text-nowrap">
                        <span>
                          <a href="<?php echo base_url('admin/admin/ambilCentroid/'.$k->id_cluster); ?>" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                        </span>
                        <!-- <a href="<?php echo base_url('admin/admin/hapusCentroid/'.$k->id_cluster); ?>" data-toggle="tooltip" data-target="#hapus" data-original-title="Hapus"> <i class="fa fa-close text-danger"></i> </a> -->
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
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