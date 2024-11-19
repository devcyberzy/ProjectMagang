<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJabatan extends Model
{
    public function AllData()
    {
        return $this->db->table('jabatan')
            ->get()
            ->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('jabatan')->insert($data);
    }

    public function UpdateData($data)
    {
        $this->db->table('jabatan')
            ->where('id_jab', $data['id_jab'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('jabatan')
            ->where('id_jab', $data['id_jab'])
            ->delete($data);
    }
}
