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

$stmt = $mysqli->prepare("INSERT INTO office (id, name, contactnum, email, address, city, country, postal) 
                          VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

for ($i = 1; $i <= 50; $i++) {
    $name = $faker->company;
    $contactnum = $faker->phoneNumber;
    $email = $faker->companyEmail;
    $address = $faker->address;
    $city = $faker->city;
    $country = "Philippines";
    $postal = $faker->postcode;

    $stmt->bind_param("isssssss", $i, $name, $contactnum, $email, $address, $city, $country, $postal);
    $stmt->execute();
}
$stmt->close();




$stmt = $mysqli->prepare("INSERT INTO employee (last_name, first_name, office_id, address) 
                          VALUES (?, ?, ?, ?)");

for ($i = 1; $i <= 200; $i++) {
    $last_name = $faker->lastName;
    $first_name = $faker->firstName;
    $office_id = rand(1, 50);
    $address = $faker->address;

    $stmt->bind_param("ssis", $last_name, $first_name, $office_id, $address);
    $stmt->execute();
}
$stmt->close();
?>
