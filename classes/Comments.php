<?php 

class Comments implements ICRUD_comments {
	private $db;

	public function __construct($db) {
		$this->db = $db;
	}
	
	
		public function add(IItem $item){
		
	}
	
	
	function delete($id){
	
		$sql = 'DELETE FROM comments
				WHERE id='.$id;
				
		mysqli_query($this->db, $sql);
	}

			public function get_comments($id){
		
		$sql = '
			SELECT comments.comments, comments.id, comments.user, comments.date_add
			FROM news
			LEFT JOIN comments ON news.id = comments.news_id 
			WHERE news.id ='.$id;
			
	return  mysqli_query($this -> db, $sql);
	
	
	}
	
		public function get_news_comments($news_id){
		
		$sql = '
			SELECT comments.news_id, news.id, news.title, news.date_add, news.content, news.image
			FROM news
			LEFT JOIN comments ON news.id = comments.news_id 
			WHERE news.id = '.$news_id;
			
	$res =  mysqli_query($this->db, $sql);
	return mysqli_fetch_assoc($res);
	
	
	}

		public function getAll() {

		$sql = 'SELECT comments.id, comments.comments, comments.user, comments.date_add, news.title
				FROM comments
				INNER JOIN news ON news.id = comments.news_id';
		
		$res = mysqli_query($this->db, $sql);
		$result = array();
		while ( $row = mysqli_fetch_assoc($res) ) {
			$result[] = $row;
		}

		return $result;

	}
}
?>