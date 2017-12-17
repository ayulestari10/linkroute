<?php  
	$this->load->view('frames/header', array('title' => $title));
	$this->load->view('frames/navbar');
	$this->load->view($content);
	$this->load->view('frames/footer');

?>