<?php
require_once('include/bootstrap.php');
require_once('include/header.php');

$pages = new Pages($db_connection);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	if ($_POST['title'] != '' && $_POST['content'] != '') {

   // $title = $_POST['title'];
    //$content = $_POST['content'];
	
	$page = new Page();
	$page -> title = $_POST['title'];
	$page -> content = $_POST['content'];
	$pages -> add($page);
	

	/*
            db_insert('pages', array(
                    'title' => $title,
                    'content' => $content
                ));
	*/

            redirect('pages.php');
       
	}	
}

?>

    <div class="content">

		<form action="" method="POST">
            <div>
                <label for="">Заглавие:</label>
                <input type="text" name="title" id=""/>
            </div>
			
			<div>
				<label>Съдържание:
					<textarea type="text" name="content" id=""></textarea>
				</label>
			</div>

            <button type="submit">Добави</button>
        </form>
    </div>

<?php
require_once('include/footer.php');