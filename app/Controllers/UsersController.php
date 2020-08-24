<?php namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\DataModel;

class UsersController extends BaseController{

    public function __construct(){
        helper(['form']);
    }

    
	public function register(){ 
        $data = [];
        $model = new UsersModel();
        if($this->request->getMethod()=='post'){

            $rules = [
                'email' => 'required|min_length[3]|max_length[30]|valid_email|is_unique[users.email]',
                'username' => 'required|min_length[3]|max_length[20]',
                'password'=> 'required|min_length[8]|max_length[255]',
            ];

            if(!$this->validate($rules)){
                $data['validation'] = $this->validator;
            }else{

                $newData =[
                    'email' => $this->request->getVar('email'),
                    'username' => $this->request->getVar('username'),
                    'password' => $this->request->getVar('password'),
                    'level' => $this->request->getVar('level')
                ];

                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'User berhasil ditambahkan');
                return redirect()->back();
            }

        }

        return view('register', $data);
    }

    public function login(){
        $data = [];
        $model = new UsersModel();
        $data_diri = new DataModel();
        if($this->request->getMethod()=="post"){

            $data=[
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password')
            ];
            
            $hasil = $model->cekLogin($data);
            if(is_null($hasil)){
                session()->setFlashdata('error', 'Username yang Anda masukkan salah!');
                return redirect()->back();
            }else{
                if(password_verify($data['password'],$hasil['password'])){                    
                    $dataLogin = [
                        'id' => $hasil['id'],
                        'email' => $hasil['email'],
                        'username' => $hasil['username'],
                        'password' => $hasil['password'],
                        'level' => $hasil['level'],
                        'statusLogin' => true
                    ];
                    session()->set($dataLogin);
                    if(session()->get('level')=='admin'){
                        return redirect()->to('/register');
                    }else if(session()->get('level')=='bendahara'){
                        return redirect()->to('/bendahara');
                    }else{
                        $cek = $data_diri->where(['users_id' => session()->get('id')])->get()->getRowArray();
                        if(is_null($cek)){
                            return redirect()->to('/input');
                        }else{
                            return redirect()->to('/home');
                        }
                    }
                }else{
                    session()->setFlashdata('error', 'Password yang Anda masukkan salah!');
                    return redirect()->back();
                }
            }
        }else{
            return view('login');
        }
    }

    public function editData(){
        $dataDiri=new DataModel();
        if($this->request->getMethod()=='post'){
            $newData=[
                'id' => session()->get('id'),
                'users_id'          => session()->get('id'),
                'nama_lengkap'      => $this->request->getVar('nama_lengkap'),
                'nama_panggilan'    => $this->request->getVar('nama_panggilan'),
                'ttl'               => $this->request->getVar('ttl'),
                'jenis_kelamin'     => $this->request->getVar('jenis_kelamin'),
                'alamat_domisili'   => $this->request->getVar('alamat_domisili'),
                'kab_kota'          => $this->request->getVar('kab_kota'),
                'negara_studi'      => $this->request->getVar('negara_studi'),
                'alamat_studi'      => $this->request->getVar('alamat_studi'),
                'email'             => $this->request->getVar('email'),
                'email_alt'         => $this->request->getVar('email_alt'),
                'no_paspor'         => $this->request->getVar('no_paspor'),
                'no_hp'             => $this->request->getVar('no_hp'),
                'no_wa'             => $this->request->getVar('no_wa'),
                'pekerjaan'         => $this->request->getVar('pekerjaan'),
                'facebook'          => $this->request->getVar('facebook'),
                'instagram'         => $this->request->getVar('instagram'),

                // Data Pendidikan
                'nama_univ'         => $this->request->getVar('nama_univ'),
                'negara_univ'       => $this->request->getVar('negara_univ'),
                'fakultas'          => $this->request->getVar('fakultas'),
                'jurusan'           => $this->request->getVar('jurusan'),
                'kota_univ'         => $this->request->getVar('kota_univ'),
                'tlp_univ'          => $this->request->getVar('tlp_univ'),
                'web_univ'          => $this->request->getVar('web_univ'),
                'email_univ'        => $this->request->getVar('email_univ'),

                // Data Bank
                'nama_bank'         => $this->request->getVar('nama_bank'),
                'an_bank'           => $this->request->getVar('an_bank'),
                'swift_code'        => $this->request->getVar('swift_code'),
                'alamat_bank'       => $this->request->getVar('alamat_bank'),
                'no_rek'            => $this->request->getVar('no_rek'),
                'iban'              => $this->request->getVar('iban'),
            ];
            $dataDiri->save($newData);
            session()->setFlashdata('success', 'Data berhasil diperbarui');
            return redirect()->back();
        }

        $user = $dataDiri->where(array('users_id' => session()->get('id')))->get()->getRowArray();
        return view('edit-data',$user);        
    }
}