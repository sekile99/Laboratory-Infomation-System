<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Experiments extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->load->model('experiment_model');
        $this->isLoggedIn();
    }

    function index() {
        $searchText = $this->security->xss_clean($this->input->post('searchText'));
        $data['searchText'] = $searchText;

        $this->load->library('pagination');

        $count = $this->experiment_model->experimentCount($searchText);

        $returns = $this->paginationCompress("experiments/", $count, 10);

        $data['experimentRecords'] = $this->experiment_model->experiment($searchText, $returns["page"], $returns["segment"]);

        $this->global['pageTitle'] = 'Experiment Guide';
        $this->renderView("experiments/experiment", $this->global, $data, NULL);
    }

    function addExperiment() {
        if ($this->isStudent() == TRUE) {
            $this->loadThis();
        } else {
            $this->load->model('experiment_model');
            $this->global['pageTitle'] = 'Add experiment';
            $this->renderView("experiments/addExperiment", $this->global, NUll, NULL);
        }
    }

    function addNewExperiment() {
        if ($this->isStudent() == TRUE) {
            $this->loadThis();
        } else {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('experimentName', 'experiment Name', 'trim|required|max_length[128]');
            $this->form_validation->set_rules('laboratoryName', 'Laboratory Name', 'trim|required|max_length[128]');
            $this->form_validation->set_rules('tools', 'Size', 'trim|required');
            $this->form_validation->set_rules('items', 'Chemicals/Items', 'trim|required');
            $this->form_validation->set_rules('hazards', 'Hazards', 'trim|required');
            $this->form_validation->set_rules('ppe', 'Personal Protective Equipments', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->addexperiment();
            } else {
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('experimentName'))));
                $labname = ucwords(strtolower($this->security->xss_clean($this->input->post('laboratoryName'))));
                $tools = ucwords($this->security->xss_clean($this->input->post('tools')));
                $items = ucwords(strtolower($this->security->xss_clean($this->input->post('items'))));
                $hazards = ucwords(strtolower($this->security->xss_clean($this->input->post('hazards'))));
                $ppe = ucwords(strtolower($this->security->xss_clean($this->input->post('ppe'))));

                $experimentInfo = array(
                    'experimentName' => $name,
                    'labName' => $labname,
                    'tools' => $tools,
                    'items' => $items,
                    'hazards' => $hazards,
                    'ppe' => $ppe,
                    'createdBy' => $this->vendorId

                );

                $this->load->model('experiment_model');
                $result = $this->experiment_model->addNewExperiment($experimentInfo);

                if ($result > 0) {
                    $this->session->set_flashdata('success', 'New Experiment Guide added successfully');
                } else {
                    $this->session->set_flashdata('error', 'failed to add Experiment Guide');
                }
                redirect('addExperiment');
            }
        }
    }

    function editOExperiment($experimentId = NULL) {
        if ($this->isStudent() == TRUE) {
            $this->loadThis();
        } else {
            if ($experimentId == null) {
                redirect('experiments');
            }
            $data['experimentInfo'] = $this->experiment_model->getexperimentInfo($experimentId);

            $this->global['pageTitle'] = 'Edit Experiment';
            $this->renderView("experiments/editExperiment", $this->global, $data, NULL);
        }
    }

    function editExperiment() {
        if ($this->isStudent() == TRUE) {
            $this->loadThis();
        } else {
            $this->load->library('form_validation');

            $experimentId = $this->input->post('experimentId');
            $this->form_validation->set_rules('experimentName', 'experiment Name', 'trim|required|max_length[128]');
            $this->form_validation->set_rules('laboratoryName', 'Laboratory Name', 'trim|required|max_length[128]');
            $this->form_validation->set_rules('tools', 'Tools', 'trim|required');
            $this->form_validation->set_rules('items', 'Chemicals/Items', 'trim|required');
            $this->form_validation->set_rules('hazards', 'Hazards', 'trim|required');
            $this->form_validation->set_rules('ppe', 'Personal Protective Equipments', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->editOexperiment($experimentId);
            } else {
                $experimentId = $this->input->post('experimentId');
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('experimentName'))));
                $labname = ucwords(strtolower($this->security->xss_clean($this->input->post('laboratoryName'))));
                $tools = ucwords($this->security->xss_clean($this->input->post('tools')));
                $items = ucwords(strtolower($this->security->xss_clean($this->input->post('items'))));
                $hazards = ucwords(strtolower($this->security->xss_clean($this->input->post('hazards'))));
                $ppe = ucwords(strtolower($this->security->xss_clean($this->input->post('ppe'))));

                $this->load->model('experiment_model');
                $experimentInfo = array(
                    'experimentName' => $name,
                    'labName' => $labname,
                    'tools' => $tools,
                    'items' => $items,
                    'hazards' => $hazards,
                    'ppe' => $ppe,
                    'createdBy' => $this->vendorId

                );

                $result = $this->experiment_model->editexperiment($experimentInfo, $experimentId);

                if ($result == true) {
                    $this->session->set_flashdata('success', 'experiment updated successfully');
                } else {
                    $this->session->set_flashdata('error', 'experiment update failed');
                }
                redirect('experiments');
            }
        }
    }

    function deleteExperiment() {
        if ($this->isStudent() == TRUE) {
            echo (json_encode(array('status' => 'access')));
        } else {
            $experimentId = $this->input->post('experimentId');
            $result = $this->experiment_model->deleteExperiment($experimentId);
            if ($result > 0) {
                echo (json_encode(array('status' => TRUE)));
            } else {
                echo (json_encode(array('status' => FALSE)));
            }
        }
    }
}