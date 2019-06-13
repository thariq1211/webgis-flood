<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function cek_user($username, $password) {
		$this->db->where("email = '$username' or username = '$username'");
		$this->db->where('password', md5($password));
		$query = $this->db->get('akun');
		return $query->row_array();
	}

}

/* End of file User.php */
/* Location: ./application/models/User.php */