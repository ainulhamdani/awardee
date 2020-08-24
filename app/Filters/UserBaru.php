<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Models\DataModel;
use App\Models\UsersModel;

class UserBaru implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {     
        $dataDiri = new DataModel();   
        $dataUser = new UsersModel();
        $cekUser = $dataUser->where(['id' => session()->get('id')])->get()->getRowArray();
        $cekData = $dataDiri->where(['users_id' => session()->get('id')])->get()->getRowArray();
        if(! is_null($cekData)){
            return redirect()->back();
        }else if(is_null($cekUser)){
            return redirect()->to('login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}