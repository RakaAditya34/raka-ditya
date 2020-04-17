<?php 
$koneksi = mysqli_connect ("localhost", "root", "", "db_perpus");
include '../aset/header.php';

$query = mysqli_query($koneksi,"SELECT * FROM kategori");

// $kategori = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Buku</title>
</head>
<body>
    
</body>
</html>
<div class="container">
    <div class="row mt-4">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                <h2>Tambah Data Buku</h2>
                </div>
                <div class="card-body">
                <form method="post" action="proses-tambah.php">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan judul buku">
                        </div>
                        <div class="form-group">
                            <label for="penerbit">Penerbit</label>
                            <input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="Masukkan penerbit buku">
                        </div>

                        <div class="form-group">
                            <label for="pengarang">Pengarang</label>
                            <input type="text" class="form-control" name="pengarang" id="pengarang" placeholder="Masukkan nama pengarang">
                        </div>
                        <div class="form-group">
                            <label for="ringkasan">Ringkasan</label>
                            <textarea type="text" class="form-control" name="ringkasan" id="ringkasan" placeholder="Masukkan ringkasan buku">
                        </textarea>
                        <div class="form-group">
                            <label for="">Cover</label>
                            <input type="file" class="form-control" name="cover" id="cover" placeholder="Masukkan jenis cover buku">
                        </div>
                        <div class="form-group">
                            <label for="">Stok</label>
                            <input type="number" class="form-control" name="stok" id="stok" placeholder="Masukkan jumlah stok">
                        </div>
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