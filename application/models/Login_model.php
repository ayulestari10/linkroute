<?php

class Login_model extends CI_Model{
	public $rows = 0;

	function __construct(){
		parent::__construct();
		$this->load->model('Peserta_model');
	}

	function cek_login($data){
		$data_admin = $this->Peserta_model->get_data_byConditional($data);
		if($data_admin->num_rows() == 1){
			 $this->rows = $data_admin->num_rows();
		}
		return $this->rows;
	}
}

?>
