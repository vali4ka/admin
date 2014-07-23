<?php
require_once('include/bootstrap.php');
require_once('include/header.php');

$news = new News($db_connection);

$title = '';
//$content = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {

	if($_FILES['image']['tmp_name'] != ''){
		$filename = rand(1,10000).$_FILES['image']['name'];
		move_uploaded_file($_FILES['image']['tmp_name'], 'pict/'.$filename);
	}else{
		$filename = '';
	}
	
		$newe = new Newe();
		$newe ->title = $_POST['title'];
		$newe -> content = $_POST['content'];
		$newe -> image = $filename;
		$newe -> date_add = date('Y-m-d H:i:s');
		$news -> add($newe);
	
			
/*
            db_insert('news', array(
                    'title' => $_POST['title'],
                    'content' => $_POST['content'],
					'image' => $filename,
					'date_add' => date('Y-m-d H:i:s')
                ));
*/	
	
			redirect('news.php');
}

?>

    <div class="content">

        <form action="" method="post" enctype="multipart/form-data">
            <div>
				<p>Добави новина</p>
            </div>


			<div>
                <label for="">Заглавие:</label>
                <input type="title" name="title" id="" value="<?php echo $title?>"/>
            </div>
			
			 <div>
                <label for="text">Съдържание:</label>
                <textarea type="text" name="content" id="" value="<?php echo $content?>"></textarea>
            </div>
			
			<div>
                <label>Качете картинка
                <input type="file" name="image">
				</label>
            </div>

            <button type="submit">Изпрати</button>

        </form>
    </div>

<?php
require_once('include/footer.php');