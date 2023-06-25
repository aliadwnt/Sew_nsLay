<?php
error_reporting(0); // Atur level error reporting sesuai kebutuhan

include 'koneksi.php';

// Start session
session_start();

// Ambil data pengguna yang sedang login dari sesi atau data login pengguna
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    if (isset($_POST['simpan'])) {
        // Mengambil nilai dari form
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $bio = $_POST['bio'];
        $instagram = $_POST['instagram'];
        $twitter = $_POST['twitter'];
        $tiktok = $_POST['tiktok'];

        // Memeriksa apakah file gambar diunggah
        if (isset($_FILES['profile-picture']) && $_FILES['profile-picture']['error'] === UPLOAD_ERR_OK) {
            // Proses upload foto profil    
            $foto_nama = $_FILES['profile-picture']['name'];
            $foto_tmp = $_FILES['profile-picture']['tmp_name'];
            $foto_dest = 'path_fotoprofil/' . $foto_nama;

            // Menyimpan file yang diunggah 
            if (move_uploaded_file($foto_tmp, $foto_dest)) {
                // Memperbarui data pengguna dalam database
                $query = "UPDATE user SET username = ?, email = ?, nama_pengguna = ?, foto_profil = ?, bio = ?, tiktok = ?, twitter = ?, instagram = ? WHERE id_user = ?";
                $stmt = mysqli_prepare($koneksi, $query);
                mysqli_stmt_bind_param($stmt, "ssssssssi", $username, $email, $name, $foto_dest, $bio, $tiktok, $twitter, $instagram, $userId);
                $result = mysqli_stmt_execute($stmt);

                if ($result) {
                    echo "Data pengguna berhasil diperbarui.";

                    // Redirect ke halaman profil
                    header("Location: profilUpload.php");
                    exit();
                } else {
                    echo "Error: " . mysqli_error($koneksi); // Menampilkan pesan error jika terjadi kesalahan dalam query
                }
            } else {
                echo "Gagal memindahkan file gambar.";
            }
        } else {
            // Memperbarui data pengguna dalam database tanpa perubahan foto profil
            $query = "UPDATE user SET username = ?, email = ?, nama_pengguna = ?, bio = ?, tiktok = ?, twitter = ?, instagram = ? WHERE id_user = ?";
            $stmt = mysqli_prepare($koneksi, $query);
            mysqli_stmt_bind_param($stmt, "sssssssi", $username, $email, $name, $bio, $tiktok, $twitter, $instagram, $userId);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                echo "Data pengguna berhasil diperbarui.";

                // Redirect ke halaman profil
                header("Location: profilUpload.php");
                exit();
            } else {
                echo "Error: " . mysqli_error($koneksi); // Menampilkan pesan error jika terjadi kesalahan dalam query
            }
        }
    } else {
        echo "Invalid Request";
    }
} else {
    echo "User not logged in.";
}

// Mendapatkan foto profil dari database
$query = "SELECT foto_profil FROM user WHERE id_user = '$userId'";
$result = mysqli_query($koneksi, $query);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $foto_dest = $row['foto_profil'];
}

// Tutup koneksi ke database
mysqli_close($koneksi);
?>
