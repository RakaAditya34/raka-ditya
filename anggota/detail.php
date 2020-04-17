<?php
include '../aset/header.php';
$koneksi = mysqli_connect ("localhost", "root", "", "db_perpus");
$id_anggota = $_GET['id_anggota'];

$sql = "SELECT * FROM anggota INNER JOIN level ON anggota.id_level = level.id_level WHERE  id_anggota = $id_anggota";
$res = mysqli_query($koneksi, $sql);
$detail = mysqli_fetch_assoc($res);
?>
<div class="container">
    <div class="row mt-4">
        <div class="col-md-7">
        <h2 class="card-title"><i class="fas fa-user"></i> Detail Anggota</h2>
            <hr class="bg-light">                
                <table class="table table-bordered">
    <tr>
      <td><strong>Nama</strong></td>                    
      <td><?= $detail['nama'] ?></td>
    </tr>
      <td><strong>Kelas</strong></td>                    
      <td><?= $detail['kelas'] ?></td>
    <tr>
      <td><strong>Telp</strong></td>                    
      <td><?= $detail['telp'] ?></td>
    </tr>
    <tr>
      <td><strong>Username</strong></td>                    
      <td><?= $detail['username'] ?></td>
      </tr>
    <tr>
      <td><strong>Password</strong></td>                    
      <td><?= $detail['password'] ?></td>
      </tr>
    <tr>
      <td><strong>Level</strong></td>                    
      <td><?= $detail['level'] ?></td>
    </tr>          
    </table>
    <a href="index.php" class="btn btn-success"><i class="fas fa-angle-double-left"></i>Kembali</a>
        </div>
    </div>
</div>

<?php 
include '../aset/footer.php';
?>