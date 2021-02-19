<?php

require_once("config.php");

if (isset($_POST['register'])) {

    // filter data yang diinputkan
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


    // menyiapkan query
    $sql = "INSERT INTO users (name, username, email, password) 
            VALUES (:name, :username, :email, :password)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":name" => $name,
        ":username" => $username,
        ":password" => $password,
        ":email" => $email
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if ($saved) header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <script src="js/jquery.js"></script>

    <style>
        .icon {
            width: 40px;
            height: 38px;
            margin-left: -30px;
            background: none;
            border: none;
        }

        .password {
            width: 540px;
        }
    </style>

</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">

                <h4>Register</h4>
                <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>

                <form action="" method="POST">

                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input class="form-control" type="text" name="name" placeholder="Nama kamu" required />
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input class="form-control" type="text" name="username" placeholder="Username" required />
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email" placeholder="Alamat Email" required />
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="row">
                            <div class="col-md-11">
                                <input class="form-control password" type="password" id="password" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Harus berisi setidaknya satu angka dan satu huruf besar dan kecil, dan setidaknya 8 karakter atau lebih" required />
                            </div>
                            <div class="col-md-1">
                                <button class="icon"><i class="fas fa-eye-slash" id="eyes"></i></button>
                            </div>
                        </div>

                    </div>

                    <input type="submit" class="btn btn-success" name="register" value="Daftar" />

                </form>

            </div>

            <div class="col-md-6">
                <img src="img/register.png" width="600px" style="margin-top: 50px;">
            </div>

        </div>
    </div>

    <script type="text/javascript">
        $("#eyes").click(function() {
            var baru = $("#eyes").removeClass("fas fa-eye-slash");
            $("#eyes").addClass("fas fa-eye");
            $("#password").attr('type', 'text');

            baru.click(function() {
                $("#eyes").removeClass("fas fa-eye");
                $("#eyes").addClass("fas fa-eye-slash");
                $("#password").attr('type', 'password');
            })
        })
    </script>

</body>

</html>