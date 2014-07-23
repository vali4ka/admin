<?php
require_once('include/bootstrap.php');
require_once('include/header.php');

$result = new Products($db_connection);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //$name = $_POST['name'];
    //$price = $_POST['price'];
	
	$product = new Product();
	$product -> name = $_POST['name'];
	$product -> price = $_POST['price'];
	$result -> add($product);

	/*
            db_insert('products', array(
                    'name' => $name,
                    'price' => $price
                ));
	*/

			redirect('products.php');
}

?>

    <div class="content">

		<form action="" method="POST">
            
            <div>
                <label for="">Име на продукт:</label>
                <input type="text" name="name" id=""/>
            </div>
			
			<div>
                <label for="">Цена/лв.</label>
                <input type="text" name="price" id=""/>
            </div>

            <button type="submit">Добави</button>
        </form>
    </div>

<?php
require_once('include/footer.php');