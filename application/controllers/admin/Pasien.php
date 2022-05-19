<?php

class Pasien extends CI_Controller
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
        $this->load->model('m_pasien');
    }
    public function index()
    {

        $data['title'] = 'MANAJEMEN DATA PASIEN';
        $data['title2'] = 'Data Pasien';
        $data['pasien'] = $this->m_pasien->tampil_data()->result_array();

        $this->load->view('admin/pasien/tampil_data', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Data Pasien';
        $data['title2'] = 'Tambah Data Pasien';

        $this->load->view('admin/pasien/v_data_tambah', $data);
    }
    public function insert()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->tambah();
        } else {
            $np = $this->input->post('nama_pasien');
            $jk = $this->input->post('jenis_kelamin');
            $u = $this->input->post('umur');

            $data = array(
                'nama_pasien' => $np,
                'jenis_kelamin' => $jk,
                'umur' => $u
            );

            $this->m_pasien->insert_data($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 50%;">
            <strong>Data Berhasil di tambah</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');
            redirect('admin/pasien');
        }
    }
    public function edit($id)
    {
        $data['title'] = 'Edit Data Pasien';
        $data['title2'] = 'Edit Data Pasien';
        $where = array('id_pasien' => $id);
        $data['pasien'] = $this->m_pasien->edit_data($where)->row_array();

        $this->load->view('admin/pasien/v_data_edit', $data);
    }
    public function update()
    {
        $id = $this->input->post('id_pasien');
        $np = $this->input->post('nama_pasien');
        $jk = $this->input->post('jenis_kelamin');
        $u = $this->input->post('umur');

        $data = array(
            'nama_pasien' => $np,
            'jenis_kelamin' => $jk,
            'umur' => $u
        );
        $where = array('id_pasien' => $id);
        $this->m_pasien->update_data($data, $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-primary alert-dismissible fade show" role="alert" style="width: 50%;">
        <strong>Data Berhasil di update</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>');
        redirect('admin/pasien');
    }

    public function hapus($id)
    {
        $where = array('id_pasien' => $id);
        $this->m_pasien->hapus_data($where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="width: 50%;">
        <strong>Data Berhasil di hapus</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>');
        redirect('admin/pasien');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_pasien', 'Nama Pasien', 'required', [
            'required' => 'Nama Pasien tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', [
            'required' => 'Jenis Kelamin tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('umur', 'Umur', 'required', [
            'required' => 'Umur tidak boleh kosong'
        ]);
    }
}
