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
              <h4 class="card-title">Hasil Penghitungan <i><span>K-Means Clustering</span></i></h4>
              <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                     <th>Kecamatan</th>
                    <th>Jarak C1</th>
                    <th>Jarak C2</th>
                    <th>Jarak C3</th>
                    <th>Jarak C4</th>
                    <th>Jarak C5</th>
                    <th>Kelompok</th>
                   </tr>
                 </thead>
                 <tbody>
                 <?php foreach ($hasil_cluster as $key): ?>
                    <tr>
                     <td><?php echo $key->kecamatan; ?></td>
                      <td><?php echo $key->d1; ?></td>
                      <td><?php echo $key->d2; ?></td>
                      <td><?php echo $key->d3; ?></td>
                      <td><?php echo $key->d4; ?></td>
                      <td><?php echo $key->d5; ?></td>
                      <td><?php 
                        $cluster = $key->hasil_cluster;
                        if ($cluster=="C1") {
                          echo "Banjir Tinggi";
                          // echo "C1";
                        } else if($cluster=="C2"){
                          echo "Banjir Sedang";
                          // echo "C2";
                        }else if($cluster=="C3"){
                          echo "Banjir Rendah";
                          // echo "C3";
                        }else if($cluster=="C4"){
                          echo "Banjir Aman";
                          // echo "C4";
                        }else if($cluster=="C5"){
                          echo "Non Banjir";
                          // echo "C5";
                        }
                        ?></td>
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