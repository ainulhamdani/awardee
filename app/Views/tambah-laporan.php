<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/tambah-laporan.css">
    <link rel="stylesheet" href="assets/css/fontawesome/css/all.min.css">
    <title>Sistem Informasi Awardee Beasiswa NTB></title>
</head>
<body>
    <?php echo view('layout/header.php')?>
    <div class="body">
        <div class="info-home">
            <div class="judul">
                <i class="fas fa-info-circle"></i> &nbsp;Info
            </div>
            <div class="isi">
                Laman ini merupakan tempat untuk <span>melaporkan kegiatan perkuliahan selama menjadi Awardee Beasiswa NTB.</span>
                jika terdapat menu yang tidak berfungsi, atau berfungsi dengan tidak baik, silahkan <span>Hubungi Admin</span>
            </div>
        </div>
        <div class="title">
            <h2>Tambah <span>Laporan</span></h2>
        </div>
        <div class="pilih">
            <label for="jenis-laporan">Pilih Jenis Laporan</label>
            <select name="jenis-laporan" id="jenis-laporan" onchange="jenisLaporan()">
                <option value="akademik">Data Akademik</option>
                <option value="non-akademik">Data Non Akademik</option>
            </select>
        </div>
        <div class="pesan">
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
        <div class="row akademik">
            <div class="body-row">
                <div class="item-left">
                    <form action="/laporan" method="post" id="laporan" enctype="multipart/form-data"></form>
                        <div class="item">
                            <label for="semester">Pilih Semester</label>
                            <div class="select-akademik-semester" style="display:none"></div>
                            <select name="semester_akademik" id="semester_akademik" form="laporan">
                                <option value="0">. . .</option>
                                <option value="1">Semester 1</option>
                                <option value="2">Semester 2</option>
                                <option value="3">Semester 3</option>
                                <option value="4">Semester 4</option>
                                <option value="5">Semester 5</option>
                                <option value="6">Semester 6</option>
                                <option value="7">Semester 7</option>
                                <option value="8">Semester 8</option>
                                <option value="9">Semester 9</option>
                            </select>
                        </div>
                        <div class="item">
                            <label for="krs" style="font-size:13px;">Upload KRS <span style="font-size:10px; color:red">.pdf/max:1MB</span></label>
                            <form action="/krs"  style="display:none;" method="post" id="krs-download"><button ></button></form>
                            <div class="krs-terupload"></div>
                            <input type="file" name="krs" id="krs-akademik" form="laporan">
                        </div>
                        
                        <div class="item">
                            <label for="khs" style="font-size:13px;">Upload Bukti Hasil Studi <span style="font-size:10px; color:red">.pdf/max:1MB</span></label>
                            <form action="/khs"  style="display:none;" method="post" id="khs-download"><button ></button></form>
                            <div class="khs-terupload"></div>
                            <input type="file" name="khs" id="khs-akademik" form="laporan">
                        </div>

                        <div class="item">
                            <label for="khs" style="font-size:13px;">Upload Sertifikat Akademik <span style="font-size:10px; color:red">Jika Ada</span></label>
                            <form action="/sertifikat"  style="display:none;" method="post" id="sertifikat-download"><button ></button></form>
                            <div class="sertifikat-terupload"></div>
                            <input type="file" name="sertifikat" id="sertifikat-akademik" form="laporan">
                        </div>

                        <div class="item">
                            <label for="ipk" style="font-size:13px;">IPS/GPA (skala 4.00)</label>
                            <input type="text" name="gpa" placeholder="0.00" id="gpa" form="laporan">
                        </div>
                    </form>
                </div>
                <div class="item-right">
                    <table style="width:100%" name="table-akademik">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Course</th> 
                                <th>Score</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="body-table-akademik">
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <td style="text-align:center; width:10px">#</td>
                                <td><input type="text" style="width: 100%;" id="mata-kuliah"></td>
                                <td style="text-align:center; width:10px"><input type="text" style="width: 100%;" id="grade"></td>
                                <td style="text-align:center; width:10px"><button class="add-mata-kuliah" id="addMataKuliah">add</button></td>
                            </tr>
                        </tfoot>
                    </table>
                    <button class="simpan simpan-laporan-akademik">Simpan</button>
                </div>
            </div>
        </div>
        <div class="row non-akademik">
            <div class="body-row">
                <div class="item-left">
                    <form action="/laporan-non" method="post" enctype="multipart/form-data" id="non-akademik">
                        <div class="item">
                            <label for="jenis-laporan">Pilih Semester</label>
                            <select name="semester" id="semester-non-akademik">
                                <option value="0">. . .</option>
                                <option value="1">Semester 1</option>
                                <option value="2">Semester 2</option>
                                <option value="3">Semester 3</option>
                                <option value="4">Semester 4</option>
                                <option value="5">Semester 5</option>
                                <option value="6">Semester 6</option>
                                <option value="7">Semester 7</option>
                                <option value="8">Semester 8</option>
                                <option value="9">Semester 9</option>
                            </select>
                        </div>
                        <div class="tambah-data">
                            <div class="item">
                                <label for="tambah-data">Nama Penghargaan</label>
                                <input type="text" name="nama_penghargaan" form="non-akademik" id="nama-penghargaan">
                            </div>
                            <div class="item">
                                <label for="upload-file">Upload Sertifikat</label>
                                <input type="file" name="sertifikat" form="non-akademik" id="sertifikat-non">
                            </div>
                        </div>
                    </form>
                    <button type="submit" class="tambah-row-data"><i class="fas fa-plus"></i> Tambah data</button>
                </div>
                <div class="item-right">
                    <div class="head-item" style="margin-bottom: 10px;">
                        Data Penghargaan
                    </div>
                    <form action="/sertifNon"  style="display:none;" method="post" id="sertifnon-download"><button ></button></form>
                    <table style="width:100%;" name="table-non-akademik">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th style="padding-left: 15px;">Nama Penghargaan</th> 
                                <th style="padding-left: 15px;">Sertifikat</th> 
                                <th style="text-align:center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="body-non-akademik">
                        
                        </tbody>
                        <tfoot>
                        
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>    
    </div>
    <?php echo view('layout/footer.php')?>
    <script src="assets/js/app.js"></script>
    <script>
        let makul = document.getElementById("mata-kuliah");
        let grade = document.getElementById("grade");
        let semesterKon = document.getElementById("semester_akademik");
        function jenisLaporan(){
            let x = document.getElementById("jenis-laporan").value;
            let akademik = document.querySelector(".akademik");
            let nonAkademik = document.querySelector(".non-akademik");
            if (x=="akademik"){
                nonAkademik.style.display="none";
                akademik.style.display="block";
            }else{
                nonAkademik.style.display="block";
                akademik.style.display="none";
            }
        }

        $(document).on('click','.tambah-row-data',function(){
            if($('#sertifikat-non')[0].files.length!=0){
               if($('#sertifikat-non')[0].files[0].type!="application/pdf"){
                    let error='';
                    error+='<div class="alert-danger">';
                    error+='File Sertifikat yang anda masukkan harus berformat PDF';
                    error+='</div>';
                    $('.pesan').html(error);
                    $('.alert-danger').show(0).delay(5000).hide(0); 
                }else{
                    $('.row').css('opacity','0.4');
                    $('#non-akademik').submit();
                }
            }else{
                if($('#semester-non-akademik').children("option:selected").val()==0){
                    alert('Anda belum memilih semester');
                }else if($('#nama-penghargaan').val()==""){
                    alert('Anda belum memasukkan Nama Penghargaan')
                }else{
                    alert('Anda belum memasukkan File');
                }
            }
        });

        $(document).on('click','.simpan-laporan-akademik', function(){

            $('#semester_akademik').val()

            let sertifikat = $('#sertifikat-akademik')[0].files;
            let khs = $('#khs-akademik')[0].files;
            let krs = $('#krs-akademik')[0].files;   

            if($('#semester_akademik').children("option:selected").val()==0){
                alert('Anda belum memilih semester');
                return;
            }

            if(sertifikat.length!=0){
                if(sertifikat[0].size>1020000){
                    let error='';
                    error+='<div class="alert-danger">';
                    error+='file Sertifikat yang anda masukkan melebihi kapasitas';
                    error+='</div>';
                    $('.pesan').html(error);
                    $('.alert-danger').show(0).delay(5000).hide(0);
                    return;
                }else if(sertifikat[0].type!="application/pdf"){
                    let error='';
                    error+='<div class="alert-danger">';
                    error+='file Sertifikat yang anda masukkan harus berformat PDF';
                    error+='</div>';
                    $('.pesan').html(error);
                    $('.alert-danger').show(0).delay(5000).hide(0);
                    return;
                }
            }

            if(khs.length!=0){
                if(khs[0].size>1020000){
                    let error='';
                    error+='<div class="alert-danger">';
                    error+='file KHS yang anda masukkan melebihi kapasitas';
                    error+='</div>';
                    $('.pesan').html(error);
                    $('.alert-danger').show(0).delay(5000).hide(0);
                    return;
                }else if(khs[0].type!="application/pdf"){
                    let error='';
                    error+='<div class="alert-danger">';
                    error+='file KHS yang anda masukkan harus berformat PDF';
                    error+='</div>';
                    $('.pesan').html(error);
                    $('.alert-danger').show(0).delay(5000).hide(0);
                    return;
                }
            }

            if(krs.length!=0 ){
                if(krs[0].size>1020000){
                    let error='';
                    error+='<div class="alert-danger">';
                    error+='file KRS yang anda masukkan melebihi kapasitas';
                    error+='</div>';
                    $('.pesan').html(error);
                    $('.alert-danger').show(0).delay(5000).hide(0);
                    return;
                }else if(krs[0].type!="application/pdf"){
                    let error='';
                    error+='<div class="alert-danger">';
                    error+='file KRS yang anda masukkan harus berformat PDF';
                    error+='</div>';
                    $('.pesan').html(error);
                    $('.alert-danger').show(0).delay(5000).hide(0);
                    return;
                }
            }

            $('.row').css('opacity','0.4');
            $('#laporan').submit();

        });

        $(document).on('click', '#addMataKuliah', function () {
            if(makul.value=="" || grade.value==""){
                alert('Masukkan Data Anda terlebih dahulu');
            }else if(semesterKon.value=="0"){
                alert('Anda belum memilih Semester');
            }else{
                let course = $(this).closest('tr').find('#mata-kuliah').val();
                let score = $(this).closest('tr').find('#grade').val();
                $(this).closest('tr').find('#mata-kuliah').val('');
                $(this).closest('tr').find('#grade').val('');
                let Data = '';
                Data+='<tr>'
                Data+='<td style="text-align:center; width:10px">#</td>';
                Data+='<td id="mata-kuliah">'+course+'</td>';
                Data+='<td style="text-align:center; width:10px" id="grade">'+score+'</td>';
                Data+='<td style="text-align:center; width:10px;"><i class="fas fa-edit" id="edit-data"></i> &nbsp; <i class="fas fa-trash-alt" id="hapus-data"></i></td>';
                Data+='</tr>'
                $('.body-table-akademik').append(Data);
                $.ajax({
                    type: "POST",
                    url: "/inputDataSemester",
                    data: {
                        users_id:<?=session()->get('id')?>,
                        semester_id:$("#semester_akademik").val(),
                        course:course,
                        score:score
                    },
                });
            }
        });

        $(document).on('change','#semester-non-akademik',function(){
            $.ajax({
                type: "post",
                url: "/getDataNon",
                dataType: 'JSON',
                data: {
                    users_id :<?=session()->get('id')?>,
                    semester : $(this).val()
                },
                success:function(data){                    
                    $('.body-non-akademik').empty();
                    $.each(data,function(index,value){
                        let sertifikat='<button class="sertifikat" ecntype="multipart/form-data" type="submit" name="semester" form="sertifnon-download" value="'+value.semester+'"><i class="fas fa-download" style="font-size:10px" ></i> ';
                        sertifikat+='Download Sertifikat';
                        sertifikat+='</button>';
                        let bebek='';
                        index+=1;
                        bebek+='<tr>';
                        bebek+='<td style="text-align:center; width:10px;">'+index+'</td>';
                        bebek+='<td style="width:40px" id="penghargaan">'+value.nama_penghargaan+'</td> ';
                        bebek+='<td style="width:40px">'+sertifikat+'<input type="text" name="nama_penghargaan" value="'+value.nama_penghargaan+'" style="display:none" form="sertifnon-download"></td>';
                        bebek+='<td style="text-align:center; width:10px;"><i class="fas fa-trash-alt" id="hapus-data-non"></i></td>';
                        bebek+='</tr>';
                        $('.body-non-akademik').append(bebek);
                    });
                },
                error: function(error){
                    console.log(error);
                }
            });
        });

        $(document).on('change','#semester_akademik',function(){
            $.ajax({
                type: "post",
                url: "/getDataAkam",
                dataType: 'JSON',
                data: {
                    semester : $(this).val(),
                },
                success:function(data){
                    $('.body-table-akademik').empty();
                    $('.khs-terupload').empty();
                    $('.krs-terupload').empty();
                    $('.sertifikat-terupload').empty();
                    $('#gpa').val('');
                    if(data.akademik.length != 0){
                        if(data.akademik[0].krs!=""){
                            let krs='<button class="krs" ecntype="multipart/form-data" type="submit" name="semester" form="krs-download" value="'+data.akademik[0].semester_id+'">';
                            krs+='<i class="fas fa-file-pdf"></i> ';
                            krs+=data.akademik[0].krs;
                            krs+='</button>';
                            $('.krs-terupload').html(krs);
                        }
                        if(data.akademik[0].khs!=""){
                            let khs='<button class="khs" ecntype="multipart/form-data" type="submit" name="semester" form="khs-download" value="'+data.akademik[0].semester_id+'">';
                            khs+='<i class="fas fa-file-pdf"></i> ';
                            khs+=data.akademik[0].khs;
                            khs+='</button>';
                            $('.khs-terupload').html(khs);
                        }

                        if(data.akademik[0].sertifikat!=""){
                            let sertifikat='<button class="khs" ecntype="multipart/form-data" type="submit" name="semester" form="sertifikat-download" value="'+data.akademik[0].semester_id+'">';
                            sertifikat+='<i class="fas fa-file-pdf"></i> ';
                            sertifikat+=data.akademik[0].sertifikat;
                            sertifikat+='</button>';
                            $('.sertifikat-terupload').html(sertifikat);
                        }
                        $('#gpa').val(data.akademik[0].gpa);
                    }
                    $.each(data.semester,function(index,value){
                        let bebek='';
                        index+=1;
                        bebek+='<tr>';
                        bebek+='<td style="text-align:center; width:10px;">'+index+'</td>';
                        bebek+='<td id="mata-kuliah" >'+value.course+'</td> ';
                        bebek+='<td id="grade" style="text-align:center; width:10px;">'+value.score+'</td>';
                        bebek+='<td style="text-align:center; width:10px;"><i class="fas fa-edit" id="edit-data"></i> &nbsp; <i class="fas fa-trash-alt" id="hapus-data"></i></td>';
                        bebek+='</tr>';
                        $('.body-table-akademik').append(bebek);
                    });
                },
                error: function(error){
                    console.log(error);
                }
            });
        });

        $(document).on('click', '#hapus-data-non', function () {
            $(this).closest('tr').css('opacity','0.4').delay(1000).hide(0);
            $.ajax({
                type: "post",
                url: "/deleteDataNon",
                dataType: 'JSON',
                data: {
                    nama_penghargaan:$(this).closest('tr').find('#penghargaan').text(),
                },
                success:function(data){
                   
                },
                error: function(error){
                    console.log(error);
                }
            });
            setTimeout(function(){
                let Done='';
                Done+='<div class="alert-success">';
                Done+='Data Anda berhasil dihapus';
                Done+='</div>';
                $('.pesan').html(Done);
                $('.alert-danger').show(0).delay(5000).hide(0);
            }, 1000);
        });

        let getCourse;
        $(document).on('click', '#edit-data', function () {
            getCourse = $(this).closest('tr').find('#mata-kuliah').text();
            let editData = '';
            editData+='<td>#</td>';
            editData+='<td id="data_matkul"><input type="text" style="width: 100%;" id="mata-kuliah" value="'+$(this).closest('tr').find('#mata-kuliah').text()+'"></td>';
            editData+='<td id="data_grade"><input type="text" style="width: 100%;" id="grade" value="'+$(this).closest('tr').find('#grade').text()+'"></td>';
            editData+='<td style="text-align: center;"><i class="far fa-check-square" id="selesai-edit"></i> &nbsp; <i class="far fa-window-close" id="selesai-edit"></i></td>';
            $(this).closest('tr').html(editData);
        });        

        $(document).on('click', '#selesai-edit', function () {
            let getNewCourse = $(this).closest('tr').find('#mata-kuliah').val();
            let getNewScore = $(this).closest('tr').find('#grade').val();
            let Data = '';
            Data+='<td style="text-align:center">#</td>';
            Data+='<td id="mata-kuliah">'+getNewCourse+'</td>';
            Data+='<td id="grade" style="text-align:center">'+getNewScore+'</td>';
            Data+='<td style="text-align: center;"><i class="fas fa-edit" id="edit-data"></i> &nbsp; <i class="fas fa-trash-alt" id="hapus-data"></i></td>';
            $(this).closest('tr').html(Data);
            $.ajax({
                type: "post",
                url: "/editDataAkam",
                dataType: 'JSON',
                data: {
                    course:getCourse,
                    coursebaru : getNewCourse,
                    score: getNewScore
                },
                success:function(data){
                   console.log(data);
                },
                error: function(error){
                    console.log(error);
                }
            });
        });

        $(document).on('click', '#hapus-data', function () {
            let course = $(this).closest('tr').find("#mata-kuliah").text();
            $(this).closest('tr').empty();
            $.ajax({
                type:"post",
                url:"/deletDataKam",
                data:{
                    course:course
                },
                success:function(data){
                    console.log('sukes');
                },
                error:function(error){
                    console.log(error);
                }
            });

        });
    </script>
</body>
</html>