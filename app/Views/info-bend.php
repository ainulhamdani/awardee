<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/info-bend.css">
    <link rel="stylesheet" href="assets/css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
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
                    <li><a href="/edit"> <i class="fas fa-database"></i> &nbsp; Edit Data diri</a></li>
                    <li><a href="/laporan"> <i class="fas fa-plus-square"></i> &nbsp; Tambah Laporan</a></li>
                    <li><a href="/pengajuan"> <i class="fas fa-dollar-sign"></i> &nbsp; Info Pencairan Dana</a></li>
                    <li><a href="/logout"><i class="fas fa-sign-out-alt"> &nbsp; </i>Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="body">
        <div class="title">
            <h2>Pengajuan <span>Pencairan Dana</span></h2> <br>
            <hr>
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
        </div>
        <div class="badan">
            <table id="tabel-data">
                <thead>
                    <th>Nama</th>
                    <th>Negara</th>
                    <th>Jenis Pengajuan</th>
                    <th>File Pengajuan</th>
                    <th>Proses</th>                    
                    <th>Aksi</th>
                </thead>
                <tbody>
                    <?php $count = 0?>
                    <?php foreach($data as $d): ?>
                    <tr>
                        <td class="nama"><?=$d['username']?></td>
                        <td><?=$d['negara']?></td>
                        <td class="jenis_pengajuan"><?=$d['jenis_pengajuan']?></td>
                        <td>
                            <form action="/download-zip" method="post" id="download[<?=$count?>]" style="display:none"></form>
                            <input type="text" class="username" name="username" value="<?=$d['username']?>" style="display:none" form="download[<?=$count?>]">
                            <input type="text" class="jenis_pengajuan" name="jenis_pengajuan" value="<?=$d['jenis_pengajuan']?>" style="display:none" form="download[<?=$count?>]">
                            <button type="submit" form="download[<?=$count?>]">Download FIle <?=$d['username']?></button> 
                        </td>
                        <?php if($d['tahap_1']=="active" && $d['tahap_2']=="" && $d['tahap_3']==""):?>
                            <td class="tahap">Tahap 1</td>
                        <?php elseif($d['tahap_1']=="active" && $d['tahap_2']=="active" && $d['tahap_3']==""):?>
                            <td class="tahap">Tahap 2</td>
                        <?php elseif($d['tahap_1']=="active" && $d['tahap_2']=="active" && $d['tahap_3']=="active"):?>
                            <td class="tahap">Tahap 3</td>
                        <?php else: ?>
                            <td class="tahap">Belum di proses</td>
                        <?php endif ?>
                        <td>
                            <input class="id" name="id" value="<?=$d['id']?>" style="display:none"></input>
                            <button class="catatan" class="modal-btn"><i class="fas fa-edit"></i></button>
                            <button class="hapus"><i class="fas fa-check"></i></button>
                        </td>
                    </tr>
                    <?php $count+=1 ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
    <div id="my-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Tambah Catatan</h2>
            </div>
            <div class="modal-body">
                <form action="/submitCatatan" enctype="multipart/form-data" id="catatan" method="post" >
                    <div class="item">
                        <label for="tahap">Proses</label>
                        <select name="tahap">
                            <optgroup label="Tahap :">
                                <option value="">...</option>
                                <option value="1_active" selected>1</option>
                                <option value="2_active">2</option>
                                <option value="3_active">3</option>
                            </optgroup>
                        </select>
                        <br>
                        <label for="catatan"> Catatan :</label>
                        <textarea name="catatan" cols="30" rows="10"></textarea>
                        <input type="text" style="display:none" name="id" id="input-modal">
                        <button form="catatan">Submit</button>
                    </div>
                </form>
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
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script>

        
        $(document).ready(function() {
            $('#tabel-data').DataTable();
            $( ".catatan" ).click(function() {
                $('#input-modal').val($(this).closest('tr').find('.id').val());
                openModal();
                if($(this).closest('tr').find('.tahap').text() == "Tahap 1"){
                    $("div.item select").val("1_active");
                }else if($(this).closest('tr').find('.tahap').text() == "Tahap 2"){
                    $("div.item select").val("2_active");
                }else if($(this).closest('tr').find('.tahap').text() == "Tahap 3"){
                    $("div.item select").val("3_active");
                }
            });

            $('.hapus').click(function(){
                $.ajax({
                    type: "post",
                    url: "/hapus-ajuan",
                    // dataType: 'JSON',
                    data: {
                        username:$(this).closest('tr').find('.nama').text(),
                        jenis_pengajuan : $(this).closest('tr').find('.jenis_pengajuan').text(),
                    },
                    success:function(data){
                        console.log(data);
                    },
                    error: function(error){
                        console.log(error);
                    }
                });
                $(this).closest('tr').empty();
            });
        });

        const modal = document.querySelector('#my-modal');
        const closeBtn = document.querySelector('.close');
        // Events
        closeBtn.addEventListener('click', closeModal);
        window.addEventListener('click', outsideClick);

        // Open
        function openModal() {
            modal.style.display = 'block';
        }

        // Close
        function closeModal() {
            modal.style.display = 'none';
        }

        // Close If Outside Click
        function outsideClick(e) {
            if (e.target == modal) {
                modal.style.display = 'none';
            }
        }

    </script>
</body>
</html>