<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSurat extends Model
{
    protected $table = 'surat';
    protected $primaryKey = 'id_surat';

    public function AllData()
    {
        return $this->db->table($this->table)
            ->join('data_pegawai', 'data_pegawai.id_peg = surat.id_peg')
            ->get()
            ->getResultArray();
    }
}
