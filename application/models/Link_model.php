<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Link_model extends CI_Model {

    function linkCount($searchText = '') {
        $this->db->select('linkId, title, url, addedBy, date');
        $this->db->from('lab_links');
        if (!empty($searchText)) {
            $likeCriteria = "(lab_links.title  LIKE '%" . $searchText . "%'
                            OR  lab_links.url  LIKE '%" . $searchText . "%'
                            OR  lab_links.date  LIKE '%" . $searchText . "%')";
            $this->db->where($likeCriteria);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }

    function link($searchText = '', $page, $segment) {
        $this->db->select('linkId, title, url, addedBy, date,name');
        $this->db->from('lab_links');
        $this->db->join('lab_users', 'lab_links.addedBy = lab_users.userId');
        if (!empty($searchText)) {
            $likeCriteria = "(lab_links.title  LIKE '%" . $searchText . "%'
                            OR  lab_links.url  LIKE '%" . $searchText . "%'
                            OR  lab_links.date  LIKE '%" . $searchText . "%')";
            $this->db->where($likeCriteria);
        }

        $this->db->order_by('lab_links.linkId', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function addNewLink($linkInfo) {
        $this->db->trans_start();
        $this->db->insert('lab_links', $linkInfo);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    function getlinkInfo($linkId) {
        $this->db->select('linkId, title, url, addedBy, date');
        $this->db->from('lab_links');
        $this->db->where('linkId', $linkId);
        $query = $this->db->get();
        return $query->row();
    }

    function editlink($linkInfo, $linkId) {
        $this->db->where('linkId', $linkId);
        $this->db->update('lab_links', $linkInfo);
        return TRUE;
    }

    function deleteLink($linkId) {
        $this->db->where('linkId', $linkId);
        $this->db->from('lab_links');
        $this->db->delete();

        return $this->db->affected_rows();
    }

    function getlinkInfoById($linkId) {
        $this->db->select('linkId, title, url, addedBy, date');
        $this->db->from('lab_links');
        $this->db->where('linkId', $linkId);
        $query = $this->db->get();

        return $query->row();
    }
}