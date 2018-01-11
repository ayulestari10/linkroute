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
			$username 	= $this->input->post('username');
			$password	=  $this->input->post('password');

			if(!empty($username) && !empty($password)){
				$data = [
					'username'	=> $username,
					'password'	=> md5($password)
				];

				$result = $this->user_model->login($data);

				if($result != NULL){
					redirect('Admin');
				}
				else {
					$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="text-align:center;">Username or password incorrect!</div>');
					redirect('Login');
				}
			}
			else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="text-align:center;">Please fill out every fill!</div>');
				redirect('Login');
			}
		}
		
		$this->load->view('login1');
	}
}

?>