<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/fontawesome/css/all.min.css">
    <title>Sistem Informasi Awardee Beasiswa NTB</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <div class="header">
        <div class="logo" 
        
        style="
            font-family:metro-bold; 
            font-size:12px;
            color:#fff;
            display:flex;
            justify-content:center;
            align-items:center;
        ">
            <img src="assets/image/logo.png" alt="" 
            style="
                width:25px;
                position:absolute;
                top:10px;
                left:75px;
            "
            >
            
            &nbsp; Sistem Informasi Awardee Beasiswa NTB
        </div>
        <div class="navbar">
            <div class="home btn">HUBUNGI ADMIN</div>
            <a class="home btn" href="/logout">LOGOUT</a>
        </div>
    </div>
    <div class="row01-container">
        <div class="login-container">
            <div class="logo">
                <h2>Tambah User</h2>
            </div>
            <div class="form">
                <div class="form">
                    <form action="/register" method="post">

                        <?php if(isset($validation)):?>
                            <div class="alert-danger">
                                <span>Eror!</span>
                                <br> <br>
                                <?= $validation->listErrors() ?>
                            </div>
                        <?php endif; ?>

                        <?php if(session()->get('success')): ?>
                        <div class="alert-success">
                            <?= session()->get('success') ?>
                        </div>
                        <?php endif?>

                        <div class="row">
                            <label for="email">EMAIL</label>
                            <input type="text" name="email" id="">
                        </div>
                        <div class="row">
                            <label for="username">USERNAME</label>
                            <input type="text" name="username" id="">
                        </div>
                        <div class="row">
                            <label for="password">PASSWORD</label>
                            <input type="text" name="password" id="">
                        </div>
                        <div class="row">
                            <label for="level">LEVEL</label>
                            <input type="text" name="level" id="">
                        </div>
                        <button type="submit">Register</button>
                        <p>Sudah Punya akun ? <a href="/login">Login Disini</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
</body>
</html>