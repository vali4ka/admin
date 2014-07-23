<?php
require_once('include/bootstrap.php');
require_once('include/header.php');
//$data = pages_get($_GET['id']);

$pages = new pages($db_connection);
$data = $pages -> get($_GET['id']);


if($_SERVER['REQUEST_METHOD'] == 'POST') {

		$page = new Page();
		$page ->title = $_POST['title'];
		$page -> content = $_POST['content'];
		$pages -> update($_GET['id'], $page);

/*
    db_update('pages', array(
		'title' => $_POST['title'],
		'content' => $_POST['content']
	),$_GET['id']);
*/
	redirect('pages.php');
}

?>
<div class="content">

	<h2> Редактирай страница: <em><?php echo $data['title']?></em> </h2>
	<form action="" method="post">
		<label>
			Заглавие
			<input type="text" name="title" value="<?php echo $data['title']?>">
		</label>
		<br>
		<label>
			Съдържание
			<textarea name="content"><?php echo $data['content']?></textarea>
		</label>
		<br>

		<br>
		<button type="submit">Запази</button>
		
	</form>
</div>

<?php
require_once('include/footer.php');