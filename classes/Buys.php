<?php 

class Buys implements ICRUD{
	private $db;
	
	public function __construct($db){
		$this->db = $db; 
	}
	
	public function add(IItem $item) {
		$sql = '
			INSERT INTO buy_form (name, date_add, email, phone, product_title, product_price, is_approved) 
			VALUES (
				"'.$item->name.'",
				"'.$item->date_add.'",
				"'.$item->email.'",
				"'.$item->phone.'",
				"'.$item->product_title.'",
				"'.$item->product_price.'"
				
			)
		';
		mysqli_query($this->db, $sql);
	}

	public function update($id, IItem $item) {
	}


	public function delete($id) {

		$sql = '
			DELETE FROM buy_form WHERE id = '. $id;

		mysqli_query($this->db, $sql);

	}

	public function get($id) {

		$sql = '
			SELECT * FROM buy_form 
			WHERE id = '.$id;

		$res = mysqli_query($this->db, $sql);
		return mysqli_fetch_assoc($res);

	}

	public function getAll() {

		$sql = 'SELECT * FROM buy_form';
		$res = mysqli_query($this->db, $sql);
		$result = array();
		while ( $row = mysqli_fetch_assoc($res) ) {
			$result[] = $row;
		}

		return $result;

	}

}

?>