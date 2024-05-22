<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// application/controllers/Controller.php
class ControllerForm extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('dataModel');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index() {
        $this->load->view('form_view');
    }
    public function submit_form() {
        $this->form_validation->set_rules('first_name', 'نام', 'required');
        $this->form_validation->set_rules('last_name', 'نام خانوادگی', 'required');
        $this->form_validation->set_rules('national_id', 'کد ملی', 'required');
        $this->form_validation->set_rules('birth_date', 'تاریخ تولد', 'required');
        $this->form_validation->set_rules('phone_number', 'شماره همراه', 'required|exact_length[11]');
        $this->form_validation->set_rules('education_level', 'مقطع تحصیلی', 'required');
        $this->form_validation->set_rules('university', 'دانشگاه پذیرفته شده', 'required');
        $this->form_validation->set_rules('citizenship', 'تابعیت', 'required');
        
        if ($this->input->post('citizenship') == 'اتباع خارجی') {
            $this->form_validation->set_rules('passport_number', 'شماره پاسپورت', 'required');
        }
    
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('form_view');
        } else {
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'national_id' => $this->input->post('national_id'),
                'birth_date' => $this->input->post('birth_date'),
                'phone_number' => $this->input->post('phone_number'),
                'education_level' => $this->input->post('education_level'),
                'university' => $this->input->post('university'),
                'citizenship' => $this->input->post('citizenship'),
                'passport_number' => $this->input->post('passport_number') ?? null
            );
    
            $this->dataModel->insert_data($data);
            redirect('controllerForm/success');
        }
    }
    

    public function success() {
        echo "Form submitted successfully!";
    }
}
