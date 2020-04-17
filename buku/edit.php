<?php 
$koneksi = mysqli_connect ("localhost", "root", "", "db_perpus");
include '../aset/header.php';

$id_buku = $_GET['id_buku'];
$query = mysqli_query($koneksi,"SELECT * FROM kategori");
$query2 = mysqli_query($koneksi,"SELECT * FROM buku where id_buku=$id_buku");
// $kategori = mysqli_fetch_assoc($query);
if(isset($_POST['simpan'])){
    $judul = $_POST['judul'];
    $penerbit = $_POST['penerbit'];
    $pengarang = $_POST['pengarang'];
    $ringkasan = $_POST['ringkasan'];
    $cover = $_POST['cover'];
    $stok = $_POST['stok']; 
    $id_kategori = $_POST['id_kategori'];
    
    $sql = "UPDATE buku SET 
      judul='$judul',
      penerbit='$penerbit',
      pengarang='$pengarang',
      ringkasan='$ringkasan',
      cover='$cover', 
      stok='$stok',
      id_kategori='$id_kategori'
      WHERE id_buku = '$id_buku'";
            
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
    <title>Edit Data Buku</title>
</head>
<body>
    
</body>
</html>
<div class="container">
    <div class="row mt-4">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                <h2>Edit Buku</h2>
                </div>
                <div class="card-body">
                <form method="post" action="">
                
                        <div class="form-group">
                        <?php
                        while($buku = mysqli_fetch_assoc($query2)):
                        ?>
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan judul buku" 
                                    value="<?= $buku['judul'];?>">
                        </div>
                        <div class="form-group">
                            <label for="penerbit">Penerbit</label>
                            <input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="Masukkan penerbit buku"
                                    value="<?= $buku['penerbit'];?>">
                        </div>

                        <div class="form-group">
                            <label for="pengarang">Pengarang</label>
                            <input type="text" class="form-control" name="pengarang" id="pengarang" placeholder="Masukkan nama pengarang"
                                    value="<?= $buku['pengarang'];?>">
                        </div>
                        <div class="form-group">
                            <label for="ringkasan">Ringkasan</label>
                            <textarea type="text" class="form-control" name="ringkasan" id="ringkasan" placeholder="Masukkan ringkasan buku"
                                     value="<?=  $buku['ringkasan'];?>">
                        </textarea>
                        </div>
                        <div class="form-group">
                        <table style="border-collapse">
                            <tr><td></td><label for="">Cover</label></td></tr>
                            <tr><td><input type="file"  class="btn btn-secondary" name="cover" id="cover" placeholder="Masukkan jenis cover buku"
                                     value="<img src=<?= $detail['cover']?>"></td></tr>
                                     </table>
                                     </br>
                        <div class="form-group">
                            <label for="">Stok</label>
                            <input type="number" class="form-control" name="stok" id="stok" placeholder="Masukkan jumlah stok"
                               value="<?= $buku['stok'];?>">
                        </div>
                        <?php 
                        endwhile;
                        ?>
                        <div class="form-group">
                            <label for="">Kategori</label>
                            <select type="number" class="form-control" name="id_kategori" id="stok" placeholder="Masukkan jumlah stok">
                            <option value="">Pilih Kategori</option>
                            <?php
                            while($kategori = mysqli_fetch_assoc($query)):
                            ?>
                            <option value="<?php echo $kategori['id_kategori']; ?>"><?php echo $kategori['kategori']; ?></option> 
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