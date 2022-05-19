<?php

class M_login extends CI_Model
{
    public function login_aksi($user, $pass)
    {
        $password = md5($pass);
        $pemakai = $this->db->get_where('users', ['nama' => $user])->row_array();
        $user = $this->db->where('nama', $user);
        $pass = $this->db->where('password', $password);
        $query = $this->db->get('users');

        if ($pemakai) {
            if ($query->num_rows() > 0) {
                $data = $query->row_array();
                foreach ($query->result() as $row) {
                    $sess = array(
                        'id' => $row->id,
                        'nama' => $row->nama,
                        'password' => $row->password,
                        'nama_lengkap' => $row->nama_lengkap,
                        'hak_akses' => $row->hak_akses
                    );
                    $this->session->set_userdata($sess);
                }
                $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert" style="width: 50%;">Login Sukses, Selamat Bekerja.</div>');
                if ($data['hak_akses'] == 'Administrator') {
                    redirect('admin/dashboard');
                } else {
                    redirect('user/dashboard');
                }
            } else {
                $this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Login Gagal, Password Salah.!</div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Login Gagal, Nama tidak Terdaftar.!</div>');
            redirect('Auth');
        }
    }
}
