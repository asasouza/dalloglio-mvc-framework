<?php
class TTable extends TElement{
	public function __construct(){
		parent::__construct('table', 'table table-hover table-condensed');
	}

	public function addRow(){
		$row = new TTableRow;
		$row = $row->row();
		parent::add($row);
		return $row;
	}

	public function addTHead(){
		$row = new TTableRow;
		$row = $row->thead();
		parent::add($row);
		return $row;
	}
}

?>