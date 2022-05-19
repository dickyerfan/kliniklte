<?php

class Pasien extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nama')) {
            redirect('auth');
        }
        $this->load->model('m_pasien');
    }
    public function index()
    {

        $data['title'] = 'MANAJEMEN DATA PASIEN';
        $data['title2'] = 'Data Pasien';
        $data['pasien'] = $this->m_pasien->tampil_data()->result_array();

        $this->load->view('user/pasien/tampil_data', $data);
    }
}
