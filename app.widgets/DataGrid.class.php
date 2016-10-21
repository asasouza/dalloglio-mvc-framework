<?php
class DataGrid extends Table{
	private $columns;
	private $actions;
	private $rowcount;

	public function addColumn(DataGridColumn $object){
		$this->columns[] = $object;
	}

	public function addAction(DataGridAction $object){
		$this->actions[] = $object;
	}

	function clear(){
		$copy = $this->children[0];
		$this->children = array();
		$this->children[] = $copy;
		$this->rowcount = 0;
	}

	public function createModel(){
		$row = parent::addRow();
		if ($this->actions) {
			foreach ($this->actions as $action) {
				$celula = $row->addCell('');
			}
		}
		if ($this->columns) {
			foreach ($this->columns as $column) {
				$name = $column->getName();
				$label = $column->getLabel();
				$celula = $row->addHead($label);
				if ($column->getAction()) {
					$url = $column->getAction();
					$celula->onclick = "document.location='{$url}'";
				}
			}
		}
	}

	public function addItem($object){
		$row = parent::addRow();
		if ($this->actions) {
			foreach ($this->actions as $action){
				$url = $action->serialize();
				$label = $action->getLabel();
				$image = $action->getImage();
				$field = $action->getField();
				$key = $object->$field;
				$link = new Element("a");
				$link->href="{$url}&key={$key}";
				if ($image) {
					$image = new Element("img");
					$image->src = "app/images/{$image}";
					$link->add($image);
				}else{
					$link->add($label);
				}
				$row->addCell($link);
			}
		}
		if ($this->columns) {
			foreach ($this->columns as $column) {
				$name = $column->getName();
				$function = $column->getTransformer();
				$data = $object->$name;
				if ($function) {
					$data = call_user_func($function, $data);
				}
				$celula = $row->addCell($data);				
			}
		}
		$this->rowcount++;
	}

}

?>