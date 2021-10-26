<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('m_login');
	}

	public function index()
	{
		$this->load->view('Login');
		$this->session->sess_destroy();
	}

	function proses()
	{


		$where = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
		);

		$cek = $this->m_login->cek_login('pengguna', $where)->num_rows(); //cheking proses when there an exist id
		$query = $this->m_login->cek_login('pengguna', $where)->row();
		//getting some data from table Login

		#proses cheking while data is already exist
		if ($cek > 0) // is data avaible ?
		{
			if ($query->role == 'peternakayam') {
				$data_session = array(
					'nama' => $query->nama_lengkap,
					'stat' => 'Login',
					'ha' => $query->role,
				);
				$this->session->set_userdata($data_session);
				redirect('peternakayam/', 'refresh');
			} else {
				$data_session = array(
					'nama' => $query->nama_lengkap,
					'stat' => 'Login',
					'ha' => $query->role,
				);
				$this->session->set_userdata($data_session);
				redirect('Admin', 'refresh');
			}
		} else {
			$this->session->set_flashdata(
				'msg',
				'<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4>Ooops... ! ! ! USER ATAU PASSWORD SALAH</h4>
				</div>'
			);
			redirect('Login', 'refresh');
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		$data = array(
			'alert' => $this->session->flashdata('Berhasil Logout')
		);
		redirect('Login', 'refresh', $data);
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */