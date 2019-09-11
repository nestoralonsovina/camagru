<?php

function check_username_validity($pdo, $username)
{
    $stmt = $pdo->prepare('SELECT users.username FROM users WHERE username=:username;');
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();
    return strlen($user) !== 0;
}

function check_password_validity($pdo, $username, $password)
{
    $stmt = $pdo->preapre('SELECT users.password FROM users WHERE username=:username');
    $stmt->execute(['username' => $username]);
    $stored_password = $stmt->fetch();
    return password_verify($stored_password, $password);
}

function create_user($pdo, $username, $name, $password, $email)
{
    $stmt = $pdo->prepare('INSERT into users (username, real_name, password, email) VALUES (:username, :name, :password, :email)');
    $stmt->execute(['username' => $username, 'name' => $name, 'password' => $password, 'email' => $email]);
    $lines_created = $stmt->rowCount();
    return $lines_created;
}

?>