<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    private $table = 'users';

    // 🔹 Ambil semua user
    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    // 🔹 Ambil user berdasarkan ID
    public function get_by_id($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    // 🔹 Ambil user berdasarkan username
    public function get_by_username($username)
    {
        return $this->db->get_where($this->table, ['username' => $username])->row();
    }

    // 🔹 Tambah user baru (tanpa hash password)
    public function insert($data)
    {
        // $data['password'] sudah berupa plain text dari controller
        return $this->db->insert($this->table, $data);
    }

    // 🔹 Update data user
    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    // 🔹 Hapus user
    public function delete($id)
    {
        return $this->db->where('id', $id)->delete($this->table);
    }
}
