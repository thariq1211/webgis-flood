<?php 
if ($_SESSION['cek_login'] != '1') {
  redirect(base_url(),'refresh');
}
?>
<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('admin/_partials/head.php')?>
</head>
<body id="page-top">
	<?php $this->load->view('admin/_partials/navbar.php')?>

	<div id="wrapper">
		
		<?php $this->load->view('admin/_partials/sidebar.php')?>
		<div id="content-wrapper">
			<div class="container-fluid">
				<?php $this->load->view('admin/_partials/breadcrumb.php') ?>
       <!-- isinya -->
       <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-table"></i>
          Generate Centroid</div>
          <div class="card-body">
            <a class="btn btn-outline-success" href="<?php echo base_url() ?>admin/admin/kmeans_next"><b>Lanjut Iterasi</b></a>
            <div class="table-responsive">
             <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr align="center">
                    <th rowspan="2">Kecamatan</th>
                    <th rowspan="2">Jenis Tanah</th>
                    <th rowspan="2">Kemiringan</th>
                    <th rowspan="2">Penggunaan Lahan</th>
                    <th rowspan="2">Orde Sungai</th>
                    <th rowspan="2">Curah Hujan</th>
                    <th colspan="5">Centroid 1</th>
                    <th colspan="5">Centroid 2</th>
                    <th colspan="5">Centroid 3</th>
                    <th colspan="5">Centroid 4</th>
                    <th colspan="5">Centroid 5</th>
                    <th rowspan="2">C1</th>
                    <th rowspan="2">C2</th>
                    <th rowspan="2">C3</th>
                    <th rowspan="2">C4</th>
                    <th rowspan="2">C5</th>
                  </tr>
                  <?php
                  $query = $this->db->query("select * from data_cluster");
                  $row1 = $query->row(0);
                  $row2 = $query->row(1);
                  $row3 = $query->row(2);
                  $row4 = $query->row(3);
                  $row5 = $query->row(4);

                  $c1a = $row1->njenis_tanah;
                  $c1b = $row1->nkemiringan;
                  $c1c = $row1->nlahan;
                  $c1d = $row1->norde_sungai;
                  $c1e = $row1->nCH;
                  
                  $c2a = $row2->njenis_tanah;
                  $c2b = $row2->nkemiringan;
                  $c2c = $row2->nlahan;
                  $c2d = $row2->norde_sungai;
                  $c2e = $row2->nCH;
                  
                  $c3a = $row3->njenis_tanah;
                  $c3b = $row3->nkemiringan;
                  $c3c = $row3->nlahan;
                  $c3d = $row3->norde_sungai;
                  $c3e = $row3->nCH;

                  $c4a = $row4->njenis_tanah;
                  $c4b = $row4->nkemiringan;
                  $c4c = $row4->nlahan;
                  $c4d = $row4->norde_sungai;
                  $c4e = $row4->nCH;

                  $c5a = $row5->njenis_tanah;
                  $c5b = $row5->nkemiringan;
                  $c5c = $row5->nlahan;
                  $c5d = $row5->norde_sungai;
                  $c5e = $row5->nCH;

                  $c1a_b = "";
                  $c1b_b = "";
                  $c1c_b = "";
                  $c1d_b = "";
                  $c1e_b = "";
                  
                  $c2a_b = "";
                  $c2b_b = "";
                  $c2c_b = "";
                  $c2d_b = "";
                  $c2e_b = "";
                  
                  $c3a_b = "";
                  $c3b_b = "";
                  $c3c_b = "";
                  $c3d_b = "";
                  $c3e_b = "";

                  $c4a_b = "";
                  $c4b_b = "";
                  $c4c_b = "";
                  $c4d_b = "";
                  $c4e_b = "";

                  $c5a_b = "";
                  $c5b_b = "";
                  $c5c_b = "";
                  $c5d_b = "";
                  $c5e_b = "";

                  $hc1=0;
                  $hc2=0;
                  $hc3=0;
                  $hc4=0;
                  $hc5=0;

                  $no=0;
                  $arr_c1 = array();
                  $arr_c2 = array();
                  $arr_c3 = array();
                  $arr_c4 = array();
                  $arr_c5 = array();
                  
                  $arr_c1_temp = array();
                  $arr_c2_temp = array();
                  $arr_c3_temp = array();
                  $arr_c4_temp = array();
                  $arr_c5_temp = array();

                  $this->db->truncate('centroid_temp');
                  $this->db->truncate('hasil_centroid');
                  ?>
                  <tr>
                    <?php foreach ($cluster->result() as $k): ?>
                      <th><?php echo $k->njenis_tanah; ?></th><th><?php echo $k->nkemiringan; ?></th><th><?php echo $k->nlahan; ?></th><th><?php echo $k->norde_sungai; ?></th>
                      <th><?php echo $k->nCH; ?></th>
                    <?php endforeach ?>
                  </tr>
                </thead>
                <tfoot>
                  <tr align="center">
                   <th rowspan="2">Kecamatan</th>
                   <th rowspan="2">Jenis Tanah</th>
                   <th rowspan="2">Kemiringan</th>
                   <th rowspan="2">Penggunaan Lahan</th>
                   <th rowspan="2">Orde Sungai</th>
                   <th rowspan="2">Curah Hujan</th>
                   <th colspan="5">Centroid 1</th>
                   <th colspan="5">Centroid 2</th>
                   <th colspan="5">Centroid 3</th>
                   <th colspan="5">Centroid 4</th>
                   <th colspan="5">Centroid 5</th>
                   <th rowspan="2">C1</th>
                   <th rowspan="2">C2</th>
                   <th rowspan="2">C3</th>
                   <th rowspan="2">C4</th>
                   <th rowspan="2">C5</th>
                 </tr>
               </tfoot>
               <tbody>
                <?php foreach ($atribut->result() as $key): ?>
                  <tr>
                    <th><?php echo $key->kecamatan; ?></th>
                    <th><?php echo $key->jenis_tanah; ?></th>
                    <th><?php echo $key->kemiringan; ?></th>
                    <th><?php echo $key->penggunaan_lahan; ?></th>
                    <th><?php echo $key->orde_sungai; ?></th>
                    <th><?php echo $key->curah_hujan; ?></th>
                    <th colspan="5">
                      <?php 
                      $hc1 = sqrt(pow(($key->jenis_tanah-$c1a), 2)+pow($key->kemiringan-$c1b, 2)+pow($key->penggunaan_lahan-$c1c, 2)+pow($key->orde_sungai-$c1d, 2)+pow($key->curah_hujan-$c1e, 2));
                      echo $hc1;
                      ?>
                    </th>
                    <th colspan="5">
                      <?php 
                      $hc2 = sqrt(pow(($key->jenis_tanah-$c2a), 2)+pow($key->kemiringan-$c2b, 2)+pow($key->penggunaan_lahan-$c2c, 2)+pow($key->orde_sungai-$c2d, 2)+pow($key->curah_hujan-$c2e, 2));
                      echo $hc2;
                      ?>
                    </th>
                    <th colspan="5">
                      <?php 
                      $hc3 = sqrt(pow(($key->jenis_tanah-$c3a), 2)+pow($key->kemiringan-$c3b, 2)+pow($key->penggunaan_lahan-$c3c, 2)+pow($key->orde_sungai-$c3d, 2)+pow($key->curah_hujan-$c3e, 2));
                      echo $hc3;
                      ?>
                    </th>
                    <th colspan="5">
                      <?php 
                      $hc4 = sqrt(pow(($key->jenis_tanah-$c4a), 2)+pow($key->kemiringan-$c4b, 2)+pow($key->penggunaan_lahan-$c4c, 2)+pow($key->orde_sungai-$c4d, 2)+pow($key->curah_hujan-$c4e, 2));
                      echo $hc4;
                      ?>
                    </th>
                    <th colspan="5">
                      <?php 
                      $hc5 = sqrt(pow(($key->jenis_tanah-$c5a), 2)+pow($key->kemiringan-$c5b, 2)+pow($key->penggunaan_lahan-$c5c, 2)+pow($key->orde_sungai-$c5d, 2)+pow($key->curah_hujan-$c5e, 2));
                      echo $hc5;
                      ?>
                    </th>
                    <?php

                    //penentuan C1 
                    if ($hc1<=$hc2) {
                      if ($hc1<=$hc3) {
                        if ($hc1<=$hc4) {
                          if ($hc1<=$hc5) {
                            $arr_c1[$no] = 1;
                          } else {
                            $arr_c1[$no] = '0';
                          }
                        } else {
                          $arr_c1[$no] = '0';
                        }
                      } else {
                        $arr_c1[$no] = '0';
                      }
                    } else {
                      $arr_c1[$no] = '0';
                    }

                    //penentuan C2
                    if ($hc2<=$hc1) {
                      if ($hc2<=$hc3) {
                        if ($hc2<=$hc4) {
                          if ($hc2<=$hc5) {
                            $arr_c2[$no] = 1;
                          } else {
                            $arr_c2[$no] = '0';
                          }
                        } else {
                          $arr_c2[$no] = '0';
                        }
                      } else {
                        $arr_c2[$no] = '0';
                      }
                    } else {
                      $arr_c2[$no] = '0';
                    }

                    //penentuan C3
                    if ($hc3<=$hc1) {
                      if ($hc3<=$hc2) {
                        if ($hc3<=$hc4) {
                          if ($hc3<=$hc5) {
                            $arr_c3[$no] = 1;
                          } else {
                            $arr_c3[$no] = '0';
                          }
                        } else {
                          $arr_c3[$no] = '0';
                        }
                      } else {
                        $arr_c3[$no] = '0';
                      }
                    } else {
                      $arr_c3[$no] = '0';
                    }

                    //penentuan C4
                    if ($hc4<=$hc2) {
                      if ($hc4<=$hc3) {
                        if ($hc4<=$hc1) {
                          if ($hc4<=$hc5) {
                            $arr_c4[$no] = 1;
                          } else {
                            $arr_c4[$no] = '0';
                          }
                        } else {
                          $arr_c4[$no] = '0';
                        }
                      } else {
                        $arr_c4[$no] = '0';
                      }
                    } else {
                      $arr_c4[$no] = '0';
                    }

                    //penentuan C5
                    if ($hc5<=$hc2) {
                      if ($hc5<=$hc3) {
                        if ($hc5<=$hc4) {
                          if ($hc5<=$hc1) {
                            $arr_c5[$no] = 1;
                          } else {
                            $arr_c5[$no] = '0';
                          }
                        } else {
                          $arr_c5[$no] = '0';
                        }
                      } else {
                        $arr_c5[$no] = '0';
                      }
                    } else {
                      $arr_c5[$no] = '0';
                    }

                    $arr_c1_temp[$no]=$key->jenis_tanah;
                    $arr_c2_temp[$no]=$key->kemiringan;
                    $arr_c3_temp[$no]=$key->penggunaan_lahan;
                    $arr_c4_temp[$no]=$key->orde_sungai;
                    $arr_c5_temp[$no]=$key->curah_hujan;

                    $warna1 = "";
                    $warna2 = "";
                    $warna3 = "";
                    $warna4 = "";
                    $warna5 = "";
                    ?>
                    <?php if ($arr_c1[$no]==1) {$warna1='yellow';
                    
                  }else{$warna1='white';} ?><th bgcolor="<?php echo $warna1 ?>"><?php echo $arr_c1[$no]; ?></th>
                  <?php if ($arr_c2[$no]==1) {$warna2='yellow';
                  
                }else{$warna2='white';} ?><th bgcolor="<?php echo $warna2 ?>"><?php echo $arr_c2[$no]; ?></th>
                <?php if ($arr_c3[$no]==1) {$warna3='yellow';
                
              }else{$warna3='white';} ?><th bgcolor="<?php echo $warna3 ?>"><?php echo $arr_c3[$no] ?></th>
              <?php if ($arr_c4[$no]==1) {$warna4='yellow';
              
            }else{$warna4='white';} ?><th bgcolor="<?php echo $warna4 ?>"><?php echo $arr_c4[$no] ?></th>
            <?php if ($arr_c5[$no]==1) {$warna5='yellow';
            
          }else{$warna5='white';} ?><th bgcolor="<?php echo $warna5 ?>"><?php echo $arr_c5[$no] ?></th>
          <?php 
          $q = "insert into centroid_temp(iterasi,c1,c2,c3,c4,c5) values(1,'".$arr_c1[$no]."','".$arr_c2[$no]."','".$arr_c3[$no]."','".$arr_c4[$no]."','".$arr_c5[$no]."')";
          $this->db->query($q);
          $no++;
          ?>
        </tr>
      <?php endforeach ?>
    </tbody>
    <?php 
                // centroid baru 1 
                // c1ab
    $jum = 0;
    $arr = array();
    for($i=0;$i<count($arr_c1);$i++)
    {
      $arr[$i] = $arr_c1_temp[$i]*$arr_c1[$i];
      if($arr_c1[$i]==1)
      {
        $jum++;
      }
    }
    $c1a_b = array_sum($arr)/$jum;

                //c1bb
    $jum = 0;
    $arr = array();
    for($i=0;$i<count($arr_c2);$i++)
    {
      $arr[$i] = $arr_c2_temp[$i]*$arr_c1[$i];
      if($arr_c1[$i]==1)
      {
        $jum++;
      }
    }
    $c1b_b = array_sum($arr)/$jum;

                //c1cb
    $jum = 0;
    $arr = array();
    for($i=0;$i<count($arr_c3);$i++)
    {
      $arr[$i] = $arr_c3_temp[$i]*$arr_c1[$i];
      if($arr_c1[$i]==1)
      {
        $jum++;
      }
    }
    $c1c_b = array_sum($arr)/$jum;

                //c1db
    $jum = 0;
    $arr = array();
    for($i=0;$i<count($arr_c4);$i++)
    {
      $arr[$i] = $arr_c4_temp[$i]*$arr_c1[$i];
      if($arr_c1[$i]==1)
      {
        $jum++;
      }
    }
    $c1d_b = array_sum($arr)/$jum;

                //c1eb
    $jum = 0;
    $arr = array();
    for($i=0;$i<count($arr_c5);$i++)
    {
      $arr[$i] = $arr_c5_temp[$i]*$arr_c1[$i];
      if($arr_c1[$i]==1)
      {
        $jum++;
      }
    }
    $c1e_b = array_sum($arr)/$jum;

              //centroid baru 2
              //c2a_b
    $jum = 0;
    $arr = array();
    for($i=0;$i<count($arr_c1);$i++)
    {
      $arr[$i] = $arr_c1_temp[$i]*$arr_c2[$i];
      if($arr_c2[$i]==1)
      {
        $jum++;
      }
    }
    $c2a_b = array_sum($arr)/$jum;

              //c2b_b
    $jum = 0;
    $arr = array();
    for($i=0;$i<count($arr_c2);$i++)
    {
      $arr[$i] = $arr_c2_temp[$i]*$arr_c2[$i];
      if($arr_c2[$i]==1)
      {
        $jum++;
      }
    }
    $c2b_b = array_sum($arr)/$jum;

              //c2c_b
    $jum = 0;
    $arr = array();
    for($i=0;$i<count($arr_c3);$i++)
    {
      $arr[$i] = $arr_c3_temp[$i]*$arr_c2[$i];
      if($arr_c2[$i]==1)
      {
        $jum++;
      }
    }
    $c2c_b = array_sum($arr)/$jum;

              //c2d_b
    $jum = 0;
    $arr = array();
    for($i=0;$i<count($arr_c4);$i++)
    {
      $arr[$i] = $arr_c4_temp[$i]*$arr_c2[$i];
      if($arr_c2[$i]==1)
      {
        $jum++;
      }
    }
    $c2d_b = array_sum($arr)/$jum;

              //c2e_b
    $jum = 0;
    $arr = array();
    for($i=0;$i<count($arr_c5);$i++)
    {
      $arr[$i] = $arr_c5_temp[$i]*$arr_c2[$i];
      if($arr_c2[$i]==1)
      {
        $jum++;
      }
    }
    $c2e_b = array_sum($arr)/$jum;

              //centroid 3
              //c3ab
    $jum = 0;
    $arr = array();
    for($i=0;$i<count($arr_c1);$i++)
    {
      $arr[$i] = $arr_c1_temp[$i]*$arr_c3[$i];
      if($arr_c3[$i]==1)
      {
        $jum++;
      }
    }
    $c3a_b = array_sum($arr)/$jum;

              //c3bb
    $jum = 0;
    $arr = array();
    for($i=0;$i<count($arr_c2);$i++)
    {
      $arr[$i] = $arr_c2_temp[$i]*$arr_c3[$i];
      if($arr_c3[$i]==1)
      {
        $jum++;
      }
    }
    $c3b_b = array_sum($arr)/$jum;

              //c3cb
    $jum = 0;
    $arr = array();
    for($i=0;$i<count($arr_c3);$i++)
    {
      $arr[$i] = $arr_c3_temp[$i]*$arr_c3[$i];
      if($arr_c3[$i]==1)
      {
        $jum++;
      }
    }
    $c3c_b = array_sum($arr)/$jum;

              //c3db
    $jum = 0;
    $arr = array();
    for($i=0;$i<count($arr_c4);$i++)
    {
      $arr[$i] = $arr_c4_temp[$i]*$arr_c3[$i];
      if($arr_c3[$i]==1)
      {
        $jum++;
      }
    }
    $c3d_b = array_sum($arr)/$jum;

              //c3eb
    $jum = 0;
    $arr = array();
    for($i=0;$i<count($arr_c5);$i++)
    {
      $arr[$i] = $arr_c5_temp[$i]*$arr_c3[$i];
      if($arr_c3[$i]==1)
      {
        $jum++;
      }
    }
    $c3e_b = array_sum($arr)/$jum;

              //centroid 4
              //c4ab
    $jum = 0;
    $arr = array();
    for($i=0;$i<count($arr_c1);$i++)
    {
      $arr[$i] = $arr_c1_temp[$i]*$arr_c4[$i];
      if($arr_c4[$i]==1)
      {
        $jum++;
      }
    }
    $c4a_b = array_sum($arr)/$jum;

              //c4bb
    $jum = 0;
    $arr = array();
    for($i=0;$i<count($arr_c2);$i++)
    {
      $arr[$i] = $arr_c2_temp[$i]*$arr_c4[$i];
      if($arr_c4[$i]==1)
      {
        $jum++;
      }
    }
    $c4b_b = array_sum($arr)/$jum;

              //c4cb
    $jum = 0;
    $arr = array();
    for($i=0;$i<count($arr_c3);$i++)
    {
      $arr[$i] = $arr_c3_temp[$i]*$arr_c4[$i];
      if($arr_c4[$i]==1)
      {
        $jum++;
      }
    }
    $c4c_b = array_sum($arr)/$jum;

              //c4db
    $jum = 0;
    $arr = array();
    for($i=0;$i<count($arr_c4);$i++)
    {
      $arr[$i] = $arr_c4_temp[$i]*$arr_c4[$i];
      if($arr_c4[$i]==1)
      {
        $jum++;
      }
    }
    $c4d_b = array_sum($arr)/$jum;

              //c4eb
    $jum = 0;
    $arr = array();
    for($i=0;$i<count($arr_c5);$i++)
    {
      $arr[$i] = $arr_c5_temp[$i]*$arr_c4[$i];
      if($arr_c4[$i]==1)
      {
        $jum++;
      }
    }
    $c4e_b = array_sum($arr)/$jum;

              //centroid 5
              //c5ab
    $jum = 0;
    $arr = array();
    for($i=0;$i<count($arr_c1);$i++)
    {
      $arr[$i] = $arr_c1_temp[$i]*$arr_c5[$i];
      if($arr_c5[$i]==1)
      {
        $jum++;
      }
    }
    $c5a_b = array_sum($arr)/$jum;

              //c5bb
    $jum = 0;
    $arr = array();
    for($i=0;$i<count($arr_c2);$i++)
    {
      $arr[$i] = $arr_c2_temp[$i]*$arr_c5[$i];
      if($arr_c5[$i]==1)
      {
        $jum++;
      }
    }
    $c5b_b = array_sum($arr)/$jum;

              //c5cb
    $jum = 0;
    $arr = array();
    for($i=0;$i<count($arr_c3);$i++)
    {
      $arr[$i] = $arr_c3_temp[$i]*$arr_c5[$i];
      if($arr_c5[$i]==1)
      {
        $jum++;
      }
    }
    $c5c_b = array_sum($arr)/$jum;

              //c5db
    $jum = 0;
    $arr = array();
    for($i=0;$i<count($arr_c4);$i++)
    {
      $arr[$i] = $arr_c4_temp[$i]*$arr_c5[$i];
      if($arr_c5[$i]==1)
      {
        $jum++;
      }
    }
    $c5d_b = array_sum($arr)/$jum;

              //c5eb
    $jum = 0;
    $arr = array();
    for($i=0;$i<count($arr_c5);$i++)
    {
      $arr[$i] = $arr_c5_temp[$i]*$arr_c5[$i];
      if($arr_c5[$i]==1)
      {
        $jum++;
      }
    }
    $c5e_b = array_sum($arr)/$jum;

    $q = "insert into hasil_centroid(c1a,c1b,c1c,c1d,c1e,c2a,c2b,c2c,c2d,c2e,c3a,c3b,c3c,c3d,c3e,c4a,c4b,c4c,c4d,c4e,c5a,c5b,c5c,c5d,c5e)values('".$c1a_b."','".$c1b_b."','".$c1c_b."','".$c1d_b."','".$c1e_b."','".$c2a_b."','".$c2b_b."','".$c2c_b."','".$c2d_b."','".$c2e_b."','".$c3a_b."','".$c3b_b."','".$c3c_b."','".$c3d_b."','".$c3e_b."','".$c4a_b."','".$c4b_b."','".$c4c_b."','".$c4d_b."','".$c4e_b."','".$c5a_b."','".$c5b_b."','".$c5c_b."','".$c5d_b."','".$c5e_b."')";
    $this->db->query($q);
    ?>
  </table>
</div>
</div>
<div class="card-footer small text-muted">Page rendered in <strong>{elapsed_time}</strong> seconds</div>
</div>
<!-- isinya -->
</div>
<?php $this->load->view('admin/_partials/footer.php') ?>
</div>

</div>
<?php $this->load->view('admin/_partials/scrolltop.php') ?>
<?php $this->load->view('admin/_partials/logoutmodal.php') ?>
<?php $this->load->view('admin/_partials/js.php') ?>

</body>
</html>