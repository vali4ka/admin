<?php
require_once('include/bootstrap.php');
require_once('include/header.php');


//$result = images_count();

$res = new Buys($db_connection);
$result = $res -> getAll();

if (isset($_GET['action'])) {

	switch ($_GET['action']) {
		case 'delete':
			$res->delete($_GET['id']);
			redirect('buy_form.php?action=success');
		break;
		case 'success':
			$deleteMsg = 'Изтриването успешно';
		break;
		default:
			redirect('buy_form.php');
			break;
	}
}


if($_SERVER ['REQUEST_METHOD'] == 'POST'){
	
	$add = new Buy();
	$add->is_approved = $_GET['id'];
	$res->add($add);
	
}

?>

<div class="content">

    <table>
        <tr>
            <th>#</th>
            <th>купувач</th>
			<th>Дата/час</th>
			<th>email</th>
			<th>телефон</th>
			<th>продукт</th>
			<th>цена</th>
			<th>дайствие</th>
        </tr>
        <?php foreach($result as $key => $value):?>
            <tr>
                <td><?php echo $value['id'];?></td>
                <td><?php echo $value['name'];?></td>
				<td><?php echo $value['date_add'];?></td>
				<td><?php echo $value['email'];?></td>
				<td><?php echo $value['phone'];?></td>
				<td><?php echo $value['product_title'];?></td>
				<td><?php echo $value['product_price'];?></td>

				<form action="" method="post">
                <td>
                    <button type="submit" id="<?php echo $value['id'];?>">Одобри</button>
                  
                    <a href="buy_form.php?action=delete&id=<?php echo $value['id'];?>">Изтрий</a>
                
                </td>
				</form>
            </tr>
        <?php endforeach; ?>
		<?php if (isset($deleteMsg)){ ?>
		<th colspan = "5"><?=$deleteMsg;?></th>
		<?php } ?>
    </table>

</div>

<?php
require_once('include/footer.php');