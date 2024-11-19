<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDaftarHadir extends Model
{
    protected $table = 'daftar_hadir';  // Nama tabel yang digunakan
    protected $primaryKey = 'id_daftar';

    // Mendapatkan semua data daftar hadir
    public function AllData()
    {
        return $this->db->table($this->table)
            ->join('jabatan', 'jabatan.id_jab = daftar_hadir.id_jab')
            ->join('data_pegawai', 'data_pegawai.id_peg = daftar_hadir.id_peg')
            ->get()
            ->getResultArray();
    }

    // Insert data ke dalam tabel daftar hadir
    public function InsertData($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    // Update data pada tabel daftar hadir
    public function UpdateData($data)
    {
        return $this->db->table($this->table)
            ->where('id_daftar', $data['id_daftar'])
            ->update($data);
    }

    // Delete data berdasarkan id_daftar
    public function DeleteData($data)
    {
        return $this->db->table($this->table)
            ->where('id_daftar', $data['id_daftar'])
            ->delete();
    }

    public function getByDateRange($startDate, $endDate)
    {
        $data = $this->db->table('daftar_hadir')
            ->join('jabatan', 'jabatan.id_jab = daftar_hadir.id_jab')
            ->join('data_pegawai', 'data_pegawai.id_peg = daftar_hadir.id_peg')
            ->where('tgl >=', $startDate)
            ->where('tgl <=', $endDate)
            ->get()
            ->getResultArray();

        log_message('info', 'Data hasil query: ' . print_r($data, true)); // Debugging

        return $data;
    }
}
