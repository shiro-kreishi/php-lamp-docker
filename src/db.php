<?php
$hostname = "mariadb";
$username = "root";
$password = "password";
$database = "test";
$port = "3306";
$connect = mysqli_connect(
    $hostname, $username,
    $password, $database, $port
);
if (!$connect) {
    die('Could not connect: ' . mysql_error());
}
# your code ...
echo 'Connected successfully<br>';

mysqli_close($connect);