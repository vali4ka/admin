<?php
require_once('include/bootstrap.php');
require_once('include/header.php');

//$sql = "SELECT * FROM pages ORDER BY id";
//$data = db_select($sql);
$pages = new Pages($db_connection);
$data = $pages -> getAll();


if (isset($_GET['action'])) {

	switch ($_GET['action']) {
		case 'delete':
			$pages->delete($_GET['id']);
			redirect('pages.php?action=success');
		break;
		case 'success':
			$deleteMsg = 'Изтриването успешно';
		break;
		default:
			redirect('pages.php');
			break;
	}
}


?>

<div class="content">
<a href="add_pages.php?">Добави страница</a>
    <br/><br>
    <table>
        <tr>
            <th>#</th>
            <th>Заглавие</th>
			<th>Действие</th>
        </tr>
        <?php foreach($data as $key => $value):?>
            <tr>
                <td><?php echo $value['id'];?></td>
                <td><a href="pages_content.php?id=<?php echo $value['id'];?>">				
				<?php echo $value['title'];?></td></a>

                <td>
                    <a href="edit_pages.php?id=<?php echo $value['id'];?>">Редактирай</a>
					<a href="pages.php?action=delete&id=<?=$value['id']?>">Изтрий</a></td>
                    
                </td>
			</tr>
			<tr>
				<?php endforeach; ?>
				
				<?php if (isset($deleteMsg)){ ?>
				<th colspan = "3"><?=$deleteMsg;?></th>
				<?php } ?>
			</tr>
    </table>

</div>

<?php
require_once('include/footer.php');