<?php  

class Site_model extends CI_Model{
	public $rows = 0;
	private $table;
	private $key;

	function __construct(){
		parent::__construct();
		$this->table 				= 'site';
		$this->key 					= 'Site_ID';
	}

	//site
	function cek_siteID($siteID){
		$this->db->where('Site_ID',$siteID);
		$data = $this->db->get($this->table);
		return $data->result();
	}

	function get_dataBy_siteID($siteID){
		$this->db->where('Site_ID', $siteID);
		$query = $this->db->get($this->table);
		return $query->row();
	}

	function insert_site($data){
		return $this->db->insert($this->table, $data);
	}

	function get_all(){
		$query = $this->db->get($this->table);
		return $query->result();
	}

	function update($pk, $data)
	{
		$this->db->where([$this->key => $pk]);
		return $this->db->update($this->table, $data);
	}

	function delete($id){
		return $this->db->delete($this->table, array($this->key => $id));
	}

	public function delete_by($cond)
	{
		$this->db->where($cond);
		return $this->db->delete($this->table);
	}

	public function delete_where_and($value){
		$query = $this->db->query('DELETE FROM '.$this->table.' WHERE Site_ID = "'.$value.'" OR NE_ID = "'.$value.'" OR FE_ID = "'.$value.'"');
		return $query->result();
	}

	// - -

	function cek_nim($nim){
		$this->db->where('nim', $nim);
		$data = $this->db->get($this->table);
		return $data->result();
	}

	function get_data_byConditional($data){
		$this->db->where($data);
		$query = $this->db->get($this->table);
		return $query;
	}

	public function get_all_category()
	{
		$query = $this->db->query('SELECT kategori FROM ' . $this->table . ' GROUP BY kategori');
		return $query->result();
	}

	function get_dataBy_nim($nim){
		$this->db->where('nim', $nim);
		$query = $this->db->get($this->table);
		return $query->row();
	}

	function get_dataBy_Id($id){
		$this->db->where($this->key, $id);
		$query = $this->db->get($this->table);
		return $query->row();
	}

	function get_nim($nim){
		$this->db->where($this->key, $nim);
		$query = $this->db->get($this->table);
		foreach($query->result() as $row){
			$nim = $row->nim;
		}
		return $nim;
	}

	function get_status($nim){
		$this->db->where('nim', $nim);
		$query = $this->db->get($this->table);
		foreach($query->result() as $row){
			$status = $row->status;
		}
		return $status;
	}

	function insert($data){
		return $this->db->insert($this->table, $data);
	}

	function get_role($nim){
		$this->db->where('nim', $nim);
		$query = $this->db->get($this->table);
		foreach($query->result() as $row){
			$role = $row->role;
		}
		return $role;
	}
}

?>