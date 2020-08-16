<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Elearning extends BaseController{

    public function __construct(){
        parent::__construct();
        $this->load->model('elearning_model');
        $this->isLoggedIn();   
    }
    
    function index(){
        $searchText = $this->security->xss_clean($this->input->post('searchText'));
        $data['searchText'] = $searchText;
        
        $this->load->library('pagination');
        
        $count = $this->elearning_model->documentCount($searchText);

		$returns = $this->paginationCompress( "elearnings/", $count, 10 );
        
        $data['documentRecords'] = $this->elearning_model->document($searchText, $returns["page"], $returns["segment"]);

        $this->global['pageTitle'] = 'report : Lab information System';
        $this->renderView("elearning/elearning", $this->global, $data, NULL);
    }

    function addDocument(){
        if($this->isStudent() == TRUE){
            $this->loadThis();
        }else {
            $this->load->model('elearning_model');
            $this->global['pageTitle'] = 'Add document : Lab Information';
            $this->renderView("elearning/addDocument", $this->global, NUll, NULL);
        }
    }

    function addNewDocument(){
        if($this->isStudent() == TRUE){
            $this->loadThis();
        }else{
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('title','Document Title','trim|required|max_length[128]');
            $this->form_validation->set_rules('module','Module','trim|required|max_length[128]');
            $this->form_validation->set_rules('program','Program','trim|required|max_length[128]');
            $this->form_validation->set_rules('venue','Venue','trim|required|max_length[128]');
            $this->form_validation->set_rules('class','Class','trim|required|max_length[128]');
            $this->form_validation->set_rules('semester','Semester','trim|required|max_length[128]');
            $this->form_validation->set_rules('ac_year','Academic Year','required');
            
            if($this->form_validation->run() == FALSE){
                $this->addDocument();
            }else{
                $title = ucwords(strtolower($this->security->xss_clean($this->input->post('title'))));
                $module = ucwords(strtolower($this->security->xss_clean($this->input->post('module'))));
                $program = ucwords(strtolower($this->security->xss_clean($this->input->post('program'))));
                $venue = ucwords(strtolower($this->security->xss_clean($this->input->post('venue'))));
                $class = ucwords(strtolower($this->security->xss_clean($this->input->post('class'))));
                $semester = ucwords(strtolower($this->security->xss_clean($this->input->post('semester'))));
                $ac_year = ucwords(strtolower($this->security->xss_clean($this->input->post('ac_year'))));
                $date = $this->security->xss_clean($this->input->post('date'));

                $docUrl = $this->upload_document('document', 'documents');
                var_dump($docUrl);
                if($docUrl == FALSE){
                    $this->session->set_flashdata('error', 'Failed to upload Document');
                    redirect('addDocument');
                }

                $documentInfo = array(
                    'uploaderId' => $_SESSION['userId'],
                    'title' => $title, 
                    'module' => $module, 
                    'program' => $program, 
                    'docUrl' => $docUrl,
                    'venue' => $venue,
                    'class' => $class,
                    'semester' => $semester,
                    'ac_year' => $ac_year,
                    'date' => $date
                );

                $this->load->model('elearning_model');
                $result = $this->elearning_model->addNewDocument($documentInfo);
            
                if($result > 0){
                    $this->session->set_flashdata('success', 'New Document added successfully');
                }else{
                    $this->session->set_flashdata('error', 'Document creation failed');
                }
                redirect('addDocument');
            }
        }
    }

    function viewSubmissions(){
        if($this->isStudent() == TRUE){
            $this->loadThis();
        }else {
            $this->load->model('elearning_model');
            $data['subRecords'] = $this->elearning_model->fetchSub($_SESSION['userId']);
            $this->global['pageTitle'] = 'View Submissions : Lab Information';
            $this->renderView("elearning/viewSub", $this->global, $data, NULL);
        }
    }

    function submitDocument(){
        if($this->isStudent() == FALSE){
            $this->loadThis();
        }else {
            $this->load->model('elearning_model');
            $data['docs'] = $this->elearning_model->fetchDoc();
            $this->global['pageTitle'] = 'Submit document : Lab Information';
            $this->renderView("elearning/submitDocument", $this->global, $data, NULL);
        }
    }

    function  submitNewDocument(){
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('title','Title','trim|required|max_length[128]');
        $this->form_validation->set_rules('source','Source','trim|required');
        $this->form_validation->set_rules('objectives','Objectives','trim|required');
        $this->form_validation->set_rules('results','Results','trim|required|max_length[500]');
        $this->form_validation->set_rules('submission','Submission','trim|required|max_length[500]');
        
        if($this->form_validation->run() == FALSE){
            $this->submitDocument();
        }else{
            $title = ucwords(strtolower($this->security->xss_clean($this->input->post('title'))));
            $source = ucwords(strtolower($this->security->xss_clean($this->input->post('source'))));
            $objectives = ucwords(strtolower($this->security->xss_clean($this->input->post('objectives'))));
            $results = ucwords(strtolower($this->security->xss_clean($this->input->post('results'))));
            $submission = ucwords(strtolower($this->security->xss_clean($this->input->post('submission'))));

            $docUrl = $this->upload_document('document', 'documents');
            if($docUrl == FALSE){
                $this->session->set_flashdata('error', 'Failed to upload Document');
                redirect('submitDocument');
            }

            $documentInfo = array(
                'studentId' => $_SESSION['userId'],
                'title' => $title,
                'materialId' => $source, 
                'objectives' => $objectives, 
                'results' => $results, 
                'submission' => $submission,
                'docUrl' => $docUrl,
            );

            $this->load->model('elearning_model');
            $result = $this->elearning_model->submitDocument($documentInfo);
        
            if($result > 0){
                $this->session->set_flashdata('success', 'Document Submitted successfully');
            }else{
                $this->session->set_flashdata('error', 'Failed to Submit failed');
            }
            redirect('submitDocument');
        }
    }

    function editODocument($documentId = NULL){
        if($this->isAdmin() == FALSE && $this->isManager() == FALSE && $this->isTeacher() == FALSE){
            $this->loadThis();
        }else{
            if($documentId == null){
                redirect('elearning');
            }
            $data['documentInfo'] = $this->elearning_model->getDocumentInfo($documentId);
            
            $this->global['pageTitle'] = 'Edit Document : LIS';
            $this->renderView("elearning/editDocument", $this->global, $data, NULL);
        }
    }
    
    function editDocument(){
        if($this->isAdmin() == FALSE && $this->isManager() == FALSE && $this->isTeacher() == FALSE){
            $this->loadThis();
        }else{
            $this->load->library('form_validation');
            
            $documentId = $this->input->post('documentId');
            $this->form_validation->set_rules('name','Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('type','Type','trim|required|valid_email|max_length[128]');
            $this->form_validation->set_rules('subject','Subject','matches[cpassword]|max_length[20]');
        
            if($this->form_validation->run() == FALSE){
                $this->editODocument($documentId);
            }else{
                // TODO: identify the file referer
                $title = ucwords(strtolower($this->security->xss_clean($this->input->post('title'))));
                $module = ucwords(strtolower($this->security->xss_clean($this->input->post('module'))));
                $program = ucwords(strtolower($this->security->xss_clean($this->input->post('program'))));
                $venue = ucwords(strtolower($this->security->xss_clean($this->input->post('venue'))));
                $class = ucwords(strtolower($this->security->xss_clean($this->input->post('class'))));
                $semester = ucwords(strtolower($this->security->xss_clean($this->input->post('semester'))));
                $ac_year = ucwords(strtolower($this->security->xss_clean($this->input->post('ac_year'))));
                $date = ucwords(strtolower($this->security->xss_clean($this->input->post('date'))));

                $docUrl = $this->upload_document($title, 'documents');
                if($docUrl == FALSE){
                    $this->session->set_flashdata('error', 'Failed to upload Document');
                    redirect('addDocument');
                }

                $documentInfo = array(
                    'uploaderId' => $_SESSION['userId'],
                    'title' => $title, 
                    'module' => $module, 
                    'program' => $program, 
                    'docUrl' => $docUrl,
                    'venue' => $venue,
                    'class' => $class,
                    'semester' => $semester,
                    'ac_year' => $ac_year,
                    'date' => $date
                );
                
                $result = $this->elearning_model->editDocument($documentInfo, $documentId);
                
                if($result == true){
                    $this->session->set_flashdata('success', 'Document updated successfully');
                }else{
                    $this->session->set_flashdata('error', 'Document updation failed');
                }
                redirect('elearning');
            }
        }
    }

    function deleteDocument(){
        if($this->isAdmin() == FALSE && $this->isManager() == FALSE && $this->isTeacher() == FALSE){
            echo(json_encode(array('status'=>'access')));
        }else{
            $documentId = $this->input->post('documentId');
            $result = $this->elearning_model->deleteDocument($documentId);

            if ($result > 0) { 
                echo(json_encode(array('status'=>TRUE))); 
            }else { 
                echo(json_encode(array('status'=>FALSE))); 
            }
        }
    }
}

?>