<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

    function usersCount($searchText = '', $role = '') {
        $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.name, BaseTbl.mobile, BaseTbl.createdDtm, Role.role');
        $this->db->from('lab_users as BaseTbl');
        $this->db->join('lab_roles as Role', 'Role.roleId = BaseTbl.roleId', 'left');
        if (!empty($searchText)) {
            $likeCriteria = "(BaseTbl.email  LIKE '%" . $searchText . "%'
                            OR  BaseTbl.name  LIKE '%" . $searchText . "%'
                            OR  BaseTbl.mobile  LIKE '%" . $searchText . "%')";
            $this->db->where($likeCriteria);
        }
        if (!empty($role)) {
            $this->db->where('BaseTbl.roleId', $role);
        }

        $this->db->where('BaseTbl.isDeleted', 0);
        $query = $this->db->get();

        return $query->num_rows();
    }

    function users($searchText = '', $page, $segment, $role = '') {
        $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.name, BaseTbl.mobile, BaseTbl.createdDtm, Role.role');
        $this->db->from('lab_users as BaseTbl');
        $this->db->join('lab_roles as Role', 'Role.roleId = BaseTbl.roleId', 'left');
        if (!empty($searchText)) {
            $likeCriteria = "(BaseTbl.email  LIKE '%" . $searchText . "%' OR  BaseTbl.name  LIKE '%" . $searchText . "%' OR  BaseTbl.mobile  LIKE '%" . $searchText . "%')";
            $this->db->where($likeCriteria);
        }

        if (!empty($role)) {
            $this->db->where('BaseTbl.roleId', $role);
        }
        $this->db->where('BaseTbl.isDeleted', 0);
        // $this->db->where('BaseTbl.roleId !=', 1); //list admins as well
        $this->db->order_by('BaseTbl.userId', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    function teachers($id = '') {
        $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.name, BaseTbl.mobile, BaseTbl.createdDtm, Role.role');
        $this->db->from('lab_users as BaseTbl');
        $this->db->join('lab_roles as Role', 'Role.roleId = BaseTbl.roleId', 'left');
        $this->db->where('BaseTbl.isDeleted', 0);
        $this->db->where('BaseTbl.roleId =', 3);
        if (!empty($id)) {
            $this->db->where('BaseTbl.userId', $id);
        }
        $this->db->order_by('BaseTbl.userId', 'DESC');
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    function getUserRoles() {
        $this->db->select('roleId, role');
        $this->db->from('lab_roles');
        // $this->db->where('roleId !=', 1); //add other admins as well
        $query = $this->db->get();

        return $query->result();
    }

    function checkEmailExists($email, $userId = 0) {
        $this->db->select("email");
        $this->db->from("lab_users");
        $this->db->where("email", $email);
        $this->db->where("isDeleted", 0);
        if ($userId != 0) {
            $this->db->where("userId !=", $userId);
        }
        $query = $this->db->get();

        return $query->result();
    }

    function addNewUser($userInfo) {
        $this->db->trans_start();
        $this->db->insert('lab_users', $userInfo);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();

        return $insert_id;
    }

    function getUserInfo($userId) {
        $this->db->select('userId, name, email, mobile, roleId');
        $this->db->from('lab_users');
        $this->db->where('isDeleted', 0);
        // $this->db->where('roleId !=', 1); // access admin data
        $this->db->where('userId', $userId);
        $query = $this->db->get();

        return $query->row();
    }

    function editUser($userInfo, $userId) {
        $this->db->where('userId', $userId);
        $this->db->update('lab_users', $userInfo);

        return TRUE;
    }

    function deleteUser($userId, $userInfo) {
        $this->db->where('userId', $userId);
        $this->db->update('lab_users', $userInfo);

        return $this->db->affected_rows();
    }

    function matchOldPassword($userId, $oldPassword) {
        $this->db->select('userId, password');
        $this->db->where('userId', $userId);
        $this->db->where('isDeleted', 0);
        $query = $this->db->get('lab_users');
        $user = $query->result();

        if (!empty($user)) {
            if (verifyHashedPassword($oldPassword, $user[0]->password)) {
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }

    function changePassword($userId, $userInfo) {
        $this->db->where('userId', $userId);
        $this->db->where('isDeleted', 0);
        $this->db->update('lab_users', $userInfo);

        return $this->db->affected_rows();
    }

    function loginHistoryCount($userId, $searchText, $fromDate, $toDate) {
        $this->db->select('BaseTbl.userId, BaseTbl.sessionData, BaseTbl.machineIp, BaseTbl.userAgent, BaseTbl.agentString, BaseTbl.platform, BaseTbl.createdDtm');
        if (!empty($searchText)) {
            $likeCriteria = "(BaseTbl.sessionData LIKE '%" . $searchText . "%')";
            $this->db->where($likeCriteria);
        }
        if (!empty($fromDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) >= '" . date('Y-m-d', strtotime($fromDate)) . "'";
            $this->db->where($likeCriteria);
        }
        if (!empty($toDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) <= '" . date('Y-m-d', strtotime($toDate)) . "'";
            $this->db->where($likeCriteria);
        }
        if ($userId >= 1) {
            $this->db->where('BaseTbl.userId', $userId);
        }
        $this->db->from('lab_last_login as BaseTbl');
        $query = $this->db->get();

        return $query->num_rows();
    }

    function loginCounter($fromDate, $toDate) {
        $this->db->select('BaseTbl.userId, BaseTbl.sessionData, BaseTbl.machineIp, BaseTbl.userAgent, BaseTbl.agentString, BaseTbl.platform, BaseTbl.createdDtm');
        if (!empty($fromDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) >= '" . date('Y-m-d', strtotime($fromDate)) . "'";
            $this->db->where($likeCriteria);
        }
        if (!empty($toDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) <= '" . date('Y-m-d', strtotime($toDate)) . "'";
            $this->db->where($likeCriteria);
        }
        $this->db->from('lab_last_login as BaseTbl');
        $query = $this->db->get();

        return $query->num_rows();
    }

    function loginHistory($userId, $searchText, $fromDate, $toDate, $page, $segment) {
        $this->db->select('BaseTbl.userId, BaseTbl.sessionData, BaseTbl.machineIp, BaseTbl.userAgent, BaseTbl.agentString, BaseTbl.platform, BaseTbl.createdDtm');
        $this->db->from('lab_last_login as BaseTbl');
        if (!empty($searchText)) {
            $likeCriteria = "(BaseTbl.sessionData  LIKE '%" . $searchText . "%')";
            $this->db->where($likeCriteria);
        }
        if (!empty($fromDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) >= '" . date('Y-m-d', strtotime($fromDate)) . "'";
            $this->db->where($likeCriteria);
        }
        if (!empty($toDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) <= '" . date('Y-m-d', strtotime($toDate)) . "'";
            $this->db->where($likeCriteria);
        }
        if ($userId >= 1) {
            $this->db->where('BaseTbl.userId', $userId);
        }
        $this->db->order_by('BaseTbl.id', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    function getUserInfoById($userId) {
        $this->db->select('userId, name, email, mobile, roleId');
        $this->db->from('lab_users');
        $this->db->where('isDeleted', 0);
        $this->db->where('userId', $userId);
        $query = $this->db->get();

        return $query->row();
    }

    function getUserInfoWithRole($userId) {
        $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.name, BaseTbl.mobile, BaseTbl.roleId, Roles.role');
        $this->db->from('lab_users as BaseTbl');
        $this->db->join('lab_roles as Roles', 'Roles.roleId = BaseTbl.roleId');
        $this->db->where('BaseTbl.userId', $userId);
        $this->db->where('BaseTbl.isDeleted', 0);
        $query = $this->db->get();

        return $query->row();
    }
}