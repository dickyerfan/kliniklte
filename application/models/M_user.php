<?php

class M_user extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('users');
    }

    public function insert_data($data)
    {
        return $this->db->insert('users', $data);
    }
    public function edit_data($where)
    {
        return $this->db->get_where('users', $where);
    }

    public function update_data($data, $where)
    {
        $this->db->where($where);
        $this->db->update('users', $data);
    }

    public function hapus_data($where)
    {
        $this->db->where($where);
        $this->db->delete('users');
    }
}
