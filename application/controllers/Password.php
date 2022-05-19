<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Password extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nama')) {
            redirect('auth');
        }
    }

    public function index()
    {

        $data['title'] = 'Ganti Password';
        // $data['pekerjaan'] = $this->password->getAll();
        $data['user'] = $this->db->get_where('users', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->form_validation->set_rules('current_password', 'Password Sekarang', 'required|trim', [
            'required' => '%s Harus di isi'
        ]);
        $this->form_validation->set_rules('new_password1', 'Password Baru', 'required|trim|min_length[5]|matches[new_password2]', [
            'required' => '%s Harus di isi',
            'matches' => 'Password Baru Harus Sama dengan Password Konfirmasi',
            'min_length' => 'Password Minimal 5 karakter!'
        ]);
        $this->form_validation->set_rules('new_password2', ' Password Konfimasi', 'required|trim|min_length[3]|matches[new_password1]', [
            'required' => '%s Harus di isi',
            'matches' => 'Password Konfirmasi Harus Sama dengan Password Baru'
        ]);

        if ($this->form_validation->run() == false) {

            $this->load->view('password', $data);
        } else {

            $old_password = $this->session->userdata('password');
            $current_password = md5($this->input->post('current_password'));

            $new_password = md5($this->input->post('new_password1'));

            if ($old_password != $current_password) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password saat ini Salah...
              </div>');
                redirect('password');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password baru tidak boleh sama dengan password saat ini
                  </div>');
                    redirect('password');
                } else {
                    //password sudah ok
                    // $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    // $password_md5 = md5($new_password);

                    $this->db->set('password', $new_password);
                    $this->db->where('nama', $this->session->userdata('nama'));
                    $this->db->update('users');

                    $this->session->unset_userdata('nama');
                    $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">
                    Selamat,  Password Berhasil di ubah...
                  </div>');
                    redirect('auth');
                }
            }
        }
    }
}
