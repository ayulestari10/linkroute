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
			'content'	=> 'linkroute',
			'site' 		=> $this->linkroute_model->get_all()
		);
		$this->load->view('frames/templates', $data);
	}

	function site(){
		$data = array(
			'title'		=> 'Site Table',
			'content'	=> 'site',
			'site'		=> $this->site_model->get_all()
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

	public function openCSV(){
		$file = file('assets/linkroutebelitung.csv');
		foreach ($file as $k) {
			$csv[] = explode(';', $k);
		}
		echo '<pre>';
		print_r($csv);
		echo '</pre>';
	}

	function input_site(){
		$data = array(
			'title'		=> 'Input Form',
			'content'	=> 'input_site'
		);
		$this->load->view('frames/templates', $data);
	}

	function input_linkroute(){
		$data = array(
			'title'		=> 'Input Form',
			'content'	=> 'input_linkroute'
		);
		$this->load->view('frames/templates', $data);
	}

	function edit_site(){
		$data = array(
			'title'		=> 'Edit Form',
			'content'	=> 'edit_site'
		);
		$this->load->view('frames/templates', $data);
	}

	function edit_linkroute(){
		$data = array(
			'title'		=> 'Edit Form',
			'content'	=> 'edit_linkroute'
		);
		$this->load->view('frames/templates', $data);
	}

}

?>