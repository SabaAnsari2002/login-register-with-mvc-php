<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_message($data) {
        $this->db->insert('messages', $data);
    }

    public function insert_bulk_messages($data) {
        $this->db->insert_batch('messages', $data);
    }
}
?>
