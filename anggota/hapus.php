<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_perpus");

$id_anggota = $_GET["id_anggota"];

$query = mysqli_query($koneksi, "DELETE FROM anggota where id_anggota=$id_anggota");

if($query>0){
    echo "
    <script>
    alert('Data berhasil dihapus');
    document.location.href = 'index.php';
    </script>
    ";
}
?>