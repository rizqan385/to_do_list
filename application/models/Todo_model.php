<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Todo_model extends CI_Model {

    public function get_all_by_user($user_id)
    {
        return $this->db->get_where('todos', ['user_id' => $user_id])->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('todos', ['id' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('todos', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('todos', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('todos', ['id' => $id]);
    }
}
