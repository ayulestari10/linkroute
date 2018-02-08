<?php
	
	/**
	* 
	*/
	class Cob_Model extends CI_Model
	{
		public $rows = 0;
		private $table;
		private $key; 
		
		function __construct()
		{
			parent::__construct();
			$this->table 	= 'cob';
			$this->key 		= 'SiteName';
		}

		public function get_all(){
			$query = $this->db->get($this->table);
			return $query->result();
		}

		public function insert_cob($data){
			return $this->db->insert($this->table, $data);
		}

		public function cek_siteName($siteName){
			$this->db->where($this->key, $siteName);
			$data = $this->db->get($this->table);
			return $data->result();
		}

		public function get_dataBy_siteName($siteName){
			$this->db->where($this->key, $siteName);
			$query = $this->db->get($this->table);
			return $query->row();
		}

		public function update($pk, $data){
			$this->db->where([$this->key => $pk]);
			return $this->db->update($this->table, $data);
		}
	}
?>