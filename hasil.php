<?php

$conn       = mysqli_connect("localhost", "root", "", "PPDB");
$query      = mysqli_query($conn, "SELECT * FROM pendaftaran WHERE nilai_un >= 20");
$results    = mysqli_fetch_all($query, MYSQLI_ASSOC);

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">

    <title>Data Siswa</title>
</head>

<body>


    <div class="container" style="text-transform: uppercase;">
        <h1 class="text-center mb-3 mt-4" style="font-weight: 700;">data siswa</h1>
        <div class="table-responsive">
            <table class="table table-bordered table-hover mt-3">
                <thead class="thead-dark">
                    <tr>
                        <th class="col-xs-12 text-center" style="width: 50px;">No</th>
                        <th class="col-xs-12 text-center" style="width:200px;">Foto siswa</th>
                        <th class="col-xs-12 text-center" style="width:200px;">nama siswa</th>
                        <th class="col-xs-12 text-center" style="width:200px;">Cetak</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($results as $result) : ?>
                        <tr class="text-center" style="font-weight: 500;">
                            <td><?php echo $i; ?></td>
                            <td><img src="foto/<?php echo $result['foto'] ?>" width="50px" height="50px"></td>
                            <td><?php echo $result['nama'] ?></td>
                            <td><a href="cetak.php?id=<?php echo $result['id'] ?>" class="btn btn-primary" style="width: 100px;" target="_blank"><i class="fas fa-print mr-2"></i>Cetak</a></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>