<?php
$host = "localhost";
$user = "uthlvoigay6ny";
$pass = "4^5418#c1zc@";
$dbname = "db47jcd3xghg2n";

// $host = "localhost";
// $user = "root";
// $pass = "";
// $dbname = "pro3";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
