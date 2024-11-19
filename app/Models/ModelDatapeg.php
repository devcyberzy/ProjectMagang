<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDatapeg extends Model
{
    public function AllData()
    {
        return $this->db->table('data_pegawai')
            ->join('jabatan', 'jabatan.id_jab = data_pegawai.id_jab')
            ->join('golongan', 'golongan.id_gol = data_pegawai.id_gol')
            ->orderBy('id_peg')
            ->get()
            ->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('data_pegawai')->insert($data);
    }

    public function UpdateData($data)
    {
        $this->db->table('data_pegawai')
            ->where('id_peg', $data['id_peg'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('data_pegawai')
            ->where('id_peg', $data['id_peg'])
            ->delete($data);
    }
}
