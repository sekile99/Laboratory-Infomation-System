<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Inventory extends BaseController{

    public function __construct(){
        parent::__construct();
        $this->load->model('inventory_model');
        $this->isLoggedIn();   
    }
    
    function index(){
        $searchText = $this->security->xss_clean($this->input->post('searchText'));
        $data['searchText'] = $searchText;
        
        $this->load->library('pagination');
        
        $count = $this->inventory_model->inventoryCount($searchText);

		$returns = $this->paginationCompress ( "inventory/", $count, 10 );
        
        $data['inventoryRecords'] = $this->inventory_model->inventory($searchText, $returns["page"], $returns["segment"]);
        
        $this->global['pageTitle'] = 'inventory : Lab information System';
        $this->renderView("inventory/inventory", $this->global, $data, NULL);
    }

    function assign(){
        if($this->isAdmin() == FALSE && $this->isManager() == FALSE){
            $this->loadThis();
        }else {
            $this->load->model('user_model');
            $this->load->model('inventory_model');

            $data['teachers'] = $this->user_model->teachers();
            $data['tools'] = $this->inventory_model->inventory('', 1, 1);
            $this->global['pageTitle'] = 'Assign instruments : Lab Information';
            $this->renderView("inventory/assign", $this->global, $data, NULL);
        }
    }

    function addInventory(){
        if($this->isAdmin() == FALSE && $this->isManager() == FALSE){
            $this->loadThis();
        }else {
            $this->load->model('inventory_model');
            $this->global['pageTitle'] = 'Add inventory : Lab Information';
            $this->renderView("inventory/addInventory", $this->global, NUll, NULL);
        }
    }

    function addNewInventory(){
        if($this->isAdmin() == FALSE && $this->isManager() == FALSE){
            $this->loadThis();
        }else{
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('name','Inventory Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('type','Type','trim|required|max_length[128]');
            $this->form_validation->set_rules('size','Size','trim|required|max_length[128]');
            $this->form_validation->set_rules('qty','Quantity','required');
            
            if($this->form_validation->run() == FALSE){
                $this->addInventory();
            }else{
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('name'))));
                $type = ucwords(strtolower($this->security->xss_clean($this->input->post('type'))));
                $barcode = ucwords($this->security->xss_clean($this->input->post('barcode')));
                $size = ucwords(strtolower($this->security->xss_clean($this->input->post('size'))));
                $quantity = ucwords(strtolower($this->security->xss_clean($this->input->post('qty'))));
                
                if(!isset($barcode)){
                    $barcode = rand(0, 9999999999);
                }

                $inventoryInfo = array(
                    'inventoryName' => $name, 
                    'inventoryType' => $type, 
                    'barcode' => $barcode,
                    'inventorySize' => $size, 
                    'count' => $quantity
                );
                
                $this->load->model('inventory_model');
                $result = $this->inventory_model->addNewInventory($inventoryInfo);
            
                if($result > 0){
                    $this->session->set_flashdata('success', 'New item added successfully');
                }else{
                    $this->session->set_flashdata('error', 'failed to add item');
                }
                redirect('addInventory');
            }
        }
    }

    function editOInventory($inventoryId = NULL){
        if($this->isAdmin() == FALSE && $this->isManager() == FALSE){
            $this->loadThis();
        }else{
            if($inventoryId == null){
                redirect('inventory');
            }
            $data['inventoryInfo'] = $this->inventory_model->getInventoryInfo($inventoryId);
            
            $this->global['pageTitle'] = 'Edit Inventory : LIS';
            $this->renderView("inventory/editInventory", $this->global, $data, NULL);
        }
    }
    
    function editInventory(){
        if($this->isAdmin() == FALSE && $this->isManager() == FALSE){
            $this->loadThis();
        }else{
            $this->load->library('form_validation');
            
            $inventoryId = $this->input->post('inventoryId');
            $this->form_validation->set_rules('name','Inventory Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('type','Type','trim|required|max_length[128]');
            $this->form_validation->set_rules('size','Size','trim|required|max_length[128]');
            $this->form_validation->set_rules('qty','Quantity','required');
            
            if($this->form_validation->run() == FALSE){
                $this->editOInventory($inventoryId);
            }else{
                $inventoryId = $this->input->post('inventoryId');
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('name'))));
                $type = ucwords(strtolower($this->security->xss_clean($this->input->post('type'))));
                $barcode = ucwords($this->security->xss_clean($this->input->post('barcode')));
                $size = ucwords(strtolower($this->security->xss_clean($this->input->post('size'))));
                $quantity = ucwords(strtolower($this->security->xss_clean($this->input->post('qty'))));
                
                $inventoryInfo = array(
                    'inventoryName' => $name, 
                    'inventoryType' => $type, 
                    'inventorySize' => $size, 
                    'barcode' => $barcode,
                    'count' => $quantity
                );
                
                $this->load->model('inventory_model');
                $inventoryInfo = array(
                    'inventoryName' => $name, 
                    'inventoryType' => $type,
                    'barcode' => $barcode, 
                    'inventorySize' => $size, 
                    'count' => $quantity
                );
                 
                $result = $this->inventory_model->editInventory($inventoryInfo, $inventoryId);
                
                if($result == true){
                    $this->session->set_flashdata('success', 'Inventory updated successfully');
                }else{
                    $this->session->set_flashdata('error', 'Inventory update failed');
                }
                redirect('inventory');
            }
        }
    }

    function deleteInventory(){
        if($this->isAdmin() == FALSE){
            echo(json_encode(array('status'=>'access')));
        }else{
            $inventoryId = $this->input->post('inventoryId');
            $result = $this->inventory_model->deleteInventory($inventoryId);
            if ($result > 0) { 
                echo(json_encode(array('status'=>TRUE))); 
            }else { 
                echo(json_encode(array('status'=>FALSE))); 
            }
        }
    }

    function inventoryHistoy($assignId = NULL){
        if($this->isAdmin() == FALSE){
            $this->loadThis();
        }else{
            $assignId = ($assignId == NULL ? 0 : $assignId);

            $searchText = $this->input->post('searchText');
            $fromDate = $this->input->post('fromDate');
            $toDate = $this->input->post('toDate');

            $data["userInfo"] = $this->user_model->getUserInfoById($assignId);
            $data['searchText'] = $searchText;
            $data['fromDate'] = $fromDate;
            $data['toDate'] = $toDate;
            
            $this->load->library('pagination');
            
            $count = $this->user_model->loginHistoryCount($assignId, $searchText, $fromDate, $toDate);
            $returns = $this->paginationCompress ( "login-history/".$assignId."/", $count, 10, 3);
            $data['userRecords'] = $this->user_model->loginHistory($assignId, $searchText, $fromDate, $toDate, $returns["page"], $returns["segment"]);
            $this->global['pageTitle'] = 'User Login History : LIS';
            $this->renderView("users/loginHistory", $this->global, $data, NULL);
        }        
    }
}

?>