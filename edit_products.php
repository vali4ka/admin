<?php
require_once('include/bootstrap.php');
require_once('include/header.php');

//$sql = 'SELECT * FROM products WHERE id = ' . $_GET['id'];
//$data = db_select($sql);

$products = new products($db_connection);
$data = $products -> get($_GET['id']);

if($_SERVER['REQUEST_METHOD'] == 'POST') {

		$product = new Product();
		$product -> name = $_POST['name'];
		$product -> price = $_POST['price'];
		$products -> update($_GET['id'], $product);
/*

    db_update('products', array(
		'name' => $_POST['name'],
		'price' => $_POST['price']
	),$_GET['id']);
*/	
	redirect('products.php');
	


}

?>
<div class="content">

	<h2> Редактирай продукт: <em><?php echo $data['name']?></em> </h2>
	<form action="" method="post">
		<label>
			Име на продукта
			<input type="text" name="name" value="<?php echo $data['name']?>">
		</label>
		<br>
		<label>
			Цена
			<input type="text" name="price" value="<?php echo $data['price']?>">
		</label>
		<br>

		<br>
		<button type="submit">Запази</button>
		
	</form>
</div>

<?php
require_once('include/footer.php');