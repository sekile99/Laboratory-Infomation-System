<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Chat extends BaseController {
	function __construct() {
		parent::__construct();
		$this->load->model('user_model');
		$this->isLoggedIn();
	}

	function index() {
		$data['usersList'] = $this->user_model->users('', '', null);
		$this->global['pageTitle'] = 'Chat : Lab Information';
		$this->renderView("chat", $this->global, NULL, NULL);
	}
}