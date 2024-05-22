<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// application/models/dataModel.php
class dataModel extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function insert_user($data) {
        return $this->db->insert('users', $data);
    }

    public function get_user($username_email) {
        $this->db->where('username', $username_email);
        $this->db->or_where('email', $username_email);
        $query = $this->db->get('users');
        return $query->row();
    }

    public function get_user_by_id($user_id) {
        $this->db->where('id', $user_id);
        $query = $this->db->get('users');
        return $query->row();
    }
}

