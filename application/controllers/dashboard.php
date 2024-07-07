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
        $this->session->set_flashdata('success', 'پیام با موفقیت ارسال شد.');
        redirect('dashboard');
    }
    
    public function upload_file() {
        // Check if file is uploaded
        if (!empty($_FILES['file']['tmp_name'])) {
            // Get file name and extension
            $file_info = pathinfo($_FILES['file']['name']);
            $file_extension = strtolower($file_info['extension']);
    
            // Check if file extension is 'txt'
            if ($file_extension != 'txt') {
                $this->session->set_flashdata('error', 'فقط فایل‌های با پسوند .txt قابل قبول هستند.');
                redirect('dashboard');
            }
    
            $file = $_FILES['file']['tmp_name'];
            $handle = fopen($file, "r");
            $bulk_messages = array();
            $valid_format = true;
    
            if ($handle) {
                while (($line = fgets($handle)) !== false) {
                    $line = trim($line);
                    if (!empty($line)) {
                        $parts = explode(',', $line);
                        // Check if each line has exactly two parts (national code and message)
                        if (count($parts) != 2) {
                            $valid_format = false;
                            break;
                        }
                        list($national_code, $message) = $parts;
                        $bulk_messages[] = array(
                            'national_code' => trim($national_code),
                            'message' => trim($message)
                        );
                    }
                }
                fclose($handle);
    
                if ($valid_format && !empty($bulk_messages)) {
                    $this->Message_model->insert_bulk_messages($bulk_messages);
                    $this->session->set_flashdata('success', 'فایل با موفقیت آپلود شد.');
                } else {
                    $this->session->set_flashdata('error', 'ساختار فایل معتبر نیست یا فایل خالی است.');
                }
            } else {
                $this->session->set_flashdata('error', 'خطا در باز کردن فایل.');
            }
        } else {
            $this->session->set_flashdata('error', 'لطفاً یک فایل انتخاب کنید.');
        }
    
        redirect('dashboard');
    }
    
    
    
}
?>
