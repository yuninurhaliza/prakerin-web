<?php

include('koneksi.php');

$nama       = $_POST['nama'];
$jk         = $_POST['jk'];
$ttl        = $_POST['ttl'];
$agama      = $_POST['agama'];
$no_telp    = $_POST['no_telp'];
$alamat     = $_POST['alamat'];
$nilai      = $_POST['nilai'];
$foto       = $_FILES['foto']['name'];
$tmp        = $_FILES['foto']['tmp_name'];
$path       = "../foto/" . $foto;

$akta       = $_FILES['akta']['name'];
$tmp        = $_FILES['akta']['tmp_name'];
$path       = "../akta/" . $akta;

$kk         = $_FILES['kk']['name'];
$tmp        = $_FILES['kk']['tmp_name'];
$path       = "../kk/" . $kk;

if (move_uploaded_file($tmp, $path)) {
    $query  = mysqli_query($conn, "INSERT INTO pendaftaran SET nama='$nama', jenis_kelamin='$jk', alamat='$alamat', ttl='$ttl', agama='$agama', no_telp='$no_telp', nilai_un='$nilai', foto='$foto', dok_akta='$akta', dok_kk='$kk' ");
    if ($query) {
        echo "
            <script>
            alert('Data berhasil ditambahkan!');
            document.location.href = '../dataSiswa.php';
            </script>
        ";
    } else {
        echo 'gagal';
    }
}
