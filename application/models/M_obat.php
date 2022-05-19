<?php

class M_obat extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('obat');
    }

    public function insert_data($data)
    {
        return $this->db->insert('obat', $data);
    }
    public function edit_data($where)
    {
        return $this->db->get_where('obat', $where);
    }

    public function update_data($data, $where)
    {
        $this->db->where($where);
        $this->db->update('obat', $data);
    }

    public function hapus_data($where)
    {
        $this->db->where($where);
        $this->db->delete('obat');
    }
}
