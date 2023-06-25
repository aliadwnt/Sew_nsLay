<?php 
error_reporting(); // Atur level error reporting sesuai kebutuhan

include 'koneksi.php';

// Start session
session_start();

$username = "";
$email = "";
$name = "";
// Variabel $foto_dest harus diatur sebelumnya
$foto_dest = "";

// Ambil foto profil jika tersedia
if (!empty($user['foto_profil'])) {
    $foto_dest = $user['foto_profil'];
    } 

// Periksa apakah user telah melakukan perubahan pada gambar profil
if (isset($foto_nama)) {
    $foto_dest = 'path_fotoprofil/' . $foto_nama;
}
$bio = "";

// Ambil data pengguna yang sedang login dari sesi atau data login pengguna
$userId = $_SESSION['user_id']; // Contoh: Menggunakan variabel sesi 'user_id'

// Ambil data username dan email pengguna dari database
$query = "SELECT username, email, nama_pengguna, foto_profil, bio, twitter, tiktok, instagram FROM user WHERE id_user = $userId";
$result = mysqli_query($koneksi, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    $username = $user['username'];
    $email = $user['email'];
    $name = $user['nama_pengguna'];
    $foto_dest = $user['foto_profil'];
    $bio = $user['bio'];
    $twitter = $user['twitter'];
    $tiktok = $user['tiktok'];
    $instagram = $user['instagram'];

}
// Tutup koneksi ke database
mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="css/editProfil.css">
</head>
<body>
    <header>
        <h1>Edit Profile</h1>
    </header>
    <div class="container">
    <form action="prosesEditProfil.php" method="POST" enctype="multipart/form-data">
        <div class="profile">
        <?php
      if (!empty($foto_dest)) {
         echo '<img id="profile-image" src="' . $foto_dest . '" alt="Profile Picture" />';
     } else {
         echo '<img id="profile-image" src="img/avatar1.png" alt="Default Profile" />';
     }
     ?>
            <label for="profile-picture">Change Profile Picture</label>
            <input type="file" id="profile-picture" name="profile-picture" accept="image/*" onchange="showPreview(event)">
            <div class="details">
            </div>
        </div>

        <!-- //menampilkan preview dr foto profile yg baru diupload -->
        <script>
            function showPreview(event) {
              var input = event.target;
              var reader = new FileReader();
            
              reader.onload = function() {
                var profileImage = document.getElementById('profile-image');
                profileImage.src = reader.result;
              };
            
              reader.readAsDataURL(input.files[0]);
            }
            </script>

        <div class="settings">
                <label for="name">Nama Pengguna:</label>
                <input type="text" id="name" name="name" placeholder="Update your name" value="<?php echo $name; ?>">

                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Update your username" value="<?php echo $username; ?>">

                <label for="email">Email:</label>
                <input type="text" id="email" name="email" placeholder="Update your email" value="<?php echo $email; ?>">

                <label for="bio">Bio:</label>
                <textarea id="bio" name="bio" placeholder="Update a short bio about yourself"><?php echo $bio; ?></textarea>

                <label for="tiktok">Tiktok</label>
                <input type="text" id="tiktok" name="tiktok" placeholder="Update your TikTok" value="<?php echo $tiktok; ?>">

                <label for="twitter">Twitter:</label>
                <input type="text" id="twitter" name="twitter" placeholder="Update your twitter" value="<?php echo $twitter; ?>">

                <label for="instagram">Instagram:</label>
                <input type="text" id="instagram" name="instagram" placeholder="Update your instagram" value="<?php echo $instagram; ?>">
            
                <button type="submit" name="simpan" onclick="window.location.href=''">Saved</button>
        </div>
        </form>
    </div>
</body>
</html>
