<?php

class M_dokter extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('dokter');
    }

    public function insert_data($data)
    {
        return $this->db->insert('dokter', $data);
    }
    public function edit_data($where)
    {
        return $this->db->get_where('dokter', $where);
    }

    public function update_data($data, $where)
    {
        $this->db->where($where);
        $this->db->update('dokter', $data);
    }

    public function hapus_data($where)
    {
        $this->db->where($where);
        $this->db->delete('dokter');
    }
}
