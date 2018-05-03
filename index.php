<?php

require ('helpers.php');
require ('database.php');




$defaultPage = 'home'; // .php
// Page to show
$page = isset($_GET['page']) ? $_GET['page'] : $defaultPage;

include('./views/'.$page.'.php');



?>
