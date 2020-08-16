<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Dashboard extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->load->model('elearning_model');
        $this->load->model('inventory_model');
        $this->load->model('link_model');
        $this->load->model('user_model');
        $this->isLoggedIn();
    }

    public function index() {
        $data['totalUsers'] = $this->user_model->usersCount();
        $data['totalInventory'] = $this->inventory_model->inventoryCount();
        $data['totalDocuments'] = $this->elearning_model->documentCount();

        $data['documentRecords'] = $this->elearning_model->document('', 5, NULL);
        $data['linkRecords'] = $this->link_model->link('', 5, null);

        $this->global['pageTitle'] = 'Dashboard : Lab Information';
        $this->renderView("dashboard", $this->global, $data, NULL);
    }
}