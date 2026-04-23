<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<?php
if (!empty($_SESSION['error_messages'])) {
    foreach ($_SESSION['error_messages'] as $error) {
        echo '<p>' . $error . '</p>';
    }
}
?>

<form action="/watson-kingsley-portfolio/includes/scripts/login.php" method="POST">
    <div>
        <label for="username">Username</label>
        <input type="text" name="username" />
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" />
    </div>
    <div>
        <button type="submit">Login</button>
    </div>
</form>

</body>
</html>
<?php
$_SESSION['error_messages'] = [];
?>