<?php  

class Linkroute_model extends CI_Model{
	public $rows = 0;
	private $table;
	private $key;

	function __construct(){
		parent::__construct();
		$this->table 				= 'linkroutebelitung';
		$this->key 					= 'Site_ID';
	}

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

	function getRoute($site, $band){
		$query = $this->db->query(' SELECT linkroutebelitung.SysID, 
				linkroutebelitung.NE_ID, (
				SELECT Longitude FROM site WHERE Site_ID = linkroutebelitung.NE_ID
				) AS NE_Longitude, (
				    SELECT Latitude FROM site WHERE Site_ID = linkroutebelitung.NE_ID
				) AS NE_Latitude, 
				linkroutebelitung.FE_ID, (
				    SELECT Longitude FROM site WHERE Site_ID = linkroutebelitung.FE_ID
				) AS FE_Longitude, (
				    SELECT Latitude FROM site WHERE Site_ID = linkroutebelitung.FE_ID
				) AS FE_Latitude 
				FROM linkroutebelitung NATURAL JOIN site 
				WHERE linkroutebelitung.SysID = '.$band.' AND linkroutebelitung.Site_ID 
				');
		return $query->result();
	}

	function get_all(){
		$query = $this->db->get($this->table);
		return $query->result();
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

	function update($nim, $data){
		$this->db->where('nim', $nim);
		return $this->db->update($this->table, $data);
	}

	public function updt($pk, $data)
	{
		$this->db->where(['id_data' => $pk]);
		return $this->db->update($this->table, $data);
	}

	function delete($id_mhs){
		return $this->db->delete($this->table, array($this->key => $id_mhs));
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