<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Landing extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        return $this->load->view('landing');
    }
}
?>