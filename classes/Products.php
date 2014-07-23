<?php

class Products implements IItem{
	
	private $db;
	
	public function __construct($db) {
		$this->db = $db;
	}
	
	public function add(IItem $item){
		
		$sql = '
			INSERT INTO products (name, price)
			VALUES(
				"'. $item -> name .'",
				"'. $item -> price .'" 
			)';
			
		mysqli_query($this -> db, $sql);
	}
	
	public function update($id, IItem $item){
		
		$sql = '
			UPDATE products 
			SET 
			name = "' . $item->name . '",
			price = "' . $item->price . '"
			WHERE id = ' . $id;

		mysqli_query($this->db, $sql);
	}
	
	
	public function delete($id){
		
		$sql = '
			DELETE FROM products
			WHERE id ='.$id;
		
		mysqli_query($this -> db, $sql);
	}
	
	public function get($id){
		
		$sql = 'SELECT *
				FROM products
				WHERE id ='.$id;
		
		$res = mysqli_query($this->db, $sql);
		return mysqli_fetch_assoc($res);
	}
	
	
	public function getAll(){
		
		$sql ='SELECT * FROM products';
		
		$result = array();
		while($row = mysql_fetch_assoc($this->db, $sql)){
			$result[] = $row;
		}
		return $result;
	}
	
	public function images_count(){
		
		$sql ='
				SELECT products.id, products.name, products.price, COUNT(colors.id) as cnt
				FROM products
				LEFT JOIN products_images ON products.id = products_images.products_id
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