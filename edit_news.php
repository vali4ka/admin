<?php
require_once('include/bootstrap.php');

$news = new News($db_connection);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$filename = '';

	//да се провери дали не може двете заявки да се обединят в 1

	if ($_FILES['image']['tmp_name'] != '') {
		//старата картинка да се изтрие

		$filename = rand(1, 10000).$_FILES['image']['name'];
		move_uploaded_file($_FILES['image']['tmp_name'], 'pict/'.$filename);
		//db_update('news', array('image' => $filename), $_GET['id']);

	}
	
	
		$newe = new Newe();
		$newe ->title = $_POST['title'];
		$newe -> content = $_POST['content'];
		$newe -> image = $filename;
		$news -> update($_GET['id'], $newe);
/*
	

			db_update('news', array(
				'title' => $_POST['title'],
				'content' => $_POST['content'],
				'image' => $filename
			),$_GET['id']);
*/

			redirect('news.php');
}

//$data = news_get($_GET['id']);
//$news = new News($db_connection);
$data = $news -> get($_GET['id']); 

require_once('include/header.php');

?>
<div class="content">

	<h2> Редактирай новина: <em><?php echo $data['title']?></em> </h2>
	<form action="" method="post" enctype="multipart/form-data">
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
		<?php if ($data['image'] != '') { ?>
		<img src="pict/<?php echo $data['image']?>" width="100">
		<?php if($data['image'] != ''): ?>
		<a href="delete_pict.php?id=<?php echo $data['id'];?>">Изтрий</a>
		<?php endif; ?>
		<br>
		<?php } ?>
		<label>
			Качете нова картинка
			<input type="file" name="image">
		</label>
		<br>
		<button type="submit">Запази</button>
	</form>
</div>

<?php
require_once('include/footer.php');