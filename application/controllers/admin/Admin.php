<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	private $filename = 'import_data';
	public function __construct()
	{
		parent::__construct();
		$this->load->model('dataset');
		$this->load->model('cluster');
		$this->load->library('excel');
		$this->load->library('googlemaps');
	}
	public function ceklogin($path)
	{
		$session = $this->session->userdata('cek_login');
		if ($session == '1') {
			$this->load->view($path);
		} else {
			redirect(base_url(),'refresh');
		}
		
	}
	public function index()
	{
		$data['kecamatan'] = $this->db->query('select count(kecamatan) as kec from data_atribut');
		$data['centroid'] = $this->db->query('select count(sample_cluster) as cen from data_cluster');
		$data['iterasi'] = $this->db->query('select max(iterasi) as it from centroid_temp');
		$data['hc'] = $this->db->query('select max(hc) as hc, hasil_cluster from (select hasil_cluster, count( * ) as hc from hasil_cluster group by hasil_cluster) as A');
		$this->load->view('admin/index',$data);
		// $this->ceklogin('admin/index');
	}
	public function atribut()
	{
		$data['atribut'] = $this->dataset->getAll();
		$this->load->view('admin/atribut',$data);
	}
	public function ambilAtribut($id)
	{
		// $atribut = array($this->dataset->getbyID($id));
		$data['atribut'] = $this->dataset->getbyID($id);
		// foreach ($atribut as $key) {
		// echo $key->kecamatan;
		// }
		$this->load->view('admin/_partials/editAtributModal.php', $data);
	}
	public function addAtribut()
	{
		$atribut = $this->dataset;
		$atribut->save();
		redirect(base_url('admin/atribut'),'refresh');
	}
	public function editAtribut($id = null)
	{
		$this->dataset->update();
		redirect(base_url('admin/atribut'),'refresh');
	}
	public function hapusAtribut($id=null)
	{
		if ($this->dataset->delete($id)) {
			redirect(base_url('admin/atribut'),'refresh');
		}
	}
	public function load_upload()
	{
		$this->load->view('admin/upload_excel.php');
	}
	public function save() {
		$this->db->truncate('data_atribut');
		$this->load->library('excel');

		if ($this->input->post('importfile')) {
			$path = './excel/';

			$config['upload_path'] = $path;
			$config['allowed_types'] = 'xlsx|xls|jpg|png';
			$config['remove_spaces'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('userfile')) {
				$error = array('error' => $this->upload->display_errors());
			} else {
				$data = array('upload_data' => $this->upload->data());
			}

			if (!empty($data['upload_data']['file_name'])) {
				$import_xls_file = $data['upload_data']['file_name'];
			} else {
				$import_xls_file = 0;
			}
			$inputFileName = $path . $import_xls_file;
			try {
				$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
				$objReader = PHPExcel_IOFactory::createReader($inputFileType);
				$objPHPExcel = $objReader->load($inputFileName);
			} catch (Exception $e) {
				die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
					. '": ' . $e->getMessage());
			}
			$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);

			$arrayCount = count($allDataInSheet);
			$flag = 0;
			$createArray = array('kecamatan', 'jenis_tanah', 'kemiringan', 'penggunaan_lahan', 'orde_sungai', 'curah_hujan', 'luas_wilayah');
			$makeArray = array('kecamatan'=>'kecamatan', 'jenis_tanah'=>'jenis_tanah', 'kemiringan'=>'kemiringan', 'penggunaan_lahan'=>'penggunaan_lahan', 'orde_sungai'=>'orde_sungai', 'curah_hujan'=>'curah_hujan', 'luas_wilayah'=>'luas_wilayah');
			$SheetDataKey = array();
			foreach ($allDataInSheet as $dataInSheet) {
				foreach ($dataInSheet as $key => $value) {
					if (in_array(trim($value), $createArray)) {
						$value = preg_replace('/\s+/', '', $value);
						$SheetDataKey[trim($value)] = $key;
					} else {

					}
				}
			}
			$data = array_diff_key($makeArray, $SheetDataKey);

			if (empty($data)) {
				$flag = 1;
			}
			if ($flag == 1) {
				for ($i = 2; $i <= $arrayCount; $i++) {
					$addresses = array();
					$kecamatan = $SheetDataKey['kecamatan'];
					$jenis_tanah = $SheetDataKey['jenis_tanah'];
					$kemiringan = $SheetDataKey['kemiringan'];
					$penggunaan_lahan = $SheetDataKey['penggunaan_lahan'];
					$orde_sungai = $SheetDataKey['orde_sungai'];
					$curah_hujan = $SheetDataKey['curah_hujan'];
					$luas_wilayah = $SheetDataKey['luas_wilayah'];
					$kecamatan = filter_var(trim($allDataInSheet[$i][$kecamatan]), FILTER_SANITIZE_STRING);
					$jenis_tanah = filter_var(trim($allDataInSheet[$i][$jenis_tanah]), FILTER_SANITIZE_NUMBER_INT);
					$kemiringan = filter_var(trim($allDataInSheet[$i][$kemiringan]), FILTER_SANITIZE_NUMBER_INT);
					$penggunaan_lahan = filter_var(trim($allDataInSheet[$i][$penggunaan_lahan]), FILTER_SANITIZE_NUMBER_INT);
					$orde_sungai = filter_var(trim($allDataInSheet[$i][$orde_sungai]), FILTER_SANITIZE_NUMBER_INT);
					$curah_hujan = filter_var(trim($allDataInSheet[$i][$curah_hujan]), FILTER_SANITIZE_NUMBER_INT);
					$luas_wilayah = filter_var(trim($allDataInSheet[$i][$luas_wilayah]), FILTER_SANITIZE_NUMBER_INT);
					$fetchData[] = array('kecamatan' => $kecamatan, 'jenis_tanah' => $jenis_tanah, 'kemiringan' => $kemiringan, 'penggunaan_lahan' => $penggunaan_lahan, 'orde_sungai' => $orde_sungai,'curah_hujan'=>$curah_hujan,'luas_wilayah'=>$luas_wilayah);
				}              
				$data['atribut'] = $fetchData;
				$this->dataset->setBatchImport($fetchData);
				$this->dataset->importData();
			} else {
				echo "Mohon masukkan data yang benar";
			}
		}
		redirect('admin/atribut','refresh');

	}

	/*============ batas ini ============*/


	public function centroid()
	{	
		$data['centroid'] = $this->cluster->getAll();
		$this->load->view('admin/centroid',$data);
		
	}
	public function ambilCentroid($id)
	{
		// $atribut = array($this->dataset->getbyID($id));
		$data['centroid'] = $this->cluster->getbyID($id);
		// foreach ($atribut as $key) {
		// echo $key->kecamatan;
		// }
		$this->load->view('admin/_partials/editCentroidModal.php', $data);
	}
	public function addCentroid()
	{
		$cluster = $this->cluster;
		$cluster->save();
		redirect(base_url('admin/admin/centroid'),'refresh');
	}
	public function editCentroid($id = null)
	{
		$this->cluster->update();
		redirect(base_url('admin/admin/centroid'),'refresh');
	}
	public function hapusCentroid($id=null)
	{
		$this->cluster->delete($id);
		redirect(base_url('admin/admin/centroid'),'refresh');
		
	}
	public function clustering()
	{	
		$data_atribut = $this->db->get('data_atribut');
		$q = "";
		if (count($data_atribut->result()<0)) {
			$this->db->truncate('rata2_atribut');
			foreach ($data_atribut->result() as $s) 
			{
				$rata2 = floor(($s->jenis_tanah+$s->kemiringan+$s->penggunaan_lahan+$s->orde_sungai+$s->curah_hujan)/5);
				$q = "insert into rata2_atribut (id,rata2) values ('".$s->id."','".$rata2."')";
				$this->db->query($q);	
			}
		} else {
			$this->db->truncate('rata2_atribut');
			foreach ($data_atribut->result() as $s) {
				$rata2 = floor(($s->jenis_tanah+$s->kemiringan+$s->penggunaan_lahan+$s->orde_sungai+$s->curah_hujan)/5);
				$q = "insert into rata2_atribut (id,rata2) values ('".$s->id."','".$rata2."')";
				$this->db->query($q);
			}
		}
		$data['atribut'] = $this->db->query('select * from data_atribut left join rata2_atribut on data_atribut.id=rata2_atribut.id');
		$this->load->view('admin/clustering',$data);
	}
	public function genCentroid()
	{
		$kluster = 5;
		//81-100 = sangat baik
		//70-80 = baik
		//60-69 = cukup
		//40-59 = kurang
		//0-39 = kurang sekali
		$data['c1'] = rand(81,100);
		$data['c2'] = rand(70,80);
		$data['c3'] = rand(60,69);
		$data['c4'] = rand(40,59);
		$data['c5'] = rand(0,39);
		$data_atribut = $this->db->query('select * from data_atribut left join rata2_atribut on data_atribut.id=rata2_atribut.id');
		$predikat = "";
		$this->db->truncate('hasil');
		foreach ($data_atribut->result() as $s) {
			$d1 = abs($s->rata2-$data['c1']); //96-90 = 6
			$d2 = abs($s->rata2-$data['c2']); // 78 - 75 = 3
			$d3 = abs($s->rata2-$data['c3']);
			$d4 = abs($s->rata2-$data['c4']);
			$d5 = abs($s->rata2-$data['c5']);
			$array_sort = array($d1,$d2,$d3,$d4,$d5);
			$arr_sort = $array_sort;
			for ($j=1; $j<=$kluster-1 ; $j++) { 
				for ($k=0; $k <=$kluster-2 ; $k++) { 
					if ($arr_sort[$k] > $arr_sort[$k+1]) {
						$temp = $arr_sort[$k];
						$arr_sort[$k] = $arr_sort[$k+1];
						$arr_sort[$k+1]=$temp;
					}
				}			
			}
			for ($i=0; $i <$kluster ; $i++) { 
				for ($r=0; $r <$kluster ; $r++) {	 
					if ($arr_sort[0]==$array_sort[$r]) {
						if($r==0) $predikat = "Banjir Tinggi";
						else if($r==1) $predikat="Banjir Mengengah";
						else if($r==2) $predikat="Banjir Rendah";
						else if($r==3) $predikat="Aman";
						else if($r==4) $predikat="Non Banjir";
					}
				}
			}
			$this->db->query("insert into hasil (id,predikat,d1,d2,d3,d4,d5) values('".$s->id."','".$predikat."','".$d1."','".$d2."','".$d3."','".$d4."','".$d5."')");			
		}
		$data['atribut'] = $this->db->query("select * from data_atribut left join (rata2_atribut,hasil) on data_atribut.id=rata2_atribut.id and data_atribut.id=hasil.id");
		$this->load->view('admin/generate_centroid', $data);
	}
	public function iterasi_kmeans(){
		$data['atribut'] = $this->db->query("select * from data_atribut");
		$data['cluster'] = $this->db->query("select * from data_cluster");

		$this->load->view('admin/kmeans_iterasi',$data);		
	}
	public function cekmax()
	{
		$max_iterasi=$this->db->query("select max(id) as m from hasil_centroid");
		foreach ($max_iterasi->result() as $m) {
			$id_2nd = $m->m;
		}
		$id_1st = $id_2nd-1;
		$ambilID_2 = $this->db->query("select * from hasil_centroid WHERE id='$id_2nd'");
		foreach ($ambilID_2->result() as $id) {
			$c1a_2 = $id->c1a;
			$c1b_2 = $id->c1b;
			$c1c_2 = $id->c1c;
			$c1d_2 = $id->c1d;
			$c1e_2 = $id->c1e;
			
			$c2a_2 = $id->c2a;
			$c2b_2 = $id->c2b;
			$c2c_2 = $id->c2c;
			$c2d_2 = $id->c2d;
			$c2e_2 = $id->c2e;

			$c3a_2 = $id->c3a;
			$c3b_2 = $id->c3b;
			$c3c_2 = $id->c3c;
			$c3d_2 = $id->c3d;
			$c3e_2 = $id->c3e;

			$c4a_2 = $id->c4a;
			$c4b_2 = $id->c4b;
			$c4c_2 = $id->c4c;
			$c4d_2 = $id->c4d;
			$c4e_2 = $id->c4e;

			$c5a_2 = $id->c5a;
			$c5b_2 = $id->c5b;
			$c5c_2 = $id->c5c;
			$c5d_2 = $id->c5d;
			$c5e_2 = $id->c5e;
		}
		$ambilID_1 = $this->db->query("select * from hasil_centroid WHERE id='$id_1st'");
		foreach ($ambilID_1->result() as $id) {
			$c1a_1 = $id->c1a;
			$c1b_1 = $id->c1b;
			$c1c_1 = $id->c1c;
			$c1d_1 = $id->c1d;
			$c1e_1 = $id->c1e;
			
			$c2a_1 = $id->c2a;
			$c2b_1 = $id->c2b;
			$c2c_1 = $id->c2c;
			$c2d_1 = $id->c2d;
			$c2e_1 = $id->c2e;

			$c3a_1 = $id->c3a;
			$c3b_1 = $id->c3b;
			$c3c_1 = $id->c3c;
			$c3d_1 = $id->c3d;
			$c3e_1 = $id->c3e;

			$c4a_1 = $id->c4a;
			$c4b_1 = $id->c4b;
			$c4c_1 = $id->c4c;
			$c4d_1 = $id->c4d;
			$c4e_1 = $id->c4e;

			$c5a_1 = $id->c5a;
			$c5b_1 = $id->c5b;
			$c5c_1 = $id->c5c;
			$c5d_1 = $id->c5d;
			$c5e_1 = $id->c5e;
		}
		if ($c1a_2==$c1a_1 && $c1b_2==$c1b_1 && $c1c_2==$c1c_1 && $c1d_2==$c1d_1 && $c1e_2==$c1e_1 && $c2a_2==$c2a_1 && $c2b_2==$c2b_1 && $c2c_2==$c2c_1 && $c2d_2==$c2d_1 && $c2e_2==$c2e_1 && $c3a_2==$c3a_1 && $c3b_2==$c3b_1 && $c3c_2==$c3c_1 && $c3d_2==$c3d_1 && $c3e_2==$c3e_1 && $c4a_2==$c4a_1 && $c4b_2==$c4b_1 && $c4c_2==$c4c_1 && $c4d_2==$c4d_1 && $c4e_2==$c4e_1 && $c5a_2==$c5a_1 && $c5b_2==$c5b_2 && $c5c_2==$c5c_1 && $c5d_2==$c5d_1 && $c5e_2==$c5e_1) {
			?>
			<script>
				alert("Proses iterasi berakhir pada tahap ke-<?php echo $id_2nd; ?>");
			</script>
			<?php 
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/admin/iterasi_kmeans_hasil'>";

		} else {
			$this->kmeans_next();
		}

	}
	function kmeans_next()
	{
		$hasil = $this->db->query("select * from hasil_centroid");
		$h = $hasil->row(0);
		$c1a = $h->c1a;
		$c1b = $h->c1b;
		$c1c = $h->c1c;
		$c1d = $h->c1d;
		$c1e = $h->c1e;

		// echo $c1a." ".$c1b." ".$c1c." ".$c1d." ".$c1e ;

		$c2a = $h->c2a;
		$c2b = $h->c2b;
		$c2c = $h->c2c;
		$c2d = $h->c2d;
		$c2e = $h->c2e;
		// echo "<br>";
		// echo $c2a." ".$c2b." ".$c2c." ".$c2d." ".$c2e ;

		$c3a = $h->c3a;
		$c3b = $h->c3b;
		$c3c = $h->c3c;
		$c3d = $h->c3d;
		$c3e = $h->c3e;
		// echo "<br>";
		// echo $c3a." ".$c3b." ".$c3c." ".$c3d." ".$c3e ;


		$c4a = $h->c4a;
		$c4b = $h->c4b;
		$c4c = $h->c4c;
		$c4d = $h->c4d;
		$c4e = $h->c4e;
		// echo "<br>";
		// echo $c4a." ".$c4b." ".$c4c." ".$c4d." ".$c4e ;

		$c5a = $h->c5a;
		$c5b = $h->c5b;
		$c5c = $h->c5c;
		$c5d = $h->c5d;
		$c5e = $h->c5e;
		// echo "<br>";
		// echo $c5a." ".$c5b." ".$c5c." ".$c5d." ".$c5e ;

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
		$this->db->truncate('hasil_cluster');

		$atribut = $this->db->query("select * from data_atribut");
		foreach ($atribut->result() as $key) {
			$aidi = $key->id;
			$hc1 = sqrt(pow(($key->jenis_tanah-$c1a), 2)+pow($key->kemiringan-$c1b, 2)+pow($key->penggunaan_lahan-$c1c, 2)+pow($key->orde_sungai-$c1d, 2)+pow($key->curah_hujan-$c1e, 2));
			$hc2 = sqrt(pow(($key->jenis_tanah-$c2a), 2)+pow($key->kemiringan-$c2b, 2)+pow($key->penggunaan_lahan-$c2c, 2)+pow($key->orde_sungai-$c2d, 2)+pow($key->curah_hujan-$c2e, 2));
			$hc3 = sqrt(pow(($key->jenis_tanah-$c3a), 2)+pow($key->kemiringan-$c3b, 2)+pow($key->penggunaan_lahan-$c3c, 2)+pow($key->orde_sungai-$c3d, 2)+pow($key->curah_hujan-$c3e, 2));
			$hc4 = sqrt(pow(($key->jenis_tanah-$c4a), 2)+pow($key->kemiringan-$c4b, 2)+pow($key->penggunaan_lahan-$c4c, 2)+pow($key->orde_sungai-$c4d, 2)+pow($key->curah_hujan-$c4e, 2));
			$hc5 = sqrt(pow(($key->jenis_tanah-$c5a), 2)+pow($key->kemiringan-$c5b, 2)+pow($key->penggunaan_lahan-$c5c, 2)+pow($key->orde_sungai-$c5d, 2)+pow($key->curah_hujan-$c5e, 2));

        	//Penentuan C1
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
			$cluster = "";
			if ($arr_c1[$no]==1) {
				$cluster = "C1";
			}if ($arr_c2[$no]==1) {
				$cluster = "C2";
			}if ($arr_c3[$no]==1) {
				$cluster = "C3";
			}if ($arr_c4[$no]==1) {
				$cluster = "C4";
			}if ($arr_c5[$no]==1) {
				$cluster = "C5";
			}
			$id="";
			$id=$this->db->query("select max(id) as m from hasil_centroid");
			foreach ($id->result() as $key) {
				$id = $key->m;
			}
			$this->db->where('id', $id);
			$data['centroid'] = $this->db->get('hasil_centroid');
			$data['id'] = $id+1;
			$urutan_iterasi = $data['id'];
			$q = "insert into centroid_temp(iterasi,c1,c2,c3,c4,c5) values('".$urutan_iterasi."','".$arr_c1[$no]."','".$arr_c2[$no]."','".$arr_c3[$no]."','".$arr_c4[$no]."','".$arr_c5[$no]."')";
			$this->db->query($q);
			$no++;
			$this->id_atribut = $aidi;
			$this->hasil_cluster = $cluster;
			$this->d1 = $hc1;
			$this->d2 = $hc2;
			$this->d3 = $hc3;
			$this->d4 = $hc4;
			$this->d5 = $hc5;
			$this->db->insert('hasil_cluster', $this);
		}

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

		$this->cekmax();
	}
	public function iterasi_kmeans_hasil()
	{
		$data['hasil_cluster'] = $this->db->query("select * from data_atribut join hasil_cluster on data_atribut.id=hasil_cluster.id_atribut");
		$this->load->view('admin/hasil_clustering', $data);
	}
	public function mapping()
	{
		$data['hasil_cluster'] = $this->db->query("select * from data_atribut join hasil_cluster on data_atribut.id=hasil_cluster.id_atribut")->result();
		$this->load->view('admin/mappingbencana',$data);
	}
}

/* End of file Admin.php */
/* Location: ./application/controllers/admin/Admin.php */