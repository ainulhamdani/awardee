<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/fontawesome/css/all.min.css">
    <title>Sistem Informasi Awardee Beasiswa NTB</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <?php echo view('layout/header.php')?>
    <div class="row01-container">
        <div class="login-container">
            <div class="logo">
                <img src="data/<?= session()->get('username') ?>/foto/<?= $foto_profil ?>" style="width:200px" alt="" srcset="">
            </div>
            <div class="form">
                <div class="form">
                    <?php if(session()->get('error')): ?>
                        <div class="alert-danger">
                            <?= session()->get('error') ?>
                        </div>
                    <?php endif ?>
                    <?php if(session()->get('success')): ?>
                        <div class="alert-success">
                            <?= session()->get('success') ?>
                        </div>
                    <?php endif ?>
                    <form action="/profil" method="post">
                        <div class="row">
                            <h1>Ganti Password</h1>
                        </div>
                        <div class="row">
                            <label for="password">Password Baru</label>
                            <input type="text" name="password" id="">
                        </div>
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php echo view('layout/footer.php')?>
    <script src="assets/js/app.js"></script>
</body>
</html>