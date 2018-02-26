<?php  

class Linkroute_model extends CI_Model{
	public $rows = 0;
	private $table;
	private $key;

	public function __construct(){
		parent::__construct();
		$this->table 				= 'linkroutebelitung';
		$this->key 					= 'id';
	}

	//linkroute
	public function cek_siteID($siteID){
		$this->db->where('Site_ID',$siteID);
		$data = $this->db->get($this->table);
		return $data->result();
	}

	public function get_data_byConditional($data){
		$this->db->where($data);
		$query = $this->db->get($this->table);
		return $query->row();
	}

	public function insert($data){
		return $this->db->insert($this->table, $data);
	}

	public function get_all(){
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function delete_all(){
		return $this->db->query('DELETE FROM '.$this->table);
	}

	public function getRoute($site, $band){
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

	public function getUnion($site, $band){
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

	public function getUnionBanyak2($site, $band){
		$query = $this->db->query(' SELECT DISTINCT x.Site_ID, x.Longitude, x.Latitude FROM 
			(SELECT site.Site_ID, site.Longitude, site.Latitude FROM site where site.Site_ID in (SELECT linkroutebelitung.NE_ID FROM linkroutebelitung where linkroutebelitung.Site_ID = "'.$site.'" AND linkroutebelitung.SysID like "'.$site.''.$band.'%"))as x
			UNION
			SELECT DISTINCT y.Site_ID, y.Longitude, y.Latitude FROM 
			(SELECT site.Site_ID, site.Longitude, site.Latitude FROM site where site.Site_ID in (SELECT linkroutebelitung.FE_ID FROM linkroutebelitung where linkroutebelitung.Site_ID = "'.$site.'" AND linkroutebelitung.SysID like "'.$site.''.$band.'%"))as y
			');
		return $query->result();
	}

	public function get_all_twotable(){
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

	public function get_linkroute_byConditional($site){
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

	public function insert_ignore($data){
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

	public function update($pk, $data)
	{
		$this->db->where([$this->key => $pk]);
		return $this->db->update($this->table, $data);
	}

	public function delete($id){
		return $this->db->delete($this->table, array($this->key => $id));
	}
	// - -

	public function delete_linkroute( $id ) {

		$this->db->where([ 'id' => $id ]);
		$query = $this->db->get( 'linkroutebelitung' );
		$selected_records = $query->result();
		$deleted_result = $query->row();
		if ( isset( $deleted_result ) ) {

			if ( count( $selected_records ) == 1 ) {

				$deleted_NE_ID = $deleted_result->NE_ID;
				$deleted_FE_ID = $deleted_result->FE_ID;

				$this->db->where([ 'FE_ID' => $deleted_NE_ID ]);
				$query = $this->db->get( 'linkroutebelitung' );
				$result = $query->result();
				foreach ( $result as $row ) {

					$this->db->where([ 'id' => $row->id ]);
					$this->db->update( 'linkroutebelitung', [
						'FE_ID'	=> $deleted_FE_ID
					] );

				}

			}

			$this->db->delete( 'linkroutebelitung', [ 'id' => $deleted_result->id ] );

		}

	}

	public function edit_linkroute( $id, $data ) {

		$this->db->where([ 'id' => $id ]);
		$query = $this->db->get( 'linkroutebelitung' );
		$selected_records = $query->result();
		$edited_result = $query->row();

		if ( isset( $edited_result ) ) {

			$edited_NE_ID = $edited_result->NE_ID;
			$edited_FE_ID = $edited_result->FE_ID;

			$this->db->where([ 'id' => $edited_result->id ]);
			$this->db->update( 'linkroutebelitung', $data );

			$this->db->where([ 'FE_ID' => $edited_result->NE_ID ]);
			$query = $this->db->get( 'linkroutebelitung' );
			$result = $query->result();
			foreach ( $result as $row ) {

				$this->db->where([ 'id' => $row->id ]);
				$this->db->update( 'linkroutebelitung', [
					'FE_ID'	=> $data['NE_ID']
				] );

			}

			$this->db->where([ 'NE_ID' => $edited_result->FE_ID ]);
			$query = $this->db->get( 'linkroutebelitung' );
			$result = $query->result();
			foreach ( $result as $row ) {

				$this->db->where([ 'id' => $row->id ]);
				$this->db->update( 'linkroutebelitung', [
					'NE_ID'	=> $data['FE_ID']
				] );

			}

		}

	}

}

?>