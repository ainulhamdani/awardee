<?php namespace App\Controllers;

class DownloadController extends BaseController{
    public function krs(){
        $semester = $this->request->getVar('semester');
        $path = 'data/'.session()->get('username').'/file/semester/'.$semester.'/'.session()->get('username').'_krs.pdf';
        if(file_exists($path)){
            http_response_code(200);
            header('Content-Length: '.filesize($path));
            header("Content-Type: application/pdf");
            header('Content-Disposition: attachment; filename="'.session()->get('username').'_krs.pdf"');
            readfile($path);
            exit;
        }else{
            return redirect()->back();
        }
    }
    public function khs(){
        $semester = $this->request->getVar('semester');
        $path = 'data/'.session()->get('username').'/file/semester/'.$semester.'/'.session()->get('username').'_khs.pdf';
        if(file_exists($path)){
            http_response_code(200);
            header('Content-Length: '.filesize($path));
            header("Content-Type: application/pdf");
            header('Content-Disposition: attachment; filename="'.session()->get('username').'_khs.pdf"');
            readfile($path);
            exit;
        }else{
            return redirect()->back(); 
        }
    }

    public function sertifikat(){
        $semester = $this->request->getVar('semester');
        $path = 'data/'.session()->get('username').'/file/semester/'.$semester.'/'.session()->get('username').'_sertifikat.pdf';
        if(file_exists($path)){
            http_response_code(200);
            header('Content-Length: '.filesize($path));
            header("Content-Type: application/pdf");
            header('Content-Disposition: attachment; filename="'.session()->get('username').'_sertifikat.pdf"');
            readfile($path);
            exit;   
        }else{
            return redirect()->back();
        }
    }
    
    public function sertifNon(){
        $semester = $this->request->getVar('semester');
        $nama_penghargaan = $this->request->getVar('nama_penghargaan');
        $path = 'data/'.session()->get('username').'/file/semester/non-akademik/'.$semester.'/'.$nama_penghargaan.'.pdf';
        if(file_exists($path)){
            http_response_code(200);
            header('Content-Length: '.filesize($path));
            header("Content-Type: application/pdf");
            header('Content-Disposition: attachment; filename="'.session()->get('username').'_'.$nama_penghargaan.'.pdf"');
            readfile($path);
            exit;   
        }else{
            return redirect()->back();
        }
    }
}