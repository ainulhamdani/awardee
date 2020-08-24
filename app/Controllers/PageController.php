<?php namespace App\Controllers;

use App\Models\DataModel;
use App\Models\SemesterModel;
use App\Models\LaporanAkademikModel;
use App\Models\PengajuanModel;
use App\Models\UsersModel;


class PageController extends BaseController{

	public function login(){
		return view('login');
    }

    public function profil(){
        $model = new DataModel();
        $data = $model -> select('foto_profil')->where('users_id',session()->get('id'))->get()->getRowArray();
        return view('profil',$data);
    }

    public function UpdateProfil(){
        $model = new UsersModel();
        if($this->request->getVar('password')!=''){
            session()->setFlashdata('success','Email dan Password Anda berhasil diubah');
            return redirect()->back();
        }else{
            session()->setFlashdata('error','Field Password Harus terisi');
            return redirect()->back();
        }
    }
    
    public function home(){
        $model = new DataModel();
        $user = $model->where(array('users_id' => session()->get('id')))->get()->getRowArray();
        return view('home', $user);
    }

    public function infoDana(){
        $model = new PengajuanModel();
        $data = [
            'pengajuan_la' => $model->where([
                'users_id' => session()->get('id'),
                'jenis_pengajuan' => 'Pengajuan LA'
            ])->get()->getResultArray(),
            'pengajuan_db' => $model->where([
                'users_id' => session()->get('id'),
                'jenis_pengajuan' => 'Pengajuan Dana Beasiswa'
            ])->get()->getResultArray()
        ];
        return view('info-dana',$data);
    }

    public function Bendahara(){
        $model = new PengajuanModel();
        $data['data'] = $model->get()->getResultArray();
        return view('info-bend',$data);
    }

    public function tambahLaporan(){ 
        return view('tambah-laporan');
    }

    public function logout(){
        session()->destroy();
        return redirect()->to('/login');
    }

    public function input(){
        return view('new-user');
    }
    public function inputData(){
        $dataDiri = new DataModel();
        $rules = [
            'file' => 'uploaded[file]',
        ];
        if($this->validate($rules)){
            $file = $this->request->getFile('file');
            if($this->request->getFile('file')->getSize() > 1024000){
                session()->setFlashdata('error','Besar File foto yang Anda masukkan melebihi kapasitas maksimal, pastikan foto Anda maksimal sebesar 1MB');
                return redirect()->back();
            }else{
                $file->move('data/'.session()->get('username').'/foto',session()->get('username').'_foto.'.$file->getExtension(), true);
                $newData=[
                    'id' => session()->get('id'),
                    'users_id'          => session()->get('id'),
                    'foto_profil'       => $file->getName(),
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
                    'nama_univ'         => $this->request->getVar('nama_univ'),
                    'negara_univ'       => $this->request->getVar('negara_univ'),
                    'fakultas'          => $this->request->getVar('fakultas'),
                    'jurusan'           => $this->request->getVar('jurusan'),
                    'kota_univ'         => $this->request->getVar('kota_univ'),
                    'tlp_univ'          => $this->request->getVar('tlp_univ'),
                    'web_univ'          => $this->request->getVar('web_univ'),
                    'email_univ'        => $this->request->getVar('email_univ'),
                    'nama_bank'         => $this->request->getVar('nama_bank'),
                    'an_bank'           => $this->request->getVar('an_bank'),
                    'swift_code'        => $this->request->getVar('swift_code'),
                    'alamat_bank'       => $this->request->getVar('alamat_bank'),
                    'no_rek'            => $this->request->getVar('no_rek'),
                    'iban'              => $this->request->getVar('iban'),
                ];
        
                $dataDiri->insert($newData);
                session()->setFlashdata('success', 'Data Berhasil Disimpan');
                return redirect()->to('/');
            }
        }else{
            session()->setFlashdata('error','Anda belum memasukkan Foto');
            return redirect()->back();
        }
    }
}