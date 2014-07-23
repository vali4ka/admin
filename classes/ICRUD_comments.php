<?php

interface ICRUD_comments {

	public function add(IItem $item);
	public function delete($id);
	public function get_comments($id);
	public function get_news_comments($id);
	

}