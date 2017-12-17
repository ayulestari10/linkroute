<?php  

class Admin extends CI_Controller{
	protected $data;
	function __construct(){
		parent::__construct();

		$nim 	= $this->session->userdata('nim');
		$role 	= $this->session->userdata('role');
		
		if(!isset($nim, $role) && $role != 'admin'){
			redirect('login');
			$this->session->set_flashdata('msg', '<div class="alert alert-danger">Anda tidak terdaftar sebagai admin!</div>');
			exit;
		}
		
		$this->load->model('Peserta_model');
		$this->data['admin'] = $this->db->query('SELECT * FROM data WHERE nim="'.$nim.'" AND role="' . $role . '"')->row();
	}

	function index(){
		$data = array(
			'title'		=> 'Daftar Peserta | Oprec BEM 2017',
			'content'	=> 'list_peserta',
			'data'		=> $this->db->query('SELECT * FROM data WHERE dinas1="' . $this->data['admin']->dinas1 . '" or dinas2="' . $this->data['admin']->dinas1 . '"')->result()
		);
		$this->load->view('frames/templates', $data);
	}

	function detail_peserta(){
		$id =  $this->uri->segment(3);
		
		$data = array(
			'title'		=> 'Detail Peserta',
			'content'	=> 'detail_peserta',
			'dt'		=> $this->Peserta_model->get_dataBy_Id($id)
		);
		$this->load->view('frames/templates', $data);
	}

	function hasil(){
		if($this->input->post('save')){

		}

	}
}

?>