<?php
class ProfileModel extends CI_Model {
    public function read ($id) {
        return $this->db->get_where('users', array('id' => $id))->row();
    }
}