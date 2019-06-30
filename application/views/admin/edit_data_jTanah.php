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
            <div class="card">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Data Atribut</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="card card-register mx-auto mt-1">
                  <!-- <div class="card-header">Register an Account</div> -->
                  <div class="card-body">
                    <form class="form-material" action="<?php echo base_url('admin/atribut_j_tanah/update') ?>" method="post">
                      <div class="form-group">
                        <div class="form-label-group">
                        <?php foreach ($jenis_tanah as $value): ?>
                          <input type="hidden" name="jenis_tanah1" value="<?php echo $value->jenis_tanah ?>">
                        <?php endforeach ?>
                        <label>Input Kecamatan</label>
                          <select class="form-control" name="kecamatan">
                          <?php foreach ($jenis_tanah as $n): ?>
                            <option value="<?php echo $n->kecamatan ?>"><?php echo $n->kecamatan ?></option>
                          <?php endforeach ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-label-group">
                            <label>Input Jenis Tanah</label>
                        <select class="form-control" name="jenis_tanah">
                            <option value="Regosol">Regosol</option>
                            <option value="Andosol">Andosol</option>
                            <option value="NCB Soil">NCB Soil</option>
                            <option value="Mediteran">Mediteran</option>
                            <option value="Aluvial">Aluvial</option>
                            <option value="Glei">Glei</option>
                            <option value="Grumosol">Grumosol</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <a href="<?php echo base_url('admin/atribut_j_tanah') ?>" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
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