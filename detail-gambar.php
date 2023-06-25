<?php
error_reporting();
include 'koneksi.php';
session_start(); // Memulai sesi

$id = $_GET['id']; //mendapatkan id konten yang sedang ditampilkan//

//query untuk mengambil seluruh data konten dari database//
$query_konten = "SELECT * FROM konten WHERE id_konten = $id";
$result_konten = mysqli_query($koneksi, $query_konten);
$row_konten = mysqli_fetch_assoc($result_konten);

// Query untuk mengambil data tingkat kemampuan
$query_tingkat_kemampuan = "SELECT GROUP_CONCAT(k.nama_kemampuan SEPARATOR ', ') AS tingkat_kemampuan
                            FROM kemampuan k
                            INNER JOIN detailkemampuan dk ON k.id_kemampuan = dk.id_kemampuan
                            WHERE dk.id_konten = $id
                            GROUP BY dk.id_konten";

$result_tingkat_kemampuan = mysqli_query($koneksi, $query_tingkat_kemampuan);

if ($result_tingkat_kemampuan && mysqli_num_rows($result_tingkat_kemampuan) > 0) {
    $row_tingkat_kemampuan = mysqli_fetch_assoc($result_tingkat_kemampuan);
    $tingkat_kemampuan = $row_tingkat_kemampuan['tingkat_kemampuan'];
} else {
    $tingkat_kemampuan = "Tidak ada tingkat kemampuan yang tersedia.";
}


// Query untuk mengambil data jenis acara
$query_jenis_acara = "SELECT GROUP_CONCAT(a.nama_acara SEPARATOR ', ') AS jenis_acara
                            FROM acara a
                            INNER JOIN detailacara da ON a.id_acara = da.id_acara
                            WHERE da.id_konten = $id
                            GROUP BY da.id_konten";

$result_jenis_acara = mysqli_query($koneksi, $query_jenis_acara);

if ($result_jenis_acara && mysqli_num_rows($result_jenis_acara) > 0) {
    $row_jenis_acara = mysqli_fetch_assoc($result_jenis_acara);
    $jenis_acara = $row_jenis_acara['jenis_acara'];
} else {
    $jenis_acara = "Tidak ada jenis acara yang tersedia.";
}

//query untuk mengambil data file//
$query_file = "SELECT *, nama_file FROM konten WHERE id_konten = $id";


// Memeriksa apakah data konten telah dikirim melalui metode POST saat tombol Save ditekan
if (isset($_POST['saveButton'])) {

  // Mendapatkan ID pengguna dari sesi
  $id_user = $_SESSION['user_id'];

  // Query untuk menyimpan data konten ke tabel simpan
  $query_add_simpan = "INSERT INTO simpan (id_user, id_konten, timestamp) VALUES ($id_user, $id, NOW())";
  mysqli_query($koneksi, $query_add_simpan);

  // Redirect kembali ke halaman user
  header("Location: profilSave.php");
  exit();
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>Sew.nSlay - Detail Gambar</title>
  <!-- my style -->
  <link rel="stylesheet" href="css/beranda.css">

  <!-- feather icons -->
  <script src="https://unpkg.com/feather-icons"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.css">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="https://kit.fontawesome.com/f6dcf461c1.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
          <a href="" class="navbar-orang"><i data-feather="log-out"></i></a>
      </div>
    </nav>
    <!-- navbar end -->

    <div class="detail-wrapper" id="beranda">
      <?php
      // Menghubungkan ke database
      include 'koneksi.php';

      // Mendapatkan ID konten dari parameter URL
      $id = $_GET['id'];

      // Query untuk mengambil data konten berdasarkan ID
      $query_konten = "SELECT * FROM konten WHERE id_konten = $id";
      $result_konten = mysqli_query($koneksi, $query_konten);
      $row_konten = mysqli_fetch_assoc($result_konten);
      ?>

      <!-- mengambil data gambar konten -->
      <div class="image-container">
        <img src="<?php echo $row_konten['nama_gambar']; ?>" alt="Image"> 
      </div>
      
      <div class="description">
        <div class="aksi">
        <form method="POST" action="">
          <button id="saveButton" name="saveButton"> Save </button>
        </form>
        </div>

        <h1><?php echo $row_konten['judul_konten']; ?></h1>

        <div class="detail-user">
        <?php
            // Ambil data foto profil dan nama pengguna dari pengguna yang mengupload konten
            $query = "SELECT k.id_konten, k.id_user, u.nama_pengguna, u.foto_profil
                      FROM konten k
                      JOIN user u ON k.id_user = u.id_user
                      WHERE k.id_konten = $id"; // Ganti <id_konten> dengan ID konten yang sesuai
            $result = mysqli_query($koneksi, $query);

            if ($result && mysqli_num_rows($result) > 0) {
              $row = mysqli_fetch_assoc($result);
              $idUser=$row['id_user'];
              $namaPengguna = $row['nama_pengguna'];
              // Ambil foto profil jika tersedia
              if (!empty($row['foto_profil'])) {
                $foto_dest = $row['foto_profil'];
              } else {
                $foto_dest = 'img/avatar1.png'; // Foto profil default jika tidak tersedia
              }
              ?>
              
              <div class="img__container">
            <img src="<?php echo $foto_dest; ?>" alt="<?php echo $namaPengguna; ?>" />
            <a class="nama-user" ><?php echo $namaPengguna; ?></a>
            <a class="follow-button" nama="follow" id="follow" data-userid="<?php echo $idUser; ?>">Follow</a>
          </div>

            <?php } ?>
          </div>
        <!-- menampilkan deskripsi pada konten -->
        <div class="text-detail">
          <h3>Deskripsi</h3>
          <p><?php echo $row_konten['deskripsi']; ?></p>
          <h3>Tingkat Kemampuan</h3>
          <p><?php echo $tingkat_kemampuan; ?></p>
          <h3>Jenis Acara</h3>
          <p><?php echo $jenis_acara; ?></p>
          <h3>Ukuran</h3>
          <p><?php echo $row_konten['ukuran']; ?></p>
          <h3>Jenis Pakaian</h3>
          <p><?php echo $row_konten['jenis_pakaian']; ?></p>
          <a href="<?php echo $row_konten['nama_file']; ?>" class="unduh-button">Unduh Pola</a>
        </div>
      </div>

    </div>

    <!-- ikon -->
    <script>
      feather.replace();




      
      function toggleLike(id) {
        var heartIcon = document.getElementById("heartIcon");
        heartIcon.classList.toggle("liked");

        if (heartIcon.classList.contains("liked")) {
          heartIcon.classList.remove("far");
          heartIcon.classList.add("fas");
          likeContent(id);
        } else {
          heartIcon.classList.remove("fas");
          heartIcon.classList.add("far");
          unlikeContent(id);
        }
      }

      function likeContent(id) {
        // Kirim permintaan AJAX ke like.php dengan mengirimkan ID konten
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "like.php?id=" + id, true);
        xhr.send();
      }

      function unlikeContent(id) {
        // Kirim permintaan AJAX ke like.php dengan mengirimkan ID konten
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "like.php?id=" + id, true);
        xhr.send();
      }
    </script>

</body>
</html>
