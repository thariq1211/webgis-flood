<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataset extends CI_Model {

	private	$_table = 'data_atribut';
	private $_batchimport;

	public $id;
	public $kecamatan;
	public $jenis_tanah;
	public $kemiringan;
	public $penggunaan_lahan;
	public $orde_sungai;
	public $curah_hujan;
	public $luas_wilayah;

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}
	public function getbyID($id)
	{
		// $this->db->get_where($this->_table,$where);
		return $this->db->get_where($this->_table, ["id" => $id])->row();
		// $this->db->where('id', 3);
		// $this->db->get($this->_table);
	}
	public function save()
	{
		$post = $this->input->post();
		$this->kecamatan = $post['kecamatan'];
		$this->jenis_tanah = $post['jenis_tanah'];
		$this->kemiringan = $post['kemiringan'];
		$this->penggunaan_lahan = $post['penggunaan_lahan'];
		$this->orde_sungai = $post['orde_sungai'];
		$this->curah_hujan = $post['curah_hujan'];
		$this->luas_wilayah = $post['luas_wilayah'];
		$this->db->insert($this->_table, $this);
	}
	public function update()
	{
		$post = $this->input->post();
		$this->id = $post['id'];
		$this->kecamatan = $post['kecamatan'];
		$this->jenis_tanah = $post['jenis_tanah'];
		$this->kemiringan = $post['kemiringan'];
		$this->penggunaan_lahan = $post['penggunaan_lahan'];
		$this->orde_sungai = $post['orde_sungai'];
		$this->curah_hujan = $post['curah_hujan'];
		$this->luas_wilayah = $post['luas_wilayah'];
		$this->db->update($this->_table, $this, array('id' => $post['id']));
	}
	public function delete($id)
	{
		return $this->db->delete($this->_table, array('id' => $id));
	}
	public function setBatchImport($batchimport)
	{
		$this->_batchimport = $batchimport;
	}
	public function importData()
	{
		$data = $this->_batchimport;
		$this->db->insert_batch($this->_table, $data);
	}
}

/* End of file Dataset.php */
/* Location: ./application/models/Dataset.php */