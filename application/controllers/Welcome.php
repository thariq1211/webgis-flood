<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('dataset');
		$this->load->model('cluster');
	}
	public function index()
	{
		$data['kecamatan'] = $this->db->query('select count(kecamatan) as kec from data_atribut');
		$data['centroid'] = $this->db->query('select count(sample_cluster) as cen from data_cluster');
		$data['iterasi'] = $this->db->query('select max(iterasi) as it from centroid_temp');
		$data['hc'] = $this->db->query('select max(hc) as hc, hasil_cluster from (select hasil_cluster, count( * ) as hc from hasil_cluster group by hasil_cluster) as A');
		$this->load->view('home',$data);
	}
	public function datajember()
	{	$data['atribut'] = $this->dataset->getAll();
		$this->load->view('datawilayah.php',$data);
	}
	public function hasilCluster()
	{	
		$data['C1'] = $this->db->query("select count(hasil_cluster) as c1 from hasil_cluster where hasil_cluster='C1'")->result();
		$data['C2'] = $this->db->query("select count(hasil_cluster) as c2 from hasil_cluster where hasil_cluster='C2'")->result();
		$data['C3'] = $this->db->query("select count(hasil_cluster) as c3 from hasil_cluster where hasil_cluster='C3'")->result();
		$data['C4'] = $this->db->query("select count(hasil_cluster) as c4 from hasil_cluster where hasil_cluster='C4'")->result();
		$data['C5'] = $this->db->query("select count(hasil_cluster) as c5 from hasil_cluster where hasil_cluster='C5'")->result();
		$data['hasil_cluster'] = $this->cluster->getHasil_cluster();
		$this->load->view('hasilclustering.php',$data);
	}
	public function petabanjir()
	{
		$data['hasil_cluster'] = $this->db->query("select * from data_atribut join hasil_cluster on data_atribut.id=hasil_cluster.id_atribut");
        $this->load->view('mappingbanjir.php',$data);
	}
	
	
}
