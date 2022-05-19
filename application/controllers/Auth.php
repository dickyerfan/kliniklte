<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_login');
    }

    public function index()
    {
        if ($this->session->userdata('nama')) {
            redirect('admin/dashboard');
        }

        $this->load->view('v_login');
    }

    public function login_aksi()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => '%s harus di isi, Tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => '%s harus di isi, Tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('v_login');
        } else {

            $user = $this->input->post('nama');
            $pass = $this->input->post('password');

            $this->m_login->login_aksi($user, $pass);
        }
    }
    public function logout()
    {
        // $this->session->sess_destroy();
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('password');
        $this->session->unset_userdata('nama_lengkap');
        $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Selamat, Anda Berhasil Logout</div>');
        redirect('auth');
    }
}
