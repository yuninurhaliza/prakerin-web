<?php

include ('connection.php');

$nama   = $_POST['nama'];
$url    = $_POST['url'];
$logo   = $_POST['logo'];
$status = $_POST['status'];

$insert = mysqli_query ($connect, "INSERT INTO tb_bank SET nama='$nama', url='$url', logo='$logo', status='$status' ");

if ($insert)
    header('Location:index.php');
else
    echo 'Input Data Gagal...';

?>