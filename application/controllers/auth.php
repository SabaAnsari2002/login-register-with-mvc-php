<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model'); // نام مدل باید با حرف بزرگ شروع شود
    }

    public function index() {
        $this->load->view('select_method');
    }
    
    public function register() {
        $this->load->view('register');
    }

    public function login() {
        $this->load->view('login');
    }

    public function do_register() {
        $data = array(
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
        );

        if ($this->User_model->register($data)) {
            redirect('auth/login');
        } else {
            $this->session->set_flashdata('error', 'Registration failed.');
            redirect('auth/register');
        }
    }

    public function do_login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->User_model->login($username);

        if ($user && password_verify($password, $user['password'])) {
            $this->session->set_userdata('user', $user);
            redirect('home');
        } else {
            $this->session->set_flashdata('error', 'Login failed.');
            redirect('auth/login');
        }
    }

    public function logout() {
        $this->session->unset_userdata('user');
        redirect('auth/login');
    }
    
    

}
?>
