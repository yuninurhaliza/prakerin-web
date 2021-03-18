<?php

require_once __DIR__ . '/vendor/autoload.php';

include('koneksi.php');
$id = $_GET['id'];
$query      = mysqli_query($conn, "SELECT * FROM pendaftaran WHERE id='$id' ");
$results    = mysqli_fetch_all($query, MYSQLI_ASSOC);

$date   = date('l, d-m-Y');
$html   = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/print.css">
    <title>Document</title>
</head>
<body>

<h1>Formulir Pendaftaran</h1>

<div class="container">
    
';

foreach ($results as $result) {
    $html .= '
        <table>
            <tr>
                <td style="width:200px">Nama Lengkap</td>
                <td style="width:30px">:</td>
                <td>' . $result['nama'] . '</td>
                <td rowspan="3">
                    <img src="foto/' . $result['foto'] . ' " width="150px" height="150px">
                </td>
            </tr>
            <tr>
                <td style="width:200px">Jenis Kelamin</td>
                <td style="width:30px">:</td>
                <td>' . $result['jenis_kelamin'] . '</td>
            </tr>
            <tr>
                <td style="width:200px">Alamat</td>
                <td style="width:30px">:</td>
                <td>' . $result['alamat'] . '</td>
            </tr>
            <tr>
                <td style="width:200px">Tempat, Tanggal Lahir</td>
                <td style="width:30px">:</td>
                <td>' . $result['ttl'] . '</td>
            </tr>
            <tr>
                <td style="width:200px">Agama</td>
                <td style="width:30px">:</td>
                <td>' . $result['agama'] . '</td>
            </tr>
            <tr>
                <td style="width:200px">Nomor HP</td>
                <td style="width:30px">:</td>
                <td>' . $result['no_telp'] . '</td>
            </tr>
            <tr>
                <td style="width:200px">Nilai UN</td>
                <td style="width:30px">:</td>
                <td>' . $result['nilai_un'] . '</td>
            </tr>
        </table>
    ';
}

$html .= '</div>
<footer>' . $date . '</footer>
</body>
</html>
';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output('Formulir Pendaftaran.pdf', \Mpdf\Output\Destination::INLINE);
