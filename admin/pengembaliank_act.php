<?php 

include 'config.php';

$namap=$_POST['nama_peminjam'];
$namab=$_POST['nama_barang'];
$jumlah=$_POST['jumlah'];


$a = mysqli_query($conn,"SELECT * FROM peminjamank WHERE  nama_peminjam = '$namap' and nama_barang = '$namab'");
if ($a = null) {
	echo "<script> alert('tidak ada data');</script>";
}
$b = mysqli_fetch_assoc($a);

$c  = $b['jumlah_kembali'] += $jumlah;

mysqli_query($conn,"update peminjamank set jumlah_kembali = '$c' where nama_peminjam = '$namap' and nama_barang = '$namab'")or die("tidak ada data peminjaman dengan nama ".$namap." dengan pinjaman barang ".$namab);

$dt=mysqli_query($conn,"select * from komponen where nama='$namab'");
$data=mysqli_fetch_assoc($dt);
$sisa=$data['sisa']+$jumlah;

mysqli_query($conn,"update komponen set sisa='$sisa' where nama='$namab'");

header("location:pengembaliank.php");

?>