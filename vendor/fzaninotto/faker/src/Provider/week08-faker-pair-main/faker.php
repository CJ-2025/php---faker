<?php
require_once 'vendor/autoload.php';

$host = 'localhost';
$db = 'philippines';
$user = 'root';
$password = 'root';

$connection = new mysqli($host, $user, $password, $db);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} else {
    echo "Connected successfully<br>";
}

$faker = Faker\Factory::create('en_PH');

$officeCount = 0;
$employeeCount = 0;
$transactionCount = 0;

$for_office = $connection->prepare("INSERT INTO office (name, contactnum, email, address, city, country, postal) VALUES (?, ?, ?, ?, ?, ?, ?)");
if (!$for_office) die("Office prepare failed: " . $connection->error);

for ($i = 0; $i < 50; $i++) {
    $name = $faker->company;
    $contactnum = $faker->numerify('09#########');
    $email = $faker->email;
    $address = $faker->address;
    $city = $faker->city;
    $country = "Philippines";
    $postal = $faker->postcode;

    $for_office->bind_param("sssssss", $name, $contactnum, $email, $address, $city, $country, $postal);
    if ($for_office->execute()) $officeCount++;
}
$for_office->close();
echo "Inserted $officeCount offices successfully!<br>";

$for_employee = $connection->prepare("INSERT INTO employee (lastName, firstName, office_id, address) VALUES (?, ?, ?, ?)");
if (!$for_employee) die("Employee prepare failed: " . $connection->error);

for ($i = 0; $i < 200; $i++) {
    $lastName = $faker->lastName;
    $firstName = $faker->firstName;
    $office_id = $faker->numberBetween(1, 50);
    $address = $faker->city;

    $for_employee->bind_param("ssis", $lastName, $firstName, $office_id, $address);
    if ($for_employee->execute()) $employeeCount++;
}
$for_employee->close();
echo "Inserted $employeeCount employees successfully!<br>";

$for_transaction = $connection->prepare("INSERT INTO transaction (employee_id, office_id, datelog, action, remarks, documentcode) VALUES (?, ?, ?, ?, ?, ?)");
if (!$for_transaction) die("Transaction prepare failed: " . $connection->error);

for ($i = 0; $i < 500; $i++) {
    $employee_id = $faker->numberBetween(1, 200);
    $office_id = $faker->numberBetween(1, 50);
    $datelog = $faker->dateTimeBetween('-5 years', 'now')->format('Y-m-d H:i:s');
    $action = $faker->word;
    $remarks = $faker->words(6, true);
    $documentcode = $faker->uuid;

    $for_transaction->bind_param("iissss", $employee_id, $office_id, $datelog, $action, $remarks, $documentcode);
    if ($for_transaction->execute()) $transactionCount++;
}
$for_transaction->close();
echo "Inserted $transactionCount transactions successfully!<br>";

$connection->close();
?>
