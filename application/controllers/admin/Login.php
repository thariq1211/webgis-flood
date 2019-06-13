<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user');
	}

	
	public function index()
	{
		$this->load->view('login');
	}

	public function login_proses()
	{
		$user = $this->input->post('namapengguna');
		$pass = $this->input->post('sandi');
		$login = $this->user->cek_user($user,$pass);
		if (!empty($login)) { 
            // login berhasil 
			$this->session->set_userdata($login);
			$_SESSION['cek_login'] = '1';
			// $this->session->set_userdata('cek_login','1'); 
			redirect(base_url('admin/overview'));
		} else { 
            // login gagal 
			$this->session->set_flashdata('gagal', 'Username atau Password Salah!'); 
			redirect(base_url('admin/login')); 
		} 

	}
	public function logout()
	{
		$login = null;
		$this->session->set_userdata($login);
		$this->session->set_userdata('cek_login','0');
		redirect(base_url(),'refresh');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/admin/Login.php */