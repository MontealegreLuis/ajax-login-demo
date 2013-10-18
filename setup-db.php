<?php
if (version_compare(PHP_VERSION, '5.5', '<')) {
    require 'lib/password.php';
}

try {

    $connection = new PDO('mysql:host=localhost;dbname=dbtest', 'test_user', 't3st_us3r', [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
    $createTableStatement = <<<QUERY
        CREATE TABLE user(
            `user_id`  INT AUTO_INCREMENT NOT NULL,
            `username` VARCHAR(40) NOT NULL,
            `password` VARCHAR(255) NOT NULL,
            PRIMARY KEY (`user_id`)
        ) CHARACTER SET utf8 COLLATE utf8_general_ci
QUERY;
    $statement = $connection->prepare($createTableStatement);
    $statement->execute();

    $username = 'luis';
    $password = password_hash('changeme', PASSWORD_DEFAULT);
    $statement = $connection->prepare(
        'INSERT INTO user (`username`, `password`) VALUES (:username, :password)'
    );
    $statement->bindParam('username', $username);
    $statement->bindParam('password', $password);
    $statement->execute();

} catch (PDOException $e) {

    echo $e;
}
