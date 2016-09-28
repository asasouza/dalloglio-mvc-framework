<?php
class TTableRow extends TElement{

	public function __construct(){}

	public function addCell($value){
		$cell = new TTableCell;
		$cell = $cell->addCell($value);
		parent::add($cell);
		return $cell;
	}

	public function addHead($value){
		$cell = new TTableCell;
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