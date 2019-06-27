<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Atribut_buffer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('atribut');

	}

	// List all your items
	public function index()
	{
		$data['judul'] = "Data Buffer Sungai";
		$tabel = "data_buffer_sungai";
		$data['buffer'] = $this->atribut->getAll($tabel);
		$this->load->view('admin/data_Buffer', $data);
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
