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
            <div class="home btn">HUBUNGI ADMIN</div>
        </div>
    </div>
    <div class="row01-container">
        <div class="login-container">
            <div class="logo">
                <img src="assets/image/lppntb01.png" alt="" srcset="">
            </div>
            <div class="form">
                <div class="form">
                    <?php if(session()->get('error')): ?>
                        <div class="alert-danger">
                            <?= session()->get('error') ?>
                        </div>
                    <?php endif ?>
                    <form action="/login" method="post">
                        <div class="row">
                            <label for="username">USERNAME</label>
                            <input type="text" name="username" id="">
                        </div>
                        <div class="row">
                            <label for="password">PASSWORD</label>
                            <input type="password" name="password" id="">
                        </div>
                        <button type="submit">Login</button>
                        <p>Belum Punya akun ? <a href="#">hubungi Admin</a></p>
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