<?php namespace App\Models;

use CodeIgniter\Model;

class PengajuanModel extends Model{

    protected $table = 'pengajuan';
    protected $allowedFields = ['username','jenis_pengajuan','users_id','student_id','khs','krs','ktp','negara','tahap_1','tahap_2','tahap_3','catatan'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}