<?php
require_once('include/bootstrap.php');
require_once('include/header.php');
is_logged_in();
/*
$sql = 'SELECT * FROM users WHERE id = ' . $_GET['id'];
$user = db_select($sql);
$user = $user[0];
*/
$res = new Users($db_connection);
$user = $res -> get($_GET['id']);

$success = false;
$errors = false;
$exists = false;

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
    $id = $_GET['id'];

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT username FROM users WHERE username = '" . $username . "' AND id <> " . $id;

    $found_results = db_select($sql);

    if(validate_field($username)){
        if(count($found_results) == 0){

            $data = array(
                'username' => $username,
            );

            if(validate_field($password)){
                $data['password'] = md5($password);
            }

            db_update('users', $data, $_GET['id']);

            $success = true;
            $user['username'] = $username;
        } else {
            $exists = true;
        }

    } else {
        $errors = true;
    }

}

?>

<div class="content">
    <form action="" method="POST">
        <?php if($success == true): ?>
            <div class="success">Потребителя е обновен успешно!<?php redirect('users.php')?></div>
        <?php endif; ?>

        <?php if($errors == true && $exists == false): ?>
            <div class="error">Попълнете формата правилно!</div>
        <?php endif; ?>

        <?php if($errors == false && $exists == true): ?>
            <div class="error">Този потребител вече съществува!</div>
        <?php endif; ?>

        <div>
            <label for="">Потребител:</label>
            <input type="text" name="username" id="" value="<?php echo $user['username'];?>"/>
        </div>

        <div>
            <label for="">Парола:</label>
            <input type="password" name="password" id=""/>
        </div>

        <button type="submit">Редактирай</button>
    </form>
</div>

<?php
require_once('include/footer.php');