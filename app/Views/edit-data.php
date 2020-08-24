<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/css/fontawesome/css/all.min.css">
    <title>Sistem Informasi Awardee Beasiswa NTB</title>
</head>
<body>
    <?php echo view('layout/header.php')?>
    <div class="body">
        <div class="info-home">
            <div class="judul">
                <i class="fas fa-info-circle"></i> &nbsp;Info
            </div>
            <div class="isi">
                - &nbsp; Laman ini merupakan tempat untuk <span>memperbarui data</span> pribadi Anda.
                Tinjau kembali data anda sebelum melakukan perubahan.
                <br>
                - &nbsp; Jika sudah selesai, klik tombol <span>Simpan</span> yang berada dipaling bawah.
            </div>
        </div>
        <?php if(session()->get('danger')): ?>
            <div class="alert-danger">
                <?= session()->get('danger')?>
            </div>
        <?php endif ?>
        <?php if(session()->get('success')): ?>
            <div class="info-home">
                <?= session()->get('success')?>
            </div>
        <?php endif ?>
        <?php if(isset($validation)):?>
            <div class="alert-danger">
                <span>Eror!</span>
                <br> <br>
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>
        <div class="title">
            <h2>Edit <span>Personal Info</span></h2>
        </div>
        <form enctype="multipart/form-data" action="/uploads" method="post" id="uploadFile"></form>
        <form enctype="multipart/form-data" action="/edit" method="post" id="updateData">
            <div class="row01">
                <div class="photo">
                    <div class="photo input-photo">
                        <img src="data/<?=session()->get('username')?>/foto/<?= $foto_profil ?>" alt="">
                        <div class="label">Ganti Foto</div>
                        <a href="data/<?=session()->get('username')?>/foto/<?= $foto_profil ?>" target="_blank" style="font-size:10px; color:#E43F5A"><i><?= $foto_profil ?></i></a>
                        <input type="file" form="uploadFile" name="image" class="input-edit">
                    </div>
                    <button type="submit" form="uploadFile">Upload Foto</button>
                </div>
                <div class="item1">
                    <div class="item">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" id="" value="<?= $nama_lengkap ?>">
                    </div>
                    <div class="item">
                        <label for="nama">Nama Panggilan</label>
                        <input type="text" name="nama_panggilan" id="" value="<?= $nama_panggilan ?>">
                    </div>
                    <div class="item">
                        <label for="nama">Tempat, Tanggal Lahir</label>
                        <input type="text" name="ttl" id="" value="<?= $ttl ?>">
                    </div>
                    <div class="item">
                        <label for="nama">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="">
                            <?php if($jenis_kelamin == "Laki - Laki"): ?>
                                <option value="Laki - Laki" selected>Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            <?php elseif($jenis_kelamin == "Perempuan"): ?>
                                <option value="Laki - Laki">Laki-laki</option>
                                <option value="Perempuan" selected>Perempuan</option>
                            <?php endif ?>
                        </select>
                    </div>
                    <div class="item">
                        <label for="nama">Alamat Domisili Asal</label>
                        <input type="text" name="alamat_domisili" id="" value="<?= $alamat_domisili ?>">
                    </div>
                    <div class="item">
                        <label for="nama">Kabupaten/Kota Kelahiran</label>
                        <input type="text" name="kab_kota" id="" value="<?= $kab_kota ?>">
                    </div>
                    <div class="item">
                        <label for="nama">Negara Tempat Studi</label>
                        <input type="text" name="negara_studi" id="" value="<?= $negara_studi ?>">
                    </div>
                    <div class="item">
                        <label for="nama">Alamat Tempat Tinggal Selama Studi</label>
                        <input type="text" name="alamat_studi" id="" value="<?= $alamat_studi ?>">
                    </div>
                </div>
                <div class="item2">
                    <div class="item">
                        <label for="nama">Email</label>
                        <input type="email" name="email" id="" value="<?= $email ?>">
                    </div>
                    <div class="item">
                        <label for="nama">Email Alternatif</label>
                        <input type="email" name="email_alt" id="" value="<?= $email_alt ?>">
                    </div>
                    <div class="item">
                        <label for="nama">Nomor Paspor</label>
                        <input type="text" name="no_paspor" id="" value="<?= $no_paspor ?>">
                    </div>
                    <div class="item">
                        <label for="nama">Nomor Handphone</label>
                        <input type="text" name="no_hp" id="" value="<?= $no_hp ?>">
                    </div>
                    <div class="item">
                        <label for="nama">Nomor WhatsApp</label>
                        <input type="text" name="no_wa" id="" value="<?= $no_wa ?>">
                    </div>
                    <div class="item">
                        <label for="nama">Pekerjaan</label>
                        <input type="text" name="pekerjaan" id="" value="<?= $pekerjaan ?>">
                    </div>
                    <div class="item">
                        <label for="nama">Instagram</label>
                        <input type="text" name="instagram" id="" value="<?= $instagram ?>">
                    </div>
                    <div class="item">
                        <label for="nama">Facebook</label>
                        <input type="text" name="facebook" id="" value="<?= $facebook ?>">
                    </div>
                </div>
            </div>
            <div class="row02">
                <div class="title">
                    <h2>Data <br> <span>Pendidikan</span></h2> 
                </div>
                <div class="item1">
                    <div class="item">
                        <label for="nama">Nama Universitas Tempat Pendidikan</label>
                        <input type="text" name="nama_univ" id="" value="<?= $nama_univ ?>">
                    </div>
                    <div class="item">
                        <label for="nama">Negara Tempat Pendidikan</label>
                        <input type="text" name="negara_univ" id="" value="<?= $negara_univ ?>">
                    </div>
                    <div class="item">
                        <label for="nama">Fakultas</label>
                        <input type="text" name="fakultas" id="" value="<?= $fakultas ?>">
                    </div>
                    <div class="item">
                        <label for="nama">Jurusan</label>
                        <input type="text" name="jurusan" id="" value="<?= $jurusan ?>">
                    </div>
                </div>
                <div class="item2">
                    <div class="item">
                        <label for="nama">Kota</label>
                        <input type="text" name="kota_univ" id="" value="<?= $kota_univ ?>">
                    </div>
                    <div class="item">
                        <label for="nama">Telepon</label>
                        <input type="text" name="tlp_univ" id="" value="<?= $tlp_univ ?>">
                    </div>
                    <div class="item">
                        <label for="nama">Website</label>
                        <input type="text" name="web_univ" id="" value="<?= $web_univ ?>">
                    </div>
                    <div class="item">
                        <label for="nama">Email Universitas</label>
                        <input type="text" name="email_univ" id="" value="<?= $email_univ ?>">
                    </div>
                </div>
            </div>
            <div class="row03">
                <div class="title">
                    <h2>Data <span>Bank</span></h2> 
                </div>
                <div class="item1">
                    <div class="item">
                        <label for="nama">Nama Bank</label>
                        <input type="text" name="nama_bank" id="" value="<?= $nama_bank ?>"> 
                    </div>
                    <div class="item">
                        <label for="nama">Atas Nama</label>
                        <input type="text" name="an_bank" id="" value="<?= $an_bank ?>">
                    </div>
                    <div class="item">
                        <label for="nama">Swift code</label>
                        <input type="text" name="swift_code" id="" value="<?= $swift_code ?>">
                    </div>
                </div>
                <div class="item2">
                    <div class="item">
                        <label for="nama">Alamat Bank</label>
                        <input type="text" name="alamat_bank" id="" value="<?= $alamat_bank ?>">
                    </div>
                    <div class="item">
                        <label for="nama">Nomor Rekening</label>
                        <input type="text" name="no_rek" id="" value="<?= $no_rek ?>">
                    </div>
                    <div class="item">
                        <label for="nama">Iban (Bank Asing)</label>
                        <input type="text" name="iban" id="" value="<?= $iban ?>">
                    </div>
                </div>
            </div>
            <span style="font-size: 10px; color: red;">* Cek Kembali data Anda sebelum menyimpan</span>
            <div class="button">
                <button class="save" type="submit">Simpan Data</button>
            </div>        
        </form>
    </div>
    <?php echo view('layout/footer.php')?>
    <script src="assets/js/app.js"></script>
    <script>
        $('.save').on('click',function(){
            $('.body').css('opacity','0.4');
        });
    </script>
</body>
</html>