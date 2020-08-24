<?php namespace App\Controllers;

use App\Models\PengajuanModel;
use ZipArchive;

class BendaharaController extends BaseController{
    public function zip(){
        $pengajuan = explode(' ',$this->request->getVar('jenis_pengajuan'));
        $pathdir = 'data/'.$this->request->getVar('username').'/file/pengajuan/'.$pengajuan[1].'/';
        $nameArchive = 'data/'.$this->request->getVar('username').'/file/pengajuan/'.$pengajuan[1].'/'.$this->request->getVar('username').'.zip';
        $zip = new ZipArchive;
        if($zip -> open($nameArchive, ZipArchive::CREATE) === TRUE){
            $dir = opendir($pathdir);
            while($file = readdir($dir)){
                if(is_file($pathdir.$file)){
                    $zip -> addFile($pathdir.$file, $file);
                }
            }
            $zip->close();
            http_response_code(200);
            header('Content-Length: '.filesize($nameArchive));
            header("Content-Type: application/pdf");
            header('Content-Disposition: attachment; filename="'.$this->request->getVar('username').'.zip"');
            readfile($nameArchive);
            unlink($nameArchive);
            exit;
        }else{
            echo 'gabisa';
        }
    }
}