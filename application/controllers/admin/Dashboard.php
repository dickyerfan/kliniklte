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
        if ($this->session->userdata('hak_akses') != 'Administrator') {
            //     $this->session->set_flashdata('info', '<div class="alert   alert-danger alert-dismissible fade show" role="alert">
            //     <strong>Anda Bukan Administrator</strong>
            //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            //     <span aria-hidden="true">&times;</span>
            //     </button>
            // </div>');
            redirect('user/dashboard');
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
        $this->load->view('admin/dashboard/index', $isi);
    }
}
