<?php
require_once('include/bootstrap.php');
require_once('include/header.php');
//$sql = "SELECT * FROM users ORDER BY username";
//$result_users = db_select($sql);

$res = new Users($db_connection);
$result_users = $res -> getAll();

if (isset($_GET['action'])) {

	switch ($_GET['action']) {
		case 'delete':
			$res->delete($_GET['id']);
			redirect('users.php?action=success');
		break;
		case 'success':
			$deleteMsg = 'Изтриването успешно';
		break;
		default:
			redirect('users.php');
			break;
	}
}

?>

<div class="content">
    <a href="add_user.php">Добави потребител</a>
    <br/><br/>
    <table>
        <tr>
            <th>#</th>
            <th>Потребител</th>
            <th>Действие</th>
        </tr>
        <?php foreach($result_users as $key => $value):?>
            <tr>
                <td><?php echo $value['id'];?></td>
                <td><?php echo $value['username'];?></td>
                <td>
                    <a href="edit_user.php?id=<?php echo $value['id'];?>">Редактирай</a>
                    <?php if($value['id'] != $_SESSION['user']['id']): ?>
                    <a href="users.php?action=delete&id=<?php echo $value['id'];?>">Изтрий</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
		<?php if (isset($deleteMsg)){ ?>
		<th colspan = "3"><?=$deleteMsg;?></th>
		<?php } ?>
    </table>

</div>

<?php
require_once('include/footer.php');