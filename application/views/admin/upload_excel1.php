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
          <div class="card-header">
            <i class="ti ti-list"></i>
            Import Data Atribut</div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <!-- <h1>Lawyers <small>Overview</small></h1> -->
                </div>
              </div><!-- /.row -->
              <?php
              $output = '';
              $output .= form_open_multipart('admin/admin/save');
              $output .= '<div class="row">';
              $output .= '<div class="col-lg-12 col-sm-12"><div class="form-group">';
              $output .= form_label('<br><br>', 'image');?>
              <a class="btn btn-outline-success" href="<?php echo base_url("excel/upload.xlsx"); ?>"><i class="ti ti-download"></i> Download Format</a>
              <?php
              $data = array(
                'name' => 'userfile',
                'id' => 'userfile',
                'class' => 'form-control filestyle',
                'value' => '',
                'data-icon' => 'false'
                );
              $output .= form_upload($data);
              $output .= '</div> <span style="color:red;">*Silahkan pilih file Excel dengan format( .xls / .xlxs) sebagai inputan</span></div>';
              $output .= '<div class="col-lg-12 col-sm-12"><div class="form-group text-right">';
              $data = array(
                'name' => 'importfile',
                'id' => 'importfile-id',
                'class' => 'btn btn-primary',
                'value' => 'Import',
                );
              $output .= form_submit($data, 'Import Data');
              $output .= '</div>
            </div></div>';
            $output .= form_close();
            echo $output;
            ?>
          </div>
        </div>
        <!-- isinya -->
      </div></div>
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