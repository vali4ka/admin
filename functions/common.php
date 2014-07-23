<?php 
function redirect($link){
	header('Location:'.$link);
	exit;
}


function my_array_slice($array, $from, $length)
{

    for ($i = $from; $i <= $length; $i++) {
        $result[] = $array[$i];
    }
    return $result;
}


function myexplode($delimeter, $string) {

	$result = array();
	$pos = 0;

	for ($i = 0; $i<strlen($string); $i++) {
		if ($string[$i] == $delimeter) {
			$result[] = substr($string, $pos, $i-$pos);
			$pos = $i+1;
		}
	}

	$result[] = substr($string, $pos);

	return $result; //masiva da e stringa razdelen po delimetera
}


//print_r(myexplode(',', '1,22,3zxvc,444x,5,6'));

function my_str_replace($search, $replace, $subject) {

	while ($pos = strpos($subject, $search)) {
		
		$prefix = substr($subject, 0, $pos);

		$suffix = substr($subject, $pos+strlen($search));

		$subject = $prefix.$replace.$suffix;
	}

	return $subject;
}


//echo my_str_replace('abc', 'xyz', 'dsfsf abc asdf asdf xa abc sdf aabc');


?>