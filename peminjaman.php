<h1 class="mt-4 text-primary">Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <a href="?page=peminjaman_tambah" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Peminjaman</a>
                <br><br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User</th>
                            <th>Buku</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Status Peminjaman</th>   
                            <th width="29%">Aksi</th>        
                        </tr>
                    </thead>
                    <tbody>
                        <?php   
                        $i = 1;
                        $query = mysqli_query($koneksi, "SELECT * FROM peminjaman LEFT JOIN user ON user.id_user = peminjaman.id_user LEFT JOIN buku ON buku.id_buku = peminjaman.id_buku WHERE peminjaman.id_user = " . $_SESSION['user']['id_user']);
                        while ($data = mysqli_fetch_array($query)) {
                            $tgl_peminjam =$data['tanggal_peminjaman'];
                            $tgl_pengembalian =$data['tanggal_pengembalian'];
                            $status =$data['status_peminjaman'];
                            ?>
                            <tr>
                                <div class="btn-group" role="group" aria-label="Actions" style="padding: 10px;">
                                    <?php if ($status != 'dikembalikan') : ?>
                                        
                                    <?php endif; ?>
                            <td><?php echo $i++; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['judul']; ?></td>
                                <td><?= date('d-m-Y',strtotime($tgl_peminjam)) ?></td>
                                <td><?=  date('d-m-Y',strtotime($tgl_pengembalian)) ?></td>
                                <td><?=$status?></td>
                                <td>
                                <div class="row">
                                    <div class="col">
                                    <a href="?page=peminjaman_ubah&&id=<?= $data['id_peminjaman']; ?>" class="btn btn-info" style=" border-radius: 20px;">Ubah</a>
                                    </div>
                                    <div class="col">
                                    <a onclick="return confirm('Apakah anda yakin menghapus data ini?');" href="?page=peminjaman_hapus&&id=<?= $data['id_peminjaman']; ?>" class="btn btn-danger" style=" border-radius: 20px;">Hapus</a>
                                    </div>
                                    <div class="col">
                                    <form method="post" action="simpan_koleksi.php" style="">
                                            <input type="hidden" name="id_peminjaman" value="<?= $data['id_peminjaman']; ?>">
                                            <input type="hidden" name="id_buku" value="<?= $data['id_buku']; ?>">
                                            <button type="submit" name="simpan" class="btn btn-success" style="border-radius: 20px;" onclick="return confirm('Apakah anda yakin menyimpan data ini kekoleksi?');">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                                </div>

                            </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>  
        </div>
    </div>
 </div>
<style>
     body{
    background:url(assets/img/HOME.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    }
</style>