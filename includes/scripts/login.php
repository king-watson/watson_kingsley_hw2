<?php
use Portfolio\Database;
session_start();
spl_autoload_register(function ($class) {
    $class = str_replace('Portfolio\\', '', $class);
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class); 
    $filepath = __DIR__ . '/../classes/' . $class . '.php';
    $filepath = str_replace("/", DIRECTORY_SEPARATOR, $filepath); 
    
    require_once $filepath;
});

$database = new Database();

$username = $_POST['username'];
$password = $_POST['password'];

$results = $database->query('SELECT * FROM users WHERE username = :username', ['username' => $username]);
$user = $results[0] ?? null;

$passwordMatches = password_verify($password, $user['password']);

if ($passwordMatches) {
    $_SESSION['logged_in_user'] = $user;
    header('Location: /watson-kingsley-portfolio/index.php');
} else {
    $_SESSION['error_messages'] = [];
    $_SESSION['error_messages']['login'] = 'Invalid username or password!';
    header('Location: /watson-kingsley-portfolio/login.php');
}

var_dump($_POST);
var_dump($user);
var_dump($passwordMatches);