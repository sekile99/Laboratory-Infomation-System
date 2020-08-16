<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' ); 

class BaseController extends CI_Controller {
	protected $role = '';
	protected $vendorId = '';
	protected $name = '';
	protected $roleText = '';
	protected $global = array ();
	protected $lastLogin = '';
	

	public function response($data = NULL) {
		$this->output->set_status_header(200)->set_content_type('application/json', 'utf-8')->set_output( json_encode($data, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES))->_display ();
		exit ();
	}
	
	function isLoggedIn() {
		$isLoggedIn = $this->session->userdata ('isLoggedIn') ;	
		if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
			redirect ('login');
		}else {
			$this->role = $this->session->userdata ('role');
			$this->vendorId = $this->session->userdata ('userId') ;
			$this->name = $this->session->userdata ('name');
			$this->roleText = $this->session->userdata ('roleText');
			$this->lastLogin = $this->session->userdata ('lastLogin');
			$this->global ['name'] = $this->name;
			$this->global ['role'] = $this->role;
			$this->global ['role_text'] = $this->roleText;
			$this->global ['last_login'] = $this->lastLogin;
		}
	}

	function isAdmin() {
		if ($this->role == ROLE_ADMIN) {
			return true;
		}else {
			return false;
		}
	}
	

	function isManager() {
		if ($this->role == ROLE_MANAGER) {
			return true;
		}else{
			return false;
		}
	}

	function isTeacher() {
		if ($this->role == ROLE_TEACHER) {
			return true;
		}else{
			return false;
		}
	}

	function isStudent() {
		if ($this->role == ROLE_STUDENT) {
			return true;
		}else{
			return false;
		}
	}
	
	function loadThis() {
		$this->global['pageTitle'] = 'Access Denied : Lab Information';
		$this->load->view ('templates/header', $this->global);
		$this->load->view ('access');
		$this->load->view ('templates/footer');
	}

	function logout() {
		$this->session->sess_destroy();
		redirect ('login');
	}

    function renderView($viewName = "", $headerInfo = NULL, $pageInfo = NULL, $footerInfo = NULL){
        $this->load->view('templates/header', $headerInfo);
        $this->load->view($viewName, $pageInfo);
        $this->load->view('templates/footer', $footerInfo);
	}
	
	public function upload_document($name='', $folder = ''){
        isset($folder) ? $config['upload_path'] = 'assets/uploads/'.$folder : $config['upload_path'] = 'assets/uploads/documents/';
        isset($name) ? $name = $name : $name = 'document';
        if (isset($_FILES[$name])) {
        	$nm = explode('.', $_FILES[$name]['name']);
			$fl = $nm[0];
	        $config['file_name'] =  $fl.uniqid();	
        }else{
	        $config['file_name'] =  $name.uniqid();
        }
		
        $config['max_size'] = '10000';
        $config['allowed_types'] = "*";
        $config['full_path'] = $config['upload_path'].'/'.$config['file_name'];
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($name)){
            return FALSE;
        }else{
            $data = array('upload_data' => $this->upload->data());
            $type = explode('.', $_FILES[$name]['name']);
            $type = $type[count($type) - 1];
            $path = $config['upload_path'].'/'.$config['file_name'].'.'.$type;
            return ($data == true) ? $path : false;         
        }
    }
	
	function paginationCompress($link, $count, $perPage = 10, $segment = SEGMENT) {
		$this->load->library ('pagination');
		$config ['base_url'] = base_url ($link);
		$config ['total_rows'] = $count;
		$config ['uri_segment'] = $segment;
		$config ['per_page'] = $perPage;
		$config ['num_links'] = 5;
		$config ['full_tag_open'] = '<nav><ul class="pagination">';
		$config ['full_tag_close'] = '</ul></nav>';
		$config ['first_tag_open'] = '<li class="arrow">';
		$config ['first_link'] = 'First';
		$config ['first_tag_close'] = '</li>';
		$config ['prev_link'] = 'Previous';
		$config ['prev_tag_open'] = '<li class="arrow">';
		$config ['prev_tag_close'] = '</li>';
		$config ['next_link'] = 'Next';
		$config ['next_tag_open'] = '<li class="arrow">';
		$config ['next_tag_close'] = '</li>';
		$config ['cur_tag_open'] = '<li class="active"><a href="#">';
		$config ['cur_tag_close'] = '</a></li>';
		$config ['num_tag_open'] = '<li>';
		$config ['num_tag_close'] = '</li>';
		$config ['last_tag_open'] = '<li class="arrow">';
		$config ['last_link'] = 'Last';
		$config ['last_tag_close'] = '</li>';
	
		$this->pagination->initialize ( $config );
		$page = $config ['per_page'];
		$segment = $this->uri->segment ( $segment );
	
		return array (
				"page" => $page,
				"segment" => $segment
		);
	}
}