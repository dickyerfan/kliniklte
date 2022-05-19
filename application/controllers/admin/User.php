<?php

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nama')) {
            redirect('auth');
        }
        if ($this->session->userdata('hak_akses') != 'Administrator') {
            redirect('user/dashboard');
        }
        $this->load->model('m_user');
    }
    public function index()
    {

        $data['title'] = 'MANAJEMEN DATA USER';
        $data['title2'] = 'Data user';
        $data['users'] = $this->m_user->tampil_data()->result_array();
        $this->load->view('admin/users/tampil_data', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Data Users';
        $data['title2'] = 'Tambah Data Users';
        $this->load->view('admin/users/v_data_tambah', $data);
    }
    public function insert()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->tambah();
        } else {
            $u = $this->input->post('nama');
            $p = md5($this->input->post('password'));
            $n = $this->input->post('nama_lengkap');

            $data = array(
                'nama' => $u,
                'password' => $p,
                'nama_lengkap' => $n
            );

            $this->m_user->insert_data($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 50%;">
            <strong>Data Berhasil di tambah</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');
            redirect('admin/user');
        }
    }
    public function edit($id)
    {
        $data['title'] = 'Edit Data Users';
        $data['title2'] = 'Edit Data Users';
        $where = array('id' => $id);
        $data['user'] = $this->m_user->edit_data($where)->row_array();

        $this->load->view('admin/users/v_data_edit', $data);
    }
    public function update()
    {
        $id = $this->input->post('id');
        $u = $this->input->post('nama');
        // $p = md5($this->input->post('password'));
        $n = $this->input->post('nama_lengkap');

        $data = array(
            'nama' => $u,
            // 'password' => $p,
            'nama_lengkap' => $n
        );
        $where = array('id' => $id);
        $this->m_user->update_data($data, $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-primary alert-dismissible fade show" role="alert" style="width: 50%;">
        <strong>Data Berhasil di update</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>');
        redirect('admin/user');
    }

    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->m_user->hapus_data($where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="width: 50%;">
        <strong>Data Berhasil di hapus</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>');
        redirect('admin/user');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Username tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => 'password tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required', [
            'required' => 'Nama Lengkap tidak boleh kosong'
        ]);
    }
}
