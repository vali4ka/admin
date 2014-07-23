<?php
require_once('include/bootstrap.php');

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    redirect('welcome.php');
    exit;
}

$wrong_login = false;
if(isset($_SESSION['errors']) && $_SESSION['errors'] == true) {
    $wrong_login = true;
    $_SESSION['errors'] = false;
}
?>

<!doctype html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Администрация</title>
</head>
<body>

<form action="login.php" method="POST">
    <?php if($wrong_login): ?>
    <div class="errors">Грешно име или парола</div>
    <?php endif; ?>
    <div>
        <label for="username">Потребител:</label>
        <input type="text" name="username" id="username"/>
    </div>
    <div>
        <label for="password">Парола:</label>
        <input type="password" name="password" id="password"/>
    </div>

    <button type="submit">Вход</button>
</form>

</body>
</html>