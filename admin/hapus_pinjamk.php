<?php 
include 'config.php';
$id=$_GET['id'];
$jumlah=$_GET['jumlah'];
$nama=$_GET['nama'];

$a=mysqli_query($conn,"select * from komponen where nama='$nama'");
$b=mysqli_fetch_assoc($a);

$kembalikan=$b['sisa']+$jumlah;
$c=mysqli_query($conn,"update komponen set sisa='$kembalikan' where nama='$nama'");
mysqli_query($conn,"delete from peminjamank where id='$id'");
header("location:pengembaliank.php");

 ?>