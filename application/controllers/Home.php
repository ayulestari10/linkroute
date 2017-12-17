<?php  

class Home extends CI_Controller{

	function index(){
		// $this->load->model('Peserta_model');
		// $data = array(
		// 	'title'		=> 'Oprec BEM 2017',
		// 	'content'	=> 'id_card',
		// 	'data'	=> $this->Peserta_model->get_dataBy_nim('09021181520025')
		// );
		// $this->load->view('frames/templates', $data);
		$this->load->view('home');
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