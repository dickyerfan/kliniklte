<?php

class M_kunjungan extends CI_Model
{
    public function tampil_data()
    {
        // return $this->db->get('berobat');
        $query = $this->db->query("SELECT berobat.*,
         pasien.nama_pasien, pasien.umur, pasien.jenis_kelamin, dokter.nama_dokter
         FROM berobat
         INNER JOIN pasien ON berobat.id_pasien = pasien.id_pasien
         INNER JOIN dokter ON berobat.id_dokter = dokter.id_dokter");
        return $query;
    }

    public function insert_data($data)
    {
        return $this->db->insert('berobat', $data);
    }
    public function edit_data($where)
    {
        return $this->db->get_where('berobat', $where);
    }

    public function update_data($data, $where)
    {
        $this->db->where($where);
        $this->db->update('berobat', $data);
    }

    public function hapus_data($where)
    {
        $this->db->where($where);
        $this->db->delete('berobat');
    }

    // fungsi untuk rekam medis

    public function tampil_rekam($id)
    {
        $query = $this->db->query("SELECT berobat.*,
        pasien.nama_pasien, 
        pasien.umur, 
        pasien.jenis_kelamin, 
        dokter.nama_dokter
        FROM berobat
        INNER JOIN pasien ON berobat.id_pasien = pasien.id_pasien
        INNER JOIN dokter ON berobat.id_dokter = dokter.id_dokter
        WHERE berobat.id_berobat='$id'");
        return $query;
    }

    public function tampil_riwayat($pasien)
    {
        $query = $this->db->query("SELECT berobat.*,
        pasien.nama_pasien, 
        pasien.umur, 
        pasien.jenis_kelamin, 
        dokter.nama_dokter
        FROM berobat
        INNER JOIN pasien ON berobat.id_pasien = pasien.id_pasien
        INNER JOIN dokter ON berobat.id_dokter = dokter.id_dokter
        WHERE berobat.id_pasien='$pasien'");
        return $query;
    }
    public function tampil_resep($id)
    {
        $query = $this->db->query("SELECT resep_obat.*,
        obat.nama_obat
        FROM resep_obat
        INNER JOIN obat ON resep_obat.id_obat = obat.id_obat
        WHERE resep_obat.id_berobat ='$id'");
        return $query;
    }

    public function insert_resep($data)
    {
        return $this->db->insert('resep_obat', $data);
    }

    public function hapus_resep($where)
    {
        $this->db->where($where);
        $this->db->delete('resep_obat');
    }
}
