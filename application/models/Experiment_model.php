<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Experiment_model extends CI_Model {

    function experimentCount($searchText = '') {
        $this->db->select('experimentId, labName, experimentName, tools, items, hazards, ppe, createdBy');
        $this->db->from('lab_experiments');
        if (!empty($searchText)) {
            $likeCriteria = "(lab_experiments.experimentName  LIKE '%" . $searchText . "%'
                            OR  lab_experiments.labName  LIKE '%" . $searchText . "%'
                            OR  lab_experiments.tools  LIKE '%" . $searchText . "%'
                            OR  lab_experiments.hazards  LIKE '%" . $searchText . "%'
                            OR  lab_experiments.ppe  LIKE '%" . $searchText . "%'
                            OR  lab_experiments.items  LIKE '%" . $searchText . "%')";
            $this->db->where($likeCriteria);
        }
        $query = $this->db->get();

        return $query->num_rows();
    }

    function experiment($searchText = '', $page, $segment) {
        $this->db->select('experimentId, labName, experimentName, tools, items, hazards, ppe, createdBy');
        $this->db->from('lab_experiments');
        if (!empty($searchText)) {
            $likeCriteria = "(experimentName  LIKE '%" . $searchText . "%' 
                            OR  lab_experiments.labName  LIKE '%" . $searchText . "%'
                            OR  lab_experiments.tools  LIKE '%" . $searchText . "%'
                            OR  lab_experiments.hazards  LIKE '%" . $searchText . "%'
                            OR  lab_experiments.ppe  LIKE '%" . $searchText . "%' 
                            OR  lab_experiments.items  LIKE '%" . $searchText . "%')";
            $this->db->where($likeCriteria);
        }

        $this->db->order_by('lab_experiments.experimentId', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    function addNewExperiment($experimentInfo) {
        $this->db->trans_start();
        $this->db->insert('lab_experiments', $experimentInfo);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();

        return $insert_id;
    }

    function getexperimentInfo($experimentId) {
        $this->db->select('experimentId, labName, experimentName, tools, items, hazards, ppe, createdBy');
        $this->db->from('lab_experiments');
        $this->db->where('experimentId', $experimentId);
        $query = $this->db->get();

        return $query->row();
    }

    function editexperiment($experimentInfo, $experimentId) {
        $this->db->where('experimentId', $experimentId);
        $this->db->update('lab_experiments', $experimentInfo);

        return TRUE;
    }

    function deleteExperiment($experimentId) {
        $this->db->where('experimentId', $experimentId);
        $this->db->from('lab_experiments');
        $this->db->delete();

        return $this->db->affected_rows();
    }

    function getexperimentInfoById($experimentId) {
        $this->db->select('experimentId, labName, experimentName, tools, items, hazards, ppe, createdBy');
        $this->db->from('lab_experiments');
        $this->db->where('experimentId', $experimentId);
        $query = $this->db->get();

        return $query->row();
    }
}