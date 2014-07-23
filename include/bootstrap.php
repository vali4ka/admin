<?php
ob_start();
session_start();


$config['db']['host'] = 'localhost';
$config['db']['user'] = 'root';
$config['db']['password'] = 'vali4ka85';
$config['db']['name'] = 'caprice2';

$db_connection = mysqli_connect($config['db']['host'], $config['db']['user'], $config['db']['password'],$config['db']['name']);
if (!$db_connection) {
    die('Could not connect: ' . mysql_error());
}

require_once('functions/db.php');
require_once('functions/validate.php');
require_once('functions/common.php');


require_once('functions/news.php');
require_once('functions/pages.php');
//require_once('functions/products_images.php');
require_once('functions/products.php');

require_once('classes/IItem.php');
require_once('classes/ICRUD.php');
require_once('classes/ICRUD_IMG.php');
require_once('classes/ICRUD_Comments.php');
require_once('classes/Page.php');
require_once('classes/Pages.php');
require_once('classes/News.php');
require_once('classes/Newe.php');
require_once('classes/Products.php');
require_once('classes/Product.php');
require_once('classes/Users.php');
require_once('classes/User.php');
require_once('classes/Comments.php');
require_once('classes/Comment.php');
require_once('classes/Colors.php');
require_once('classes/Color.php');
require_once('classes/Contact_us.php');
require_once('classes/contact_uss.php');
require_once('classes/Buys.php');
require_once('classes/Buy.php');

?>
