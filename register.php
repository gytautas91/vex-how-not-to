<?php
require('database.php');
require('helpers.php');

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$match = $_POST['match-password'];

if ($password !== $match) {
    redirect(build_url([
        'page' => 'register',
        'error' => 'Passwords did not match. Please try again'
    ]));
}

$db = new Database();
$result = $db->query("SELECT * FROM users WHERE username='".$username."' OR email='".$email."' LIMIT 1");

if ($result->num_rows == 0) {

    $db->insert('users', ['username' => $username, 'password' => $password, 'email' => $email, 'created_at' => date('Y-m-d H:i:s')]);
    redirect(build_url([
        'page' => 'login',
        'success' => 'You may now login with your username and password'
    ]));
} else {
    redirect(build_url([
        'page' => 'register',
        'error' => 'We could not find user by provided crediantials. Please try again'
    ]));
}
