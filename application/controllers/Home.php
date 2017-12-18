<?php  

class Home extends CI_Controller{

	public function __construct(){
		parent::__construct();

		$this->load->model('site_model');
		$this->load->model('linkroute_model');
	}


	public function index(){
		$data = array(
			'title'		=> 'Link Route',
			'content'	=> 'dashboard'
		);
		$this->load->view('frames/templates', $data);
	}

	function linkroute(){
		$data = array(
			'title'		=> 'Link Route Table',
			'content'	=> 'linkroute'
		);
		$this->load->view('frames/templates', $data);
	}

	function site(){
		$data = array(
			'title'		=> 'Site Table',
			'content'	=> 'site'
		);
		$this->load->view('frames/templates', $data);
	}

	public function SearchingRoute(){

		if($this->input->post('site') && $this->input->post('band')){
			echo "hay";exit;

			$hasil_pencarian = $this->linkroute_model->getRoute($this->input->post('site'), $this->input->post('band'));
			exit;
		}


		$data = array(
			'title'		=> 'Route',
			'content'	=> 'searchingroute',
			'site'		=> $this->site_model->get_all()
		);
		$this->load->view('frames/templates', $data);
	}	
}

?>