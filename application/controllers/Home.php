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

	public function openCSV($folder, $file_name){
		$file = file('assets/csv/'.$folder.'/'.$file_name);
		foreach ($file as $k) {
			$csv[] = explode(',', $k);
		}

		if(count($csv[0]) == 1 ){
			foreach ($file as $k) {
				$csv[] = explode(';', $k);
			}
		}

		return $csv;
	}

	public function insertCSV_Site(){

		if($this->input->post('uploadcsv')){

			if($_FILES['file']['name']) {
				$this->load->library('upload');

				$file_name = $_FILES['file']['name'];

				$upload_path = realpath(APPPATH . '../assets/csv/site');
				@unlink($upload_path . '/' . $file_name);
				$config = [
					'file_name' 		=> $file_name,
					'allowed_types'		=> 'csv',
					'upload_path'		=> $upload_path
				];
				$this->upload->initialize($config);
				$this->upload->do_upload('file');

				// insert data

				$data_csv = $this->openCSV('site', $file_name);

				// Cek jika data telah ada
				for ($i = 0; $i < count($data_csv); $i++) {
				   	$row = [
				    	'Site_ID' 		=> $data_csv[$i][0],
				    	'SiteName' 		=> $data_csv[$i][1],
				    	'Longitude' 	=> $data_csv[$i][2],
				    	'Latitude' 		=> $data_csv[$i][3]
				   	];

				   	$site_id 	= $this->site_model->get_dataBy_siteID($data_csv[$i][0]);

				   	if(count($site_id) > 0){
				   		$line = $i + 1;
				   		$this->session->set_flashdata('msgUpload', '<div class="alert alert-danger alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Failed!<strong>  Site ID '. $data_csv[$i][0] .' in line '.$line.'</strong> already exists!</div>');
				   		redirect('home/insert_site');	
				   	}
				}
				
				// Insert Data
				for ($i = 0; $i < count($data_csv); $i++) {
				   	$row = [
				    	'Site_ID' 		=> $data_csv[$i][0],
				    	'SiteName' 		=> $data_csv[$i][1],
				    	'Longitude' 	=> $data_csv[$i][2],
				    	'Latitude' 		=> $data_csv[$i][3]
				   	];

				   	$this->site_model->insert($row);
			   		$this->session->set_flashdata('msgUpload', '<div class="alert alert-success alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Successed!</div>');
					redirect('home/insert_site');
				}
			}

			else
			{
				$this->session->set_flashdata('msgUpload', '<div class="alert alert-warning alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> No files uploaded!</div>');
				redirect('home/insert_site');
			}
		}

	}

	public function insertCSV_Linkroute(){

		if($this->input->post('uploadcsv')){

			if($_FILES['file']['name']){
			
				$this->load->library('upload');

				$file_name = $_FILES['file']['name'];

				$upload_path = realpath(APPPATH . '../assets/csv/linkroute');
				@unlink($upload_path . '/' . $file_name);
				$config = [
					'file_name' 		=> $file_name,
					'allowed_types'		=> 'csv',
					'upload_path'		=> $upload_path
				];
				$this->upload->initialize($config);
				$this->upload->do_upload('file');

				// open data

				$data_csv = $this->openCSV('linkroute', $file_name);

				// Cek jika id tidak ada di site 
				for ($i = 0; $i < count($data_csv); $i++) {
				   	$row = [
				    	'Site_ID' 		=> $data_csv[$i][0],
				    	'SysID' 		=> $data_csv[$i][1],
				    	'NE_ID' 		=> $data_csv[$i][3],
				    	'FE_ID' 		=> $data_csv[$i][5],
				    	'HOP_ID_DETAIL' => $data_csv[$i][7]
				   	];

				   	$site_id 	= $this->site_model->get_dataBy_siteID($data_csv[$i][0]);
				   	$ne_id 		= $this->site_model->get_dataBy_siteID($data_csv[$i][3]);
				   	$fe_id 		= $this->site_model->get_dataBy_siteID($data_csv[$i][5]);

				   	if(count($site_id) < 1){
				   		$line = $i + 1;
				   		$this->session->set_flashdata('msgUpload', '<div class="alert alert-danger alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Failed! Please check <strong>  Site ID '. $data_csv[$i][0] .' in line '.$line.'</strong> in the file!</div>');

						redirect('home/insert_linkroute');
				   	}

				   	if(count($ne_id) < 1){
				   		$line = $i + 1;
				   		$this->session->set_flashdata('msgUpload', '<div class="alert alert-danger alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Failed! Please check <strong>  NE ID '. $data_csv[$i][3] .' in line '.$line.'</strong> in the file!</div>');

						redirect('home/insert_linkroute');
				   	}

				   	if(count($fe_id) < 1){
				   		$line = $i + 1;
				   		$this->session->set_flashdata('msgUpload', '<div class="alert alert-danger alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Failed! Please check <strong>  FE ID '. $data_csv[$i][5] .' in line '.$line.'</strong> in the file!</div>');

						redirect('home/insert_linkroute');
				   	}	
				}

				// Cek kesamaan data
				for ($i = 0; $i < count($data_csv); $i++) {
				   	$row = [
				    	'Site_ID' 		=> $data_csv[$i][0],
				    	'SysID' 		=> $data_csv[$i][1],
				    	'NE_ID' 		=> $data_csv[$i][3],
				    	'FE_ID' 		=> $data_csv[$i][5],
				    	'HOP_ID_DETAIL' => $data_csv[$i][7]
				   	];

				   	$cek_linkroute = $this->linkroute_model->get_data_byConditional($row);

				   	if(count($cek_linkroute) > 0){
				   		$id = $i + 1;

				   		$this->session->set_flashdata('msgUpload', '<div class="alert alert-danger alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Failed, line '.$id.' already exists! Please check it!</div>');

						redirect('home/insert_linkroute');
				   	}
				}

				// insert data
				for ($i = 0; $i < count($data_csv); $i++) {
				   	$row = [
				    	'Site_ID' 		=> $data_csv[$i][0],
				    	'SysID' 		=> $data_csv[$i][1],
				    	'NE_ID' 		=> $data_csv[$i][3],
				    	'FE_ID' 		=> $data_csv[$i][5],
				    	'HOP_ID_DETAIL' => $data_csv[$i][7]
				   	];

				   	$this->linkroute_model->insert($row);
				}

		   		$this->session->set_flashdata('msgUpload', '<div class="alert alert-success alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Successed!</div>');
				redirect('home/insert_linkroute');
					
			}

			else
			{
				$this->session->set_flashdata('msgUpload', '<div class="alert alert-warning alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> No files uploaded!</div>');
				redirect('home/insert_linkroute');
			}
		}
			
	}

	
	function edit_site(){

		$get_id = $this->uri->segment(3);

		if($this->input->post('edit')){

			$site_id = $this->input->post('Site_ID');
			$site_name = $this->input->post('SiteName');
			$longitude = $this->input->post('Longitude');
			$latitude = $this->input->post('Latitude');

			$required = ['Site_ID','SiteName','Longitude','Latitude'];

			if(!$this->required_input($required)){
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="text-align:center;">Please fill out every field!</div>');
					redirect('Home/edit_site');
			}
			else{
				$input = array(
						'Site_ID' 	=> $site_id,
						'SiteName'	=> $site_name,
						'Longitude'	=> $longitude,
						'Latitude'	=> $latitude
				);

				if($site_id == $get_id){
					$this->site_model->update($get_id, $input);
					$this->session->set_flashdata('msg', '<div class="alert alert-success" style="text-align:center;"> Successed! </div>');
					redirect('Home/edit_site/' . $site_id);
				}
				else{
					$cek_site_id = $this->site_model->get_dataBy_siteID($site_id);
					if(count($cek_site_id) > 0){
						$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="text-align:center;">Failed, Site already exists!</div>');
					 	redirect('Home/edit_site/' . $get_id);
					}
					else{
						$this->site_model->update($get_id, $input);
						$this->session->set_flashdata('msg', '<div class="alert alert-success" style="text-align:center;"> Successed! </div>');
						redirect('Home/edit_site/' . $site_id);
					}
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

	function delete_site(){
		$get_id = $this->uri->segment(3);

		if($this->input->post('delete')){

			$this->load->model('site_model');
			$this->site_model->delete($get_id);
            $this->site();
		}
        $data = array(
			'title'		=> 'Edit Form',
			'content'	=> 'site',
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
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="text-align:center;">Please fill out every field!</div>');
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
					$this->session->set_flashdata('msg', '<div class="alert alert-success" style="text-align:center;"> Successed! </div>');
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

		if($this->input->post('cari')){

			$site = $this->input->post('site');
			$band = $this->input->post('band');

			if(isset($site) && isset($band)){

				$hasil_pencarian = $this->linkroute_model->getRoute($site, $band);
				$this->dump($hasil_pencarian); exit;
			}
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
		
		if(isset($get_id)){
			
			if($this->input->post('edit')){

				$required = ['Site_ID','Band','NE_ID','FE_ID','HOP_ID_DETAIL'];

				if(!$this->required_input($required)) {
					$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="text-align:center;">Please fill out every field!</div>');
					redirect('Home/edit_linkroute/'.$get_id);
				}
				else {

					$site_id 	= $this->input->post('Site_ID');
					$band 		= $this->input->post('Band');
					$ne_id 		= $this->input->post('NE_ID');
					$fe_id 		= $this->input->post('FE_ID');
					$hop 		= $this->input->post('HOP_ID_DETAIL'); 

					$input = array(
						'Site_ID' => $site_id,
						'SysID'	=> $band,
						'NE_ID' => $ne_id,
						'FE_ID' => $fe_id,
						'HOP_ID_DETAIL' => $hop 
					);

					// cek jika linkroute yang diinput sudah ada di tabel
					$cek_linkroute = $this->linkroute_model->get_data_byConditional($input);

					if(count($cek_linkroute) > 0){
						$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Failed, linkroute already exists!</div>');
						redirect('home/edit_linkroute/'.$get_id);
					}

					// cek jika id yang diinput tidak ada di tabel site
					$site_id 	= $this->site_model->get_dataBy_siteID($site_id);
				   	$ne_id 		= $this->site_model->get_dataBy_siteID($ne_id);
				   	$fe_id 		= $this->site_model->get_dataBy_siteID($fe_id);

				   	if(count($site_id) < 1){
				   		$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Failed, <strong>  Site ID '. $site_id.' does not exits!</strong></div>');
						redirect('home/edit_linkroute/'.$get_id);
				   	}

				   	if(count($ne_id) < 1){
				   		$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Failed, <strong>  Site ID '. $ne_id.' does not exits!</strong></div>');
						redirect('home/edit_linkroute/'.$get_id);
				   	}

				   	if(count($fe_id) < 1){
				   		$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Failed, <strong>  Site ID '. $fe_id.' does not exits!</strong></div>');
						redirect('home/edit_linkroute/'.$get_id);
				   	}

				   	// update data
				   	$this->linkroute_model->update($get_id, $input);
				   	$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Successed!</div>');
					redirect('home/edit_linkroute/'.$get_id);
					
				}
			}
		}
			
		$data = array(
			'title'		=> 'Edit Form',
			'content'	=> 'edit_linkroute',
			'site'		=> $this->linkroute_model->get_data_byConditional(['id' => $get_id])
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
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="text-align:center;">Please fill out every field!</div>');
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
					$this->session->set_flashdata('msg', '<div class="alert alert-success" style="text-align:center;"> Successed! </div>');
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

	public function dump($data){
		echo "<pre>";
		var_dump($data);
		echo "</pre>";
	}
	
}

?>