<?php
class TImage extends TElement{
	private $source;

	public function __construct($source){
		parent::__construct("img", "img-responsive");
		$this->src = $source;
	}
}

?>