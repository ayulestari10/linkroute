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

	function linkroute(){
		$data = array(
			'title'		=> 'Link Route Table',
			'content'	=> 'linkroute',
			'site' 		=> $this->linkroute_model->get_all()
		);
		$this->load->view('frames/templates', $data);
	}

	function site(){
		$data = array(
			'title'		=> 'Site Table',
			'content'	=> 'site',
			'site'		=> $this->site_model->get_all()
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

	public function openCSV($file_name){
		$file = file('assets/csv/'.$file_name);
		foreach ($file as $k) {
			$csv[] = explode(',', $k);
		}

		if(count($csv[0]) == 1 ){
			foreach ($file as $k) {
				$csv[] = explode(';', $k);
			}
		}

		// echo count($csv);

		// echo '<pre>';
		// 	print_r($csv);
		// 	echo '</pre>';
		// exit;

		return $csv;
	}

	public function insertCSV(){
		if($this->input->post('uploadcsv')){

			$this->load->library('upload');

			$file_name = $_FILES['file']['name'];

			$upload_path = realpath(APPPATH . '../assets/csv/');
			@unlink($upload_path . '/' . $file_name);
			$config = [
				'file_name' 		=> $file_name,
				'allowed_types'		=> 'csv',
				'upload_path'		=> $upload_path
			];
			$this->upload->initialize($config);
			$this->upload->do_upload('file');

			// insert data

			$data_csv = $this->openCSV($file_name);


			for ($i = 0; $i < count($data_csv); $i++) {
			   	$row = [
			    	'Site_ID' 		=> $data_csv[$i][0],
			    	'SysID' 		=> $data_csv[$i][1],
			    	'SiteName' 		=> $data_csv[$i][2],
			    	'NE_ID' 		=> $data_csv[$i][3],
			    	'NE_Name' 		=> $data_csv[$i][4],
			    	'FE_ID' 		=> $data_csv[$i][5],
			    	'FE_Name' 		=> $data_csv[$i][6],
			    	'HOP_ID_DETAIL' => $data_csv[$i][7],
			   	];

			   	$this->linkroute_model->insert($row);
			}


			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> File berhasil disimpan!</div>');
			redirect('home/input_linkroute');

		}
	}

	function input_site(){
		$data = array(
			'title'		=> 'Input Form',
			'content'	=> 'input_site'
		);
		$this->load->view('frames/templates', $data);
	}

	function input_linkroute(){
		$data = array(
			'title'		=> 'Input Form',
			'content'	=> 'input_linkroute'
		);
		$this->load->view('frames/templates', $data);
	}

	function edit_site(){
		$data = array(
			'title'		=> 'Edit Form',
			'content'	=> 'edit_site'
		);
		$this->load->view('frames/templates', $data);
	}

	function edit_linkroute(){
		$data = array(
			'title'		=> 'Edit Form',
			'content'	=> 'edit_linkroute'
		);
		$this->load->view('frames/templates', $data);
	}
}

?>