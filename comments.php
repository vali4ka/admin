<?php
require_once('include/bootstrap.php');
require_once('include/header.php');


$comments = new Comments($db_connection);
//$news = new News($db_connection);
$result = $comments -> get_news_comments($_GET['id']);
$get_comments = $comments -> get_comments($_GET['id']);


if (isset($_GET['action'])){
	
	if($_GET['action'] = 'delete'){
		$comments -> delete($_GET['comments_id']);
		//redirect('comments.php);
	}
	
}


?>

<div class="content">
	
	
	
	
	
		<?php if($result['image'] != ''){ ?>
		
			<img src="pict/<?php echo $result['image'];?>" class="img" >
		<?php } ?>
	
	<h3><p class="title"><?php echo $result['title'];?></p></h3>
	<p class = "date"><?php echo $result['date_add'];?></p>
	<p class="content"><?php echo $result['content'];?></p>
	
	
	
	<?php foreach($get_comments as  $key => $value){ ?>
	
		<p class="user"><?php echo $value['user'];?></p>
		<p class="time"><?php echo $value['date_add'];?></p>
		<p class="comments"><?php echo $value['comments'];?></p>
		<a href="comments.php?action=delete&id=<?=$_GET['id']?>&comments_id=<?=$value['id']?>">Изтрий</a>
		<hr>
	
	<?php } ?>
	
	

</div>

<?php
require_once('include/footer.php');
