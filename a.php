<?php
require_once('include/bootstrap.php');

$news = new News($db_connection);
$result = $news -> get($_GET['id']);

//$result = news_comments_get_all($_GET['id']);

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    db_delete('comments', $_GET['comment_id']);

    redirect('comments.php?id='.$_GET['id']);
}


require_once('include/header.php');
?>
<div class="content">
    <table>
        <tr>
            <th width="20%">Дата</th>
            <th width="10%">Име</th>
            <th width="50%">Коментар</th>
            <th>Действие</th>
        </tr>
        <?php foreach ($result as $key => $value) { ?>
        <tr>
            <td><?=date('H:i d.m.Yг.', strtotime($value['date_added'])); ?></td>
            <td><?=$value['title']?></td>
            <td><?=$value['content']?></td>
            <td><a href="comments.php?action=delete&id=<?=$_GET['id']?>&comment_id=<?=$value['id']?>">Изтрий</a></td>
        </tr>
        <?php } ?>
    </table>
    <br>
</div>
<?php
require_once('include/footer.php');