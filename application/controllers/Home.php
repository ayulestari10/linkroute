<?php  

class Home extends CI_Controller{

	function index(){
		$data = array(
			'title'		=> 'Link Route',
			'content'	=> 'dashboard'
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

	function linkroute(){
		$data = array(
			'title'		=> 'Link Route Table',
			'content'	=> 'linkroute'
		);
		$this->load->view('frames/templates', $data);	
	}
}

?>