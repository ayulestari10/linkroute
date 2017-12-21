<?php

class User_model extends CI_Model{
	public $rows = 0;
	private $table;
	private $key;

	function __construct(){
		parent::__construct();
		$this->table 				= 'user';
		$this->key 					= 'username';
	}

	function cek_login($data){
		$data_admin = $this->Peserta_model->get_data_byConditional($data);
		if($data_admin->num_rows() == 1){
			 $this->rows = $data_admin->num_rows();
		}
		return $this->rows;
	}

	public function login($data)
	{
		$result = $this->get_row(['username' => $data['username'], 'password' => $data['password']]);
		if (!isset($result))
			return $result;

		$this->session->set_userdata([
			'username'	=> $result->username
		]);
		return $result;
	}

	public function get_row($cond)
	{
		$this->db->where($cond);
		$query = $this->db->get($this->table);

		return $query->row();
	}
}

?>
