<?php
require_once('include/bootstrap.php');
unset($_SESSION['logged_in']);
unset($_SESSION['user']);

redirect('index.php');

?>