<?php
include '../aset/header.php';
$koneksi = mysqli_connect ("localhost", "root", "", "db_perpus");
$id_buku = $_GET['id_buku'];

$sql = "SELECT * FROM buku INNER JOIN kategori ON buku.id_kategori = kategori.id_kategori WHERE  id_buku = $id_buku";
$res = mysqli_query($koneksi, $sql);
$detail = mysqli_fetch_assoc($res);
?>
<div class="container">
    <div class="row mt-4">
        <div class="col-md-7">
            <h2>Detail Buku</h2>
            <hr class="bg-light">                
                <table class="table table-bordered">
    <tr>
      <td><strong>Judul</strong></td>                    
      <td><?= $detail['judul'] ?></td>
    </tr>
      <td><strong>Penerbit</strong></td>                    
      <td><?= $detail['penerbit'] ?></td>
    <tr>
      <td><strong>Pengarang</strong></td>                    
      <td><?= $detail['pengarang'] ?></td>
    </tr>
      <td><strong>Ringkasan</strong></td>                    
      <td><?= $detail['ringkasan'] ?></td>
    <tr>
      <td><strong>Cover</strong></td>                    
      <td><img width="350" src="<?= $detail['cover']?>"></td>
    </tr>
      <td><strong>Stok</strong></td>                    
      <td><?= $detail['stok'] ?></td>
    <tr>
      <td><strong>Kategori</strong></td>                    
      <td><?= $detail['kategori'] ?></td>
    </tr>          
    </table>
    <a href="index.php" class="btn btn-success"><i class="fas fa-angle-double-left"></i>Kembali</a>
        </div>
    </div>
</div>

<?php 
include '../aset/footer.php';
?>