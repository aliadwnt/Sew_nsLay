<?php
error_reporting(); // Menghilangkan pesan error (optional)
include 'koneksi.php';

// Query untuk mengambil data gambar dari database
$query_gambar = "SELECT * FROM konten WHERE nama_gambar IS NOT NULL";
$result_gambar = mysqli_query($koneksi, $query_gambar);
?>

<!-- menampilkan gambar dg perulangan while -->
<?php while ($row_gambar = mysqli_fetch_assoc($result_gambar)) : ?>
    <div class="gallery-item">
        <a href="detail-gambar.php?id=<?php echo $row_gambar['id_konten']; ?>">
        <img src="<?php echo $row_gambar['nama_gambar']; ?>" alt="Image" style="border-radius: 15%;">
        </a>
    </div>
<?php endwhile; ?>
