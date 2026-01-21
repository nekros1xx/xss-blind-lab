<?php
session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'secure' => false,
    'httponly' => false,
    'samesite' => 'Lax'
]);

session_start();
$_SESSION['admin'] = true;

$dataFile = __DIR__ . '/data/users.json';
$users = file_exists($dataFile)
    ? json_decode(file_get_contents($dataFile), true)
    : [];
?>


<!DOCTYPE html>
<html>
<head>
    <title>NEXORA Labs – Admin Dashboard</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="container">
    <h1>NEXORA Labs</h1>
    <h2>Administration Dashboard</h2>

    <?php if (!$users): ?>
        <p>No pending requests.</p>
    <?php endif; ?>

    <?php foreach ($users as $u): ?>
        <div class="card">
            <strong>Email:</strong><br>
            <?= $u['email'] ?><br><br>

            <strong>Note:</strong><br>
            <?= $u['note'] ?><br><br>

            <small>Submitted at <?= $u['time'] ?></small>
        </div>
    <?php endforeach; ?>

    <div class="footer">
        Confidential · Internal use only
    </div>
</div>

</body>
</html>
