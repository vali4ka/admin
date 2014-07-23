<?php 

class Colors implements ICRUD_IMG{
	private $db;
	
	public function __construct($db){
		$this -> db = $db;
	}
	
	public function add(IItem $item){
		
		$sql = '
			INSERT INTO colors (products_id, colors, images)
			VALUES (
				"'.$item -> products_id.'",
				"'.$item -> colors.'",
				"'.$item -> images.'"
			)';
			
		mysqli_query($this -> db, $sql);
	}
	
	public function delete($id){
		
		$sql ='
			DELETE FROM colors
			WHERE id ='.$id;
		
		mysqli_query($this->db, $sql);
	}
	
	
	public function colors_images($id){
	
			$sql = '
			SELECT colors.colors, colors.images, products.name, colors.products_id, colors.id
			FROM products
			INNER JOIN colors ON products.id = colors.products_id 
			WHERE products.id = '.$id;
			
	$res =  mysqli_query($this -> db, $sql);
	return mysqli_fetch_assoc($res);
	
	}
	
	
		public function get_images($id){
		
		$sql = '
			SELECT colors.images, colors.colors, products.name, colors.id
			FROM products
			INNER JOIN colors ON products.id = colors.products_id 
			WHERE products.id ='.$id;
			
	return  mysqli_query($this -> db, $sql);
	
	
	}
	
		public function images_count(){
		
		$sql ='
				SELECT COUNT(colors.id) as cnt
				FROM products
				LEFT JOIN colors ON products.id = colors.products_id
				GROUP BY products.id
			';
			
		$res = mysqli_query($this -> db, $sql) or die(mysqli_error($this ->db));
		$result = array();
		while ($row = mysqli_fetch_assoc($res)) {
			$result[] = $row;
		}

		return $result;
	}
	

}
?>