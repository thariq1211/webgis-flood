<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Atribut_landuse extends CI_Controller {

		private $tabel = "data_penggunaan_lahan";
	public function __construct()
	{
		parent::__construct();
		$this->load->model('atribut');

	}

	// List all your items
	public function index()
	{
		$data['judul'] = "Data Penggunaan Lahan";
		$data['landuse'] = $this->atribut->getAll($this->tabel);
		$this->load->view('admin/data_Landuse', $data);
	}

	// Add a new item
	public function add()
	{

	}

	//Update one item
	public function update( $id = NULL )
	{

	}

	//Delete one item
	public function delete( $id = NULL )
	{

	}
	function proses_transformasi()
	{
		$this->db->truncate('n_transformasi_landuse');
		$jumlahData = $this->db->query('select count(jenis_tanah) as jumlah from data_jenis_tanah')->result();
		foreach ($jumlahData as $k){
			$n_data = $k->jumlah;
		}
		$jml_b1 = $this->db->query('select COUNT(penggunaan_lahan) as b1 FROM `data_penggunaan_lahan` WHERE bobot=1')->result();
		foreach ($jml_b1 as $k) {
			$n_b1 = $k->b1;
		}
		$jml_b2 = $this->db->query('select COUNT(penggunaan_lahan) as b2 FROM `data_penggunaan_lahan` WHERE bobot=2')->result();
		foreach ($jml_b2 as $k) {
			$n_b2 = $k->b2;
		}
		$jml_b3 = $this->db->query('select COUNT(penggunaan_lahan) as b3 FROM `data_penggunaan_lahan` WHERE bobot=3')->result();
		foreach ($jml_b3 as $k) {
			$n_b3 = $k->b3;
		}
		$jml_b4 = $this->db->query('select COUNT(penggunaan_lahan) as b4 FROM `data_penggunaan_lahan` WHERE bobot=4')->result();
		foreach ($jml_b4 as $k) {
			$n_b4 = $k->b4;
		}
		$jml_b5 = $this->db->query('select COUNT(penggunaan_lahan) as b5 FROM `data_penggunaan_lahan` WHERE bobot=5')->result();
		foreach ($jml_b5 as $k) {
			$n_b5 = $k->b5;
		}
		$jml_b6 = $this->db->query('select COUNT(penggunaan_lahan) as b6 FROM `data_penggunaan_lahan` WHERE bobot=6')->result();
		foreach ($jml_b6 as $k) {
			$n_b6 = $k->b6;
		}
		$jml_b7 = $this->db->query('select COUNT(penggunaan_lahan) as b7 FROM `data_penggunaan_lahan` WHERE bobot=7')->result();
		foreach ($jml_b7 as $k) {
			$n_b7 = $k->b7;
		}
		$jml_b8 = $this->db->query('select COUNT(penggunaan_lahan) as b8 FROM `data_penggunaan_lahan` WHERE bobot=8')->result();
		foreach ($jml_b8 as $k) {
			$n_b8 = $k->b8;
		}
		//total data
		$nF = $n_b1+$n_b2+$n_b3+$n_b4+$n_b5+$n_b6+$n_b7+$n_b8;
		// perhitungan frekuensi
		$f_1 = $n_b1*1; $f_2 = $n_b2*2; $f_3 = $n_b3*3; $f_4 = $n_b4*4; 
		$f_5 = $n_b5*5; $f_6 = $n_b6*6; $f_7 = $n_b7*7; $f_8 = $n_b8*8;
		$frekArr = array ($f_1, $f_2, $f_3, $f_4, $f_5, $f_6, $f_7, $f_8);
		// perhitungan proporsi
		$prop1 = $n_b1/$nF; $prop2 = $n_b2/$nF; $prop3 = $n_b3/$nF; $prop4 = $n_b4/$nF;
		$prop5 = $n_b5/$nF; $prop6 = $n_b6/$nF; $prop7 = $n_b7/$nF; $prop8 = $n_b8/$nF;
		$propArr = array ($prop1, $prop2, $prop3, $prop4, $prop5, $prop6, $prop7, $prop8);
		//perhitungan proporsi kumulatif
		$prop_kum1 = $prop1; $prop_kum2 = $prop2+$prop_kum1; $prop_kum3 = $prop3+$prop_kum2;
		$prop_kum4 = $prop4+$prop_kum3; $prop_kum5 = $prop5+$prop_kum4; $prop_kum6 = $prop6+$prop_kum5;
		$prop_kum7 = $prop7+$prop_kum6; $prop_kum8 = $prop8+$prop_kum7;
		$prop_kumArr = array($prop_kum1, $prop_kum2, $prop_kum3, $prop_kum4, $prop_kum5, $prop_kum6, $prop_kum7,$prop_kum8);
		//perhitungan probabilitas
		$z_val1 = $this->NormSInv($prop_kum1); $z_val2 = $this->NormSInv($prop_kum2);
		$z_val3 = $this->NormSInv($prop_kum3); $z_val4 = $this->NormSInv($prop_kum4);
		$z_val5 = $this->NormSInv($prop_kum5); $z_val6 = $this->NormSInv($prop_kum6);
		$z_val7 = $this->NormSInv($prop_kum7); $z_val8 = 0;
		$z_valArr = array($z_val1, $z_val2, $z_val3, $z_val4, $z_val5, $z_val6, $z_val7,$z_val8);
		// perhitungan nilai densitas
		$z_val1_ = $this->NORMDIST($z_val1,0,1,0); $z_val2_ = $this->NORMDIST($z_val2,0,1,0);
		$z_val3_ = $this->NORMDIST($z_val3,0,1,0); $z_val4_ = $this->NORMDIST($z_val4,0,1,0);
		$z_val5_ = $this->NORMDIST($z_val5,0,1,0); $z_val6_ = $this->NORMDIST($z_val6,0,1,0);
		$z_val7_ = $this->NORMDIST($z_val7,0,1,0); $z_val8_ = 0;
		$z_val_Arr = array($z_val1_, $z_val2_, $z_val3_, $z_val4_, $z_val5_, $z_val6_, $z_val7_, $z_val8_);
		// penghitungan nilai skala
		$skala1 = (0-$z_val1_)/($prop_kum1-0);
		$skala2 = ($z_val1_-$z_val2_)/($prop_kum2-$prop_kum1);
		$skala3 = ($z_val2_-$z_val3_)/($prop_kum3-$prop_kum2);
		$skala4 = ($z_val3_-$z_val4_)/($prop_kum4-$prop_kum3);
		$skala5 = ($z_val4_-$z_val5_)/($prop_kum5-$prop_kum4);
		$skala6 = ($z_val5_-$z_val6_)/($prop_kum6-$prop_kum5);
		$skala7 = ($z_val6_-$z_val7_)/($prop_kum7-$prop_kum6);
		$skala8 = ($z_val7_-$z_val8_)/($prop_kum8-$prop_kum7);
		$skalaArr = array($skala1, $skala2, $skala3, $skala4, $skala5, $skala6, $skala7,$skala8);
		//perhitungan nilai transformasi
		$nmin = min($skala1, $skala2, $skala3, $skala4, $skala5, $skala6);
		$tf1 = $skala1+(abs($nmin)+1);$tf2 = $skala2+(abs($nmin)+1);
		$tf3 = $skala3+(abs($nmin)+1);$tf4 = $skala4+(abs($nmin)+1);
		$tf5 = $skala5+(abs($nmin)+1);$tf6 = $skala6+(abs($nmin)+1);
		$tf7 = $skala7+(abs($nmin)+1);$tf8 = $skala8+(abs($nmin)+1);
		$tfArr = array($tf1, $tf2, $tf3, $tf4, $tf5, $tf6, $tf7, $tf8);

		for ($i = 0; $i < 8 ; $i++) {
			$or = $i+1;
			$coba =
			$query = $this->db->query("insert into n_transformasi_landuse (id, ordinal, frekuensi, proporsi, proporsi_kum, z_score, z_score_, densitas, transformasi) values (NULL, '$or', '$frekArr[$i]', '$propArr[$i]', '$prop_kumArr[$i]', '$z_valArr[$i]', '$z_val_Arr[$i]', '$skalaArr[$i]', '$tfArr[$i]')");
		}
		$landuse = $this->atribut->getAll($this->tabel);
		foreach ($landuse as $v) {
			$query1 = $this->db->query("update $this->tabel set n_transformasi = '$tf1' where bobot = 1");
			$query2 = $this->db->query("update $this->tabel set n_transformasi = '$tf2' where bobot = 2");
			$query3 = $this->db->query("update $this->tabel set n_transformasi = '$tf3' where bobot = 3");
			$query4 = $this->db->query("update $this->tabel set n_transformasi = '$tf4' where bobot = 4");
			$query5 = $this->db->query("update $this->tabel set n_transformasi = '$tf5' where bobot = 5");
			$query6 = $this->db->query("update $this->tabel set n_transformasi = '$tf6' where bobot = 6");
			$query7 = $this->db->query("update $this->tabel set n_transformasi = '$tf7' where bobot = 7");
			$query8 = $this->db->query("update $this->tabel set n_transformasi = '$tf8' where bobot = 8");

		}

	}
function hitungNTF()
	{
		$landuse = $this->db->query("select kecamatan, AVG(n_transformasi) AS rata2 FROM data_penggunaan_lahan GROUP BY kecamatan
")->result();
		foreach ($landuse as $v) {
			$k = $v->rata2;
			$kec = $v->kecamatan;
		$query = $this->db->query("update data_atribut set penggunaan_lahan = $k where kecamatan = '$kec'");
		}
	}

		function NormSInv($probability) {
			$a1 = -39.6968302866538; 
			$a2 = 220.946098424521;
			$a3 = -275.928510446969;
			$a4 = 138.357751867269;
			$a5 = -30.6647980661472;
			$a6 = 2.50662827745924;

			$b1 = -54.4760987982241;
			$b2 = 161.585836858041;
			$b3 = -155.698979859887;
			$b4 = 66.8013118877197;
			$b5 = -13.2806815528857;

			$c1 = -7.78489400243029E-03;
			$c2 = -0.322396458041136;
			$c3 = -2.40075827716184;
			$c4 = -2.54973253934373;
			$c5 = 4.37466414146497;
			$c6 = 2.93816398269878;

			$d1 = 7.78469570904146E-03;
			$d2 = 0.32246712907004;
			$d3 = 2.445134137143;
			$d4 =  3.75440866190742;

			$p_low = 0.02425;
			$p_high = 1 - $p_low;
			$q = 0;
			$r = 0;
			$normSInv = 0;
			if ($probability < 0 ||
				$probability > 1)
			{
				throw new \Exception("normSInv: Argument out of range.");
			} else if ($probability < $p_low) {

				$q = sqrt(-2 * log($probability));
				$normSInv = ((((($c1 * $q + $c2) * $q + $c3) * $q + $c4) * $q + $c5) * $q + $c6) / (((($d1 * $q + $d2) * $q + $d3) * $q + $d4) * $q + 1);

			} else if ($probability <= $p_high) {

				$q = $probability - 0.5;
				$r = $q * $q;
				$normSInv = ((((($a1 * $r + $a2) * $r + $a3) * $r + $a4) * $r + $a5) * $r + $a6) * $q / ((((($b1 * $r + $b2) * $r + $b3) * $r + $b4) * $r + $b5) * $r + 1);

			} else {

				$q = sqrt(-2 * log(1 - $probability));
				$normSInv = -((((($c1 * $q + $c2) * $q + $c3) * $q + $c4) * $q + $c5) * $q + $c6) /(((($d1 * $q + $d2) * $q + $d3) * $q + $d4) * $q + 1);

			}

			return $normSInv;
		}

	//This is the error function used in the NORMDIST() function further down the page
		function _erfVal($x) {
			if (abs($x) > 2.2) {
				return 1 - $this->_erfcVal($x);
			}
			$sum = $term = $x;
			$xsqr = pow($x,2);
			$j = 1;
			do {
				$term *= $xsqr / $j;
				$sum -= $term / (2 * $j + 1);
				++$j;
				$term *= $xsqr / $j;
				$sum += $term / (2 * $j + 1);
				++$j;
				if ($sum == 0) {
					break;
				}
			} while (abs($term / $sum) > $this->$_rel_error);
			return $this->$_two_sqrtpi * $sum;
        }    //    function _erfVal()

// I am not sure what this function does but it is used in the NORMDIST() function further down the page
        function flattenSingleValue($value = '') {
        	if (is_array($value)) {
        		$value = $this->flattenSingleValue(array_pop($value));
        	}
        	return $value;
        }    //    function flattenSingleValue()

//Function used to calculate the normal distribution THIS IS WHERE THE MAGIC HAPPENS 
        function NORMDIST($value, $mean, $stdDev, $cumulative) {
        	$value    = $this->flattenSingleValue($value);
        	$mean    = $this->flattenSingleValue($mean);
        	$stdDev    = $this->flattenSingleValue($stdDev);

        	if ((is_numeric($value)) && (is_numeric($mean)) && (is_numeric($stdDev))) {
        		if ($stdDev < 0) {
        			return $this->$_errorCodes['num'];
        		}
        		if ((is_numeric($cumulative)) || (is_bool($cumulative))) {
        			if ($cumulative) {
        				return 0.5 * (1 + $this->_erfVal(($value - $mean) / ($stdDev * sqrt(2))));
        			} else {
        				return (1 / (sqrt(2*3.14159265358979323846) * $stdDev)) * exp(0 - (pow($value - $mean,2) / (2 * pow($stdDev,2))));
        			}
        		}
        	}
        	return $this->$_errorCodes['value'];
        }    //    function NORMDIST()

    }

    /* End of file Atribut_j_tanah.php */
    /* Location: ./application/controllers/admin/Atribut_j_tanah.php */
