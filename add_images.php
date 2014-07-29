<?php
require_once('include/bootstrap.php');
require_once('include/header.php');




$colors = new Colors($db_connection);

$result = $colors -> get_images($_GET['id']);
//$color = $colors -> colors_images($_GET['id']);


if(isset($_GET['action'])){
	
	if($_GET['action'] = 'delete'){
		
		$colors -> delete($_GET['id']);
		
		redirect('add_images.php?id='.$_GET['products_id'].'');
	}
	
	if($_GET['action'] = 'success'){
	
		echo 'Изтриването е успешно';
	}
	if($_GET['action'] = 'add'){
	
		echo 'Добавихте  снимка';
	}
	
}


if($_SERVER ['REQUEST_METHOD'] == 'POST'){
	
		if ($_FILES['image']['tmp_name'] != '') {//tmp_name 
			$filename = rand(1, 10000).$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'], 'pict/'.$filename);
		} else {
			$filename = '';
		}
		
		
		if($_POST['promo'] != 'promo'){
			$promo = 0;
		}else{
			$promo = 1;
		}
		
		
		if( $filename != ''){
			$color = new Color();
			$color->products_id = $_GET['id'];
			$color->colors = $_POST['colors'];
			$color->images = $filename;
			$color->promo = $promo;
			$colors -> add($color);
		}else{
			echo 'Няма избран файл!';
		}
	
		
	
	
	/*
		foreach ($result as $key => $value) { 
		if($_POST['promo'] == 'promo' && $_POST['image'] = $value['id']){
			echo	"<img id='img' src='pict/".$value['images']."'>";
			echo 'promocionalen product';
			$flag = true;
			exit;
		}
		}
*/		

	/*	
		db_insert('products_images', array(
					
					'products_id' => $_GET['id'],
					'name' => $filename
				));
	*/
				
		redirect('add_images.php?id='.$_GET['id']);
	
}
require_once('include/header.php');

?>
<div class="content">

	<h2> Добави снимки: </em> </h2>
	<form action="" method="post" enctype="multipart/form-data">
	
		<div>
			<table border=1>
			<tr>
			
			 <?php foreach ($result as $key => $value) { ?>
			 
			<td>
			
			<img id="img" src="pict/<?php echo $value['images'];?>">
			<br>
			<?php echo $value['name']?>
			<?php echo $value['colors']?>
			<br>
			<a id="iztrii" href="add_images.php?action=delete&id=<?=$value['id']?>&products_id=<?=$_GET['id']?>">Изтрий</a>
			<?php if($value['promo'] == 1){ ?>
			<?php echo "<div class='promo'>промоционален продукт</div>"; ?>
			</td>		
		
			<?php } ?>
			<?php } ?>
		</tr>
		</table>
	</div>
	
	<br><br><br>
		
		<label>
			Име на продукта:
			<input type="text" name="title" value="<?php echo $value['name']?>">
		</label>
		<br>
		
		<label>
			Цвят на продукта:
			<input type="text" name="colors" value="">
		</label>
		<br>
		
		<label>
			Промоционален продукт:
			<input type="radio" name="promo" value="promo">
		</label>
		<br>
		
		<label>
			Качете картинка
			<input type="file" name="image">
		</label>
		<br>
		
		<button type="submit">Запази</button>
		
	</form>



</div>


<?php
require_once('include/footer.php');