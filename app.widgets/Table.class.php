<?php
class Table extends Element{
	public function __construct(){
		parent::__construct('table', 'table table-hover table-condensed');
	}

	public function addRow(){
		$row = new TableRow;
		$row = $row->row();
		parent::add($row);
		return $row;
	}

	public function addTHead(){
		$row = new TableRow;
		$row = $row->thead();
		parent::add($row);
		return $row;
	}
}

?>