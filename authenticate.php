<?php
if (version_compare(PHP_VERSION, '5.5', '<')) {
    require 'lib/password.php';
}

if (empty($_POST['username']) || empty($_POST['password'])) {
    echo json_encode(['error' => 'Enter your username and password.']);

    return;
}

$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

try {

    $connection = new PDO('mysql:host=localhost;dbname=dbtest', 'test_user', 't3st_us3r', [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
    $statement = $connection->prepare('SELECT * FROM user u WHERE u.username = :username');
    $statement->bindParam('username', $username);
    $statement->execute();

    $invalidCredentialsMessage = 'The username or password you entered were incorrect.';
    if (0 === $statement->rowCount()) {
        echo json_encode(['error' => $invalidCredentialsMessage]);

        return;
    }

    $user = $statement->fetch(PDO::FETCH_ASSOC);
    if (!password_verify($password, $user['password'])) {
        echo json_encode(['error' => $invalidCredentialsMessage]);

        return;
    }

    // Initialize user session here

    echo json_encode(['success' => true]);

} catch(PDOException $e) {

    error_log("PDO Exception: \n{$e}\n");
    header("{$_SERVER['SERVER_PROTOCOL']} 500 Internal Server Error", true, 500);
}
