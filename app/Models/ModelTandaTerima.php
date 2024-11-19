<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTandaTerima extends Model
{
    protected $table = 'tanda_terima';  // Nama tabel yang digunakan
    protected $primaryKey = 'id_tandaterima';

    // Mendapatkan semua data daftar hadir
    public function AllData()
    {
        return $this->db->table($this->table)
            ->join('jabatan', 'jabatan.id_jab = tanda_terima.id_jab')
            ->join('golongan', 'golongan.id_gol = tanda_terima.id_gol')
            ->join('data_pegawai', 'data_pegawai.id_peg = tanda_terima.id_peg')
            ->get()
            ->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tanda_terima')->insert($data);
    }

    public function UpdateData($data)
    {
        $this->db->table('tanda_terima')
            ->where('id_tandaterima', $data['id_tandaterima'])
            ->update($data);
    }

    public function DeleteData($id_tandaterima)
    {
        $this->db->table('tanda_terima')
            ->where('id_tandaterima', $id_tandaterima)
            ->delete();
    }

    public function LaporanPeriode($tanggal_awal, $tanggal_akhir)
    {
        return $this->db->table('tanda_terima')
            ->where('tgl >=', $tanggal_awal)
            ->where('tgl <=', $tanggal_akhir)
            ->join('jabatan', 'jabatan.id_jab = tanda_terima.id_jab')
            ->join('golongan', 'golongan.id_gol = tanda_terima.id_gol')
            ->join('data_pegawai', 'data_pegawai.id_peg = tanda_terima.id_peg')
            ->get()
            ->getResultArray();
    }
}
