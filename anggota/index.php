<?php
$koneksi = mysqli_connect ("localhost", "root", "", "db_perpus");

$sql = "SELECT * FROM anggota ORDER BY nama";

$res = mysqli_query($koneksi, $sql);

$pinjam = array();

while ($data = mysqli_fetch_assoc($res)) {
    $pinjam[] = $data;
}


include '../aset/header.php';
?>

<div class="card">
    <div class="card-header">
    <h2 class="card-title"><i class="fas fa-user"></i> Data Anggota</h2>
        </div>
        <div class="card-body">   
        <center>
        <a href="tambah.php"><button type="button" class="btn btn-secondary">Tambah Data Anggota</button></a>
        </center>
        </br>
        <table class="table table-striped">
        <thead>
   <tr>
   <th scope="col">#</th>
   <th scope="col">Nama</th>
   <th scope="col">Kelas</th>
   <th scope="col">No Telp</th>
   <th scope="col">Aksi</th>
   </tr>
</thead>

  <tbody>
  <?php
    $no = 1;
    foreach ($pinjam as $p ) { ?>

    <tr>
        <th scope="row"><?= $no ?></th>
        <td><?= $p['nama'] ?></td>    
        <td><?= $p['kelas'] ?></td>                          
        <td><?= $p['telp'] ?></td>
        <td>
<a href="detail.php?id_anggota=<?=$p['id_anggota']?>" class="badge badge-success">Detail</a>
<a href="edit.php?id_anggota=<?=$p['id_anggota']?>" class="badge badge-warning">Edit</a>
<a href="hapus.php?id_anggota=<?=$p['id_anggota']?>" class="badge badge-danger">Hapus</a>                
        </td>
    </tr>
                                        
<?php 
    $no++;
}
?>

  </tbody>
</table>
    </div>
</div>


<?php
include '../aset/footer.php';
?>

