<?php
error_reporting();
include 'koneksi.php';
session_start(); // Memulai sesi

if (isset($_POST['upload'])) {
    // Ambil nilai-nilai dari formulir HTML
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $tingkat_kemampuan = isset($_POST['tingkat_kemampuan']) ? implode(",", $_POST['tingkat_kemampuan']) : '';
    $ukuran = $_POST['ukuran'];
    $jenis_pakaian = $_POST['pakaian'];
    $jenis_acara = isset($_POST['jenis_acara']) ? implode(",", $_POST['jenis_acara']) : '';

    // Proses upload gambar    
    $gambar_nama = $_FILES['file-ip-1']['name'];
    $gambar_tmp = $_FILES['file-ip-1']['tmp_name'];
    $gambar_dest = 'path_gambar/' . $gambar_nama;


    // Proses upload file pola
    $file_pola_nama = $_FILES['myFile']['name'];
    $file_pola_tmp = $_FILES['myFile']['tmp_name'];
    $file_pola_dest = 'path_file/' . $file_pola_nama;

    // Mendapatkan ID pengguna dari sesi
    $id_user = $_SESSION['user_id'];

    // Mendapatkan tanggal upload
    $tgl_upload = date('Y-m-d H:i:s');

    // Ambil ID kemampuan berdasarkan tingkat kemampuan yang dipilih
    $tingkat_kemampuan_ids = explode(",", $tingkat_kemampuan);
    $id_kemampuan = array();

    foreach ($tingkat_kemampuan_ids as $tingkat_kemampuan_id) {
        // Lakukan query untuk mendapatkan ID kemampuan berdasarkan tingkat kemampuan
        $query_get_kemampuan_id = "SELECT id_kemampuan FROM kemampuan WHERE nama_kemampuan = '$tingkat_kemampuan_id'";
        $result_kemampuan = mysqli_query($koneksi, $query_get_kemampuan_id);

        if ($result_kemampuan && mysqli_num_rows($result_kemampuan) > 0) {
            $row_kemampuan = mysqli_fetch_assoc($result_kemampuan);
            $id_kemampuan[] = $row_kemampuan['id_kemampuan'];
        }
    }

    // Ambil ID acara berdasarkan jenis acara yang dipilih
    $jenis_acara_ids = explode(",", $jenis_acara);
    $id_acara = array();

    foreach ($jenis_acara_ids as $jenis_acara_id) {
        // Lakukan query untuk mendapatkan ID kemampuan berdasarkan tingkat kemampuan
        $query_get_acara_id = "SELECT id_acara FROM acara WHERE nama_acara = '$jenis_acara_id'";
        $result_acara = mysqli_query($koneksi, $query_get_acara_id);

        if ($result_acara && mysqli_num_rows($result_acara) > 0) {
            $row_acara = mysqli_fetch_assoc($result_acara);
            $id_acara[] = $row_acara['id_acara'];
        }
    }

    // Simpan data ke database
    $query_konten = "INSERT INTO konten (id_konten, id_user, judul_konten, nama_gambar, deskripsi, nama_file, tgl_upload, ukuran, jenis_pakaian)
            VALUES (NULL, '$id_user', '$judul', '$gambar_dest', '$deskripsi', '$file_pola_dest', '$tgl_upload', '$ukuran', '$jenis_pakaian')";

    // Jika query untuk menyimpan data ke dalam tabel konten berhasil
    if (mysqli_query($koneksi, $query_konten)) {
        // Dapatkan ID konten yang baru saja disimpan
        $id_konten = mysqli_insert_id($koneksi);

        // Simpan data ke dalam tabel detailkemampuan
        foreach ($id_kemampuan as $id) {
            $query_detail_kemampuan = "INSERT INTO detailkemampuan (id_detailkepuan, id_konten, id_kemampuan) VALUES (NULL, '$id_konten', '$id')";
            mysqli_query($koneksi, $query_detail_kemampuan);
        }

        // Simpan data ke dalam tabel detailacara
        foreach ($id_acara as $ida) {
            $query_detail_acara = "INSERT INTO detailacara (id_detailacara, id_konten, id_acara) VALUES (NULL, '$id_konten', '$ida')";
            mysqli_query($koneksi, $query_detail_acara);
        }

        // Pindahkan gambar ke direktori tujuan
        if (move_uploaded_file($gambar_tmp, $gambar_dest)) {
            echo "File gambar berhasil diunggah dan dipindahkan.";
        } else {
            echo "Gagal memindahkan file gambar.";
        }

        // Pindahkan file pola ke direktori tujuan (jika ada)
        if (move_uploaded_file($file_pola_tmp, $file_pola_dest)) {
            echo "File PDF berhasil diunggah dan dipindahkan.";
        } else {
            echo "Gagal memindahkan file PDF.";
        }

        header('Location: beranda.php');
        exit;
    } else {
        echo "Error: " . $query_konten . "<br>" . mysqli_error($koneksi);
    }

    // Tutup koneksi ke database
    mysqli_close($koneksi);
}
?>
