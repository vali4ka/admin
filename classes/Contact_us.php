<?php

class Contact_us implements ICRUD {
	private $db;

	public function __construct($db) {
		$this->db = $db;
	}


	public function add(IItem $item) {
		$sql = '
			INSERT INTO contact_form (name, e_mail, phone, message) 
			VALUES (
				"'.$item->name.'",
				"'.$item->e_mail.'",
				"'.$item->phone.'",
				"'.$item->message.'"
			)
		';
		mysqli_query($this->db, $sql);
	}
	
	public function getAll() {

		$sql = 'SELECT * FROM contact_form';
		$res = mysqli_query($this->db, $sql);
		$result = array();
		while ( $row = mysqli_fetch_assoc($res) ) {
			$result[] = $row;
		}

		return $result;

	}
	
	public function delete($id) {

		$sql = '
			DELETE FROM contact_form WHERE id = '. $id;

		mysqli_query($this->db, $sql);

	}

	public function update($id, IItem $item) {
	}




	public function get($id) {

	}

	

}