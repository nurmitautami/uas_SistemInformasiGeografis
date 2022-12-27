<?php

namespace App\Models;

use CodeIgniter\Model;

class SumberDayaModel extends Model
{
    protected $table = "tbl_sumberdayamineral";
    protected $primaryKey = 'id_sumberdayamineral';
    protected $allowedFields = ['id_sumberdayamineral', 'jenis_mineral', 'kualitas', 'ketersediaan', 'latitude', 'longitude'];
    protected $useTimestamps = TRUE;

    public function getSumberDaya($slug = "")
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
    // public function getSumberDaya()
    // {
    //     $query = $this->db->table('tbl_sumberdayamineral')
    //         ->join('tbl_potensial', 'tbl_sumberdayamineral.id_potensial = tbl_potensial.id_potensial')
    //         ->get();
    //     return $query;
    // }
    // public function getPotensial()
    // {
    //     $query =  $this->db->table('tbl_sumberdayamineral')
    //         ->join('tbl_potensial', 'tbl_sumberdayamineral.tbl_potensial = tbl_potensial.id')
    //         ->orderBy('id', 'DESC')->get();
    //     return $query;
    // }
}
