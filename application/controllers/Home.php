<?php  

class Home extends CI_Controller{

	function index(){
		$data = array(
			'title'		=> 'Oprec BEM 2017',
			'content'	=> 'dashboard'
		);
		$this->load->view('frames/templates', $data);
	}

	function cob(){
		$data = array(
			'title'		=> 'Oprec BEM 2017',
			'content'	=> 'coba2'
		);
		$this->load->view('frames/templates', $data);
	}	
}

?>