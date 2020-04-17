<?php 
$koneksi = mysqli_connect ("localhost", "root", "", "db_perpus");
include '../aset/header.php';
$query = mysqli_query($koneksi,"SELECT * FROM level");
?>
<div class="container">
    <div class="row mt-4">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                <h2 class="card-title"><i class="fas fa-user"></i>Tambah Data Anggota</h2>
                </div>
                <div class="card-body">
                <form method="post" action="proses-tambah.php">
                        <div class="form-group">
                            <label for="anggota">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" id="anggota" placeholder="Masukkan nama lengkap">
                        </div>
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <input type="text" class="form-control" name="kelas" id="kelas" placeholder="Masukkan kelas">
                            <small class="form-text text-muted">Contoh: XRPL2</small>
                        </div>
                        <div class="form-group">
                            <label for="telp">Nomor Telepon</label>
                            <input type="text" class="form-control" name="telp" id="telp" placeholder="Masukkan nomor telepon">
                            <small class="form-text text-muted">Contoh: 111-222-3333</small>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password">
                        </div>
                        <div class="form-group">
                            <label for="">Level</label>
                            <select type="number" class="form-control" name="id_level" id="id_level">
                            <option value="">Pilih Level</option>
                            <?php
                            while($level = mysqli_fetch_assoc($query)):
                            ?>
                            <option value="<?php echo $level['id_level']; ?>"><?php echo $level['level']; ?></option> 
                            <?php 
                            endwhile;
                            ?>
                        </select>
                        </br>
                       
                        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>

<?php
include '../aset/footer.php';
?>