<?php

class Dokter extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nama')) {
            redirect('auth');
        }
        $this->load->model('m_dokter');
        if ($this->session->userdata('hak_akses') != 'Administrator') {
            redirect('user/dashboard');
        }
    }
    public function index()
    {

        $data['title'] = 'MANAJEMEN DATA DOKTER';
        $data['title2'] = 'Data Dokter';
        $data['dokter'] = $this->m_dokter->tampil_data()->result_array();

        $this->load->view('admin/dokter/tampil_data', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Data Dokter';
        $data['title2'] = 'Tambah Data Dokter';
        $this->load->view('admin/dokter/v_data_tambah', $data);
    }
    public function insert()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->tambah();
        } else {
            $nd = $this->input->post('nama_dokter');



            $data = array(

                'nama_dokter' => $nd
            );

            $this->m_dokter->insert_data($data);
            $this->session->set_flashdata('pesan', '<div class="alert  alert-info alert-dismissible fade show" role="alert" style="width:50%;">
        <strong>Data Berhasil ditambahkan</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>');
            redirect('admin/dokter');
        }
    }
    public function edit($id)
    {
        $data['title'] = 'Edit Data Dokter';
        $data['title2'] = 'Edit Data Dokter';
        $where = array('id_dokter' => $id);
        $data['user'] = $this->m_dokter->edit_data($where)->row_array();

        $this->load->view('admin/dokter/v_data_edit', $data);
    }
    public function update()
    {
        $id = $this->input->post('id_dokter');
        $nd = $this->input->post('nama_dokter');

        $data = array(
            'nama_dokter' => $nd
        );
        $where = array('id_dokter' => $id);
        $this->m_dokter->update_data($data, $where);
        $this->session->set_flashdata('pesan', '<div class="alert  alert-success alert-dismissible fade show" role="alert" style="width:50%;">
        <strong>Data Berhasil diupdate</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>');
        redirect('admin/dokter');
    }

    public function hapus($id)
    {
        $where = array('id_dokter' => $id);
        $this->m_dokter->hapus_data($where);
        $this->session->set_flashdata('pesan', '<div class="alert  alert-danger alert-dismissible fade show" role="alert" style="width:50%;">
        <strong>Data Berhasil dihapus</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>');
        redirect('admin/dokter');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_dokter', 'Nama Dokter', 'required', [
            'required' => 'Nama Dokter tidak boleh kosong'
        ]);
    }
}
