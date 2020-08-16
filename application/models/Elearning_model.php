<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Elearning_model extends CI_Model{
    
    function DocumentCount($searchText = ''){
        $this->db->select('docId, uploaderId, title, module, program, docUrl, venue, class, semester, ac_year, date');
        $this->db->from('lab_documents');
        if(!empty($searchText)) {
            $likeCriteria = "(lab_documents.title  LIKE '%".$searchText."%' OR  lab_documents.module  LIKE '%".$searchText."%' OR  lab_documents.program  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    
    function document($searchText = '', $page, $segment){
        $this->db->select('docId, uploaderId, title, module, program, docUrl, venue, class, semester, ac_year, date, name, userId');
        $this->db->from('lab_documents');
        $this->db->join('lab_users', 'lab_documents.uploaderId = lab_users.userId');
        if(!empty($searchText)) {
            $likeCriteria = "(title  LIKE '%".$searchText."%' OR  module  LIKE '%".$searchText."%' OR  program  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }

        $this->db->order_by('lab_documents.docId', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function fetchSub($user){
        $this->db->select('subId`, `studentId`, `materialId`, `lab_elearning_submissions.title`, `objectives`, `results`, `submission`, `lab_elearning_submissions.docUrl`, `lab_elearning_submissions.date`');
        $this->db->from('lab_elearning_submissions');
        $this->db->join('lab_users', 'lab_elearning_submissions.studentId = lab_users.userId');
        $this->db->join('lab_documents', 'lab_elearning_submissions.materialId = lab_documents.docId');
        // $this->db->where('docId', $user);
        $this->db->order_by('lab_documents.docId', 'DESC');
        
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    function fetchDoc(){
        $this->db->select('docId, title, module, class');
        $this->db->from('lab_documents');
        $this->db->order_by('lab_documents.docId', 'DESC');
        
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    function addNewDocument($documentInfo){
        $this->db->trans_start();
        $this->db->insert('lab_documents', $documentInfo);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        
        return $insert_id;
    }

    function submitDocument($documentInfo){
        $this->db->trans_start();
        $this->db->insert('lab_elearning_submissions', $documentInfo);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();

        return $insert_id;
    }
    
    function getDocumentInfo($docId){
        $this->db->select('docId, uploaderId, title, module, program, docUrl, venue, class, semester, ac_year, date, name');
        $this->db->from('lab_documents');
        $this->db->join('lab_users', 'lab_documents.uploaderId = lab_users.userId');
        $this->db->where('docId', $docId);
        $query = $this->db->get();
        
        return $query->row();
    }
    
    function editDocument($documentInfo, $docId){
        $this->db->where('docId', $docId);
        $this->db->update('lab_documents', $documentInfo);
        
        return TRUE;
    }
    
    function deleteDocument($docId){
        $this->db->where('docId', $docId);
        $this->db->delete();
        
        return $this->db->affected_rows();
    }

    function getDocumentInfoById($docId){
        $this->db->select('docId, uploaderId, title, module, program, docUrl, venue, class, semester, ac_year, date');
        $this->db->from('lab_documents');
        $this->db->where('docId', $docId);
        $query = $this->db->get();
        return $query->row();
    }
}

?>