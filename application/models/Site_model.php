<?php  

class Site_model extends CI_Model{
	public $rows = 0;
	private $table;
	private $key;

	public function __construct(){
		parent::__construct();
		$this->table 				= 'site';
		$this->key 					= 'Site_ID';
	}

	//site
	public function cek_siteID($siteID){
		$this->db->where('Site_ID',$siteID);
		$data = $this->db->get($this->table);
		return $data->result();
	}

	public function get_dataBy_siteID($siteID){
		$this->db->where('Site_ID', $siteID);
		$query = $this->db->get($this->table);
		return $query->row();
	}

	public function insert_site($data){
		return $this->db->insert($this->table, $data);
	}

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function get_all(){
		$query = $this->db->get($this->table);
		return $query->result();
	}
	
	public function update($pk, $data)
	{
		$this->db->where([$this->key => $pk]);
		return $this->db->update($this->table, $data);
	}

	public function delete($id){
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

	public function delete_all(){
		return $this->db->query('DELETE FROM '.$this->table);
	}

	function get_data_byConditional($data){
		$this->db->where($data);
		$query = $this->db->get($this->table);
		return $query;
	}

	// - -
}

?>