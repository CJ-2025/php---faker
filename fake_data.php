<?php
require 'conn.php';
require 'vendor/autoload.php';

$faker = Faker\Factory::create('en_PH');

if (!$mysqli) {
    die("Database connection failed: " . mysqli_connect_error());
}

$mysqli->query("SET FOREIGN_KEY_CHECKS = 0");
$mysqli->query("TRUNCATE TABLE office");
$mysqli->query("TRUNCATE TABLE employee");
$mysqli->query("TRUNCATE TABLE transaction");
$mysqli->query("SET FOREIGN_KEY_CHECKS = 1");

?>
