<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelGolongan extends Model
{
    public function AllData()
    {
        return $this->db->table('golongan')
            ->get()
            ->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('golongan')->insert($data);
    }

    public function UpdateData($data)
    {
        $this->db->table('golongan')
            ->where('id_gol', $data['id_gol'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('golongan')
            ->where('id_gol', $data['id_gol'])
            ->delete($data);
    }
}
