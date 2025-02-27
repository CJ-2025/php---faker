<?php
require 'conn.php';
require 'vendor/autoload.php';

$faker = Faker\Factory::create('en_PH');

if (!$mysqli) {
    die("Database connection failed: " . mysqli_connect_error());
}

?>
