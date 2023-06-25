<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/logreg.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Login | SewSlay</title>
</head>
<body>
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
                        <header>Masuk</header>
                        <form method="POST" action="proseslogin.php"> 
                        <div class="input-field">
                            <input type="text" class="input" name="email_or_username" id="email_or_username" required autocomplete="off">
                            <label for="email_or_username">Email/Username</label>
                        </div>
                        <div class="input-field">
                            <input type="password" class="input" name="password" id="password" required>
                            <label for="password">Password</label>
                        </div>
                        <div class="input-field">
                            <input type="submit" name="login" class="submit" value="Masuk">
                            
                        </div>
                        </form>
                        <div class="signin">
                            <span>Tidak Punya Akun? <a href="register.php">Daftar</a></span>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>