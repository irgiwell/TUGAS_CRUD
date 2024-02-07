<?php
    include("config.php");

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE username = '$username' AND password='$password'";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['username'] = $username;
        header("Location: index.php");
    }else{
        echo "Login gagal. Silahkan coba lagi <a href='login.php'>di sini</a>.";
    }

?>