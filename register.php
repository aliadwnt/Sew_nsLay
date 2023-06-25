<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/logreg.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Register | SewSlay</title>
</head>
<body>
<?php
    error_reporting();
    include 'koneksi.php';
?>
    <div class="wrapper">
        <div class="container main">
            <div class="row">
                <div class="col-md-6 side-image">
                    <!-------Image-------->
                    <img src="" alt="">
                    <div class="text">
                        <p><i></i></p>
                    </div>
                </div>
                <div class="col-md-6 right">
                     <div class="input-box">
                        <header>Daftar Akun</header>
                        <p>Temukan Ide Kreatifmu Disini!!</p>
                        <form action="prosesregister.php" method="POST">
                        <div class="input-field">
                            <input type="text" name="email" class="input" id="email" required autocomplete="off">
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field">
                            <input type="text" name="username" class="input" id="username" required>
                            <label for="username">Username</label>
                        </div>
                        <div class="input-field">
                            <input type="password" name="password" class="input" id="password" required>
                            <label for="password">Password</label>
                        </div>
                        <div class="input-field">
                            <input  type="submit" name="register" class="submit" value="Daftar"> 
                            
                        </div>
                        </form>
                        <div class="signin">
                            <span>Sudah Punya Akun? <a href="login.php">Masuk</a></span>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>