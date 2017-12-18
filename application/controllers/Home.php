<?php  

class Home extends CI_Controller{

	function index(){
		$data = array(
			'title'		=> 'Oprec BEM 2017',
			'content'	=> 'dashboard'
		);
		$this->load->view('frames/templates', $data);
	}

	function route(){
		$data = array(
			'title'		=> 'Route',
			'content'	=> 'route'
		);
		$this->load->view('frames/templates', $data);
	}	
}

?>