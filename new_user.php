<?php

include("db_connection.php");

$nickname = $_POST['username'];
$e_mail = $_POST['email'];
$password = $_POST['password'];


if (empty($nickname) || empty($e_mail) || empty($password)) {
    header('Location: register.html');
    exit(); 
}

$query = "SELECT COUNT(*) AS count FROM user_data WHERE E_MAIL = '$e_mail'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$count = $row['count'];

if ($count > 0) {
    header('Location: register.html');
    exit();
}

$query = "INSERT INTO user_data (NICKNAME, E_MAIL, PASSWORD) VALUES ('$nickname', '$e_mail', '$password')";
mysqli_query($con, $query);

header('Location: login.html');
exit(); 
?>