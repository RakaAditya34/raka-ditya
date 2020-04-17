<?php 
$koneksi = mysqli_connect ("localhost", "root", "", "db_perpus");
include 'aset/header.php';

$query_buku = mysqli_query($koneksi,"SELECT COUNT(*) AS jumlah FROM buku");
$query_anggota = mysqli_query($koneksi,"SELECT COUNT(*) AS jumlah FROM anggota");
$query_pinjam= mysqli_query($koneksi,"SELECT COUNT(*) AS jumlah FROM peminjaman");

?>

<div class="container">
<div class="row mt-4">
<div class="col-md">
<h2><i class="fas fa-chart-line mr-2"></i>Dashboard</h2>
<hr class="bg-light">


</div>
</div>
<div class="row">
<div class="col-md-4"> 
<div class="card bg-danger" style="width: 18rem;">
  <div class="card-body text-white">
    <h5 class="card-title">Jumlah Buku</h5>
    <?php while($buku = mysqli_fetch_assoc($query_buku)):?>
    <p class="card-text" style="font-size:60px"><?= $buku['jumlah'];?></p>
    <?php endwhile; ?>
    <a href="http://localhost/siperpus/buku/index.php" class="text-white">Lebih detail <i class="fas fa-angle-double-right"></i></a>
  </div>
</div>
</div>

<div class="col-md-4"> 
<div class="card bg-success" style="width: 18rem;" >
  <div class="card-body text-white"style="background-color:green;">
    <h5 class="card-title">Jumlah Anggota</h5>
    <?php while($anggota = mysqli_fetch_assoc($query_anggota)):?>
    <p class="card-text" style="font-size:60px"><?= $anggota['jumlah']  ?></p>
    <?php endwhile; ?>
    <a href="http://localhost/siperpus/anggota/index.php" class="text-white">Lebih detail <i class="fas fa-angle-double-right"></i></a>
  </div>
</div>
</div>

<div class="col-md-4"> 
<div class="card bg-primary" style="width: 18rem;">
  <div class="card-body text-white"style="background-color:navy">
    <h5 class="card-title">Jumlah Transaksi</h5>
    <?php while($peminjaman = mysqli_fetch_assoc($query_pinjam)):?>
    <p class="card-text" style="font-size:60px"><?= $peminjaman['jumlah']?></p>
    <?php endwhile ?>
    <a href="http://localhost/siperpus/transaksi/index.php" class="text-white">Lebih detail <i class="fas fa-angle-double-right"></i></a>
  </div>
</div>
</div>

</div>
</div>

<?php 
include 'aset/footer.php';
?>
