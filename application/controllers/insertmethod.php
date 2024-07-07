<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InsertMethod extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('insert_method');
    }

    public function submit_method() {
        $method = $this->input->post('method');

        if ($method == 'text_editor') {
            redirect('dashboard/text_editor_form');
        } elseif ($method == 'text_file') {
            redirect('dashboard/text_file_form');
        } else {
            redirect('insertmethod'); // handle invalid input gracefully
        }
    }
}
?>
