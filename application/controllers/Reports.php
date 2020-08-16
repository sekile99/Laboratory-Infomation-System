<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Reports extends BaseController{

    public function __construct(){
        parent::__construct();
        $this->load->model('elearning_model');
        $this->load->model('inventory_model');
        $this->load->model('user_model');
        $this->isLoggedIn();   
    }
    
    function index(){
        $this->load->library('pagination');

        $type = $this->input->post('type');
        $fromDate = $this->input->post('fromDate');
        $toDate = $this->input->post('toDate');
        
        $data['type'] = $type;
        $data['fromDate'] = $fromDate;
        $data['toDate'] = $toDate;

        if ($type == "users") {
            $count = $this->user_model->usersCount();
            $returns = $this->paginationCompress ( "reports/", $count, 10);

            $data['userRecords'] = $this->user_model->users('', $returns["page"], $returns["segment"]);
            $this->global['pageTitle'] = 'Users Report : LIS';   
        }

        if ($type == "inventory") {
            $count = $this->inventory_model->inventoryCount();
            $returns = $this->paginationCompress ( "reports/", $count, 10 );
            
            $data['inventoryRecords'] = $this->inventory_model->inventory('', $returns["page"], $returns["segment"]);

            $this->global['pageTitle'] = 'Inventory Report : LIS';
        }

        if($type == "elearning"){
            $count = $this->elearning_model->documentCount();

            $returns = $this->paginationCompress ( "reports/", $count, 10 );
            
            $data['elearningRecords'] = $this->elearning_model->document('', $returns["page"], $returns["segment"]);
            $this->global['pageTitle'] = 'Elearning Report : LIS';
        }

        if($type == "access"){            
            $count = $this->user_model->loginCounter($fromDate, $toDate);
            
            $data['accessRecords'] = $this->user_model->loginHistory(1, '', $fromDate, $toDate, NULL, NULL);
            $this->global['pageTitle'] = 'Access Log Report : LIS';
        }

        $this->renderView("reports/report", $this->global, $data, NULL);
    }
}

?>