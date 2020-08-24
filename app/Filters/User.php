<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Models\DataModel;

class User implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {   
        if(session()->get('level') != 'user'){            
            return redirect()->to('/login');
        }else{
            $dataDiri = new DataModel();   
            $cek = $dataDiri->where(['users_id' => session()->get('id')])->get()->getRowArray();     
            if(is_null($cek)){
                return redirect()->to('/input');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}