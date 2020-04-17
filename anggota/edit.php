<?php 
$koneksi = mysqli_connect ("localhost", "root", "", "db_perpus");
include '../aset/header.php';

$id_anggota = $_GET['id_anggota'];
$query = mysqli_query($koneksi,"SELECT * FROM level");
$query2 = mysqli_query($koneksi,"SELECT * FROM anggota where id_anggota=$id_anggota");

if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $telp = $_POST['telp'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id_level = $_POST['id_level'];   
    
    $sql = "UPDATE anggota SET 
      nama='$nama',
      kelas='$kelas',
      telp='$telp',
      username='$username',
      password='$password', 
      id_level='$id_level'
      WHERE id_anggota = '$id_anggota'";
            
$res = mysqli_query($koneksi, $sql);

$count = mysqli_affected_rows($koneksi);

if($count == 1)
{
   header("Location: index.php");
}
else 
{
   header("Location: edit.php");
}
   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Anggota</title>
</head>
<body>
    
</body>
</html>
<div class="container">
    <div class="row mt-4">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                <h2 class="card-title"><i class="fas fa-user"></i>Edit Data Anggota</h2>
                </div>
                <div class="card-body">
                <form method="post" action="">
                <div class="form-group">
                       <?php
                        while($anggota = mysqli_fetch_assoc($query2)):
                        ?>
                            <label for="anggota">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" id="anggota" placeholder="Masukkan nama lengkap"
                                value="<?= $anggota['nama'];?>">
                        </div>
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <input type="text" class="form-control" name="kelas" id="kelas" placeholder="Masukkan kelas"
                            value="<?= $anggota['kelas'];?>">
                            <small class="form-text text-muted">Contoh: XRPL2</small>
                        </div>
                        <div class="form-group">
                            <label for="telp">Nomor Telepon</label>
                            <input type="text" class="form-control" name="telp" id="telp" placeholder="Masukkan nomor telepon"
                            value="<?= $anggota['telp'];?>">
                            <small class="form-text text-muted">Contoh: 111-222-3333</small>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan username"
                            value="<?= $anggota['username'];?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password"
                            value="<?= $anggota['password'];?>">
                        </div>
                        <?php
                        endwhile;
                        ?>
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