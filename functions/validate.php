<?php 
function validate_email($email) {
	$flag = true;

	if (strpos($email, '@') === false) {
		$flag = false;
	}

	$pos_at = strpos($email, '@');
	$pos_dot = strrpos($email, '.');

	if ($pos_dot < $pos_at) {
		$flag = false;
	}

	$badsymbols = array('?', '!', '(', ')', '|');
	foreach ($badsymbols as $key => $value) {
		if (strpos($email, $value) !== false) {
			$flag = false;
		}
	}

	return $flag;
}

function validate_field($value) {
    $value = trim($value);

    if ($value == ''){
        return false;
    } else {
        return true;
    }
}

function validate_phone($phone)
{
    $flag = true;

    if (substr($phone, 4, 1) !== '/') {
        $flag = false;
    }

    if (substr($phone, 8, 1) !== '-') {
        $flag = false;
    }

    $str = str_replace('/', '', $phone);
    $str = str_replace('-', '', $str);
    for ($i = 0; $i < strlen($str); $i++) {
        if (!is_numeric(substr($str, $i, 1))) {
            $flag = false;
        }
    }

    if (strlen($str) != 10) {
        $flag = false;
    }

    return $flag;
}

function is_logged_in()
{
    if (!isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == false) {
        header('Location: index.php');
        exit;
    }
}


?>