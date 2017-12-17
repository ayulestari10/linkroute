<?php  

class Login extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Login_model');
		$this->load->model('Peserta_model');
	}

	function index(){
		$data = array(
			'title'		=> 'Login',
			'content'	=> 'login'
		);
		$this->load->view('frames/templates', $data);
	}

	function peserta(){
		if($this->input->post('login')){
			$nim 		= $this->input->post('nim');
			$password 	= $this->input->post('password');
			$data = array(
				'nim'		=> $nim,
				'password'	=> md5($password)
			);

			if(isset($nim)AND isset($password)){
				$data = $this->Login_model->cek_login($data);
				if($data == 1){	
					$role = $this->Peserta_model->get_role($nim);		
					if($role == 'mhs'){
						$this->session->set_userdata('nim', $nim);
						$this->session->set_userdata('role', $role);
						
						date_default_timezone_set("Asia/Jakarta");

						$data = array(
							'waktu'		=> date("d-m-Y"),
							'ip'		=> $this->input->ip_address() 
						);
						$this->Peserta_model->update($nim, $data);
						redirect('Peserta/pengumuman');
						exit;
					} elseif($role == 'admin') {
						$this->session->set_userdata('nim', $nim);
						$this->session->set_userdata('role', $role);
						redirect('Admin');
						exit;
					} elseif($role == 'super admin'){
						$this->session->set_userdata('nim', $nim);
						$this->session->set_userdata('role', $role);
						redirect('super_admin');
						exit;
					} elseif($role == 's_admin'){
						$this->session->set_userdata('nim', $nim);
						$this->session->set_userdata('role', $role);
						redirect('super_admin');
						exit;
					}
				} else {
					$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="text-align:center;">Akun anda tidak benar!</div>');
					redirect('Login/peserta');
					exit;
				}
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="text-align:center;">Gagal masuk!</div>');
				redirect('Login/peserta');
				exit;
			}
		}
		$data = array(
			'title'		=> 'Login',
			'content'	=> 'login'
		);
		$this->load->view('frames/templates', $data);
	}
}

?>