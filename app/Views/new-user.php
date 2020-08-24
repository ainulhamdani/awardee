<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/css/fontawesome/css/all.min.css">
    <title>Sistem Informasi Awardee Beasiswa NTB</title>
</head>
<body>
    <div class="header">
        <div class="logo" style="
            font-family:metro-bold; 
            font-size:12px;
            color:#fff;
            display:flex;
            justify-content:center;
            align-items:center;
        ">
            <div class="logo-user" style="
                font-size:20px;
                position:relative;
                margin-top:-4px;
            ">
            <i class="fas fa-user-graduate"></i>
            </div>
            &nbsp; &nbsp; Sistem Informasi Awardee Beasiswa NTB
        </div>
        <div class="navbar">
            <a class="home btn" href="/input">HOME</a>
            <a class="home btn" href="/logout">LOGOUT</a>
        </div>
    </div>
    <div class="body">
        <div class="info-home">
            <div class="judul">
                <i class="fas fa-info-circle"></i> &nbsp;Selamat datang di Sistem informasi Awardee Beasiswa NTB
            </div>
            <div class="isi">
                - Sebelum menuju ke laman berikutya, terlebih dahulu isi data Anda dibawah ini dengan data yang <span>valid</span>. <br>
                - Tingkat <span>Kevalidan</span> data yang Anda masukkan akan berpengaruh saat proses pencairan beasiswa. <br>
                - Tinjau kembali data Anda sebelum menyimpan. <br>
            </div>
        </div>
        <?php if(session()->get('success')): ?>
            <div class="info-home">
                <?= session()->get('success')?>
            </div>
        <?php endif ?>
        <?php if(session()->get('error')): ?>
            <div class="alert-danger">
                <?= session()->get('error')?>
            </div>
        <?php endif ?>
        <div class="title">
            <h2>Input <span>Data Diri</span></h2>
        </div>
        <form action="/input" enctype="multipart/form-data" method="post">
            <div class="row01">
                <div class="photo">
                <label for="file">Upload Foto</label>
                    <input type="file" name="file" id="" style="border:1px solid; margin-top:10px">
                </div>
                <div class="item1">
                    <div class="item">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" id="">
                    </div>
                    <div class="item">
                        <label for="nama">Nama Panggilan</label>
                        <input type="text" name="nama_panggilan" id="" >
                    </div>
                    <div class="item">
                        <label for="nama">Tempat, Tanggal Lahir</label>
                        <input type="text" name="ttl" id="">
                    </div>
                    <div class="item">
                        <label for="nama">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="">
                            <option value="Laki - Laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="item">
                        <label for="nama">Alamat Domisili Asal</label>
                        <input type="text" name="alamat_domisili" id="">
                    </div>
                    <div class="item">
                        <label for="nama">Kabupaten/Kota Kelahiran</label>
                        <input type="text" name="kab_kota" id="" >
                    </div>
                    <div class="item">
                        <label for="nama">Negara Tempat Studi</label>
                        <input type="text" name="negara_studi" id="" >
                    </div>
                    <div class="item">
                        <label for="nama">Alamat Tempat Tinggal Selama Studi</label>
                        <input type="text" name="alamat_studi" id="" >
                    </div>
                </div>
                <div class="item2">
                    <div class="item">
                        <label for="nama">Email</label>
                        <input type="email" name="email" id="" >
                    </div>
                    <div class="item">
                        <label for="nama">Email Alternatif</label>
                        <input type="email" name="email_alt" id="" >
                    </div>
                    <div class="item">
                        <label for="nama">Nomor Paspor</label>
                        <input type="text" name="no_paspor" id="" >
                    </div>
                    <div class="item">
                        <label for="nama">Nomor Handphone</label>
                        <input type="text" name="no_hp" id="" >
                    </div>
                    <div class="item">
                        <label for="nama">Nomor WhatsApp</label>
                        <input type="text" name="no_wa" id="" >
                    </div>
                    <div class="item">
                        <label for="nama">Pekerjaan</label>
                        <input type="text" name="pekerjaan" id="" >
                    </div>
                    <div class="item">
                        <label for="nama">Instagram</label>
                        <input type="text" name="instagram" id="" >
                    </div>
                    <div class="item">
                        <label for="nama">Facebook</label>
                        <input type="text" name="facebook" id="" >
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
                        <input type="text" name="nama_univ" id="" >
                    </div>
                    <div class="item">
                        <label for="nama">Negara Tempat Pendidikan</label>
                        <input type="text" name="negara_univ" id="" >
                    </div>
                    <div class="item">
                        <label for="nama">Fakultas</label>
                        <input type="text" name="fakultas" id="" >
                    </div>
                    <div class="item">
                        <label for="nama">Jurusan</label>
                        <input type="text" name="jurusan" id="" >
                    </div>
                </div>
                <div class="item2">
                    <div class="item">
                        <label for="nama">Kota</label>
                        <input type="text" name="kota_univ" id="" >
                    </div>
                    <div class="item">
                        <label for="nama">Telepon</label>
                        <input type="text" name="tlp_univ" id="" >
                    </div>
                    <div class="item">
                        <label for="nama">Website</label>
                        <input type="text" name="web_univ" id="" >
                    </div>
                    <div class="item">
                        <label for="nama">Email Universitas</label>
                        <input type="text" name="email_univ" id="" >
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
                        <input type="text" name="nama_bank" id="" > 
                    </div>
                    <div class="item">
                        <label for="nama">Atas Nama</label>
                        <input type="text" name="an_bank" id="" >
                    </div>
                    <div class="item">
                        <label for="nama">Swift code</label>
                        <input type="text" name="swift_code" id="" >
                    </div>
                </div>
                <div class="item2">
                    <div class="item">
                        <label for="nama">Alamat Bank</label>
                        <input type="text" name="alamat_bank" id="" >
                    </div>
                    <div class="item">
                        <label for="nama">Nomor Rekening</label>
                        <input type="text" name="no_rek" id="" >
                    </div>
                    <div class="item">
                        <label for="nama">Iban (Bank Asing)</label>
                        <input type="text" name="iban" id="" >
                    </div>
                </div>
            </div>
            <span style="font-size: 10px; color: red;">* Cek Kembali data Anda sebelum menyimpan</span>
            <div class="button">
                <button class="save" type="submit">Simpan</button>
            </div>        
        </form>
    </div>
    <?php echo view('layout/footer.php')?>
</body>
</html>