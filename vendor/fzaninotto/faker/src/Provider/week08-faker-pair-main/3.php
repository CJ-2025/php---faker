<?php
require_once 'vendor/autoload.php';

$faker = Faker\Factory::create('en_US');

$users = [];


for ($i=0; $i<10; $i++){
        $user_id = $faker->uuid;
        $name = $faker->name;
        $email = $faker->email;
        $username = strtolower(explode('@', $email)[0]);
        $password = hash('sha256', $faker->password);
        $acc_created_on = $faker->dateTimeBetween('-2 years', 'now')-> format('Y-m-d H:i:s');
    $users[] = [
        'user_id' => $user_id,
        'name' => $name,
        'email' => $email,
        'username' => $username,
        'password' => $password,
        'acc_created_on'=> $acc_created_on
    ];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2 class="mb-4">Fake Random Users</h2>
    <table class="table table-bordered table-striped">
        <tr>
            <th>User ID</th>
            <th>Full Name</th>
            <th>Email Address</th>
            <th>Username</th>
            <th>Password</th>
            <th>Account Created</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user['user_id']) ?></td>
                <td><?= htmlspecialchars($user['name']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td><?= htmlspecialchars($user['username']) ?></td>
                <td><?= htmlspecialchars($user['password']) ?></td>
                <td><?= htmlspecialchars($user['acc_created_on']) ?></td>
            </tr> 
        <?php endforeach; ?>
    </table>
    
</body>
</html>