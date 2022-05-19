<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
        $isi['title'] = 'DASHBOARD';
        $isi['title2'] = 'Dashboard';
        $this->load->model('m_dashboard');
        $isi['users'] = $this->m_dashboard->countUser();
        $isi['dokter'] = $this->m_dashboard->countDokter();
        $isi['pasien'] = $this->m_dashboard->countPasien();
        $isi['obat'] = $this->m_dashboard->countObat();
        $this->load->view('user/dashboard/index', $isi);
    }
}
