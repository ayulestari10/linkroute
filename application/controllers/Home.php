<?php  

class Home extends CI_Controller{

	public function __construct(){
		parent::__construct();

		$this->load->model('site_model');
		$this->load->model('linkroute_model');
	}


	public function index(){
		$data = array(
			'title'		=> 'Link Route',
			'content'	=> 'dashboard'
		);
		$this->load->view('frames/templates', $data);
	}

	public function required_input($input_names){
		$rules = [];
		foreach ($input_names as $input){
		   	$rules []= [
		    'field'  => $input,
		    'label'  => ucfirst($input),
		    'rules'  => 'required'
		   ];
		}
		return $this->validate($rules);
	}

	public function validate($conf){
		$this->load->library('form_validation');
		$this->form_validation->set_rules($conf);
		return $this->form_validation->run();
	}

	// site

	function site(){
		$data = array(
			'title'		=> 'Site Table',
			'content'	=> 'site',
			'site'		=> $this->site_model->get_all()
		);
		$this->load->view('frames/templates', $data);
	}

	function edit_site(){

		$get_id = $this->uri->segment(3);

		if($this->input->post('edit')){

			$this->load->model('site_model');
			$site_id 	= $this->input->post('Site_ID');
			$site_name 	= $this->input->post('SiteName');
			$longitude 	= $this->input->post('Longitude');
			$latitude 	= $this->input->post('Latitude');

			$required = ['Site_ID','SiteName','Longitude','Latitude'];

			if(!$this->required_input($required)){
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="text-align:center;">Lengkapi Data</div>');
					redirect('Home/edit_site');
			}
			else{
				$input = array(
						'Site_ID' 	=> $site_id,
						'SiteName'	=> $site_name,
						'Longitude'	=> $longitude,
						'Latitude'	=> $latitude
				);

				
				$cek_data = $this->site_model->get_dataBy_siteID($get_id);
				if(count($cek_data) > 0){
					$cek_site_id = $this->site_model->get_dataBy_siteID($site_id);
					if(count($cek_site_id) > 0){
						$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="text-align:center;">Data Ganda</div>');
						redirect('Home/edit_site/' . $get_id);
					}
					else{
						$this->site_model->update($get_id, $input);
						$this->session->set_flashdata('msg', '<div class="alert alert-success" style="text-align:center;"> Berhasil </div>');
						redirect('Home/edit_site/' . $site_id);
					}

				}
				else{
					$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="text-align:center;">Data Belum Ada</div>');
					redirect('Home/edit_site');
				}
			}
		}

		$data = array(
			'title'		=> 'Edit Form',
			'content'	=> 'edit_site',
			'site'		=> $this->site_model->get_dataBy_siteID($get_id)
		);
		$this->load->view('frames/templates', $data);
	}

	function insert_site(){

		if($this->input->post('save')){
			$this->load->model('site_model');

			$site_id 	= $this->input->post('Site_ID');
			$site_name 	= $this->input->post('SiteName');
			$longitude 	= $this->input->post('Longitude');
			$latitude 	= $this->input->post('Latitude');

			$required = ['Site_ID','SiteName','Longitude','Latitude'];

			if(!$this->required_input($required)){
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="text-align:center;">Lengkapi Data</div>');
					redirect('Home/insert_site');
			}
			else{
				$input = array(
						'Site_ID' 	=> $site_id,
						'SiteName'	=> $site_name,
						'Longitude'	=> $longitude,
						'Latitude'	=> $latitude
				);

				
				$cek_data = $this->site_model->get_dataBy_siteID($site_id);
				if(count($cek_data) > 0){
					$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="text-align:center;">Data Telah Ada</div>');
					redirect('Home/insert_site');
				}
				else{
					$this->site_model->insert_site($input);
					$this->session->set_flashdata('msg', '<div class="alert alert-success" style="text-align:center;"> Berhasil </div>');
					//echo '<pre>';
					//print_r($input);
					//echo '</pre>';
					redirect('Home/insert_site');
				}
			}
		}
		$data = array(
			'title'		=> 'Input Form',
			'content'	=> 'insert_site',
		);
		$this->load->view('frames/templates', $data);
	}

	// -----


	// linkroute

	function linkroute(){
		$data = array(
			'title'		=> 'Link Route Table',
			'content'	=> 'linkroute',
			'site' 		=> $this->linkroute_model->get_all_twotable(),
		);
		$this->load->view('frames/templates', $data);
	}

	public function SearchingRoute(){

		if($this->input->post('site') && $this->input->post('band')){
			echo "hay";exit;

			$hasil_pencarian = $this->linkroute_model->getRoute($this->input->post('site'), $this->input->post('band'));
			exit;
	}

		$data = array(
			'title'		=> 'Route',
			'content'	=> 'searchingroute',
			'site'		=> $this->site_model->get_all()
		);
		$this->load->view('frames/templates', $data);
	}

