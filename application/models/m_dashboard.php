<?php

class M_dashboard extends CI_Model
{
    public function countUser()
    {
        return $this->db->count_all('users');
    }
    public function countDokter()
    {
        return $this->db->count_all('dokter');
    }
    public function countPasien()
    {
        return $this->db->count_all('pasien');
    }
    public function countObat()
    {
        return $this->db->count_all('obat');
    }
}
