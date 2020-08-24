<?php namespace App\Models;

use CodeIgniter\Model;

class LaporanAkademikModel extends Model{

    protected $table = 'laporan_akademik';
    protected $allowedFields = ['users_id','semester_id','khs','krs','sertifikat','gpa'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}