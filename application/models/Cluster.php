<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cluster extends CI_Model {
	private $_table = "data_cluster";
	public $id_cluster;
	public $sample_cluster;
	public $njenis_tanah;
	public $nkemiringan;
	public $nlahan;
	public $norde_sungai;
	public $nCH;

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}
	public function getRow()
	{
		$res = $this->db->get($this->_table);
		return $res->result_array();
		
	}	
	public function getByID($ID)
	{
		return $this->db->get_where($this->_table, ["id_cluster" => $ID])->row();
	}
	public function save()
	{
		$post = $this->input->post();
		$this->sample_cluster = $post['sample_cluster'];
		$this->njenis_tanah = $post['njenis_tanah'];
		$this->nkemiringan = $post['nkemiringan'];
		$this->nlahan = $post['nlahan'];
		$this->norde_sungai = $post['norde_sungai'];
		$this->nCH = $post['nCH'];
		$this->db->insert($this->_table,$this);
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
	public function delete($id)
	{
		$this->db->delete($this->_table,array('id_cluster'=>$id));
	}

	public function getHasil_cluster()
	{
		return $this->db->query("select * from data_atribut join hasil_cluster on data_atribut.id=hasil_cluster.id_atribut order by hasil_cluster")->result();
	}
}

/* End of file Cluster.php */
/* Location: ./application/models/Cluster.php */