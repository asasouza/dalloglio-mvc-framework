<?php
class TParagraph extends TElement{

	public function __construct($text){
		parent::__construct('p');
		parent::add($text);
	}
}

?>