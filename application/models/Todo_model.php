<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Todo_model extends CI_Model {

    // 🔵 Ambil semua to-do milik user (URGENT tampil paling atas)
    public function get_all_by_user($user_id)
    {
        return $this->db
            ->where('user_id', $user_id)
            ->order_by('urgent', 'DESC')      // urgent dulu
            ->order_by('created_at', 'DESC')  // terbaru
            ->get('todos')
            ->result();
    }

    // 🔵 Ambil berdasarkan ID
    public function get_by_id($id)
    {
        return $this->db->get_where('todos', ['id' => $id])->row();
    }

    // 🔵 Tambah to-do
    public function insert($data)
    {
        return $this->db->insert('todos', $data);
    }

    // 🔵 Update to-do
    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update('todos', $data);
    }

    // 🔵 Hapus to-do
    public function delete($id)
    {
        return $this->db->delete('todos', ['id' => $id]);
    }

    // =======================================================
    // 🟢 FITUR BARU: STATUS & URGENT
    // =======================================================

    // ✔ Update status (pending, in_progress, completed)
    public function update_status($id, $status)
    {
        return $this->db->where('id', $id)->update('todos', [
            'status' => $status
        ]);
    }

    // ✔ Set / Unset urgent (1 = urgent, 0 = normal)
    public function set_urgent($id, $value)
    {
        return $this->db->where('id', $id)->update('todos', [
            'urgent' => $value
        ]);
    }
}
