<?php
require_once('include/bootstrap.php');
require_once('include/header.php');


//$result = images_count();

$res = new Products($db_connection);
$result = $res -> images_count();

if (isset($_GET['action'])) {

	switch ($_GET['action']) {
		case 'delete':
			$res->delete($_GET['id']);
			redirect('products.php?action=success');
		break;
		case 'success':
			$deleteMsg = 'Изтриването успешно';
		break;
		default:
			redirect('products.php');
			break;
	}
}

?>

<div class="content">
<a href="add_products.php">Добави продукт</a>

    <br/><br>
    <table>
        <tr>
            <th>#</th>
            <th>Име на продукта</th>
			<th>Цена</th>
			<th>Снимки</th>
			<th>Действие</th>
        </tr>
        <?php foreach($result as $key => $value):?>
            <tr>
                <td><?php echo $value['id'];?></td>
                <td><?php echo $value['name'];?></td>
				<td><?php echo $value['price'];?></td>

				<td>
					<a href="add_images.php?id=<?php echo $value['id'];?>">Добави(<?php echo $value['cnt']?>)</a>
					
				</td>
			
                <td>
                    <a href="edit_products.php?id=<?php echo $value['id'];?>">Редактирай</a>
                  
                    <a href="products.php?action=delete&id=<?php echo $value['id'];?>">Изтрий</a>
                
                </td>
            </tr>
        <?php endforeach; ?>
		<?php if (isset($deleteMsg)){ ?>
		<th colspan = "5"><?=$deleteMsg;?></th>
		<?php } ?>
    </table>

</div>

<?php
require_once('include/footer.php');