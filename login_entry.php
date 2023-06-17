<?php

include("db_connection.php");

$e_mail = $_POST['email'];
$password = $_POST['password'];


if (empty($e_mail) || empty($password)) {
    header('Location: login.html');
    exit(); 
}

$query = "SELECT * FROM user_data WHERE E_MAIL = '$e_mail' LIMIT 1";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);

    if ($row['PASSWORD'] === $password) {
       
        session_start();

        $_SESSION['email'] = $row['E_MAIL'];
        $_SESSION['nickname'] = $row['NICKNAME'];
        $_SESSION['playcoins'] = $row['PLAYCOINS'];
        $_SESSION['playgems'] = $row['PLAYGEMS'];

        header('Location: profile.php');
        exit(); 
    }
}

header('Location: login.html');
exit(); 
?>