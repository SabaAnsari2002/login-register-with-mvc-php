<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// application/models/dataModel.php
class FormModel extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function insert_data($data) {
        return $this->db->insert('your_table_name', $data);
    }
}
