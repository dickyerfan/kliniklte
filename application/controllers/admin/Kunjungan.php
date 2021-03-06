<?php

class Kunjungan extends CI_Controller
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
        $this->load->model('m_kunjungan');
        $this->load->model('m_pasien');
        $this->load->model('m_dokter');
        $this->load->model('m_obat');
    }
    public function index()
    {

        $data['title'] = 'DATA KUNJUNGAN/BEROBAT';
        $data['title2'] = 'Data Kunjungan/Berobat';
        $data['kunjungan'] = $this->m_kunjungan->tampil_data()->result_array();


        $this->load->view('admin/kunjungan/v_data', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Kunjungan Baru';
        $data['title2'] = 'Kunjungan Baru';

        $data['pasien'] = $this->m_pasien->tampil_data()->result_array();
        $data['dokter'] = $this->m_dokter->tampil_data()->result_array();

        $this->load->view('admin/kunjungan/v_data_tambah', $data);
    }
    public function insert()
    {
        $tgl = $this->input->post('tanggal');
        $p = $this->input->post('pasien');
        $d = $this->input->post('dokter');

        $data = array(
            'tanggal' => $tgl,
            'id_pasien' => $p,
            'id_dokter' => $d
        );

        $this->m_kunjungan->insert_data($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 50%;">
        <strong>Data Berhasil di tambah</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>');
        redirect('admin/kunjungan');
    }
    public function edit($id)
    {
        $data['title'] = 'Edit Data Kunjungan/Berobat Pasien';
        $data['title2'] = 'Edit Data Kunjungan/Berobat Pasien';

        $data['pasien'] = $this->m_pasien->tampil_data()->result_array();
        $data['dokter'] = $this->m_dokter->tampil_data()->result_array();

        $where = array('id_berobat' => $id);
        $data['kunjungan'] = $this->m_kunjungan->edit_data($where)->row_array();

        $this->load->view('admin/kunjungan/v_data_edit', $data);
    }
    public function update()
    {
        $id = $this->input->post('id_berobat');
        $tgl = $this->input->post('tanggal');
        $p = $this->input->post('pasien');
        $d = $this->input->post('dokter');

        $data = array(
            'tanggal' => $tgl,
            'id_pasien' => $p,
            'id_dokter' => $d
        );
        $where = array('id_berobat' => $id);
        $this->m_kunjungan->update_data($data, $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-primary alert-dismissible fade show" role="alert" style="width: 50%;">
        <strong>Data Berhasil di update</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>');
        redirect('admin/kunjungan');
    }

    public function hapus($id)
    {
        $where = array('id_berobat' => $id);
        $this->m_kunjungan->hapus_data($where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="width: 50%;">
        <strong>Data Berhasil di hapus</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>');
        redirect('admin/kunjungan');
    }
    // fungsi untuk rekam medis

    public function rekam($id)
    {
        $data['title'] = 'Rekam Medis';
        $data['title2'] = 'Rekam Medis';

        // untuk menampilkan detail rekam medis
        $data['d'] = $this->m_kunjungan->tampil_rekam($id)->row_array();

        // untuk menampilkan riwayat kunjungan
        $q = $this->db->query("SELECT id_pasien FROM berobat WHERE id_berobat = '$id'")->row_array();
        $id_pasien = $q['id_pasien'];
        $data['riwayat'] = $this->m_kunjungan->tampil_riwayat($id_pasien)->result_array();

        // untuk menampilkan data obat di select option
        $data['obat'] = $this->m_obat->tampil_data()->result_array();

        // untuk menampilkan resep obat
        $data['resep'] = $this->m_kunjungan->tampil_resep($id)->result_array();

        $this->load->view('admin/kunjungan/v_rekam_medis', $data);
    }
    public function insert_rm()
    {
        $id_berobat = $this->input->post('id');
        $keluhan = $this->input->post('keluhan');
        $diagnosa = $this->input->post('diagnosa');
        $penatalaksanaan = $this->input->post('penatalaksanaan');

        $data = array(
            'keluhan_pasien' => $keluhan,
            'hasil_diagnosa' => $diagnosa,
            'penatalaksanaan' => $penatalaksanaan
        );
        $where = array('id_berobat' => $id_berobat);
        $this->m_kunjungan->update_data($data, $where);
        redirect('admin/kunjungan/rekam/' . $id_berobat);
    }

    public function insert_resep()
    {
        $id_berobat = $this->input->post('id');
        $obat = $this->input->post('obat');

        $data = array(
            'id_berobat' => $id_berobat,
            'id_obat' => $obat
        );
        $this->m_kunjungan->insert_resep($data);
        redirect('admin/kunjungan/rekam/' . $id_berobat);
    }

    public function hapus_resep($id, $id_berobat)
    {
        $where = array('id_resep' => $id);
        $this->m_kunjungan->hapus_resep($where);
        redirect('admin/kunjungan/rekam/' . $id_berobat);
    }
}
