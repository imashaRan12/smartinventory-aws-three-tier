<?php
include 'db.php';

$id = $_GET['id'];

pg_query($conn, "DELETE FROM products WHERE id=$id");

header("Location: index.php");
?>