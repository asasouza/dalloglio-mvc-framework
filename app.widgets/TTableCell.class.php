<?php
class TTableCell extends TElement{
	public function __construct(){}

	public function addCell($value){
		parent::__construct('td');
		parent::add($value);
		return $this;
	}

	public function addTh($value){
		parent::__construct('th');
		parent::add($value);
		return $this;
	}
}

?>