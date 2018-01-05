<?php  

class Linkroute_model extends CI_Model{
	public $rows = 0;
	private $table;
	private $key;

	function __construct(){
		parent::__construct();
		$this->table 				= 'linkroutebelitung';
		$this->key 					= 'id';
	}

	//linkroute
	function cek_siteID($siteID){
		$this->db->where('Site_ID',$siteID);
		$data = $this->db->get($this->table);
		return $data->result();
	}

	function get_data_byConditional($data){
		$this->db->where($data);
		$query = $this->db->get($this->table);
		return $query->row();
	}

	function insert_linkroute($data){
		return $this->db->insert($this->table, $data);
	}

	function get_all(){
		$query = $this->db->get($this->table);
		return $query->result();
	}

	function getRoute($site, $band){
		$query = $this->db->query('  SELECT linkroutebelitung.SysID, 
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
				FROM linkroutebelitung JOIN site ON linkroutebelitung.Site_ID = site.Site_ID 
				WHERE linkroutebelitung.Site_ID = "'.$site.'" AND linkroutebelitung.SysID like "'.$site.''.$band.'%"
				');
		return $query->result();
	}

	function getUnion($site, $band){
		$query = $this->db->query(' SELECT DISTINCT x.Site_ID, x.Longitude, x.Latitude FROM 
			(SELECT site.Site_ID, site.Longitude, site.Latitude FROM site where site.Site_ID in 
			(SELECT linkroutebelitung.NE_ID FROM linkroutebelitung where linkroutebelitung.Site_ID = "'.$site.'" AND linkroutebelitung.SysID like "'.$site.''.$band.'%"))as x
			UNION
			SELECT DISTINCT y.Site_ID, y.Longitude, y.Latitude FROM 
			(SELECT site.Site_ID, site.Longitude, site.Latitude FROM site where site.Site_ID in 
				(SELECT linkroutebelitung.FE_ID FROM linkroutebelitung where linkroutebelitung.Site_ID = "'.$site.'" AND linkroutebelitung.SysID like "'.$site.''.$band.'%"))as y
			');
		return $query->result();
	}

	function getUnionBanyak2($site, $band){
		$query = $this->db->query(' SELECT DISTINCT x.Site_ID, x.Longitude, x.Latitude FROM 
			(SELECT site.Site_ID, site.Longitude, site.Latitude FROM site where site.Site_ID in (SELECT linkroutebelitung.NE_ID FROM linkroutebelitung where linkroutebelitung.Site_ID = "'.$site.'" AND linkroutebelitung.SysID like "'.$site.''.$band.'%"))as x
			UNION
			SELECT DISTINCT y.Site_ID, y.Longitude, y.Latitude FROM 
			(SELECT site.Site_ID, site.Longitude, site.Latitude FROM site where site.Site_ID in (SELECT linkroutebelitung.FE_ID FROM linkroutebelitung where linkroutebelitung.Site_ID = "'.$site.'" AND linkroutebelitung.SysID like "'.$site.''.$band.'%"))as y
			');
		return $query->result();
	}

	function get_all_twotable(){
		$query = $this->db->query('SELECT linkroutebelitung.id,
			linkroutebelitung.Site_ID,
			(SELECT SiteName FROM site WHERE Site_ID = linkroutebelitung.Site_ID) AS Site_Name,
			linkroutebelitung.SysID, 
			linkroutebelitung.NE_ID,
			(SELECT SiteName FROM site WHERE Site_ID = linkroutebelitung.NE_ID) AS NE_Name,
			linkroutebelitung.FE_ID,
			(SELECT SiteName FROM site WHERE Site_ID = linkroutebelitung.FE_ID) AS FE_Name,
			linkroutebelitung.HOP_ID_DETAIL
			FROM linkroutebelitung JOIN site ON linkroutebelitung.Site_ID = site.Site_ID');
		return $query->result();	
	}

	function get_linkroute_byConditional($site){
		$query = $this->db->query('SELECT linkroutebelitung.id,
			linkroutebelitung.Site_ID,
			(SELECT SiteName FROM site WHERE Site_ID = linkroutebelitung.Site_ID) AS Site_Name,
			linkroutebelitung.SysID, 
			linkroutebelitung.NE_ID,
			(SELECT SiteName FROM site WHERE Site_ID = linkroutebelitung.NE_ID) AS NE_Name,
			linkroutebelitung.FE_ID,
			(SELECT SiteName FROM site WHERE Site_ID = linkroutebelitung.FE_ID) AS FE_Name,
			linkroutebelitung.HOP_ID_DETAIL
			FROM linkroutebelitung JOIN site ON linkroutebelitung.Site_ID = site.Site_ID 
			WHERE linkroutebelitung.Site_ID = "'.$site.'"
			');
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
	// - -

	function cek_nim($nim){
		$this->db->where('nim', $nim);
		$data = $this->db->get($this->table);
		return $data->result();
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