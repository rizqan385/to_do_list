<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library(['session']);
        $this->load->helper(['url', 'form']);
    }

    // 🔹 Halaman Login (GET -> tampil; POST -> proses login)
    public function login()
    {
        // Jika sudah login, langsung ke todo
        if ($this->session->userdata('user_id')) {
            redirect('todo');
        }

        if ($this->input->post()) {
            $username = $this->input->post('username', true);
            $password = $this->input->post('password', true);

            $user = $this->User_model->get_by_username($username);

            // === PENTING ===
            // Bandingkan langsung plain password (TIDAK DI-REKOMENDASIKAN untuk produksi)
            if ($user && $password === $user->password) {
                // Set session user
                $this->session->set_userdata([
                    'user_id' => $user->id,
                    'username' => $user->username,
                    'role' => $user->role,
                    'logged_in' => true
                ]);

                $this->session->set_flashdata('success', 'Berhasil login!');
                redirect('todo');
            } else {
                $this->session->set_flashdata('error', 'Username atau password salah!');
                redirect('auth/login');
            }
        }

        $this->load->view('auth/login');
    }

    // 🔹 Halaman Register (simpan password tanpa hash)
    public function register()
    {
        if ($this->input->post()) {
            $username = $this->input->post('username', true);
            $email = $this->input->post('email', true);
            $password = $this->input->post('password', true);

            // Cek username sudah dipakai belum
            if ($this->User_model->get_by_username($username)) {
                $this->session->set_flashdata('error', 'Username sudah digunakan!');
                redirect('auth/register');
            }

            // SIMPAN PLAIN TEXT PASSWORD (TIDAK DI-REKOMENDASIKAN)
            $data = [
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'role' => 'user'
            ];

            $this->User_model->insert($data);

            $this->session->set_flashdata('success', 'Registrasi berhasil! Silakan login.');
            redirect('auth/login');
        }

        $this->load->view('auth/register');
    }

    // 🔹 Logout
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
