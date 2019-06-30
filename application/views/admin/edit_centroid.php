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
      <!-- ======================================================= -->
      <!-- ======================================================= -->
      <!-- ================ modal tambah data ==================== -->
      <!-- ======================================================= -->
      <!-- ======================================================= -->
                    <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-pencil-ruler"></i>
             Silahkan Ubah Data</div>
            <div class="card-body">
              <form action="<?php echo base_url('admin/admin/editCentroid') ?>" method="post">
              <input type="hidden" name="id_cluster" value="<?php echo $centroid->id_cluster; ?>">
                
                <div class="form-group">
                  <div class="form-row">
                    <div class="col-md-6">
                      <div class="form-label-group">
                        <input type="text" id="inputSampelCentroid" name="sample_cluster" value="<?php echo $centroid->sample_cluster; ?>" class="form-control" placeholder="Sampel Centroid" required="required" autofocus="autofocus">
                        <label for="inputSampelCentroid">Sampel Centroid</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-label-group">
                        <input type="number" id="inputJenisTanah" name="njenis_tanah" value="<?php echo $centroid->njenis_tanah; ?>" class="form-control" placeholder="Jenis Tanah" required="required">
                        <label for="inputJenisTanah">Jenis Tanah</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-row">
                    <div class="col-md-6">
                      <div class="form-label-group">
                        <input type="number" id="inputKemiringan" name="nkemiringan" value="<?php echo $centroid->nkemiringan; ?>" class="form-control" placeholder="Kemiringan" required="required">
                        <label for="inputKemiringan">Kemiringan</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-label-group">
                        <input type="number" id="penggunaan_lahan" name="nlahan" value="<?php echo $centroid->nlahan; ?>" class="form-control" placeholder="Penggunaan Lahan" required="required">
                        <label for="penggunaan_lahan">Penggunaan Lahan</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-row">
                    <div class="col-md-6">
                      <div class="form-label-group">
                        <input type="number" id="inputOrdeSungai" name="norde_sungai" value="<?php echo $centroid->norde_sungai; ?>" class="form-control" placeholder="Orde Sungai" required="required">
                        <label for="inputOrdeSungai">Orde Sungai</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-label-group">
                        <input type="number" id="inputCH" name="nCH" value="<?php echo $centroid->nCH; ?>" class="form-control" placeholder="Curah Hujan" required="required">
                        <label for="inputCH">Curah Hujan</label>
                      </div>
                    </div>
                  </div>
                  </div><a class="btn btn-outline-secondary" href="javascript:history.back()">Cancel</a>
                <button type="submit" class="btn btn-outline-primary">Submit</button>
              </div>
            </form>
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