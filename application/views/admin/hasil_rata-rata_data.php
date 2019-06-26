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
     <div class="card mb-3">
          <div class="card-body">
          <h4 class="card-title">Hasil Rata-Rata Data</h4>
            <div class="table-responsive m-t-40">
              <table class="table table-bordered table-striped">
                <tbody>
                  <tr>
                    <td>Centroid 1</td>
                    <td>Sangat Baik</td>
                    <td><?php echo $c1; ?></td>
                  </tr>
                  <tr>
                    <td>Centroid 2</td>
                    <td>Baik</td>
                    <td><?php echo $c2; ?></td>
                  </tr>
                  <tr>
                    <td>Centroid 3</td>
                    <td>Cukup</td>
                    <td><?php echo $c3; ?></td>
                  </tr>
                  <tr>
                    <td>Centroid 4</td>
                    <td>Kurang</td>
                    <td><?php echo $c4; ?></td>
                  </tr>
                  <tr>
                    <td>Centroid 5</td>
                    <td>Kurang Sekali</td>
                    <td><?php echo $c5; ?></td>
                  </tr>
                </tbody>
              </table>
               <div class="table-responsive m-t-40">
              <table id="myTable" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Kecamatan</th>
                    <th>Jenis Tanah</th>
                    <th>Kemiringan</th>
                    <th>Penggunaan Lahan</th>
                    <th>Orde Sungai</th>
                    <th>Curah Hujan</th>
                    <th>Rata" Nilai</th>
                    <th colspan="5">Jarak</th>
                    <th>Cluster</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($atribut->result() as $s): ?>
                  <tr>
                    <td><?php echo $s->kecamatan; ?></td>
                    <td><?php echo $s->jenis_tanah; ?></td>
                    <td><?php echo $s->kemiringan; ?></td>
                    <td><?php echo $s->penggunaan_lahan; ?></td>
                    <td><?php echo $s->orde_sungai; ?></td>
                    <td><?php echo $s->curah_hujan; ?></td>
                    <td><?php echo $s->rata2; ?></td>
                    <td><?php echo $s->d1; ?></td>
                    <td><?php echo $s->d2; ?></td>
                    <td><?php echo $s->d3; ?></td>
                    <td><?php echo $s->d4; ?></td>
                    <td><?php echo $s->d5; ?></td>
                    <td><?php echo $s->predikat; ?></td>
                  </tr>
                <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
         <!-- isinya -->
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