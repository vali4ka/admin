<?php
require_once('include/bootstrap.php');

//$del = new Pages($db_connection);
//$delete = $del -> delete($_GET['id']);

$id = $_GET['id'];
db_delete_pict('news', $id);

redirect(' edit_news.php?id='.$_GET['id']);
exit;
?>