<?php
session_start();

use Portfolio\Database;
spl_autoload_register(function ($class) {
    $class = str_replace('Portfolio\\', '', $class);
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class); 
    $filepath = __DIR__ . '/../classes/' . $class . '.php';
    $filepath = str_replace("/", DIRECTORY_SEPARATOR, $filepath); 
    
    require_once $filepath;
});

if (!isset($_SESSION['logged_in_user'])) {
    header('Location: /watson-kingsley-portfolio/login.php');
    exit;
}

$database = new Database();
$action = $_POST['action'] ?? null;

if ($action === 'insert') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $link = $_POST['link'];
    $tag = $_POST['tag'];

    if (empty($title)) {
        $_SESSION['error_messages']['title'] = 'Title is required!';
        header('Location: /watson-kingsley-portfolio/index.php');
        exit;
    }

    if (empty($description)) {
        $_SESSION['error_messages']['description'] = 'Description is required!';
        header('Location: /watson-kingsley-portfolio/index.php');
        exit;
    }

    $database->query(
        'INSERT INTO projects (title, description, image, link, tag) VALUES (:title, :description, :image, :link, :tag);',
        ['title' => $title, 'description' => $description, 'image' => $image, 'link' => $link, 'tag' => $tag]
    );

    header('Location: /watson-kingsley-portfolio/index.php');
    exit;
}

if ($action === 'update') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $link = $_POST['link'];
    $tag = $_POST['tag'];

    if (empty($title)) {
        $_SESSION['error_messages']['title'] = 'Title is required!';
        header('Location: /watson-kingsley-portfolio/index.php');
        exit;
    }

    $database->query(
        'UPDATE projects SET title = :title, description = :description, image = :image, link = :link, tag = :tag WHERE id = :id;',
        ['title' => $title, 'description' => $description, 'image' => $image, 'link' => $link, 'tag' => $tag, 'id' => $id]
    );

    header('Location: /watson-kingsley-portfolio/index.php');
    exit;
}

if ($action === 'delete') {
    $id = $_POST['id'];

    $database->query(
        'UPDATE projects SET is_deleted = 1 WHERE id = :id;',
        ['id' => $id]
    );

    header('Location: /watson-kingsley-portfolio/index.php');
    exit;
}

var_dump($_POST);