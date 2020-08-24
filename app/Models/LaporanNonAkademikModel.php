<?php namespace App\Models;

use CodeIgniter\Model;

class LaporanNonAkademikModel extends Model{

    protected $table = 'laporan_non_akademik';
    protected $allowedFields = ['users_id','semester','nama_penghargaan','sertifikat'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}