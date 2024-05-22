<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// application/controllers/Controller.php
class Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('dataModel');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index() {
        $this->load->view('home');
    }

    public function register() {
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register');
        } else {
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            );

            $this->dataModel->insert_user($data);
            redirect('controller/login');
        }
    }

    public function login() {
        $this->form_validation->set_rules('username_email', 'Username or Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            $username_email = $this->input->post('username_email');
            $password = $this->input->post('password');

            $user = $this->dataModel->get_user($username_email);

            if ($user && $user->password == $password) {
                $this->session->set_userdata('user_id', $user->id);
                redirect('controller/dashboard');
            } else {
                $this->session->set_flashdata('error', 'Invalid login credentials');
                redirect('controller/login');
            }
        }
    }

    public function dashboard() {
        if (!$this->session->userdata('user_id')) {
            redirect('controller/login');
        }

        $data['user'] = $this->dataModel->get_user_by_id($this->session->userdata('user_id'));
        $this->load->view('dashboard', $data);
    }

    public function logout() {
        $this->session->unset_userdata('user_id');
        redirect('controller/login');
    }
}
