
<?php

require_once('include/bootstrap.php');
require_once('include/header.php');

$news = new News($db_connection);
$result_news = $news -> getAll();

if (isset($_GET['action'])) {

	switch ($_GET['action']) {
		case 'delete':
			$news -> delete($_GET['id']);
			redirect('news.php?action=success');
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
<a href="add_news.php">Напиши новина</a>
    <br/><br>
    <table border="1">
        <tr>
            <th>#</th>
            <th>Залавиег</th>
            <th>Коментар</th>
			<th>Дата</th>
			<th>Действие</th>
        </tr>
        <?php foreach($result_news as $key => $value):?>
            <tr>
                <td><?php echo $value['id'];?></td>
                <td><?php echo $value['title'];?></td>
				<td><a href ="comments.php?id=<?php echo $value['id'];?>"><?php echo $value['content'];?></a></td>
				<td><?php echo $value['date_add'];?></td>
                <td>
                    <a href="edit_news.php?id=<?php echo $value['id'];?>">Редактирай</a>
                    <?php if($value['id'] != $_SESSION['user']['id']): ?>
                    <a href="news.php?action=delete&id=<?php echo $value['id'];?>">Изтрий</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
		<?php if (isset($deleteNews)) : ?>
		<tr>
			<th colspan="5"><div class="success"><?= $deleteNews ?></div></th>
		</tr>
		<?php endif; ?>
    </table>

</div>

<?php
require_once('include/footer.php');
