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
                    <form class="form-material" action="<?php echo base_url('admin/atribut_buffer/update') ?>" method="post">
                      <div class="form-group">
                        <div class="form-label-group">
                        <?php foreach ($buffer as $value): ?>
                          <input type="hidden" name="buffer1" value="<?php echo $value->buffer_sungai ?>">
                        <?php endforeach ?>
                        <label>Input Kecamatan</label>
                          <select class="form-control" name="kecamatan">
                          <?php foreach ($buffer as $n): ?>
                            <option value="<?php echo $n->kecamatan ?>"><?php echo $n->kecamatan ?></option>
                          <?php endforeach ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-label-group">
                            <label>Input Buffer Sungai</label>
                        <select class="form-control" name="buffer">
                        <?php $query = $this->db->query('select * from data_buffer_sungai group by buffer_sungai order by bobot')->result();
                        foreach($query as $d){
                         ?>
                            <option value="<?php echo $d->buffer_sungai ?>"><?php echo $d->buffer_sungai ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <a href="<?php echo base_url('admin/atribut_buffer') ?>" class="btn btn-secondary">Batal</a>
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