<?php
class TableRow extends Element{

	public function __construct(){}

	public function addCell($value){
		$cell = new TableCell;
		$cell = $cell->addCell($value);
		parent::add($cell);
		return $cell;
	}

	public function addHead($value){
		$cell = new TableCell;
		$cell = $cell->addTh($value);
		parent::add($cell);
		return $cell;
	}

	public function row(){
		parent::__construct('tr');
		return $this;
	}

	public function thead(){
		parent::__construct('thead');
		return $this;
	}
}

?>