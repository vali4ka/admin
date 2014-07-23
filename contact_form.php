<?php
require_once('include/bootstrap.php');
require_once('include/header.php');

$contact = new Contact_us($db_connection);
$data = $contact -> getAll();


if (isset($_GET['action'])) {

	switch ($_GET['action']) {
		case 'delete':
			$contact-> delete($_GET['id']);
			redirect('contact_form.php?action=success');
		break;
		case 'success':
			$deleteMsg = 'Изтриването успешно';
		break;
		default:
			redirect('contact_form.php');
			break;
	}
}


?>

<div class="content">

    <br/><br>
    <table>
        <tr>
            <th>#</th>
            <th>Име</th>
			<th>e-mail</th>
			<th>Телефон</th>
			<th>Съобщение</th>
			<th>Действие</th>
        </tr>
			<?php foreach($data as $key => $value){ ?>
            <tr>
				<td><?=$value['id'];?></td>
				<td><?=$value['name'];?></td>
                <td><?=$value['e_mail'];?></td>
				<td><?=$value['phone'];?></td>
				<td><?=$value['message'];?></td>
				<td>
  
					<a href="contact_form.php?action=delete&id=<?=$value['id']?>">Изтрий</a></td>
                    
                </td>
			</tr>
			<?php } ?>
			<tr>
				
				<?php if (isset($deleteMsg)){ ?>
				<th colspan = "6"><?=$deleteMsg;?></th>
				<?php } ?>
			</tr>
    </table>

</div>

<?php
require_once('include/footer.php');