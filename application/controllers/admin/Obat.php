<?php

class Obat extends CI_Controller
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
        $this->load->model('m_obat');
    }
    public function index()
    {

        $data['title'] = 'MANAJEMEN DATA OBAT';
        $data['title2'] = 'Data Obat';
        $data['obat'] = $this->m_obat->tampil_data()->result_array();

        $this->load->view('admin/obat/tampil_data', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Data Obat';
        $data['title2'] = 'Tambah Data Obat';

        $this->load->view('admin/obat/v_data_tambah', $data);
    }
    public function insert()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->tambah();
        } else {
            $nd = $this->input->post('nama_obat');

            $data = array(

                'nama_obat' => $nd
            );

            $this->m_obat->insert_data($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 50%;">
            <strong>Data Berhasil di tambah</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');
            redirect('admin/obat');
        }
    }
    public function edit($id)
    {
        $data['title'] = 'Edit Data Obat';
        $data['title2'] = 'Edit Data Obat';
        $where = array('id_obat' => $id);
        $data['obat'] = $this->m_obat->edit_data($where)->row_array();

        $this->load->view('admin/obat/v_data_edit', $data);
    }
    public function update()
    {
        $id = $this->input->post('id_obat');
        $nd = $this->input->post('nama_obat');

        $data = array(
            'nama_obat' => $nd
        );
        $where = array('id_obat' => $id);
        $this->m_obat->update_data($data, $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-primary alert-dismissible fade show" role="alert" style="width: 50%;">
        <strong>Data Berhasil di update</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>');
        redirect('admin/obat');
    }

    public function hapus($id)
    {
        $where = array('id_obat' => $id);
        $this->m_obat->hapus_data($where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="width: 50%;">
        <strong>Data Berhasil di hapus</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>');
        redirect('admin/obat');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_obat', 'Nama Obat', 'required', [
            'required' => 'Nama Obat tidak boleh kosong'
        ]);
    }
}
