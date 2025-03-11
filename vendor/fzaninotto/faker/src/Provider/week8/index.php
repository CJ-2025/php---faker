<?php
require_once 'vendor/autoload.php'; // Include the Composer autoload file

// Initialize Faker and other necessary libraries
$faker = Faker\Factory::create();
$users = [];

for ($i = 0; $i < 10; $i++) {
    $uuid = uniqid('', true); // Generate a UUID for user ID
    $fullName = $faker->name; // Random full name
    $email = $faker->email; // Random email address
    $username = strtolower(explode('@', $email)[0]); // Get the username (first part of email)
    $password = hash('sha256', $faker->password); // Random password, encrypted using SHA-256
    $accountCreated = $faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d H:i:s'); // Random account creation date within the past 2 years

    $users[] = [
        'UserID' => $uuid,
        'FullName' => $fullName,
        'Email' => $email,
        'Username' => $username,
        'Password' => $password,
        'AccountCreated' => $accountCreated
    ];
}

// Display the users in a formatted HTML table
echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<thead>
        <tr>
            <th>User ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Username</th>
            <th>Password (SHA-256)</th>
            <th>Account Created</th>
        </tr>
      </thead>";
echo "<tbody>";
foreach ($users as $user) {
    echo "<tr>
            <td>{$user['UserID']}</td>
            <td>{$user['FullName']}</td>
            <td>{$user['Email']}</td>
            <td>{$user['Username']}</td>
            <td>{$user['Password']}</td>
            <td>{$user['AccountCreated']}</td>
          </tr>";
}
echo "</tbody>";
echo "</table>";
?>