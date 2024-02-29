<h1 class="text-primary margin-bottom:50px;">Kategori Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
        <div class="col-md-12">
            <form method="post">
            <?php
    if(isset($_POST['submit'])) {
        $kategori = $_POST['kategori'];
        
        // Validasi apakah kategori sudah ada di database
        $cek_kategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE kategori = '$kategori'");
        if(mysqli_num_rows($cek_kategori) > 0) {
            echo '<script>alert("Kategori sudah ada.");</script>';
        } else {
            $query = mysqli_query($koneksi, "INSERT INTO kategori(kategori) VALUES ('$kategori')");

            if($query) {
                echo '<script>alert("Tambah data berhasil.");</script>';
            } else {
                echo '<script>alert("Tambah data gagal.");</script>';
            }
        }
    }
?>

                <div class="row mb-3">
                <div class="col-md-2">Nama Kategori</div>
                <div class="col-md-8"><input type="text" class="form-control" name="kategori"></div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary" name="submit" value="submit"> Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <a href="?page=kategori" class="btn btn-danger">Kembali</a>
                        
                    </div>
                </div>
            </form>
        </div>  
    </div>
    </div>
    <div class="o" style="margin-bottom: 200px;"> <p> </p></div>
</div>
<style>
     body{
    background:url(assets/img/HOME.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    }
</style>