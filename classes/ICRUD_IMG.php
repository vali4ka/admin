<?php

interface ICRUD_IMG {

	public function add(IItem $item);
	public function delete($id);
	public function get_images($id);
	public function colors_images($id);
	public function images_count();
}