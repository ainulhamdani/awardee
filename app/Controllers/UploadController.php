<?php namespace App\Controllers;

use App\Models\DataModel;
use App\Models\PengajuanModel;
class UploadController extends BaseController{

    public function upload(){
        $image = $this->request->getFile('image'); 
        if($image->getName()!=""){
            $rules=[
                'image' => 'uploaded[image]|max_size[image, 1024]',
            ];
            if($this->validate($rules)){
                if(!$image->hasMoved()){
                    $data = new DataModel();
                    $cek = $data->select('foto_profil')->where('users_id',session()->get('id'))->get()->getRowArray();
                    $path = 'data/'.session()->get('username').'/foto'.'/'.$cek['foto_profil'];
                    if(file_exists($path)){
                        unlink($path);
                    }
                    $image->move('data/'.session()->get('username').'/foto',session()->get('username').'_foto'.$image->getRandomName(), true);
                    $data->save([
                        'id' => session()->get('id'),
                        'foto_profil' => $image->getName(),
                    ]);
                    session()->setFlashdata('success','Gambar Berhasil Diubah');
                    return redirect()->back();
                }
            }else{
                session()->setFlashdata('error','Ukuran foto Anda melebihi kapasitas maksimum');
                return redirect()->back();
            }
        }
    }

    public function pengajuanLA(){
        $ktp = $this->request->getFile('ktp');
        $krs = $this->request->getFile('krs');
        $student_id = $this->request->getFile('student_id');
        $khs = $this->request->getFile('khs');
        $Rules=[
            'ktp' => 'uploaded[ktp]',
            'krs' => 'uploaded[krs]',
            'khs' => 'uploaded[khs]',
            'student_id' => 'uploaded[student_id]',
        ];
        if($this->validate($Rules)){
            if(!$ktp->hasMoved() || !$student_id->hasMoved() || !$krs->hasMoved() || !$khs->hasMoved()){
                $ktp->move('data/'.session()->get('username').'/file/pengajuan/LA',session()->get('username').'_ktp.'.$ktp->getExtension(),true);
                $student_id->move('data/'.session()->get('username').'/file/pengajuan/LA',session()->get('username').'_studentID.'.$student_id->getExtension(),true);
                $krs->move('data/'.session()->get('username').'/file/pengajuan/LA',session()->get('username').'_krs.'.$krs->getExtension(),true);
                $khs->move('data/'.session()->get('username').'/file/pengajuan/LA',session()->get('username').'_khs.'.$khs->getExtension(),true);
            }

            $newData= [
                'jenis_pengajuan' => 'Pengajuan LA',
                'username'=> session()->get('username'),
                'users_id' => session()->get('id'),
                'ktp' => session()->get('username').'_ktp.'.$ktp->getExtension(),
                'khs' => session()->get('username').'_khs.'.$khs->getExtension(),
                'krs' => session()->get('username').'_krs.'.$krs->getExtension(),
                'student_id' => session()->get('username').'_studentID.'.$student_id->getExtension(),
                'negara' => $this->request->getVar('negara')
            ];
            $model = new PengajuanModel();
            $model->save($newData);
            session()->setFlashdata('success','Pengajuan Anda Telah Dikirim');
            return redirect()->back();
        }else{
            session()->setFlashdata('error', 'Terjadi Kesalahan, Pengajuan Anda tidak Berhasil. Pastikan Anda telah mengisi semua form');
            return redirect()->back();
        }
    }

    public function pengajuanDB(){
        $ktp = $this->request->getFile('ktp');
        $krs = $this->request->getFile('krs');
        $student_id = $this->request->getFile('student_id');
        $khs = $this->request->getFile('khs');
        $Rules=[
            'ktp' => 'uploaded[ktp]',
            'krs' => 'uploaded[krs]',
            'khs' => 'uploaded[khs]',
            'student_id' => 'uploaded[student_id]',
        ];
        if($this->validate($Rules)){
            if(!$ktp->hasMoved() || !$student_id->hasMoved() || !$krs->hasMoved() || !$khs->hasMoved()){
                $ktp->move('data/'.session()->get('username').'/file/pengajuan/Dana',session()->get('username').'_ktp.'.$ktp->getExtension(),true);
                $student_id->move('data/'.session()->get('username').'/file/pengajuan/Dana',session()->get('username').'_studentID.'.$student_id->getExtension(),true);
                $krs->move('data/'.session()->get('username').'/file/pengajuan/Dana',session()->get('username').'_krs.'.$krs->getExtension(),true);
                $khs->move('data/'.session()->get('username').'/file/pengajuan/Dana',session()->get('username').'_khs.'.$khs->getExtension(),true);
            }

            $newData= [
                'jenis_pengajuan' => 'Pengajuan Dana Beasiswa',
                'username'=> session()->get('username'),
                'users_id' => session()->get('id'),
                'ktp' => session()->get('username').'_ktp.'.$ktp->getExtension(),
                'khs' => session()->get('username').'_khs.'.$khs->getExtension(),
                'krs' => session()->get('username').'_krs.'.$krs->getExtension(),
                'student_id' => session()->get('username').'_studentId.'.$student_id->getExtension(),
                'negara' => $this->request->getVar('negara')
            ];

            $model = new PengajuanModel();
            $model->save($newData);
            session()->setFlashdata('success','Pengajuan Anda Telah Dikirim');
            return redirect()->back();
        }else{
            session()->setFlashdata('error', 'Terjadi Kesalahan, Pengajuan Anda tidak Berhasil. Pastikan Anda telah mengisi semua form');
            return redirect()->back();
        }
    }

    public function inputCatatan(){
        $model = new PengajuanModel();
        $tahap = $this->request->getVar('tahap');
        $newData = [
            'id' => $this->request->getVar('id'),
            'catatan' => $this->request->getVar('catatan'),
        ];
        if($tahap == "1_active"){
            $tahap = explode('_',$tahap);
            $newData = [
                'id' => $this->request->getVar('id'),
                'tahap_1' => $tahap[1],
                'tahap_2' => '',
                'tahap_3' => '',
                'catatan' => $this->request->getVar('catatan'),
            ];
        }else if($tahap == "2_active"){
            $tahap = explode('_',$tahap);
            $newData = [
                'id' => $this->request->getVar('id'),
                'tahap_1' => $tahap[1],
                'tahap_2' => $tahap[1],
                'tahap_3' => '',
                'catatan' => $this->request->getVar('catatan'),
            ];
        }else if($tahap == "3_active"){
            $tahap = explode('_',$tahap);
            $newData = [
                'id' => $this->request->getVar('id'),
                'tahap_1' => $tahap[1],
                'tahap_2' => $tahap[1],
                'tahap_3' => $tahap[1],
                'catatan' => $this->request->getVar('catatan'),
            ];
        }
        $model->save($newData);
        session()->setFlashdata('success', 'Catatan Berhasil Ditambahkan');
        return redirect()->back();
    }
}
