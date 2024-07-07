<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    private function insert_or_update_user($national_code) {
        // Check if the national code already exists
        $query = $this->db->get_where('users', array('national_code' => $national_code));
        if ($query->num_rows() == 0) {
            // If not, insert it into the users table
            $this->db->insert('users', array('national_code' => $national_code));
        }
    }

    public function insert_message($data) {
        // Insert the message
        $this->db->insert('messages', $data);
        // Insert or update the user
        $this->insert_or_update_user($data['national_code']);
    }

    public function insert_bulk_messages($data) {
        // Insert bulk messages
        $this->db->insert_batch('messages', $data);
        // Insert or update the users
        foreach ($data as $message) {
            $this->insert_or_update_user($message['national_code']);
        }
    }
}
?>
