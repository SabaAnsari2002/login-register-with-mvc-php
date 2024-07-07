<?php
class Message_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function insert_message($data) {
        return $this->db->insert('messages', $data);
    }

    public function insert_bulk_messages($data) {
        return $this->db->insert_batch('messages', $data);
    }
}
?>
