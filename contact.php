<?php
require ('database.php');
require ('helpers.php');

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

if (!$email || !$phone || !$message) {
  redirect(build_url(['page' => 'contact', 'error' => 'Please provide contact information']));
}

$db = new Database();
$db->insert('contacts', ['name' => $name, 'email' => $email, 'phone' => $phone, 'message' => $message ]);

redirect(build_url(['page' => 'contact_us', 'success' => 'Message was sent to support personal. You will be replayed in few moments.']));

?>
