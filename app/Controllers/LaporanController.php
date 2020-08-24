<?php namespace App\Controllers;

use App\Models\LaporanAkademikModel;
use App\Models\LaporanNonAkademikModel;
use App\Models\SemesterModel;
use App\Models\PengajuanModel;

class LaporanController extends BaseController{
    public function input(){  
        $path_khs = 'data/'.session()->get('username').'/file/semester/'.$this->request->getVar('semester_akademik').'/'.session()->get('username').'_khs.pdf';
        $path_krs = 'data/'.session()->get('username').'/file/semester/'.$this->request->getVar('semester_akademik').'/'.session()->get('username').'_krs.pdf';
        $path_sertifikat = 'data/'.session()->get('username').'/file/semester/'.$this->request->getVar('semester_akademik').'/'.session()->get('username').'_sertifikat.pdf';

        $model = new LaporanAkademikModel();
        $krs = session()->get('username').'_krs.'.$this->request->getFile('krs')->getExtension();
        
        if($this->request->getFile('krs')!=''){
            $cek=$model->select('id')->where(['semester_id' => $this->request->getVar('semester_akademik'),'users_id' => session()->get('id')])->get()->getRowArray();
            if(is_null($cek)){
                $newData=[
                    'semester_id' => $this->request->getVar('semester_akademik'),
                    'users_id' => session()->get('id'),
                    'krs' => $krs,
                ];
            }else{
                $id = $cek;
                $newData=[
                    'id' => $id,
                    'krs' => $krs,
                ];
            }
            $this->request->getFile('krs')->move('data/'.session()->get('username').'/file/semester/'.$this->request->getVar('semester_akademik'),session()->get('username').'_krs.'.$this->request->getFile('krs')->getExtension(), true);
            $model->save($newData);
        }

        if($this->request->getFile('khs')!=''){
            $khs = session()->get('username').'_khs.'.$this->request->getFile('khs')->getExtension();
            $cek=$model->select('id')->where(['semester_id' => $this->request->getVar('semester_akademik'),'users_id' => session()->get('id')])->get()->getRowArray();
            if(is_null($cek)){
                $newData=[
                    'semester_id' => $this->request->getVar('semester_akademik'),
                    'users_id' => session()->get('id'),
                    'khs' => $khs,
                ];
            }else{
                $id = $cek;
                $newData=[
                    'id' => $id,
                    'khs' => $khs,
                ];
            }
            $this->request->getFile('khs')->move('data/'.session()->get('username').'/file/semester/'.$this->request->getVar('semester_akademik'),session()->get('username').'_khs.'.$this->request->getFile('khs')->getExtension(), true);
            $model->save($newData);
        }

        if($this->request->getFile('sertifikat')!=''){
            $sertifikat = session()->get('username').'_sertifikat.'.$this->request->getFile('sertifikat')->getExtension();
            $cek=$model->select('id')->where(['semester_id' => $this->request->getVar('semester_akademik'),'users_id' => session()->get('id')])->get()->getRowArray();
            if(is_null($cek)){
                $newData=[
                    'semester_id' => $this->request->getVar('semester_akademik'),
                    'users_id' => session()->get('id'),
                    'sertifikat' => $sertifikat,
                ];
            }else{
                $id = $cek;
                $newData=[
                    'id' => $id,
                    'sertifikat' => $sertifikat,
                ];
            }
            $this->request->getFile('sertifikat')->move('data/'.session()->get('username').'/file/semester/'.$this->request->getVar('semester_akademik'),session()->get('username').'_sertifikat.'.$this->request->getFile('sertifikat')->getExtension(), true);
            $model->save($newData);
        }

        if($this->request->getVar('gpa')!=''){
            $gpa = $this->request->getVar('gpa');
            $cek=$model->select('id')->where(['semester_id' => $this->request->getVar('semester_akademik'),'users_id' => session()->get('id')])->get()->getRowArray();
            if(is_null($cek)){
                $newData=[
                    'semester_id' => $this->request->getVar('semester_akademik'),
                    'users_id' => session()->get('id'),
                    'gpa' => $gpa,
                ];
            }else{
                $id = $cek;
                $newData=[
                    'id' => $id,
                    'gpa' => $gpa,
                ];
            }
            $model->save($newData);
        }
        session()->setFlashdata('success', 'Data Akademik pada semester '.$this->request->getVar('semester_akademik').' Anda Berhasil Tersimpan');
        return redirect()->back();

    }

    public function inputDataSemester(){
        $model = new SemesterModel();
        $newData = [
            'users_id' => $this->request->getVar('users_id'),
            'semester_id' => $this->request->getVar('semester_id'),
            'course' => $this->request->getVar('course'),
            'score' => $this->request->getVar('score'),
        ];        
        $model->insert($newData);
    }

    public function getData(){
        $akademik = new LaporanAkademikModel();
        $semester = new SemesterModel();
        $akademikNew = $akademik->where([
            'semester_id' => $this->request->getVar('semester'),
            'users_id' => session()->get('id')
            ])->get()->getResultArray();
        $semesterNew = $semester->where([
            'semester_id' => $this->request->getVar('semester'),
            'users_id' => session()->get('id')
            ])->get()->getResultArray();
        $data = [
            'akademik' => $akademikNew,
            'semester' => $semesterNew
        ];
        return json_encode($data);
    }

    public function editDataSemester(){
        $semester = new SemesterModel();
        $id = $semester->where('course',$this->request->getVar('course'))->get()->getResultArray();
        $newData = [
            'id' => $id[0]['id'],
            'course' => $this->request->getVar('coursebaru'),
            'score' => $this->request->getVar('score'),
        ];
        $semester->save($newData);
    }

    public function deleteDataKam(){
        $semester = new SemesterModel();
        $id = $semester->where('course',$this->request->getVar('course'))->get()->getResultArray();
        $semester->delete($id[0]['id']);
    }

    public function inputNon(){
        $model = new LaporanNonAkademikModel();
        $newData = [
            'users_id' => session()->get('id'),
            'semester' => $this->request->getVar('semester'),
            'nama_penghargaan' => $this->request->getVar('nama_penghargaan'),
            'sertifikat' => $this->request->getVar('nama_penghargaan').'.'.$this->request->getFile('sertifikat')->getExtension()
        ];

        $this->request->getFile('sertifikat')->move('data/'.session()->get('username').'/file/semester/non-akademik/'.$this->request->getVar('semester'),$this->request->getVar('nama_penghargaan').'.'.$this->request->getFile('sertifikat')->getExtension());
        $model->save($newData);
        session()->setFlashdata('success','Data non-akademik Anda berhasil ditambah');
        return redirect()->back();
    }

    public function getNon(){
        $model = new LaporanNonAkademikModel();
        $data = $model->where([
            'semester' => $this->request->getVar('semester'),
            'users_id' => $this->request->getVar('users_id')
        ])->get()->getResultArray();
        return json_encode($data);
    }

    public function delNon(){
        $model = new LaporanNonAkademikModel();
        $id = $model->where('nama_penghargaan',$this->request->getVar('nama_penghargaan'))->get()->getResultArray();
        $path = 'data/'.session()->get('username').'/file/semester/non-akademik/'.$id[0]['semester'].'/'.$this->request->getVar('nama_penghargaan').'.pdf';
        $model->delete($id[0]['id']);
        unlink($path);
    }

    public function hapusAjuan(){
        $model = new PengajuanModel();
        $data = $model->where([
            'username' => $this->request->getVar('username'),
            'jenis_pengajuan' => $this->request->getVar('jenis_pengajuan'),
        ])->delete();
    }
}