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
$db->insert('contacts', []);

?>
