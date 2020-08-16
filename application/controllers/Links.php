<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Links extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->load->model('link_model');
        $this->isLoggedIn();
    }

    function index() {
        $searchText = $this->security->xss_clean($this->input->post('searchText'));
        $data['searchText'] = $searchText;

        $this->load->library('pagination');

        $count = $this->link_model->linkCount($searchText);

        $returns = $this->paginationCompress("links/", $count, 10);

        $data['linkRecords'] = $this->link_model->link($searchText, $returns["page"], $returns["segment"]);

        $this->global['pageTitle'] = 'Useful Links';
        $this->renderView("links/link", $this->global, $data, NULL);
    }

    function addLink() {
        if ($this->isStudent() == TRUE) {
            $this->loadThis();
        } else {
            $this->load->model('link_model');
            $this->global['pageTitle'] = 'Add link';
            $this->renderView("links/addLink", $this->global, NUll, NULL);
        }
    }

    function addNewLink() {
        if ($this->isStudent() == TRUE) {
            $this->loadThis();
        } else {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Link Title', 'trim|required|max_length[128]');
            $this->form_validation->set_rules('url', 'Link Url', 'trim|required|max_length[128]');


            if ($this->form_validation->run() == FALSE) {
                $this->addlink();
            } else {
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('title'))));
                $labname = ucwords(strtolower($this->security->xss_clean($this->input->post('url'))));


                $linkInfo = array(
                    'title' => $name,
                    'url' => $labname,
                    'addedBy' => $this->vendorId
                );

                $this->load->model('link_model');
                $result = $this->link_model->addNewLink($linkInfo);

                if ($result > 0) {
                    $this->session->set_flashdata('success', 'New Useful Link added successfully');
                } else {
                    $this->session->set_flashdata('error', 'failed to add Useful Link');
                }
                redirect('addLink');
            }
        }
    }

    function editOLink($linkId = NULL) {
        if ($this->isStudent() == TRUE) {
            $this->loadThis();
        } else {
            if ($linkId == null) {
                redirect('links');
            }
            $data['linkInfo'] = $this->link_model->getlinkInfo($linkId);

            $this->global['pageTitle'] = 'Edit Link';
            $this->renderView("links/editLink", $this->global, $data, NULL);
        }
    }

    function editLink() {
        if ($this->isStudent() == TRUE) {
            $this->loadThis();
        } else {
            $this->load->library('form_validation');

            $linkId = $this->input->post('linkId');
            $this->form_validation->set_rules('linkName', 'link Name', 'trim|required|max_length[128]');
            $this->form_validation->set_rules('laboratoryName', 'Laboratory Name', 'trim|required|max_length[128]');

            if ($this->form_validation->run() == FALSE) {
                $this->editOlink($linkId);
            } else {
                $linkId = $this->input->post('linkId');
                $title = ucwords(strtolower($this->security->xss_clean($this->input->post('title'))));
                $url = ucwords(strtolower($this->security->xss_clean($this->input->post('url'))));



                $this->load->model('link_model');
                $linkInfo = array(
                    'title' => $title,
                    'url' => $url,
                    'createdBy' => $this->vendorId

                );

                $result = $this->link_model->editlink($linkInfo, $linkId);

                if ($result == true) {
                    $this->session->set_flashdata('success', 'link updated successfully');
                } else {
                    $this->session->set_flashdata('error', 'link update failed');
                }
                redirect('links');
            }
        }
    }

    function deleteLink() {
        if ($this->isStudent() == TRUE) {
            echo (json_encode(array('status' => 'access')));
        } else {
            $linkId = $this->input->post('linkId');
            $result = $this->link_model->deleteLink($linkId);
            if ($result > 0) {
                echo (json_encode(array('status' => TRUE)));
            } else {
                echo (json_encode(array('status' => FALSE)));
            }
        }
    }
}