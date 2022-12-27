<?php

namespace App\Models;

use CodeIgniter\Model;

class SubkategoriModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'subkategori';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kategori_id',
        'subkategori_ikon',
        'subkategori_nama',
        'subkategori_deskripsi',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    public function withJoin()
    {
        return $this->select($this->table.'.*')
                ->select('kategori_nama')
                ->join('kategori', 'subkategori.kategori_id=kategori.id', 'LEFT');
    }
}
