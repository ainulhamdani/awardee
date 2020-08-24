<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/info-dana.css">
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
            <a class="home btn" href="/home">HOME</a>
            <div class="menu btn"> MENU</div>
            <div class="list">
                <ul class="list-menu">
                    <li><a href="/profil"><i class="fas fa-cog"> &nbsp;&nbsp;</i>Akun</a></li>
                    <li><a href="/edit"> <i class="fas fa-user"></i> &nbsp; Personal Info</a></li>
                    <li><a href="/laporan"> <i class="fas fa-plus-square"></i> &nbsp; Data Akademik</a></li>
                    <li><a href="/pengajuan"> <i class="fas fa-dollar-sign"></i> &nbsp; Keuangan</a></li>
                    <li><a href="/logout"><i class="fas fa-sign-out-alt"> &nbsp; </i>Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="body">
        <div class="title">
            <h2>Pengajuan <span>Pencairan Dana</span></h2> <br>
            <hr>
        </div>
        <div class="submission">
            <button id="modal-btn" class="button">Permohonan Pencairan Dana LA</button>
            <button id="modal-btn-dana" class="button">Permohonan Pencairan Dana Beasiswa</button>
        </div>
        <?php if(session()->get('error')): ?>
            <div class="alert-danger">
                <?= session()->get('error')?>
            </div>
        <?php endif ?>
        <?php if(session()->get('success')): ?>
            <div class="info-home">
                <?= session()->get('success')?>
            </div>
        <?php endif ?>
        <hr>
        <div class="status">
            <div class="LA">
                <div class="title">Status Pengajuan Dana LA</div>
                <div class="info-graphics">
                    <div class="tahap">
                        <?php if (count($pengajuan_la)!=0):?>
                            <div class="step step-<?=$pengajuan_la[0]['tahap_1']?>">
                                <h1>1</h1>
                            </div>
                            <div class="strip strip-<?=$pengajuan_la[0]['tahap_1']?>"></div>
                            <div class="step step-<?=$pengajuan_la[0]['tahap_2']?>">
                                <h1>2</h1>
                            </div>
                            <div class="strip strip-<?=$pengajuan_la[0]['tahap_2']?>"></div>
                            <div class="step step-<?=$pengajuan_la[0]['tahap_3']?>">
                                <h1>3</h1>
                            </div>
                        <?php else: ?>
                            <div class="step">
                                <h1>1</h1>
                            </div>
                            <div class="strip"></div>
                            <div class="step">
                                <h1>2</h1>
                            </div>
                            <div class="strip"></div>
                            <div class="step">
                                <h1>3</h1>
                            </div>
                        <?php endif ?>
                    </div>
                    <div class="catatan">
                        <p class="head-note">Catatan :</p>
                        <?php if ((count($pengajuan_la)!=0)):?>
                            <?php if($pengajuan_la[0]['catatan']!=""):?>
                                <p><?= $pengajuan_la[0]['catatan'] ?></p>
                            <?php else: ?>
                                <p>Sedang Di Proses . . .</p>
                            <?php endif ?>
                        <?php else: ?>
                            <p>Belum Ada Proses Pencairan</p>
                        <?php endif ?>
                    </div>
                </div>
            </div>  
            <div class="DB">
                <div class="title">Status Pengajuan Dana Beasiswa</div>
                <div class="info-graphics">
                    <div class="tahap">
                    <?php if (count($pengajuan_db)!=0):?>
                            <div class="step step-<?=$pengajuan_db[0]['tahap_1']?>">
                                <h1>1</h1>
                            </div>
                            <div class="strip strip-<?=$pengajuan_db[0]['tahap_1']?>"></div>
                            <div class="step step-<?=$pengajuan_db[0]['tahap_2']?>">
                                <h1>2</h1>
                            </div>
                            <div class="strip strip-<?=$pengajuan_db[0]['tahap_2']?>"></div>
                            <div class="step step-<?=$pengajuan_db[0]['tahap_3']?>">
                                <h1>3</h1>
                            </div>
                        <?php else: ?>
                            <div class="step">
                                <h1>1</h1>
                            </div>
                            <div class="strip"></div>
                            <div class="step">
                                <h1>2</h1>
                            </div>
                            <div class="strip"></div>
                            <div class="step">
                                <h1>3</h1>
                            </div>
                        <?php endif ?>
                    </div>
                    <div class="catatan">
                        <p class="head-note">Catatan :</p>
                        <?php if (count($pengajuan_db)!=0):?>
                            <?php if($pengajuan_db[0]['catatan']!=""):?>
                                <p><?= $pengajuan_db[0]['catatan'] ?></p>
                            <?php else: ?>
                                <p>Sedang Di Proses . . .</p>
                            <?php endif ?>
                        <?php else: ?>
                            <p>Belum Ada Proses Pencairan</p>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>        
        <br>
    </div>    
    <div class="modalku">
        <div id="my-modal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close">&times;</span>
                    <h2>Permohonan Pencairan Dana LA</h2>
                </div>
                <div class="modal-body">
                    <form action="/pengajuanLA" enctype="multipart/form-data" id="la" method="post" >
                        <div class="item">
                            <label for="upload ktp">Negara Tempat Pendidikan</label>
                            <select name="negara" id="">
                                <option value="polandia">Polandia</option>
                                <option value="china">China</option>
                                <option value="malaysia">Malaysia</option>
                                <option value="taiwan">Taiwan</option>
                                <option value="ceko">Ceko</option>
                                <option value="rusia">Rusia</option>
                            </select>
                        </div>
                        <div class="item">
                            <label for="upload ktp">Upload KTP</label>
                            <input type="file" name="ktp" id="ktp-la">
                        </div>
                        <div class="item">
                            <label for="upload khs">Upload Student ID</label>
                            <input type="file" name="student_id" id="id-la">
                        </div>
                        <div class="item">
                            <label for="upload khs">Upload KHS Terakhir</label>
                            <input type="file" name="khs" id="khs-la">
                        </div>
                        <div class="item">
                            <label for="upload khs">Upload KRS Terakhir</label>
                            <input type="file" name="krs" id="krs-la">
                        </div>
                    </form>
                        <div class="item">
                            <button class ="submit-la">Ajukan</button>
                        </div>
                </div>
            </div>
        </div>
        <div id="my-modal-dana" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close-dana">&times;</span>
                    <h2>Permohonan Pencairan Dana Beasiswa</h2>
                </div>
                <div class="modal-body">
                <form action="/pengajuanDB" enctype="multipart/form-data" id="db" method="post" >
                        <div class="item">
                            <label for="upload ktp">Negara Tempat Pendidikan</label>
                            <select name="negara" id="">
                                <option value="polandia">Polandia</option>
                                <option value="china">China</option>
                                <option value="malaysia">Malaysia</option>
                                <option value="taiwan">Taiwan</option>
                                <option value="ceko">Ceko</option>
                                <option value="rusia">Rusia</option>
                            </select>
                        </div>
                        <div class="item">
                            <label for="upload khs">Upload KTP</label>
                            <input type="file" name="ktp" id="ktp-db">
                        </div>
                        <div class="item">
                            <label for="upload khs">Upload Student ID</label>
                            <input type="file" name="student_id" id="id-db">
                        </div>
                        <div class="item">
                            <label for="upload khs">Upload KHS Terakhir</label>
                            <input type="file" name="khs" id="khs-db">
                        </div>
                        <div class="item">
                            <label for="upload khs">Upload KRS Terakhir</label>
                            <input type="file" name="krs" id="krs-db">
                        </div>
                    </form>
                        <div class="item">
                            <button class="submit-db">Ajukan</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/app.js"></script>
    <footer>
        <div class="sosmed">
            <div class="gg">
                <i class="fab fa-google-plus-g"></i>
            </div>
            <div class="ig">
                <i class="fab fa-instagram"></i>
            </div>
            <div class="fb">
                <i class="fab fa-facebook-f"></i>
            </div>
        </div>
        <div class="copyright">
            Copyright © 2020 . LPPNTB  All rights reserved
        </div>
    </footer>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/jquery-3.5.1.js"></script>
    <script>
        const modal = document.querySelector('#my-modal');
        const modalBtn = document.querySelector('#modal-btn');
        const closeBtn = document.querySelector('.close');
        const modalDana = document.querySelector('#my-modal-dana');
        const modalDanaBtn = document.querySelector('#modal-btn-dana');
        const closeBtnDana = document.querySelector('.close-dana');
        // Events
        modalBtn.addEventListener('click', openModal);
        closeBtn.addEventListener('click', closeModal);
        window.addEventListener('click', outsideClick);
        modalDanaBtn.addEventListener('click', openModalDana);
        closeBtnDana.addEventListener('click', closeModalDana);

        // Open
        function openModal() {
            modal.style.display = 'block';
        }
        function openModalDana() {
            modalDana.style.display = 'block';
        }

        // Close
        function closeModal() {
            modal.style.display = 'none';
        }
        function closeModalDana() {
            modalDana.style.display = 'none';
        }

        // Close If Outside Click
        function outsideClick(e) {
            if (e.target == modal) {
                modal.style.display = 'none';
                modalDana.style.display = 'none';
            }
        }

        $('.submit-la').on('click',function(){
            if($('#khs-la')[0].files.length!=0 && $('#krs-la')[0].files.length!=0 && $('#id-la')[0].files.length!=0 && $('#ktp-la')[0].files.length!=0){
                    if($('#khs-la')[0].files[0].type != "application/pdf"){
                        alert('File KHS yang Anda upload harus berformat PDF');
                    }else if($('#krs-la')[0].files[0].type != "application/pdf"){
                        alert('File KRS yang Anda upload harus berformat PDF');
                    }else if($('#ktp-la')[0].files[0].type != "application/pdf"){
                        alert('File KTP yang Anda upload harus berformat PDF');
                    }else if($('#id-la')[0].files[0].type != "application/pdf"){
                        alert('File Student ID yang Anda upload harus berformat PDF');
                    }else{
                        $('#la').submit();
                    }
            }else{
                alert('Anda belum memasukkan semua data');
            }
        });

        $('.submit-db').on('click',function(){
            if($('#khs-db')[0].files.length!=0 && $('#krs-db')[0].files.length!=0 && $('#id-db')[0].files.length!=0 && $('#ktp-db')[0].files.length!=0){
                    if($('#khs-db')[0].files[0].type != "application/pdf"){
                        alert('File KHS yang Anda upload harus berformat PDF');
                    }else if($('#krs-db')[0].files[0].type != "application/pdf"){
                        alert('File KRS yang Anda upload harus berformat PDF');
                    }else if($('#ktp-db')[0].files[0].type != "application/pdf"){
                        alert('File KTP yang Anda upload harus berformat PDF');
                    }else if($('#id-db')[0].files[0].type != "application/pdf"){
                        alert('File Student ID yang Anda upload harus berformat PDF');
                    }else{
                        $('#db').submit();
                    }
            }else{
                alert('Anda belum memasukkan semua data');
            }
        });

    </script>
</body>
</html>