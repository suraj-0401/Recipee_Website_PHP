<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'users';

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn) {
    echo '';
} else {
    die("Error" . mysqli_connect_error());
}
?>