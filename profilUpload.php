<?php
error_reporting(); // Atur level error reporting sesuai kebutuhan

include 'koneksi.php';

// Start session
session_start();


// Ambil ID pengguna yang sedang login dari sesi atau data login pengguna
$userId = $_SESSION['user_id']; // Contoh: Menggunakan variabel sesi 'user_id'

// Ambil data pengguna dari database jika tersedia
if (!empty($userId)) {
    $query = "SELECT * FROM user WHERE id_user = $userId";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $nama_pengguna = $user['nama_pengguna'];
        $username = $user['username'];
        $following = $user['jml_diikuti'];
        $followers = $user['jml_pengikut'];
        $teksSayaAdalah = $user['bio'];
        $email = $user['email'];
        $instagram =$user['instagram'];
        $twitter = $user['twitter'];
        $tiktok = $user['tiktok'];

         // Ambil foto profil jika tersedia
         if (!empty($user['foto_profil'])) {
          $foto_dest = $user['foto_profil'];
          } 

          // Ambil data gambar konten yang disimpan dan diunggah oleh pengguna itu sendiri
          $query = "SELECT * FROM konten WHERE id_user = $userId";
          $result = mysqli_query($koneksi, $query);

          if ($result && mysqli_num_rows($result) > 0) {
              $uploadedPhotos = array();
              while ($row = mysqli_fetch_assoc($result)) {
                  $uploadedPhotos[] = $row['nama_gambar'];
              }
          }
    }
}
// Tutup koneksi ke database
mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile Page</title>
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">

    <!-- feather icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.css">
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="css/profile.css" />
    <title>Halaman Profile</title>
  </head>
  <body>
    <!-- navbar start -->
        <nav class="navbar">
        <a href="#" class="navbar-logo">Sew.nSlay</a>
        
        <div class="navbar-nav">
            <a href="beranda.php" class="button-beranda">Beranda</a>
            <a href="upload.php" class="button-unggah">Unggah</a>
        </div>

        <div class="navbar-search">
          <input type="text" placeholder="Cari...">
          <button type="button">Cari</button>
      </div>
      <div class="navbar-ikon">
            <a href="profilUpload.php" class="navbar-orang"><i data-feather="user"></i></a>
            <a href="logout.php" class="navbar-orang"><i data-feather="log-out"></i></a>
        </div>
    </nav> 
    <div class="header__wrapper">
      <div class="cols__container">
        <div class="left__col">
          <div class="img__container">
            <?php
            if (!empty($foto_dest)) {
              echo '<img src="' . $foto_dest . '" alt="Alia Dewanto" />';
            } else {
              echo '<img src="img/avatar1.png" alt="Default Profile" />';
            }
            ?>
            <span></span>
          </div>
          
          <div>
           <h2><?php echo isset($nama_pengguna) ? $nama_pengguna : "Nama Pengguna"; ?></h2>
           <p>@<?php echo $username; ?></p>
            <button><a href="editProfil.php">Edit Profile</a></button>
          </div>
          
          <ul class="about">
            <li><span><?php echo isset($following) ? $following : 0; ?></span>Following</li>
            <li><span><?php echo isset($followers) ? $followers : 0; ?></span>Followers</li>
          </ul>

          <div class="content">
            <p>
            <?php echo isset($teksSayaAdalah) ? $teksSayaAdalah : "Bio"; ?>
            <ul>
            <a href="https://www.twitter.com/<?php echo $twitter; ?>" target="_blank">
              <i class="fab fa-twitter"></i>
            </a>
              
            <a href="https://www.tiktok.com/@<?php echo $tiktok; ?>" target="_blank">
              <i class="fab fa-tiktok"></i>
            </a>
              
            <a href="https://www.instagram.com/<?php echo $instagram; ?>" target="_blank">
              <i class="fab fa-instagram"></i> 
            
            <a href="mailto:<?php echo $email; ?>" target="_blank">
                <i class="far fa-envelope"></i>
              </a>
          </div>

        </div>
        <div class="button">
          <nav>
            <ul>
              <label class="diunggah" onclick="window.location.href='profilUpload.php'">Diunggah</label>
              <label></label>
              <label onclick="window.location.href='profilSave.php'">Disimpan</label>
            </ul>
          </nav>          
          <div class="photos">
            <?php
            if (!empty($uploadedPhotos)) {
              foreach ($uploadedPhotos as $photo) {
                echo '<img src="' . $photo . '" alt="Photo" style="border-radius: 15%;" />';
              }
            }
            ?>
            
          </div>
        </div>
      </div>
    </div>
    <!-- feather icons -->
    <script>
      feather.replace();
    </script> 
   <!-- feather icons end-->
  
    
  </body>
</html>
