<?php 

class Users implements ICRUD {
	
	private $db;

	public function __construct($db) {
		$this->db = $db;
	}
	
	public function add(IItem $item){
	
		$sql = 'INSERT INTO users(username, password)
				VALUES(
					"'.$item->username.'",
					"'.$item->password.'"
					)
				';
		mysqli_query($this->db, $sql);
	}
	
	public function get($id){
		
		$sql = '
			SELECT *
			FROM users
			WHERE id ='.$id;
			
		$res = mysqli_query($this->db, $sql);
		return mysqli_fetch_assoc($res);
	}
	
	
	public function getAll(){
		
		$sql = '
			SELECT * FROM users	';
		
		$res = mysqli_query($this->db, $sql);
		$result = array();
		while($row = mysqli_fetch_assoc($res)){
			$result[] = $row;
		}
		return $result;
	}
	
	
	public function delete($id){
		
		$sql = '
				DELETE FROM users
				WHERE id ='.$id;
				
		mysqli_query($this->db, $sql);
		
	}

	
	public function update($id, IItem $item){
		
		$sql = '
			UPDATE users
			SET 
			"'.$item->username.'",
			"'.$item->password.'"
			WHERE id ='.$id;
		
		mysqli_query($this->db, $sql);
	}
	
}

?>