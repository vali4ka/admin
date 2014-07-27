<!doctype html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Администрация</title>

    <link rel="stylesheet" href="css/styles.css"/>
</head>
<body>

<div class="container">
    <nav>
        <a href="welcome.php">Начало</a>
        <a href="users.php">Потребители</a>
        <a href="news.php">Новини</a>
		<a href="pages.php">Страници</a>
		<a href="products.php">Продукти</a>
		<a href="blog.php">Блог</a>
		<a href="contact_form.php">Контактна форма</a>
		<a href="buy_form.php">Купуване на продукт</a>
        <a href="logout.php">Изход</a>

        <span>Здравей, <strong>
                <a href="edit_user.php?id=<?php echo $_SESSION['user']['username']; ?>">
				<?php echo $_SESSION['user']['username']; ?></a>
            </strong>
        </span>

        <div class="clear"></div>
    </nav>