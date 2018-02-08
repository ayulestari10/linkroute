<?php  
class Admin extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$username = $this->session->userdata('username');
		if (!isset($username))
		{
			redirect('Login');
			exit;
		}
		$this->load->model('site_model');
		$this->load->model('linkroute_model');
	}
	public function index(){
		$data = array(
			'title'		=> 'Link Route',
			'content'	=> 'dashboard',
			'site'		=> $this->site_model->get_all(),
			'linkroute'	=> $this->linkroute_model->get_all()
		);
		$this->menampilkan($data);
	}
	// Site
	public function data_site(){
		$data = array(
			'title'		=> 'Site Table',
			'content'	=> 'site',
			'site'		=> $this->site_model->get_all()
		);
		$this->menampilkan($data);
	}
	public function insert_site(){
		if($this->input->post('save')){
			$this->load->model('site_model');
			$site_id 	= $this->input->post('Site_ID');
			$site_name 	= $this->input->post('SiteName');
			$longitude 	= $this->input->post('Longitude');
			$latitude 	= $this->input->post('Latitude');
			$required = ['Site_ID','SiteName','Longitude','Latitude'];
			if(!$this->required_input($required)){
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="text-align:center;">Please fill out every field!</div>');
					redirect('admin/insert_site');
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
					$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="text-align:center;">Data already exists!</div>');
					redirect('admin/insert_site');
				}
				else{
					$this->site_model->insert_site($input);
					$this->session->set_flashdata('msg', '<div class="alert alert-success" style="text-align:center;"> Successed! </div>');
					redirect('admin/insert_site');
				}
			}
		}
		$data = array(
			'title'		=> 'Input Form',
			'content'	=> 'insert_site',
		);
		$this->menampilkan($data);
	}
	public function insertCSV_Site(){
		set_time_limit(1800);
		if($this->input->post('uploadcsv')){
			$file_name = $_FILES['file']['name'];
			$exe = substr($file_name, -4);
			if($file_name) {
				if($exe == ".csv") {
					$this->load->library('upload');
					//$file_name = $_FILES['file']['name'];
					$file_name = str_replace(' ', '_', $file_name);
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

					$salah = [];

					// Cek jika data telah ada
					for ($i = 1; $i < count($data_csv); $i++) {
					   	$row = [
					    	'Site_ID' 		=> $data_csv[$i][0],
					    	'SiteName' 		=> $data_csv[$i][1],
					    	'Longitude' 	=> $data_csv[$i][2],
					    	'Latitude' 		=> $data_csv[$i][3]
					   	];
					   	
					   	if (!empty($this->db->error())) {
						   	$site_id 	= $this->site_model->get_dataBy_siteID($data_csv[$i][0]);
						   	if(count($site_id) > 0){
						   		$salah[] = $row;
						   	}
						}

					   	$this->site_model->insert($row);
					}
					
					// Insert Data
					// for ($i = 1; $i < count($data_csv); $i++) {
					//    	$row = [
					//     	'Site_ID' 		=> $data_csv[$i][0],
					//     	'SiteName' 		=> $data_csv[$i][1],
					//     	'Longitude' 	=> $data_csv[$i][2],
					//     	'Latitude' 		=> $data_csv[$i][3]
					//    	];
					//    	$this->site_model->insert($row);
					// }
			   		$this->session->set_flashdata('msgUpload', '<div class="alert alert-success alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Successed!</div>');

			   		$this->data['salah'] = $salah;

					exit;
				}
				else
				{
					$this->session->set_flashdata('msgUpload', '<div class="alert alert-danger alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> The file format should be csv!</div>');
					redirect('admin/insert_site');
				}
			}
			else
			{
				$this->session->set_flashdata('msgUpload', '<div class="alert alert-warning alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> No files selected!</div>');
				redirect('admin/insert_site');
			}
		}

		$data = array(
			'title'		=> 'Input Form',
			'content'	=> 'insert_site',

		);
		$this->menampilkan($data);
	}
	// function import_csv_progress() {
	// 	$progress = $this->session->userdata('progress');
	// 	if ($progress) {
	// 		echo $progress;
	// 	} else {
	// 		echo 0;
	// 	}
	// }
	public function edit_site(){
		$get_id = $this->uri->segment(3);
		if(isset($get_id)){
			$data = array(
				'title'		=> 'Edit Form',
				'content'	=> 'edit_site',
				'site'		=> $this->site_model->get_dataBy_siteID($get_id)
			);
			$this->menampilkan($data);
		}
		else {
			$this->session->set_flashdata('msg', '<div class="alert alert-warning" style="text-align:center;"> Required parameter is missing! </div>');
			redirect('admin/site');
		}
	}
	public function edit_process(){
		$get_id = $this->uri->segment(3);
		if(isset($get_id)){
			if($this->input->post('edit')){
				$site_name = $this->input->post('SiteName');
				$longitude = $this->input->post('Longitude');
				$latitude = $this->input->post('Latitude');
				$required = ['SiteName','Longitude','Latitude'];
				if(!$this->required_input($required)){
					$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="text-align:center;">Please fill out every field!</div>');
						redirect('admin/edit_site');
				}
				else{
					$input = array(
							'SiteName'	=> $site_name,
							'Longitude'	=> $longitude,
							'Latitude'	=> $latitude
					);
					$this->site_model->update($get_id, $input);
					$this->session->set_flashdata('msg', '<div class="alert alert-success" style="text-align:center;"> Successed! </div>');
					redirect('admin/edit_site/' . $get_id);
				}
			}
		}
		else {
			$this->session->set_flashdata('msg', '<div class="alert alert-warning" style="text-align:center;"> Required parameter is missing! </div>');
					redirect('admin/site');
		}
		// $data = array(
		// 	'title'		=> 'Edit Form',
		// 	'content'	=> 'edit_site',
		// 	'site'		=> $this->site_model->get_dataBy_siteID($get_id)
		// );
		// $this->menampilkan($data);
		//$this->edit_site();
	}
	public function delete_site(){
		if ($this->input->post('Site_ID') && $this->input->post('delete'))
        {
            $this->site_model->delete($this->input->post('Site_ID'));
            $this->linkroute_model->delete_where_and($this->input->post('Site_ID'));
            $this->session->set_flashdata('msg5', '<div class="alert alert-success alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Data Successfully Deleted!</div>');
            redirect('admin/data_site');
            //$this->dialihkan('admin/site');
            // exit;
        }
	}
	public function delete_all_site(){
		$this->site_model->delete_all();
        $this->linkroute_model->delete_all();
        $this->session->set_flashdata('msg5', '<div class="alert alert-success alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Data Successfully Deleted!</div>');
        redirect('admin/data_site');
	}

	public function download_site(){
		//load our new PHPExcel library
		$this->load->library('excel');
		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('Site_Template');
		//set cell A1, B1, C1, D1, E1 content with some text
		$this->excel->getActiveSheet()->setCellValue('A1', 'Site ID');
		$this->excel->getActiveSheet()->setCellValue('B1', 'Site Name');
		$this->excel->getActiveSheet()->setCellValue('C1', 'Longitude');
		$this->excel->getActiveSheet()->setCellValue('D1', 'Latitude');

		 
		$filename='Site_Template.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		            
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');
	}

	// End Site----
	// Link Route
	public function linkroute(){
		if ($this->input->post('id') && $this->input->post('delete'))
        {
        	$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Data Successfully Deleted!</div>');
            $this->linkroute_model->delete($this->input->post('id'));
            exit;
        }
		$data = array(
			'title'		=> 'Link Route Table',
			'content'	=> 'linkroute',
			'site' 		=> $this->linkroute_model->get_all_twotable(),
		);
		$this->menampilkan($data);
	}
	public function insert_linkroute(){
		
		if($this->input->post('save')){
			$this->load->model('linkroute_model');
			$this->load->model('site_model');
			$site_id 	= $this->input->post('Site_ID');
			$band 		= $this->input->post('Band');
			$ne_id 		= $this->input->post('NE_ID');
			$fe_id 		= $this->input->post('FE_ID');
			$hop		= $this->input->post('HOP_ID_DETAIL');
			$required = ['Site_ID','Band','NE_ID','FE_ID','HOP_ID_DETAIL'];
			if(!$this->required_input($required)){
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="text-align:center;">Please fill out every field!</div>');
					redirect('admin/insert_linkroute');
			}
			else{
				$input = array(
						'Site_ID' 		=> $site_id,
						'SysID'			=> $band,
						'NE_ID'			=> $ne_id,
						'FE_ID'			=> $fe_id,
						'HOP_ID_DETAIL'	=> $hop
				);
				$cek_input = array(
						'Site_ID' 		=> $site_id,
						'SysID'			=> $band,
						'NE_ID'			=> $ne_id,
						'FE_ID'			=> $fe_id
				);
				
				$cek_data = $this->linkroute_model->get_data_byConditional($cek_input);
				if(count($cek_data) > 0){
					$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="text-align:center;">Data Already Exists</div>');
					redirect('admin/insert_linkroute');
				}
				else{
					$cek_site = $this->site_model->get_dataBy_siteID($site_id);
					if(count($cek_site) == 0){
						$this->session->set_flashdata('msg2', '<div class="alert alert-danger" style="text-align:center;">Site ID does not exist!</div>');
						redirect('admin/insert_linkroute');
						exit;
					}
					$cek_NE = $this->site_model->get_dataBy_siteID($ne_id);
					if(count($cek_NE) == 0){
						$this->session->set_flashdata('msg3', '<div class="alert alert-danger" style="text-align:center;">NE ID does not exist!</div>');
						redirect('admin/insert_linkroute');
						exit;
					}
					$cek_FE = $this->site_model->get_dataBy_siteID($fe_id);
					if(count($cek_FE) == 0){
						$this->session->set_flashdata('msg4', '<div class="alert alert-danger" style="text-align:center;">FE ID does not exist!</div>');
						redirect('admin/insert_linkroute');
						exit;
					}
					$this->linkroute_model->insert_linkroute($input);
					$this->session->set_flashdata('msg', '<div class="alert alert-success" style="text-align:center;"> Successed! </div>');
					//echo '<pre>';
					//print_r($input);
					//echo '</pre>';
					redirect('admin/insert_linkroute');
					exit;
				}
			}
		}
		$data = array(
			'title'		=> 'Input Form',
			'content'	=> 'insert_linkroute',
			'site'		=> $this->linkroute_model->get_all(),
			'site2'		=> $this->site_model->get_all()
		);
		$this->menampilkan($data);
	}
	public function insertCSV_Linkroute(){
		set_time_limit(1800);
		if($this->input->post('uploadcsv')){
			$file_name = $_FILES['file']['name'];
			$exe = substr($file_name, -4);
			if($file_name) {
				if($exe == ".csv") {
					
					$this->load->library('upload');
					//$file_name = $_FILES['file']['name'];
					$upload_path = realpath(APPPATH . '../assets/csv/linkroute');
					$file_name = str_replace(' ', '_', $file_name);
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
					for ($i = 1; $i < count($data_csv); $i++) {
						
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
							redirect('admin/insert_linkroute');
					   	}
					   	if(count($ne_id) < 1){
					   		$line = $i + 1;
					   		$this->session->set_flashdata('msgUpload', '<div class="alert alert-danger alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Failed! Please check <strong>  NE ID '. $data_csv[$i][3] .' in line '.$line.'</strong> in the file!</div>');
							redirect('admin/insert_linkroute');
					   	}
					   	if(count($fe_id) < 1){
					   		$line = $i + 1;
					   		$this->session->set_flashdata('msgUpload', '<div class="alert alert-danger alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Failed! Please check <strong>  FE ID '. $data_csv[$i][5] .' in line '.$line.'</strong> in the file!</div>');
							redirect('admin/insert_linkroute');
					   	}	
					}
					// Cek kesamaan data
					for ($i = 1; $i < count($data_csv); $i++) {
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
					   		$this->session->set_flashdata('msgUpload', '<div class="alert alert-danger alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Failed! Please check line '.$id.' already exists!</div>');
							redirect('admin/insert_linkroute');
					   	}
					}
					// insert data
					for ($i = 1; $i < count($data_csv); $i++) {
					   	$row = [
					    	'Site_ID' 		=> $data_csv[$i][0],
					    	'SysID' 		=> $data_csv[$i][1],
					    	'NE_ID' 		=> $data_csv[$i][3],
					    	'FE_ID' 		=> $data_csv[$i][5],
					    	'HOP_ID_DETAIL' => $data_csv[$i][7]
					   	];
					   	$this->linkroute_model->insert_linkroute($row);
					}
			   		$this->session->set_flashdata('msgUpload', '<div class="alert alert-success alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Successed!</div>');
					redirect('admin/insert_linkroute');
				}
				else
				{
					$this->session->set_flashdata('msgUpload', '<div class="alert alert-danger alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> The file format should be csv!</div>');
					redirect('admin/insert_site');
				}
					
			}
			else
			{
				$this->session->set_flashdata('msgUpload', '<div class="alert alert-warning alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> No files selected!</div>');
				redirect('admin/insert_linkroute');
			}
		}
			
	}
	public function edit_linkroute(){
		$get_id = $this->uri->segment(3);
		$siteID = $this->linkroute_model->get_data_byConditional(['id' => $get_id])->Site_ID;
		
		if(isset($get_id)){
			
			if($this->input->post('edit')){
				$required = ['Site_ID','Band','NE_ID','FE_ID','HOP_ID_DETAIL'];
				if(!$this->required_input($required)) {
					$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="text-align:center;">Please fill out every field!</div>');
					redirect('admin/edit_linkroute/'.$get_id);
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
						$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Data already exists!</div>');
						redirect('admin/edit_linkroute/'.$get_id);
					}
					else{
						// cek jika id yang diinput tidak ada di tabel site
						$site_id 	= $this->site_model->get_dataBy_siteID($site_id);
					   	$ne_id 		= $this->site_model->get_dataBy_siteID($ne_id);
					   	$fe_id 		= $this->site_model->get_dataBy_siteID($fe_id);
					   	if(count($site_id) < 1){
					   		$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>  Site ID '. $site_id.' does not exits!</strong></div>');
							redirect('admin/edit_linkroute/'.$get_id);
					   	}
					   	if(count($ne_id) < 1){
					   		$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>  Site ID '. $ne_id.' does not exits!</strong></div>');
							redirect('admin/edit_linkroute/'.$get_id);
					   	}
					   	if(count($fe_id) < 1){
					   		$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>  Site ID '. $fe_id.' does not exits!</strong></div>');
							redirect('admin/edit_linkroute/'.$get_id);
					   	}
					   	// update data
					   	$this->linkroute_model->update($get_id, $input);
					   	$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Successed!</div>');
						redirect('admin/edit_linkroute/'.$get_id);
					}
				}
			}
		}
		else {
			$this->session->set_flashdata('msg', '<div class="alert alert-warning" style="text-align:center;"> Required parameter is missing! </div>');
			redirect('admin/linkroute');
		}
			
		$data = array(
			'title'		=> 'Edit Form',
			'content'	=> 'edit_linkroute',
			'site'		=> $this->linkroute_model->get_data_byConditional(['id' => $get_id]),
			'all_site'	=> $this->linkroute_model->get_linkroute_byConditional($siteID),
			'site2'		=> $this->site_model->get_all()
		);
		$this->menampilkan($data);
	}
	public function delete_all_linkroute(){
        $this->linkroute_model->delete_all();
        $this->session->set_flashdata('msg5', '<div class="alert alert-success alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Data Successfully Deleted!</div>');
        redirect('admin/linkroute');
	}

	public function download_linkroute(){
		//load our new PHPExcel library
		$this->load->library('excel');
		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('Linkroute_Template');
		//set cell A1, B1, C1, D1, E1 content with some text
		$this->excel->getActiveSheet()->setCellValue('A1', 'Site_ID');
		$this->excel->getActiveSheet()->setCellValue('B1', 'SysID');
		$this->excel->getActiveSheet()->setCellValue('C1', 'NE_ID');
		$this->excel->getActiveSheet()->setCellValue('D1', 'FE_ID');
		$this->excel->getActiveSheet()->setCellValue('E1', 'HOP_ID_DETAIL');

		 
		$filename='Linkroute_Template.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		            
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');
	}

	// End Link Route----
	// Searching Route
	public function SearchingRoute(){
		$this->load->model('site_model');
		$data = array(
			'title'		=> 'Route',
			'content'	=> 'searchingroute',
			'site1'		=> $this->site_model->get_all()
		);
		$this->menampilkan($data);
	}
	public function find_searching(){
		if($this->input->post('cari')){
			$required = ['input_site','band'];
			$site = $this->input->post('input_site');
			$band_id = $this->input->post('band');
			if(isset($site) && isset($band_id)){
				$routes = $this->linkroute_model->getRoute($site, $band_id);
				$bts 	= $this->linkroute_model->getUnion($site, $band_id);
				if(count($routes) < 1 && count($bts) < 1){
					$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="text-align:center;">Empty</div>');
					redirect('admin/SearchingRoute');
					exit;
				}
			}
			else{
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="text-align:center;">Please fill out every field!</div>');
				redirect('admin/SearchingRoute');
			}
		}
		$data = array(
			'title'		=> 'Route',
			'content'	=> 'searchingroute',
			'site'		=> $routes,
			'site1'		=> $this->site_model->get_all(),
			'site2'		=> $bts
		);
		$this->menampilkan($data);
	}
	// End Searching Route----
	
	/*
	 * Fungsi-fungsi yang digunakan
	 */
	public function dump($data){
		echo "<pre>";
		var_dump($data);
		echo "</pre>";
	}
	
	private function openCSV($folder, $file_name){
		$file_name = str_replace(' ', '_', $file_name);
		$file = file('assets/csv/'.$folder.'/'.$file_name);
		// if ($file == false) {
		// 	$this->session->set_flashdata('msgUpload', '<div class="alert alert-warning alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> No files selected!</div>');
		// 	exit;
		// }
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
	public function menampilkan($data){
		$this->load->view('frames/templates', $data);
	}
	public function dialihkan($url){
		redirect($url);
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
	// End fungsi-fungsi yang digunakan----
}
?>