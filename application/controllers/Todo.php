<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Todo extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Todo_model');
        $this->load->library('session');
        $this->load->helper(['url', 'form']);

        // Cek apakah user sudah login
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    }

    // 🟩 Tampilkan semua to-do milik user
    public function index()
    {
        $user_id = $this->session->userdata('user_id');
        $data['todos'] = $this->Todo_model->get_all_by_user($user_id);

        $this->load->view('templates/header');
        $this->load->view('todo/index', $data);
        $this->load->view('templates/footer');
    }

    // 🟦 Form tambah tugas baru
    public function add()
    {
        $this->load->view('templates/header');
        $this->load->view('todo/add');
        $this->load->view('templates/footer');
    }

    // 🟨 Simpan tugas baru ke database
    public function store()
    {
        $data = [
            'user_id'     => $this->session->userdata('user_id'),
            'title'       => $this->input->post('title', true),
            'description' => $this->input->post('description', true),
            'status'      => $this->input->post('status'),
            'due_date'    => $this->input->post('due_date'),
        ];

        $this->Todo_model->insert($data);
        $this->session->set_flashdata('success', 'Tugas berhasil ditambahkan!');
        redirect('todo');
    }

    // 🟧 Form edit tugas
    public function edit($id)
    {
        $todo = $this->Todo_model->get_by_id($id);

        if (!$todo) {
            show_404();
        }

        // Pastikan hanya pemilik yang bisa mengedit
        if ($todo->user_id != $this->session->userdata('user_id')) {
            show_error('Akses ditolak!');
        }

        $data['todo'] = $todo;

        $this->load->view('templates/header');
        $this->load->view('todo/edit', $data);
        $this->load->view('templates/footer');
    }

    // 🟦 Update tugas setelah diedit
    public function update($id)
    {
        $todo = $this->Todo_model->get_by_id($id);

        if (!$todo) {
            show_404();
        }

        if ($todo->user_id != $this->session->userdata('user_id')) {
            show_error('Akses ditolak!');
        }

        $data = [
            'title'       => $this->input->post('title', true),
            'description' => $this->input->post('description', true),
            'status'      => $this->input->post('status'),
            'due_date'    => $this->input->post('due_date'),
        ];

        $this->Todo_model->update($id, $data);
        $this->session->set_flashdata('success', 'Tugas berhasil diperbarui!');
        redirect('todo');
    }

    // 🟥 Hapus tugas
    public function delete($id)
    {
        $todo = $this->Todo_model->get_by_id($id);

        if (!$todo) {
            show_404();
        }

        if ($todo->user_id != $this->session->userdata('user_id')) {
            show_error('Akses ditolak!');
        }

        $this->Todo_model->delete($id);
        $this->session->set_flashdata('success', 'Tugas berhasil dihapus!');
        redirect('todo');
    }

    // 🟪 Detail tugas
    public function detail($id)
    {
        $todo = $this->Todo_model->get_by_id($id);

        if (!$todo) {
            show_404();
        }

        if ($todo->user_id != $this->session->userdata('user_id')) {
            show_error('Akses ditolak!');
        }

        $data['todo'] = $todo;

        $this->load->view('templates/header');
        $this->load->view('todo/detail', $data);
        $this->load->view('templates/footer');
    }
}
