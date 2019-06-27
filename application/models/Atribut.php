<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Atribut extends CI_Model {

	

	public function __construct()
	{
		parent::__construct();
		
	}
	public function getAll($table)
	{
		return $this->db->get($table)->result();
	}
	public function getRow($table)
	{
		$res = $this->db->get($table);
		return $res->result_array();
		
	}	
	public function getByID($table, $ID)
	{
		return $this->db->get_where($table, ["id_cluster" => $ID])->row();
	}
	public function save($table)
	{
		$post = $this->input->post();
		$this->sample_cluster = $post['sample_cluster'];
		$this->njenis_tanah = $post['njenis_tanah'];
		$this->nkemiringan = $post['nkemiringan'];
		$this->nlahan = $post['nlahan'];
		$this->norde_sungai = $post['norde_sungai'];
		$this->nCH = $post['nCH'];
		$this->db->insert($table);
	}
	public function update()
	{
		$post = $this->input->post();
		$id = $post['id_cluster'];
		$sample_cluster= $post['sample_cluster'];
		$njenis_tanah= $post['njenis_tanah'];
		$nkemiringan= $post['nkemiringan'];
		$nlahan= $post['nlahan'];
		$norde_sungai= $post['norde_sungai'];
		$nCH= $post['nCH'];
		// $this->db->update($this->_table, $this, array('id_cluster' => $post['id_cluster']));
		$this->db->query("UPDATE data_cluster SET sample_cluster = '$sample_cluster', njenis_tanah = '$njenis_tanah', nkemiringan = '$nkemiringan', nlahan = '$nlahan', norde_sungai = '$norde_sungai', nCH = '$nCH' WHERE id_cluster = '$id'
");
	}
	public function delete($table, $id)
	{
		$this->db->delete($table,array('id_cluster'=>$id));
	}

	public function getHasil_cluster()
	{
		
	}
}



/* End of file Atribut.php */
/* Location: ./application/models/Atribut.php */