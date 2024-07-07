<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Message_model');
    }

    public function index() {
        $this->load->view('choose_method');
    }

    public function text_editor_form() {
        $this->load->view('text_editor_form');
    }

    public function text_file_form() {
        $this->load->view('text_file_form');
    }

    public function submit_message() {
        $data = array(
            'national_code' => $this->input->post('national_code'),
            'message' => $this->input->post('message')
        );
        $this->Message_model->insert_message($data);
        redirect('dashboard');
    }

    public function upload_file() {
        $file = $_FILES['file']['tmp_name'];
        $handle = fopen($file, "r");
        $bulk_messages = array();

        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                list($national_code, $message) = explode(',', $line);
                $bulk_messages[] = array(
                    'national_code' => trim($national_code),
                    'message' => trim($message)
                );
            }
            fclose($handle);
        }
        $this->Message_model->insert_bulk_messages($bulk_messages);
        redirect('dashboard');
    }
}
?>
