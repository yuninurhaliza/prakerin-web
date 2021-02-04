<body>
    
    <form action="" method="post">
        <label for="">nama user</label>
        <input type="text" name="user"><br><br>
        <label for="">password</label>
        <input type="text" name="pass"><br><br>
        <input type="submit" value="Daftar">
    </form>

</body>

<?php

    $user   = $_POST['user'];
    $pass   = md5($_POST['pass']);

    $connect    = mysqli_connect("localhost","root","","register");

    
    $query      = "INSERT INTO user (nama,pass) VALUES ('".$user."','".$pass."')";

    $hasil = mysqli_query($connect,$query);
    if ($hasil) {
        echo 'data berhasil ditambahkan';
    } else {
        echo 'data gagal ditambahkan';
    }

    $q2 = "SELECT id FROM user WHERE nama='".$user."' ";
    $hasil2 = mysqli_query ($connect,$q2);
    if(mysqli_num_rows ($hasil2) > 0) {
        echo "user telah ada";
    } 

?>