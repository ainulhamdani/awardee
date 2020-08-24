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
                    <i class="fas fa-info-circle"></i> &nbsp;Petunjuk
                </div>
                <div class="isi">
                    &nbsp;- &nbsp; Jika terdapat kesalahan data diri, silahkan menuju <span>Menu > <i class="fas fa-user"></i> &nbsp;Personal Info </span>untuk memperbarui data Anda.
                    <br>
                    &nbsp;- &nbsp; Untuk <span>menambah laporan Akademik maupun Non Akademik</span> , silahkan menuju <span>Menu > <i class="fas fa-plus-square"></i>&nbsp;Data Akademik </span>.
                    <br>
                    &nbsp;- &nbsp; Untuk <span>mengganti Password Anda</span>  silahkan menuju <span>Menu > <i class="fas fa-cog"></i>&nbsp;Akun </span>.
                    <br>
                    &nbsp;- &nbsp; Gunakan browser <span>Chrome</span> untuk tampilan yang lebih baik.
                </div>
            </div>
        <div class="title" id="welcome">
            <h2>Selamat Datang, <span> <?= $nama_lengkap ?> </span></h2>
        </div>
        <div class="row01">
            <div class="photo">
                <img src="data/<?=session()->get('username')?>/foto/<?= $foto_profil ?>" alt="">
            </div>
            <div class="item1">
                <div class="item">
                    <label for="nama">Nama Lengkap</label>
                    <span><?= $nama_lengkap ?></span>
                </div>
                <div class="item">
                    <label for="nama">Nama Panggilan</label>
                    <span><?= $nama_panggilan ?></span>
                </div>
                <div class="item">
                    <label for="nama">Tempat, Tanggal Lahir</label>
                    <span><?= $ttl ?></span>
                </div>
                <div class="item">
                    <label for="nama">Jenis Kelamin</label>
                    <span><?= $jenis_kelamin ?></span>
                </div>
                <div class="item">
                    <label for="nama">Alamat Domisili Asal</label>
                    <span><?= $alamat_domisili ?></span>
                </div>
                <div class="item">
                    <label for="nama">Kabupaten/Kota Kelahiran</label>
                    <span><?= $kab_kota ?></span>
                </div>
                <div class="item">
                    <label for="nama">Negara Tempat Studi</label>
                    <span><?= $negara_studi ?></span>
                </div>
                <div class="item">
                    <label for="nama">Alamat Tempat Tinggal Selama Studi</label>
                    <span><?= $alamat_studi ?> </span>
                </div>
            </div>
            <div class="item2">
                <div class="item">
                    <label for="nama">Email</label>
                    <span><?= $email ?></span>
                </div>
                <div class="item">
                    <label for="nama">Email Alternatif</label>
                    <span><?= $email_alt ?></span>
                </div>
                <div class="item">
                    <label for="nama">Nomor Paspor</label>
                    <span><?= $no_paspor ?></span>
                </div>
                <div class="item">
                    <label for="nama">Nomor Handphone</label>
                    <span><?= $no_hp ?></span>
                </div>
                <div class="item">
                    <label for="nama">Nomor WhatsApp</label>
                    <span><?= $no_wa ?></span>
                </div>
                <div class="item">
                    <label for="nama">Pekerjaan</label>
                    <span><?= $pekerjaan ?></span>
                </div>
                <div class="item">
                    <label for="nama">Instagram</label>
                    <span><?= $instagram ?></span>
                </div>
                <div class="item">
                    <label for="nama">Facebook</label>
                    <span><?= $facebook ?></span>
                </div>
            </div>
        </div>
        <div class="row02">
            <div class="title">
                <h2>Data <br><span>Pendidikan</span></h2> 
            </div>
            <div class="item1">
                <div class="item">
                    <label for="nama">Nama Universitas Tempat Pendidikan</label>
                    <span><?= $nama_univ ?></span>
                </div>
                <div class="item">
                    <label for="nama">Negara Tempat Pendidikan</label>
                    <span><?= $negara_univ ?></span>
                </div>
                <div class="item">
                    <label for="nama">Fakultas</label>
                    <span><?= $fakultas ?></span>
                </div>
                <div class="item">
                    <label for="nama">Jurusan</label>
                    <span><?= $jurusan ?></span>
                </div>
            </div>
            <div class="item2">
                <div class="item">
                    <label for="nama">Kota</label>
                    <span><?= $kota_univ ?></span>
                </div>
                <div class="item">
                    <label for="nama">Telepon</label>
                    <span><?= $tlp_univ ?></span>
                </div>
                <div class="item">
                    <label for="nama">Website</label>
                    <span><?= $web_univ ?></span>
                </div>
                <div class="item">
                    <label for="nama">Email Universitas</label>
                    <span><?= $email_univ ?></span>
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
                    <span><?= $nama_bank ?></span>
                </div>
                <div class="item">
                    <label for="nama">Atas Nama</label>
                    <span><?= $an_bank ?></span>
                </div>
                <div class="item">
                    <label for="nama">Swift code</label>
                    <span><?= $swift_code ?></span>
                </div>
            </div>
            <div class="item2">
                <div class="item">
                    <label for="nama">Alamat Bank</label>
                    <span><?= $alamat_bank ?></span>
                </div>
                <div class="item">
                    <label for="nama">Nomor Rekening</label>
                    <span><?= $no_rek ?></span>
                </div>
                <div class="item">
                    <label for="nama">Iban (Bank Asing)</label>
                    <span><?= $iban ?></span>
                </div>
            </div>
        </div>
    </div>
    <?php echo view('layout/footer.php')?>
    <script src="assets/js/app.js"></script>
</body>
</html>