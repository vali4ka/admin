<?php



function products_get($id) {
    global $db_connection;
    
    $sql = '
        SELECT products.id, products.title, products.content
        FROM products
        WHERE id = '.$id;

    $res = mysqli_query($db_connection, $sql);
    return mysqli_fetch_assoc($res);
}

function products_images($id) {
	global $db_connection;

    $sql = '
	SELECT products_images.name as images, products_images.products_id, products.name as product, products_images.id
	FROM products
	INNER JOIN products_images ON products.id = products_images.products_id 
    WHERE products.id = '.$id;
	
    $result = mysqli_query($db_connection, $sql);
	//return $result;
    return mysqli_fetch_assoc($result);

	
}



function get_images($id){

	global $db_connection;
	
	$sql = '
			SELECT products_images.name as images
			FROM products
			INNER JOIN products_images ON products.id = products_images.products_id 
			WHERE products.id ='.$id;
			
	$result = mysqli_query($db_connection, $sql);
	return $result;
	//return mysqli_fetch_assoc($result);

}

function images_count() {

	global $db_connection;

$sql ='
        SELECT products.id, products.name, products.price, COUNT(products_images.id) as cnt
        FROM products
        LEFT JOIN products_images ON products.id = products_images.products_id
        GROUP BY products.id
    ';
    $results = db_select($sql);

    return $results;
}