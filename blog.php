
<?php

require_once('include/bootstrap.php');
require_once('include/header.php');

$comments = new Comments($db_connection);
$result = $comments -> getAll();

if (isset($_GET['action'])) {

	switch ($_GET['action']) {
		case 'delete':
			$comments -> delete($_GET['id']);
			redirect('blog.php?action=success');
		break;
		case 'success':
			$deleteNews = 'Изтриването успешно';
			break;
		default:
			redirect('news.php');
			break;
	}
}
?>

<div class="content">

    <table border="1">
        <tr>
            <th>#</th>
			<th>Новина</th>
            <th>Потребител</th>
            <th>Коментар</th>
			<th>Дата</th>
			<th>Действие</th>
        </tr>
		<?php if(isset($result)){ ?>
        <?php foreach($result as $key => $value):?>
            <tr>
                <td><?php echo $value['id'];?></td>
				<td><?php echo $value['title'];?></td>
				<td><?php echo $value['user'];?></td>
				<td><?php echo $value['comments'];?></a></td>
				<td><?php echo $value['date_add'];?></td>
                <td>
                    <a href="blog.php?action=delete&id=<?php echo $value['id'];?>">Изтрий</a>

                </td>
            </tr>
        <?php endforeach; ?>
		<?php } ?>
		<?php if (isset($deleteNews)) : ?>
		<tr>
			<th colspan="5"><div class="success"><?= $deleteNews ?></div></th>
		</tr>
		<?php endif; ?>
    </table>

</div>

<?php
require_once('include/footer.php');
