<?php namespace App\Models;

use CodeIgniter\Model;

class DataModel extends Model
{
    protected $table = 'data_diri';
    protected $allowedFields= [
        'id',
        'users_id',
        'foto_profil',
        'ktp',
        'student_id',
        'nama_lengkap',
        'nama_panggilan',
        'ttl',
        'jenis_kelamin',
        'alamat_domisili',
        'kab_kota',
        'negara_studi',
        'alamat_studi',
        'email',
        'email_alt',
        'no_paspor',
        'no_hp',
        'no_wa',
        'pekerjaan',
        'facebook',
        'instagram',
        'nama_univ',
        'negara_univ',
        'fakultas',
        'jurusan',
        'kota_univ',
        'tlp_univ',
        'web_univ',
        'email_univ',
        'nama_bank',
        'an_bank',
        'swift_code',
        'alamat_bank',
        'no_rek',
        'iban',
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
        
}