<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Inventory_model extends CI_Model{
    
    function inventoryCount($searchText = ''){
        $this->db->select('inventoryId, inventoryName, inventoryType, barcode, inventorySize, count');
        $this->db->from('lab_inventory');
        if(!empty($searchText)) {
            $likeCriteria = "(lab_inventory.inventoryName  LIKE '%".$searchText."%'
                            OR  lab_inventory.inventoryType  LIKE '%".$searchText."%'
                            OR  lab_inventory.barcode  LIKE '%".$searchText."%'
                            OR  lab_inventory.inventorySize  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    
    function inventory($searchText = '', $page, $segment){
        $this->db->select('inventoryId, inventoryName, inventoryType, barcode, inventorySize, count');
        $this->db->from('lab_inventory');
        if(!empty($searchText)) {
            $likeCriteria = "(inventoryName  LIKE '%".$searchText."%' 
                            OR  inventoryType  LIKE '%".$searchText."%'
                            OR  lab_inventory.barcode  LIKE '%".$searchText."%' 
                            OR  inventorySize  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }

        $this->db->order_by('lab_inventory.inventoryId', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    
    function addNewInventory($inventoryInfo){
        $this->db->trans_start();
        $this->db->insert('lab_inventory', $inventoryInfo);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    function getInventoryInfo($inventoryId){
        $this->db->select('inventoryId, inventoryName, inventoryType, barcode, inventorySize, count');
        $this->db->from('lab_inventory');
        $this->db->where('inventoryId', $inventoryId);
        $query = $this->db->get();
        
        return $query->row();
    }
    
    function editInventory($inventoryInfo, $inventoryId){
        $this->db->where('inventoryId', $inventoryId);
        $this->db->update('lab_inventory', $inventoryInfo);
        
        return TRUE;
    }
    
    function deleteInventory($inventoryId){
        $this->db->where('inventoryId', $inventoryId);
        $this->db->from('lab_inventory');
        $this->db->delete();

        return $this->db->affected_rows();
    }

    function getInventoryInfoById($inventoryId){
        $this->db->select('inventoryId, inventoryName, inventoryType, barcode, inventorySize, count');
        $this->db->from('lab_inventory');
        $this->db->where('inventoryId', $inventoryId);
        $query = $this->db->get();
        
        return $query->row();
    }
}
?>