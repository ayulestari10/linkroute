<?php  

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('user_model');

		$username = $this->session->userdata('username');
		if (isset($username))
		{
			redirect('admin');
			exit;
		}
	}

	public function index(){
		if ($this->input->post('login-submit'))
		{
			$data = [
				'username'	=> $this->input->post('username'),
				'password'	=> md5($this->input->post('password'))
			];

			$result = $this->user_model->login($data);

			redirect('login');
		}
		
		$this->load->view('login');
	}
}

?>