	function edit_linkroute(){
		$get_id = $this->uri->segment(3);
		$get_id_explode = explode('_', $get_id);

		if($this->input->post('edit')){
			$this->load->model('linkroute_model');

			$site_id = $this->input->post('Site_ID');
			$band = $this->input->post('Band');
			$ne_id = $this->input->post('NE_ID');
			$fe_id = $this->input->post('FE_ID');
			$hop = $this->input->post('HOP_ID_DETAIL'); 
		}

		$required = ['Site_ID','Band','NE_ID','FE_ID','HOP_ID_DETAIL'];

		if(!$this->required_input($required)){
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="text-align:center;">Lengkapi Data</div>');
					redirect('Home/edit_linkroute');
		}

		else{
				$input = array(
						'Site_ID' 	=> $site_id,
						'SysID'		=> $band,
						'NE_ID'		=> $ne_id,
						'FE_ID'		=> $fe_id,
						'HOP_ID_DETAIL' => $hop
				);

				$cek_input = array(
							'Site_ID' 	=> $site_id,
							'SysID'		=> $band,
							'NE_ID'		=> $ne_id,
							'FE_ID'		=> $fe_id,
				);

				
				$cek_data = $this->linkroute_model->get_data_byConditional($get_id_explode);
				if(count($cek_data) > 0){
					$cek_site_id = $this->linkroute_model->get_dataBy_siteID($site_id);
					if(count($cek_site_id) > 0){
						$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="text-align:center;">Data Ganda</div>');
						redirect('Home/edit_linkroute/' . $get_id);
					}
					else{
						$this->site_model->update($get_id, $input);
						$this->session->set_flashdata('msg', '<div class="alert alert-success" style="text-align:center;"> Berhasil </div>');
						redirect('Home/edit_linkroute/' . $site_id);
					}

				}
				else{
					$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="text-align:center;">Data Belum Ada</div>');
					redirect('Home/edit_linkroute');
				}
			}

		$data = array(
			'title'		=> 'Edit Form',
			'content'	=> 'edit_linkroute',
			'site'		=> $this->linkroute_model->get_data_byConditional($get_id_explode)
		);
		$this->load->view('frames/templates', $data);
	}

	function insert_linkroute(){
		
		if($this->input->post('save')){
			$this->load->model('linkroute_model');

			$site_id 	= $this->input->post('Site_ID');
			$band 		= $this->input->post('Band');
			$ne_id 		= $this->input->post('NE_ID');
			$fe_id 		= $this->input->post('FE_ID');
			$hop		= $this->input->post('HOP_ID_DETAIL');

			$required = ['Site_ID','Band','NE_ID','FE_ID','HOP_ID_DETAIL'];

			if(!$this->required_input($required)){
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="text-align:center;">Lengkapi Data</div>');
					redirect('Home/insert_linkroute');
			}
			else{
				$input = array(
						'Site_ID' 		=> $site_id,
						'SysID'			=> $band,
						'NE_ID'			=> $ne_id,
						'FE_ID'			=> $fe_id,
						'HOP_ID_DETAIL'	=> $hop
				);
				$cek_array = array(
						'Site_ID' 		=> $site_id,
						'SysID'			=> $band,
						'NE_ID'			=> $ne_id,
						'FE_ID'			=> $fe_id
				);

				
				$cek_data = $this->linkroute_model->get_data_byConditional($cek_array);
				if(count($cek_data) > 0){
					$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="text-align:center;">Data Telah Ada</div>');
					redirect('Home/insert_linkroute');
				}
				else{
					$this->load->model('site_model');

					$cek_site = $this->site_model->get_dataBy_siteID($site_id);
					if(count($cek_site) == 0){
						$this->session->set_flashdata('msg2', '<div class="alert alert-danger" style="text-align:center;">Data Site Tidak Ada</div>');
						redirect('Home/insert_linkroute');
						exit;
					}

					$cek_NE = $this->site_model->get_dataBy_siteID($ne_id);
					if(count($cek_NE) == 0){
						$this->session->set_flashdata('msg3', '<div class="alert alert-danger" style="text-align:center;">Data NE Tidak Ada</div>');
						redirect('Home/insert_linkroute');
						exit;
					}

					$cek_FE = $this->site_model->get_dataBy_siteID($fe_id);
					if(count($cek_FE) == 0){
						$this->session->set_flashdata('msg4', '<div class="alert alert-danger" style="text-align:center;">Data FE Tidak Ada</div>');
						redirect('Home/insert_linkroute');
						exit;
					}


					$this->linkroute_model->insert_site($input);
					$this->session->set_flashdata('msg', '<div class="alert alert-success" style="text-align:center;"> Berhasil </div>');
					//echo '<pre>';
					//print_r($input);
					//echo '</pre>';
					redirect('Home/insert_linkroute');
					exit;
				}
			}
		}

		$data = array(
			'title'		=> 'Input Form',
			'content'	=> 'insert_linkroute'
		);
		$this->load->view('frames/templates', $data);
	}

	// ---------

	
	public function openCSV(){
		$file = file('assets/linkroutebelitung.csv');
		foreach ($file as $k) {
			$csv[] = explode(';', $k);
		}
		//echo '<pre>';
		//print_r($csv);
		//echo '</pre>';
		return $csv;
	}

	
	

	

	
}

?>