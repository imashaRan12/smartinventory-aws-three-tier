<?php
$host = "YOUR_RDS_ENDPOINT";
$port = "5432";
$dbname = "YOUR_DB_NAME";
$user = "YOUR_DB_USERNAME";
$password = "YOUR_DB_PASSWORD";

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Database connection failed.");
}
?>