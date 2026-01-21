<?php
$dataFile = __DIR__ . '/data/users.json';

if (!file_exists(dirname($dataFile))) {
    mkdir(dirname($dataFile));
}

if ($_POST) {
    $entry = [
        'email' => $_POST['email'],
        'note'  => $_POST['note'],
        'time'  => date('Y-m-d H:i:s')
    ];

    $existing = file_exists($dataFile)
        ? json_decode(file_get_contents($dataFile), true)
        : [];

    $existing[] = $entry;
    file_put_contents($dataFile, json_encode($existing, JSON_PRETTY_PRINT));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>NEXORA Labs – Client Registration</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="container">
    <h1>NEXORA Labs</h1>
    <h2>Client Access Request</h2>

    <form method="POST">
        <label>Email address</label>
        <input type="text" name="email" required>

        <label>Internal note</label>
        <textarea name="note" rows="4"
          placeholder="Optional message for the administrator"></textarea>

        <button type="submit">Submit request</button>
    </form>

    <div class="footer">
        © 2026 NEXORA Labs · Internal systems
    </div>
</div>

</body>
</html>
