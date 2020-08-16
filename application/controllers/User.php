<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class User extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->isLoggedIn();
    }

    public function index() {
        $this->global['pageTitle'] = 'Dashboard : Lab Information';
        $this->renderView("dashboard", $this->global, NULL, NULL);
    }

    public function show_404() {
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            $this->load->view('login');
        } else {
            $this->global['pageTitle'] = '404 Page not Found: Lab Information';
            $this->renderView("404", $this->global, NULL, NULL);
        }
    }

    function users() {
        if ($this->isAdmin() == FALSE) {
            $this->loadThis();
        } else {
            parse_str($_SERVER['QUERY_STRING'], $_GET);
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;

            $this->load->library('pagination');
            $data['totalUsers'] = $this->user_model->usersCount();
            $data['admins'] = $this->user_model->usersCount('', 1);
            $data['managers'] = $this->user_model->usersCount('', 2);
            $data['teachers'] = $this->user_model->usersCount('', 3);
            $data['students'] = $this->user_model->usersCount('', 4);
            $count = $this->user_model->usersCount($searchText);

            $returns = $this->paginationCompress("users/", $count, 10);
            if (isset($_GET['role'])) {
                $role = $_GET['role'];
                if ($role == 'all' || $role == 'admins' || $role == 'managers' || $role == 'teachers' || $role == 'students') {
                    if ($role == 'all') {
                        $data['userRecords'] = $this->user_model->users($searchText, $returns["page"], $returns["segment"]);
                        $this->global['pageTitle'] = 'Admins : Lab information System';
                        $this->renderView("users/users", $this->global, $data, NULL);
                    }
                    if ($role == 'admins') {
                        $data['userRecords'] = $this->user_model->users($searchText, $returns["page"], $returns["segment"], 1);
                        $this->global['pageTitle'] = 'Admins : Lab information System';
                        $this->renderView("users/users", $this->global, $data, NULL);
                    }
                    if ($role == 'managers') {
                        $data['userRecords'] = $this->user_model->users($searchText, $returns["page"], $returns["segment"], 2);
                        $this->global['pageTitle'] = 'Teachers : Lab information System';
                        $this->renderView("users/users", $this->global, $data, NULL);
                    }
                    if ($role == 'teachers') {
                        $data['userRecords'] = $this->user_model->users($searchText, $returns["page"], $returns["segment"], 3);
                        $this->global['pageTitle'] = 'Store Keepers : Lab information System';
                        $this->renderView("users/users", $this->global, $data, NULL);
                    }
                    if ($role == 'students') {
                        $data['userRecords'] = $this->user_model->users($searchText, $returns["page"], $returns["segment"], 4);
                        $this->global['pageTitle'] = 'Students : Lab information System';
                        $this->renderView("users/users", $this->global, $data, NULL);
                    }
                } else {
                    //redirect to users prepage if the role is not defined.
                    redirect('users');
                }
            } else {
                $data['userRecords'] = $this->user_model->users($searchText, $returns["page"], $returns["segment"]);
                $this->global['pageTitle'] = 'Users : Lab information System';
                $this->renderView("users/dashboard", $this->global, $data, NULL);
            }
        }
    }

    function addNew() {
        if ($this->isAdmin() == FALSE) {
            $this->loadThis();
        } else {
            $this->load->model('user_model');
            $data['roles'] = $this->user_model->getUserRoles();

            $this->global['pageTitle'] = 'Add user : Lab Information';
            $this->renderView("users/addUser", $this->global, $data, NULL);
        }
    }

    function checkEmailExists() {
        $userId = $this->input->post("userId");
        $email = $this->input->post("email");

        if (empty($userId)) {
            $result = $this->user_model->checkEmailExists($email);
        } else {
            $result = $this->user_model->checkEmailExists($email, $userId);
        }

        if (empty($result)) {
            echo ("true");
        } else {
            echo ("false");
        }
    }

    function addNewUser() {
        if ($this->isAdmin() == FALSE) {
            $this->loadThis();
        } else {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('fname', 'Full Name', 'trim|required|max_length[128]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[128]');
            $this->form_validation->set_rules('password', 'Password', 'required|max_length[20]');
            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]|max_length[20]');
            $this->form_validation->set_rules('role', 'Role', 'trim|required|numeric');
            $this->form_validation->set_rules('mobile', 'Mobile Number', 'required|min_length[10]');

            if ($this->form_validation->run() == FALSE) {
                $this->addNew();
            } else {
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
                $email = strtolower($this->security->xss_clean($this->input->post('email')));
                $password = $this->input->post('password');
                $roleId = $this->input->post('role');
                $mobile = $this->security->xss_clean($this->input->post('mobile'));

                $userInfo = array(
                    'email' => $email,
                    'password' => getHashedPassword($password),
                    'roleId' => $roleId,
                    'name' => $name,
                    'mobile' => $mobile,
                    'createdBy' => $this->vendorId,
                    'createdDtm' => date('Y-m-d H:i:s')
                );

                $this->load->model('user_model');
                $result = $this->user_model->addNewUser($userInfo);

                if ($result > 0) {
                    $this->session->set_flashdata('success', 'New User created successfully');
                } else {
                    $this->session->set_flashdata('error', 'User creation failed');
                }
                redirect('addNew');
            }
        }
    }

    function editOld($userId = NULL) {
        if ($this->isAdmin() == FALSE || $userId == 1) {
            $this->loadThis();
        } else {
            if ($userId == null) {
                redirect('users');
            }

            $data['roles'] = $this->user_model->getUserRoles();
            $data['userInfo'] = $this->user_model->getUserInfo($userId);

            $this->global['pageTitle'] = 'Edit User : LIS';
            $this->renderView("users/editOld", $this->global, $data, NULL);
        }
    }

    function editUser() {
        if ($this->isAdmin() == FALSE) {
            $this->loadThis();
        } else {
            $this->load->library('form_validation');

            $userId = $this->input->post('userId');
            $this->form_validation->set_rules('fname', 'Full Name', 'trim|required|max_length[128]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[128]');
            $this->form_validation->set_rules('password', 'Password', 'matches[cpassword]|max_length[20]');
            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'matches[password]|max_length[20]');
            $this->form_validation->set_rules('role', 'Role', 'trim|required|numeric');
            $this->form_validation->set_rules('mobile', 'Mobile Number', 'required|min_length[10]');

            if ($this->form_validation->run() == FALSE) {
                $this->editOld($userId);
            } else {
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
                $email = strtolower($this->security->xss_clean($this->input->post('email')));
                $password = $this->input->post('password');
                $roleId = $this->input->post('role');
                $mobile = $this->security->xss_clean($this->input->post('mobile'));

                $userInfo = array();
                if (empty($password)) {
                    $userInfo = array(
                        'email' => $email,
                        'roleId' => $roleId,
                        'name' => $name,
                        'mobile' => $mobile,
                        'updatedBy' => $this->vendorId,
                        'updatedDtm' => date('Y-m-d H:i:s')
                    );
                } else {
                    $userInfo = array(
                        'email' => $email,
                        'password' => getHashedPassword($password),
                        'roleId' => $roleId,
                        'name' => ucwords($name),
                        'mobile' => $mobile,
                        'updatedBy' => $this->vendorId,
                        'updatedDtm' => date('Y-m-d H:i:s')
                    );
                }

                $result = $this->user_model->editUser($userInfo, $userId);

                if ($result == true) {
                    $this->session->set_flashdata('success', 'User updated successfully');
                } else {
                    $this->session->set_flashdata('error', 'User updation failed');
                }
                redirect('users');
            }
        }
    }

    function deleteUser() {
        if ($this->isAdmin() == FALSE) {
            echo (json_encode(array('status' => 'access')));
        } else {
            $userId = $this->input->post('userId');
            $userInfo = array('isDeleted' => 1, 'updatedBy' => $this->vendorId, 'updatedDtm' => date('Y-m-d H:i:s'));
            $result = $this->user_model->deleteUser($userId, $userInfo);

            if ($result > 0) {
                echo (json_encode(array('status' => TRUE)));
            } else {
                echo (json_encode(array('status' => FALSE)));
            }
        }
    }

    function loginHistory($userId = NULL) {
        if ($this->isAdmin() == FALSE) {
            $this->loadThis();
        } else {
            $userId = ($userId == NULL ? 0 : $userId);

            $searchText = $this->input->post('searchText');
            $fromDate = $this->input->post('fromDate');
            $toDate = $this->input->post('toDate');

            $data["userInfo"] = $this->user_model->getUserInfoById($userId);
            $data['searchText'] = $searchText;
            $data['fromDate'] = $fromDate;
            $data['toDate'] = $toDate;

            $this->load->library('pagination');

            $count = $this->user_model->loginHistoryCount($userId, $searchText, $fromDate, $toDate);
            $returns = $this->paginationCompress("login-history/" . $userId . "/", $count, 10, 3);
            $data['userRecords'] = $this->user_model->loginHistory($userId, $searchText, $fromDate, $toDate, $returns["page"], $returns["segment"]);
            $this->global['pageTitle'] = 'User Login History : LIS';
            $this->renderView("users/loginHistory", $this->global, $data, NULL);
        }
    }

    function profile($active = "details") {
        $data["userInfo"] = $this->user_model->getUserInfoWithRole($this->vendorId);
        $data["active"] = $active;

        $this->global['pageTitle'] = $active == "details" ? 'My Profile : LIS' : 'Change Password : LIS';
        $this->renderView("users/profile", $this->global, $data, NULL);
    }

    function profileUpdate($active = "details") {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('fname', 'Full Name', 'trim|required|max_length[128]');
        $this->form_validation->set_rules('mobile', 'Mobile Number', 'required|min_length[10]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[128]|callback_emailExists');

        if ($this->form_validation->run() == FALSE) {
            $this->profile($active);
        } else {
            $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
            $mobile = $this->security->xss_clean($this->input->post('mobile'));
            $email = strtolower($this->security->xss_clean($this->input->post('email')));

            $userInfo = array('name' => $name, 'email' => $email, 'mobile' => $mobile, 'updatedBy' => $this->vendorId, 'updatedDtm' => date('Y-m-d H:i:s'));

            $result = $this->user_model->editUser($userInfo, $this->vendorId);

            if ($result == true) {
                $this->session->set_userdata('name', $name);
                $this->session->set_flashdata('success', 'Profile updated successfully');
            } else {
                $this->session->set_flashdata('error', 'Profile updation failed');
            }
            redirect('profile/' . $active);
        }
    }

    function changePassword($active = "changepass") {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('oldPassword', 'Old password', 'required|max_length[20]');
        $this->form_validation->set_rules('newPassword', 'New password', 'required|max_length[20]');
        $this->form_validation->set_rules('cNewPassword', 'Confirm new password', 'required|matches[newPassword]|max_length[20]');

        if ($this->form_validation->run() == FALSE) {
            $this->profile($active);
        } else {
            $oldPassword = $this->input->post('oldPassword');
            $newPassword = $this->input->post('newPassword');

            $resultPas = $this->user_model->matchOldPassword($this->vendorId, $oldPassword);

            if (empty($resultPas)) {
                $this->session->set_flashdata('nomatch', 'Your old password is not correct');
                redirect('profile/' . $active);
            } else {
                $usersData = array(
                    'password' => getHashedPassword($newPassword),
                    'updatedBy' => $this->vendorId,
                    'updatedDtm' => date('Y-m-d H:i:s')
                );

                $result = $this->user_model->changePassword($this->vendorId, $usersData);
                if ($result > 0) {
                    $this->session->set_flashdata('success', 'Password updation successful');
                } else {
                    $this->session->set_flashdata('error', 'Password updation failed');
                }
                redirect('profile/' . $active);
            }
        }
    }

    function emailExists($email) {
        $userId = $this->vendorId;
        $return = false;

        if (empty($userId)) {
            $result = $this->user_model->checkEmailExists($email);
        } else {
            $result = $this->user_model->checkEmailExists($email, $userId);
        }

        if (empty($result)) {
            $return = true;
        } else {
            $this->form_validation->set_message('emailExists', 'The {field} already taken');
            $return = false;
        }
        return $return;
    }
}