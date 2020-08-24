<?php namespace App\Models;

use CodeIgniter\Model;

class SemesterModel extends Model{

    protected $table = 'data_semester';
    protected $allowedFields = ['users_id','semester_id','course','score'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}