<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Atribut_CH extends CI_Controller {

	private $tabel = "data_ch";
	public function __construct()
	{
		parent::__construct();
		$this->load->model('atribut');

	}

	// List all your items
	public function index()
	{
		$data['judul'] = "Data Curah Hujan";
		$data['ch'] = $this->atribut->getAll($this->tabel);
		$this->load->view('admin/data_CH', $data);
	}
	function ambilAtribut($kecamatan)
	{
		
		$d['ch'] = $this->db->query("select * from $this->tabel where kecamatan = '$kecamatan'")->result();
		$this->load->view('admin/edit_data_CH',$d);
	}
	// Add a new item
	public function add()
	{

	}

	//Update one item
	public function update( $id = NULL )
	{
		$post = $this->input->post();
		$kecamatan = $post['kecamatan'];
		$ch = $post['ch'];
		
		$this->db->query("update $this->tabel set kecamatan='$kecamatan', rata2='$ch' where kecamatan='$kecamatan'");
		$_SESSION['cek_tf'] = '1';
		redirect(base_url('admin/atribut_CH'),'refresh');
	}

	//Delete one item
	public function delete( $id = NULL )
	{

	}
}

/* End of file Atribut_j_tanah.php */
/* Location: ./application/controllers/admin/Atribut_j_tanah.php */
