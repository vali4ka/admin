<?php
require_once('include/bootstrap.php');
require_once('include/header.php');

//$data = pages_get($_GET['id']);
$res = new Pages($db_connection);
$data = $res -> get($_GET['id']);


?>
<div class="content">
	<a href="add_pages.php">Добави страница</a>
	<a href="edit_pages.php?id=<?php echo $data['id'];?>">Редактирай</a>
                   
	<div>
		<h2><?php echo $data['title'];?></a></h2>
		<br>
		<?php echo $data['content'];?></a>
	</div>
</div>

<?php
require_once('include/footer.php');    