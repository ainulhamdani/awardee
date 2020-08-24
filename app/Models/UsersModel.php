<?php namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model{

    protected $table = 'users';
    protected $allowedFields = ['email','username','password','level','updated_at'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    public function beforeInsert(array $data){
        $data = $this->hashThePass($data);

        return $data;
    }

    public function beforeUpdate(array $data){
        $data = $this->hashThePass($data);

        return $data;
    }

    protected function hashThePass(array $data){
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_BCRYPT);
        }
        return$data;
    }

    public function cekLogin(array $data){
        return $this->db->table('users')
            ->where(array(
                'username' => $data['username']
            ))->get()->getRowArray();
    }
}