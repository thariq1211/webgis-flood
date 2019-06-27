<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Atribut_CH extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('atribut');

	}

	// List all your items
	public function index()
	{
		$data['judul'] = "Data Curah Hujan";
		$tabel = "data_ch";
		$data['ch'] = $this->atribut->getAll($tabel);
		$this->load->view('admin/data_CH', $data);
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
}

/* End of file Atribut_j_tanah.php */
/* Location: ./application/controllers/admin/Atribut_j_tanah.php */
