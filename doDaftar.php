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

if (move_uploaded_file($tmp, $path)) {
    $query  = mysqli_query($conn, "INSERT INTO pendaftaran SET nama='$nama', jenis_kelamin='$jk', alamat='$alamat', ttl='$ttl', agama='$agama', no_telp='$no_telp', nilai_un='$nilai', foto='$foto' ");
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




// $insert = mysqli_query($conn, "INSERT INTO siswa SET nama='$nama', alamat='$alamat', nilai='$nilai' ");

// if ($insert)
//     header('Location:../dataSiswa.php');
// else
//     echo 'Input Data Gagal...';
