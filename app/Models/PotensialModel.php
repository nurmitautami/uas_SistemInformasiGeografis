<?php

namespace App\Models;

use CodeIgniter\Model;

class PotensialModel extends Model
{
    protected $table = "tbl_potensial";
    protected $primaryKey = 'id_potensial';
    protected $allowedFields = ['id_potensial', 'slug', 'kondisi_lahan', 'akses', 'jenis_aktivitas', 'intensitas', 'dampak', 'foto_lokasi', 'latitude', 'longitude'];
    protected $useTimestamps = TRUE;
    public function getPotensial($slug = "")
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
}
