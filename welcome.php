<?php
require_once('include/bootstrap.php');
require_once('include/header.php');
is_logged_in();
?>
<div class="welcome">
	
        <span>Здравей, 
			<strong>
				<?php echo $_SESSION['user']['username']; ?>
			</strong>
        </span>

</div>

<?php require_once('include/footer.php'); ?>