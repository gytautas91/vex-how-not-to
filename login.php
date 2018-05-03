<?php
require('database.php');
require('helpers.php');

$username = $_POST['username'];
$password = $_POST['password'];

$db = new Database();
$result = $db->select('users', '*', ['username' => $username, 'password' => $password]);

if ($result->num_rows > 0) {
    $user = $result->fetch_row();

    if ($user[2] == $username && $user[3] == $password) {
        $session = encode([
            'user' => $user,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        redirect(build_url([
            'page' => 'documents',
            'session' => $session,
        ]));
    } else {
        redirect(build_url([
            'page' => 'login',
            'error' => 'We could not find user by provided crediantials. Please try again'
        ]));
    }
}