<?php
    require 'koneksi.php';
    if(isset($_POST['simpan'])) {
        // Ambil data dari form
        $id_user = $_SESSION['user']['id_user'];
        $id_buku = $_POST['id_buku'];

        // Query untuk menyimpan data peminjaman buku ke dalam tabel koleksipribadi
        $query_simpan = "INSERT INTO koleksipribadi (id_koleksi, id_user, id_buku) VALUES ('', '$id_user', '$id_buku')";

        // Eksekusi query
        if (mysqli_query($koneksi, $query_simpan)) {
            echo "<script>alert('Data peminjaman berhasil disimpan ke koleksipribadi.'); window.location.href='index.php';</script>";
            // Tambahkan pengalihan halaman jika perlu
        } else {
            echo "Error: " . $query_simpan . "<br>" . mysqli_error($koneksi);
        }

        // Tutup koneksi database
        mysqli_close($koneksi);
    }
?>
