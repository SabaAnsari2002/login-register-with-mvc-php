<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // اینجا می‌توانید چک کنید که آیا کاربر وارد شده است یا خیر
        if (!$this->session->userdata('user')) {
            redirect('auth/login');
        }
    }

    public function index() {
        $this->load->view('home');
    }
}
?>
