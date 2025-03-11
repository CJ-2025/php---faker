<?php
require_once 'vendor/autoload.php';

$faker = Faker\Factory::create('en_PH');

$jobTitles = ['Guro', 'Inhinyero', 'Doktor', 'Nars', 'Abogado', 
    'Tagapamahala', 'Kawani', 'Magsasaka', 'Pulis', 'Negosyante'
];
$users = [];

for ($i=0; $i<5; $i++){
    $users[] = [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone_no' => $faker->numerify('09#########'),
        'address' => $faker->address,
        'bday' => $faker->date('Y-m-d'),
        'job' => $jobTitles[array_rand($jobTitles)]
    ];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2 class="mb-4">Pilipino User Profiles</h2>
    <table class="table table-bordered table-striped">
        <tr>
            <th>Full Name</th>
            <th>Email Address</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Birthday</th>
            <th>Job</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user['name']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td><?= htmlspecialchars($user['phone_no']) ?></td>
                <td><?= htmlspecialchars($user['address']) ?></td>
                <td><?= htmlspecialchars($user['bday']) ?></td>
                <td><?= htmlspecialchars($user['job']) ?></td>
            </tr> 
        <?php endforeach; ?>
    </table>
    
</body>
</html>