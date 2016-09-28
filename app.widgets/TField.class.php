<?php
abstract class TField{
	protected $name;
	protected $value;
	protected $editable;
	protected $tag;
	
	public function __construct($name){
		self::setName($name);
		self::setEditable(TRUE);
		$this->tag = new TElement('input');
	}

	public function setName($name){
		$this->name = $name;
	}

	public function getName(){
		return $this->name;
	}

	public function setValue($value){
		$this->value = $value;
	}

	public function getValue($value){
		return $this->value;
	}

	public function setEditable($editable){
		$this->editable = $editable;
	}

	public function getEditable(){
		return $this->editable;	
	}

	public function setProperty($name, $value){
		$this->tag->$name = $value;
	}

	public function setClass($class){
		$this->tag->setClass($class);
	}

	public function addClass($class){
		$this->tag->addClass($class);
	}
}

?>